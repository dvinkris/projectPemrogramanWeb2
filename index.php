<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            background: url('terupload/bgweb.jpg')center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h2 {
            margin: 10px 0;
        }
        table {
            margin: 10px auto;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login-register-text {
            margin-top: 15px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Order F&B</h1>
        <h2>Mohon Login ke Akun Anda</h2>
        <form action="coba-login.php" method="POST">
            <table>
                <tr>
                    <td><h3>Username:</h3></td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td><h3>Password:<h3></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="Log In"></td>
                </tr>    
            </table>
        </form>
        <p class="login-register-text">Anda belum punya akun? <a href="register_new.php">Daftar</a></p>
        <p class="login-register-text">Lupa Password? <a href="forget.php">Lupa Password</a></p>
    </div>
</body>
</html>
