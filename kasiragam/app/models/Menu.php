<?php
require_once __DIR__ . '/../../config/database.php';


class Menu {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM menu ORDER BY id_menu DESC");
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM menu WHERE id_menu = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($data) {
        $stmt = $this->db->prepare("
            INSERT INTO menu (nama_menu, kategori, harga, stok, status, deskripsi, gambar)
            VALUES (?,?,?,?,?,?,?)
        ");
        $stmt->bind_param(
            "ssdisss",
            $data['nama_menu'],
            $data['kategori'],
            $data['harga'],
            $data['stok'],
            $data['status'],
            $data['deskripsi'],
            $data['gambar']
        );
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE menu SET nama_menu=?, kategori=?, harga=?, stok=?, status=?, deskripsi=?, gambar=? WHERE id_menu=?
        ");
        $stmt->bind_param(
            "ssdisssi",
            $data['nama_menu'],
            $data['kategori'],
            $data['harga'],
            $data['stok'],
            $data['status'],
            $data['deskripsi'],
            $data['gambar'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM menu WHERE id_menu=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
