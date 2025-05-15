<?php
session_start();
include 'koneksi.php';
error_reporting(0);
$conn = mysqli_connect ($servername, $username, $password, $database);

if(isset($_POST['submit']))
{
    //menangkap data dan menyimpan ke variabel php dari form ketika form disubmit
    $ID         =$_POST['ID'];
    $username   =$_POST['username'];
    $password   =$_POST['password'];
    $level      =$_POST['level'];
    $email      =$_POST['email'];
    $nama_file  =$_POST['nama_file'];

    //memasukkan data ke database
    $sql = "INSERT INTO login_new (ID, username, password, level, email, nama_file) VALUES ('$ID','$username','$password',
    '$level','$email','$nama_file')";
    $result = mysqli_query($conn, $sql);
        if ($result)
        {
            //setelah berhasil masuk ke database ada alert 
            echo "<script>alert('Selamat, anda berhasil menambah data !')</script>";
            //kosongkan kembali form nya setelah data disubmit dan masuk ke database
            $_POST['ID']= "";
            $_POST['username'] = "";
            $_POST['password'] = "";
            $_POST['level'] = "";
            $_POST['email'] = "";
            $_POST['nama_file'] = "";
        }
        else{
            echo "<script>alert('Tambah Data Gagal, mohon coba lagi !')</script>";
        }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Data</title>
    <style>
        body {
        background: url('terupload/bgtambahan.jpg') center center no-repeat;
        background-size: cover;
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
        width: 300px;
        }

        h1, h2 {
        margin: 10px 0;
        color: #333;
        }

        table {
        width: 100%;
        margin: 10px auto;
        }

        td {
        padding: 8px 0;
        text-align: left;
        font-size: 14px;
        }

        input[type="text"], input[type="password"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        .input-group {
        margin-top: 15px;
        }

        .btn, input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        }

        .btn:hover, input[type="submit"]:hover {
        background-color: #45a049;
        }

        .login-register-text {
        margin-top: 15px;
        font-size: 14px;
        }

        a {
        color: #4CAF50;
        text-decoration: none;
        }

        a:hover {
        text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
        <h1>Form Tambah Data</h1>
        <table>
            <tr>
                <td>ID : </td>
                <td><input type="text" placeholder="ID" name="ID" value="<?php echo $_POST['ID']; ?>" required></td>
            <tr>
            <tr>
                <td>Username : </td>
                <td><input type="text" placeholder="username" name="username" value="<?php echo $_POST['username']; ?>" required></td>
            <tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required></td>
            <tr>
            <tr>
                <td>Level : </td>
                <td><input type="text" placeholder="level" name="level" value="<?php echo $_POST['level']; ?>" required></td>
            <tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" placeholder="email" name="email" value="<?php echo $_POST['email']; ?>" required></td>
            <tr>
            <tr>
                <td>Nama_File : </td>
                <td><input type="text" placeholder="nama_file" name="nama_file" value="<?php echo $_POST['nama_file']; ?>" required></td>
            <tr>
        </table>
        <div class="input-group">
            <button name="submit" class="btn">Submit</button>
        </div>
        <p class="login-register-text"><a href="login_admin.php">Back</a></p>
</body>
</html>