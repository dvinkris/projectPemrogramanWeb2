<!DOCTYPE html>
<html>
<head>
    <title>Input data </title>
    <style>
        body {
            background: url('terupload/bggantipassword.png') center center no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }

        table {
            width: 100%;
            margin: 15px 0;
        }

        td {
            padding: 10px;
            font-size: 14px;
            color: #444;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #bbb;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background: linear-gradient(90deg, #4CAF50, #2E8B57);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #45a049, #228B22);
        }
    </style>
</head>
<body>

<?php
// session_start();
// include ('koneksi.php');

// $koneksi = mysqli_connect($servername, $username, $password, $database);
// //$ID = @$_GET['ID']
// $username = @$_GET['username'];
// $data = mysqli_query($koneksi, "SELECT * FROM login_new where username='$username'");
// $d = mysqli_fetch_array($data);
?>

<div class="container">
<h1>FORM GANTI PASSWORD</h1>
<form action="update2.php?ID=" method="POST" name="form-ganti-password">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td>Password Lama</td>
            <td><input type="password" name="password_lama" id="password_lama"></td>
        </tr>
        <tr>
            <td>Password Baru</td>
            <td><input type="password" name="password_baru" id="password_baru"></td>
        </tr>
        <tr>
            <td>Konfirmasi Password Baru</td>
            <td><input type="password" name="konf_password" id="konf_password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="Ganti" id="Ganti"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>