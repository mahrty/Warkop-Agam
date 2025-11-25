<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function login() {
        $err = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();

            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $userModel->findByUsername($username);

            if ($user) {
                // Saat ini DB nyimpen password plaintext — so compare langsung
                if ($password === $user['password']) {
                    $_SESSION['kasir_logged'] = true;
                    $_SESSION['id_kasir'] = $user['id_kasir'];
                    $_SESSION['nama_kasir'] = $user['nama_kasir'];

                    header("Location: ?page=home");
                    exit;
                } else {
                    $err = 'Password salah.';
                }
            } else {
                $err = 'Username tidak ditemukan.';
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        // router punya session, controller tidak start session
        session_destroy();
        header("Location: ?page=login");
        exit;
    }
}
