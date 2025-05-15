<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login Berhasil</title>
    <style>
        body {
            background: url('terupload/bgweb.jpg') center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            max-width: 90%;
            width: 600px;
            text-align: center;
        }

        h1, h2, h3 {
            margin: 10px 0;
        }

        h1 {
            color: #2c3e50;
        }

        h2 {
            color: #27ae60;
        }

        .logout-change-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .logout-change-buttons a {
            background-color: #f44336;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
            font-weight: bold;
        }

        .logout-change-buttons a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    //cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['username']==""){
        header("location:index.php?pesan=gagal");
    }
    ?>
<div class="container">
    <h1>Halaman Login Berhasil</h1>
    <h2>Selamat! <b><?php echo $_SESSION['username']; ?></b> Anda telah berhasil login.</h2>
    <br/>
    <div class="logout-change-buttons">
        <a href="index.php">LOGOUT</a>
    </div>
</div>
</body>
</html>