<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
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

        .register-container {
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
            background: rgb(224, 87, 82);
            border-radius: 50%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .register-container h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .register-form .input-field {
            margin: 10px 0;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
        }

        .register-button {
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

        .register-button:hover {
            background:rgb(93, 93, 93);
        }

        .back-to-login {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .back-to-login a {
            color: rgb(255, 255, 255);
            text-decoration: none;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="profile-icon">&#128100;</div>
        <h2>Registrasi</h2>
        <form class="register-form" action="register.php" method="POST">
            <div class="input-field">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-field">
                <input type="password" name="repassword" placeholder="Ulangi Password" required>
            </div>
            <button type="submit" class="register-button">REGISTER</button>
        </form>
        <div class="back-to-login">
            Back to <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>
