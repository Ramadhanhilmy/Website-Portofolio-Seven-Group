<?php
session_start();

// Periksa apakah pengguna sudah login, jika belum arahkan ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            border: 3px solid white; /* Bingkai tombol */
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #444;
            border-color: #888;
        }
    </style>
    <title>Log Out</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <a href="logout.php" class="logout-button">Log Out</a>
    </div>
</body>
</html>
