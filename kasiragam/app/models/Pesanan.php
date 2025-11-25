<?php
require_once __DIR__ . '/../../config/database.php';

class Pesanan {

    public static function all() {
        global $mysqli;
        return $mysqli->query("SELECT * FROM pesanan ORDER BY id_pesanan DESC");
    }

    public static function find($id) {
        global $mysqli;
        return $mysqli->query("SELECT * FROM pesanan WHERE id_pesanan = $id")->fetch_assoc();
    }

    public static function detail($id) {
        global $mysqli;
        return $mysqli->query("
            SELECT dp.*, m.nama_menu, m.harga 
            FROM detail_pesanan dp
            JOIN menu m ON dp.id_menu = m.id_menu
            WHERE dp.id_pesanan = $id
        ");
    }
}
