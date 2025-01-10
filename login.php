<?php
session_start();
include 'koneksi.php';

// Cek jika sudah login, redirect ke index
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Cek jika form login disubmit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Query untuk mencari user dan rolenya
        $stmt = $conn->prepare("SELECT id, username, password, nama, role FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session setelah login berhasil
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } catch(PDOException $e) {
        $error = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg,rgb(242, 151, 4),rgb(165, 165, 165));
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            width: 320px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background:rgb(224, 87, 82);
            border-radius: 50%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 2rem;
        }

        .login-form {
            margin-top: 20px;
        }

        .input-field {
            margin: 10px 0;
            position: relative;
        }

        .input-field input {
            width: calc(100% - 20px);
            padding: 10px 40px;
            border: none;
            border-radius: 25px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            outline: none;
            box-sizing: border-box;
        }

        .input-field i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .login-button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 25px;
            background:rgb(224, 87, 82);
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-button:hover {
            background: rgb(93, 93, 93);
        }

        .error {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="profile-icon">&#128100;</div>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form class="login-form" method="POST" action="">
            <div class="input-field">
                <i>&#x1F464;</i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-field">
                <i>&#x1F512;</i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="login-button">LOGIN</button>
        </form>
        <div style="margin-top: 15px;">
            <a href="form_registrasi.php" style="color:rgb(93, 93, 93);">Belum punya akun? Daftar disini</a>
        </div>
    </div>
</body>

</html>
