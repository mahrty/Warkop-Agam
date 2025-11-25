<?php

class Database {
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = ''; // default XAMPP
    private static $db   = 'agam_kasir';
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            self::$conn = new mysqli(
                self::$host,
                self::$user,
                self::$pass,
                self::$db
            );

            if (self::$conn->connect_errno) {
                die("Gagal koneksi database: " . self::$conn->connect_error);
            }

            // Set timezone
            date_default_timezone_set('Asia/Jakarta');
        }

        return self::$conn;
    }
}
?>
