<?php
require_once __DIR__ . '/../models/Laporan.php';
require_once __DIR__ . '/../../config/database.php';

class LaporanController {

    public function index() {
        // gunakan Database class dari config
        $db = (new Database())->getConnection();

        // cek login
        if (!isset($_SESSION['kasir_logged']) || $_SESSION['kasir_logged'] !== true) {
            header("Location: ?page=login");
            exit;
        }

        $model = new LaporanModel($db);
        $laporan = $model->getAllLaporan();

        require __DIR__ . '/../views/laporan/index.php';
    }
}
