<?php

class LaporanModel {

    private $db;

    public function __construct($mysqli) {
        $this->db = $mysqli;
    }

    // Ambil semua laporan + nama kasir
    public function getAllLaporan() {
        $sql = "
            SELECT lp.*, k.nama_kasir
            FROM laporan_penjualan lp
            JOIN kasir k ON lp.id_kasir = k.id_kasir
            ORDER BY lp.tanggal_laporan DESC
        ";

        return $this->db->query($sql);
    }
}
