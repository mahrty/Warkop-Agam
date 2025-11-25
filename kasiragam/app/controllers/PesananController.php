<?php
require_once __DIR__ . '/../models/Pesanan.php';

class PesananController {

    public function index() {
        global $mysqli;

        if (!$mysqli) die("DB not connected.");

        $data = $mysqli->query("SELECT * FROM pesanan ORDER BY id_pesanan DESC");

        require __DIR__ . '/../views/pesanan/list.php';
    }

    public function input() {
        global $mysqli;
        if (!$mysqli) die("DB not connected.");

        $menu = $mysqli->query("SELECT * FROM menu WHERE status='Tersedia' ORDER BY nama_menu ASC");

        require __DIR__ . '/../views/pesanan/input.php';
    }

    public function simpan() {
        global $mysqli;
        if (!$mysqli) die("DB not connected.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nama_pelanggan = trim($_POST['nama_pelanggan'] ?? '');
            $tanggal = date('Y-m-d H:i:s');
            $total_harga = 0;

            if (!empty($_POST['menu'])) {

                // Hitung total harga
                foreach ($_POST['menu'] as $id_menu) {

                    $jumlah = (int)($_POST["jumlah_$id_menu"] ?? 0);
                    if ($jumlah <= 0) continue;

                    $price = $mysqli->query("SELECT harga FROM menu WHERE id_menu='$id_menu'")->fetch_assoc();
                    $total_harga += ($price['harga'] * $jumlah);
                }

                // Jika tidak ada qty > 0
                if ($total_harga <= 0) {
                    echo "<script>alert('Jumlah belum diisi'); history.back();</script>";
                    exit;
                }

                // Insert pesanan
                $stmt = $mysqli->prepare("
                    INSERT INTO pesanan (tanggal_pesanan, nama_pelanggan, total_harga, status_pesanan) 
                    VALUES (?, ?, ?, 'Belum Dibayar')
                ");
                // total_harga = DECIMAL → gunakan string "s"
                $stmt->bind_param("sss", $tanggal, $nama_pelanggan, $total_harga);
                $stmt->execute();

                $id_pesanan = $stmt->insert_id;

                // Insert detail pesanan
                foreach ($_POST['menu'] as $id_menu) {

                    $jumlah = (int)($_POST["jumlah_$id_menu"] ?? 0);
                    if ($jumlah <= 0) continue;

                    $price = $mysqli->query("SELECT harga FROM menu WHERE id_menu='$id_menu'")->fetch_assoc();
                    $subtotal = $price['harga'] * $jumlah;

                    $stmt2 = $mysqli->prepare("
                        INSERT INTO detail_pesanan (id_pesanan, id_menu, jumlah, subtotal) 
                        VALUES (?, ?, ?, ?)
                    ");
                    // subtotal DECIMAL → string "s"
                    $stmt2->bind_param("iiis", $id_pesanan, $id_menu, $jumlah, $subtotal);
                    $stmt2->execute();
                }

                header("Location: ?page=pesanan");
                exit;
            }

            echo "<script>alert('Tidak ada menu dipilih'); history.back();</script>";
        }
    }

    public function detail() {
        $id = intval($_GET['id'] ?? 0);

        $p = Pesanan::find($id);
        $d = Pesanan::detail($id);

        require __DIR__ . '/../views/pesanan/detail.php';
    }

    public function hapus() {
        global $mysqli;
        if (!$mysqli) die("DB not connected.");

        $id = intval($_GET['id'] ?? 0);

        if ($id > 0) {
            $mysqli->query("DELETE FROM detail_pesanan WHERE id_pesanan = $id");
            $mysqli->query("DELETE FROM pesanan WHERE id_pesanan = $id");
        }

        header("Location: ?page=pesanan");
        exit;
    }
}
