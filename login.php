<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Akademik</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffd1e8, #ffe6f2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #ff5ca8;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type=submit] {
            width: 100%;
            padding: 10px;
            background: #ff5ca8;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type=submit]:hover {
            background: #ff2f92;
        }

        .note {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Login Sistem</h2>

    <form action="proses_login.php" method="post">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <input type="submit" value="Login">
    </form>
     <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <script>
            alert("Username atau password salah!");
        </script>
    <?php endif; ?>

    <div class="note">
        Login sebagai <b>Mahasiswa</b> atau <b>Dosen</b>
    </div>
</div>

</body>
</html>
