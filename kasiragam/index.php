<?php

// Debug biar error ketahuan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load database
require_once __DIR__ . '/config/database.php';

// FIX UTAMA — INIT koneksi global
$mysqli = Database::getConnection();

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Routing parameter
$page   = $_GET['page']   ?? 'login';
$action = $_GET['action'] ?? 'index';

// Path controller
$controllerPath = __DIR__ . '/app/controllers/';

// Fungsi load controller
function loadController($file) {
    global $controllerPath;

    $fullPath = $controllerPath . $file;
    if (!file_exists($fullPath)) {
        die("Controller not found: $file");
    }

    require_once $fullPath;
}

// Router
switch ($page) {

    case 'login':
        loadController('AuthController.php');
        $c = new AuthController();
        ($action === 'logout') ? $c->logout() : $c->login();
        break;

    case 'home':
        loadController('HomeController.php');
        $c = new HomeController();
        $c->index();
        break;

    case 'menu':
        loadController('MenuController.php');
        $c = new MenuController();
        match ($action) {
            'tambah' => $c->tambah(),
            'edit'   => $c->edit(),
            'hapus'  => $c->hapus(),
            default  => $c->index()
        };
        break;

case 'pesanan':
    loadController('PesananController.php');
    $c = new PesananController();
    match ($action) {
        'input'  => $c->input(),
        'detail' => $c->detail(),
        'simpan' => $c->simpan(),   // FIX UTAMA
        'hapus'  => $c->hapus(),
        default  => $c->index()
    };
    break;

    case 'pembayaran':
        loadController('PembayaranController.php');
        $c = new PembayaranController();
        match ($action) {
            'form'   => $c->form(),
            'simpan' => $c->simpan(),
            default  => $c->index()
        };
        break;

    case 'laporan':
        loadController('LaporanController.php');
        $c = new LaporanController();
        $c->index();
        break;

    default:
        loadController('AuthController.php');
        $c = new AuthController();
        $c->login();
        break;
}
