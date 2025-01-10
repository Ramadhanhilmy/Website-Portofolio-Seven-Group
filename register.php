<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $repassword = htmlspecialchars(trim($_POST['repassword']));

    // Validasi input
    if (empty($nama) || empty($username) || empty($password) || empty($repassword)) {
        echo "<script>alert('Semua field harus diisi!'); history.back();</script>";
        exit();
    }

    if ($password !== $repassword) {
        echo "<script>alert('Password dan Re-Password tidak cocok!'); history.back();</script>";
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        echo "<script>alert('Username hanya boleh terdiri dari huruf, angka, dan underscore, dengan panjang 3-20 karakter!'); history.back();</script>";
        exit();
    }

    try {
        // Cek apakah username sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        
        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Username sudah terdaftar! Silakan gunakan username lain.'); history.back();</script>";
            exit();
        }

        // Hash password untuk keamanan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO users (nama, username, password) VALUES (:nama, :username, :password)");
        $stmt->execute([
            'nama' => $nama,
            'username' => $username,
            'password' => $hashedPassword
        ]);
        
        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'login.php';</script>";
        } else {
            throw new Exception("Gagal menyimpan data");
        }
        
    } catch (PDOException $e) {
        echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); history.back();</script>";
    }
}
?>
