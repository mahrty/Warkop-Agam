<?php

class HomeController {

    public function index() {
        // session sudah dimulai di index.php router
        if (!isset($_SESSION['kasir_logged']) || $_SESSION['kasir_logged'] !== true) {
            header('Location: ?page=login');
            exit;
        }

        $nama = $_SESSION['nama_kasir'] ?? 'Kasir';

        require __DIR__ . '/../views/home/index.php';
    }
}
