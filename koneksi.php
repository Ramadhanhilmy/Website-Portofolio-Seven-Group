<?php
try {
    $host = "localhost";
    $dbname = "SevenGroup";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}
?>
