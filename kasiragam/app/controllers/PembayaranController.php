<?php
require_once __DIR__ . '/../models/Pembayaran.php';

class PembayaranController {

    public function index() {
        global $mysqli;
        $data = $mysqli->query("SELECT * FROM pesanan WHERE status_pesanan='Belum Dibayar' ORDER BY id_pesanan DESC");
        require __DIR__ . '/../views/pembayaran/index.php';
    }

    public function form() {
        $id = (int)($_GET['id'] ?? 0);
        $pesanan = Pembayaran::findPesanan($id);
        require __DIR__ . '/../views/pembayaran/form.php';
    }

    public function simpan() {
        // proses simpan pembayaran (sebelumnya method bayar)
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: ?page=pembayaran");
            exit;
        }

        if (!isset($_SESSION['id_kasir'])) {
            die("Kasir belum login.");
        }

        $id_pesanan = (int)($_POST['id_pesanan'] ?? 0);
        $metode = $_POST['metode_pembayaran'] ?? '';
        $jumlah_bayar = (float)($_POST['jumlah_bayar'] ?? 0);
        $id_kasir = $_SESSION['id_kasir'];

        $kembalian = Pembayaran::prosesPembayaran($id_pesanan, $metode, $jumlah_bayar, $id_kasir);

        echo "<script>
            alert('Pembayaran berhasil. Kembalian: Rp " . number_format($kembalian,0,',','.') . "');
            window.location.href='?page=pembayaran';
        </script>";
    }
}
