<?php
require_once __DIR__ . '/../models/Menu.php';

class MenuController {

    public function index() {
        $menuModel = new Menu();
        $data = $menuModel->getAll();
        require __DIR__ . '/../views/menu/list.php';
    }

    public function tambah() {
        $menuModel = new Menu();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gambar = $this->uploadGambar();

            $data = [
                'nama_menu' => $_POST['nama_menu'] ?? '',
                'kategori' => $_POST['kategori'] ?? '',
                'harga' => $_POST['harga'] ?? 0,
                'stok' => $_POST['stok'] ?? 0,
                'status' => $_POST['status'] ?? 'Tersedia',
                'deskripsi' => $_POST['deskripsi'] ?? '',
                'gambar' => $gambar
            ];

            $menuModel->insert($data);
            header("Location: ?page=menu");
            exit;
        }

        require __DIR__ . '/../views/menu/tambah.php';
    }

    public function edit() {
        $menuModel = new Menu();
        $id = $_GET['id'] ?? 0;

        $menu = $menuModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $gambar = $menu['gambar'] ?? null;
            $upload = $this->uploadGambar();

            if ($upload !== null) {
                $gambar = $upload;
            }

            $data = [
                'nama_menu' => $_POST['nama_menu'] ?? '',
                'kategori' => $_POST['kategori'] ?? '',
                'harga' => $_POST['harga'] ?? 0,
                'stok' => $_POST['stok'] ?? 0,
                'status' => $_POST['status'] ?? 'Tersedia',
                'deskripsi' => $_POST['deskripsi'] ?? '',
                'gambar' => $gambar
            ];

            $menuModel->update($id, $data);
            header("Location: ?page=menu");
            exit;
        }

        require __DIR__ . '/../views/menu/edit.php';
    }

    public function hapus() {
        $menuModel = new Menu();
        $id = $_GET['id'] ?? 0;

        // hapus gambar
        $menu = $menuModel->getById($id);
        if ($menu && !empty($menu['gambar']) && file_exists(__DIR__ . '/../../uploads/' . $menu['gambar'])) {
            unlink(__DIR__ . '/../../uploads/' . $menu['gambar']);
        }

        $menuModel->delete($id);
        header("Location: ?page=menu");
        exit;
    }

    private function uploadGambar() {
        if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== 0) {
            return null;
        }

        $targetDir = __DIR__ . '/../../uploads/';
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        $fileName = basename($_FILES["gambar"]["name"]);
        $path = $targetDir . $fileName;

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            return null;
        }

        move_uploaded_file($_FILES["gambar"]["tmp_name"], $path);
        return $fileName;
    }
}
