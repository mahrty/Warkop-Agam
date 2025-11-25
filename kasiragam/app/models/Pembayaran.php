<?php

class Pembayaran
{
    public static function listBelumDibayar()
    {
        global $mysqli;
        return $mysqli->query("
            SELECT * FROM pesanan 
            WHERE status_pesanan='Belum Dibayar' 
            ORDER BY id_pesanan DESC
        ");
    }

    public static function findPesanan($id)
    {
        global $mysqli;

        $stmt = $mysqli->prepare("SELECT * FROM pesanan WHERE id_pesanan = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public static function prosesPembayaran($id_pesanan, $metode, $jumlah_bayar, $id_kasir)
    {
        global $mysqli;

        $tanggal = date('Y-m-d H:i:s');

        // Ambil total
        $cek = $mysqli->query("SELECT total_harga FROM pesanan WHERE id_pesanan = $id_pesanan");
        $pes = $cek->fetch_assoc();
        $total = $pes['total_harga'];

        $kembalian = $jumlah_bayar - $total;

        // Insert pembayaran
        $stmt = $mysqli->prepare("
            INSERT INTO pembayaran 
            (id_pesanan, metode_pembayaran, jumlah_bayar, kembalian, tanggal_pembayaran, id_kasir)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("isddsi", $id_pesanan, $metode, $jumlah_bayar, $kembalian, $tanggal, $id_kasir);
        $stmt->execute();

        // Update status pesanan
        $mysqli->query("UPDATE pesanan SET status_pesanan = 'Sudah Dibayar' WHERE id_pesanan = $id_pesanan");

        // Update laporan harian
        $tanggal_laporan = date('Y-m-d');
        $cek = $mysqli->query("SELECT id_laporan FROM laporan_penjualan WHERE tanggal_laporan='$tanggal_laporan' AND id_kasir=$id_kasir");

        if ($cek->num_rows > 0) {
            $lap = $cek->fetch_assoc();
            $mysqli->query("UPDATE laporan_penjualan SET total_pendapatan = total_pendapatan + $total WHERE id_laporan = ".$lap['id_laporan']);
        } else {
            $mysqli->query("
                INSERT INTO laporan_penjualan (tanggal_laporan, total_pendapatan, id_kasir)
                VALUES ('$tanggal_laporan', $total, $id_kasir)
            ");
        }

        return $kembalian;
    }
}
