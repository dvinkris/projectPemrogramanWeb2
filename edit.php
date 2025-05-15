<!DOCTYPE html>
<html>
    <head>
        <title>Input data</title>
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

        h2 {
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

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        button {
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

        button:hover {
            background: linear-gradient(90deg, #45a049, #228B22);
        }

        a {
            display: inline-block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    </head>
<body>
    <div class="container">
    <h1>Form Edit Data</h1>
    <?php
    session_start();
    include('koneksi.php');

    $koneksi = mysqli_connect($servername, $username, $password, $database);
    $ID = @$_GET['ID']; //ambil data ID dari URL ketika mengklik edit di login_admin.php
    $data = mysqli_query($koneksi, "SELECT * FROM login_new where ID='$ID'");
    $d = mysqli_fetch_array($data);
    ?>

    <form action="update.php?ID=<?php echo $ID ?>" method="post">
    <table>
        <tr>
            <td>ID : </td>
            <td><input type="text" name="ID" value="<?php echo $d['ID']; ?>"></td>
        </tr>
        <tr>
            <td>Username : </td>
            <td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="password" value="<?php echo $d['password']; ?>"></td>
        </tr>
        <tr>
            <td>Level : </td>
            <td><input type="text" name="level" value="<?php echo $d['level']; ?>"></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="text" name="email" value="<?php echo $d['email']; ?>"></td>
        </tr>
        <tr>
            <td>Nama_File : </td>
            <td><input type="text" name="nama_file" value="<?php echo $d['nama_file']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Update</button></td>
        </tr>
        <tr>
            <td colspan="2", style="text-align: center;"><a href="login_admin.php">BACK</a></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>