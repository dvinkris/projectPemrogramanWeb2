<?php
//mengaktifkan session pada php
session_start();

//menghubungkan php dengan koneksi data base
include 'koneksi.php';

$koneksi = mysqli_connect($servername, $username, $password, $database);

//menangkap data yang dikirimkan dari form login
$username = $_POST['username'];
$password = $_POST['password'];

//menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * from login_new WHERE username='$username' AND password='$password'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password ditemukan pada database
if ($cek>0){
    $data = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $username;
    header("location:login_berhasil.php");
    
    //cek jika user login sebagai admin
    if ($data['level']=="Admin" || $data['level']=="admin"){
        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        //alihkan ke halaman dashboard admin
        header("location:login_admin.php");
    }
    //cek jika user login sebagai user
    else if ($data['level']=="User" || $data['level']=="user"){
        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "User";
        //alihkan ke halaman dashboard user
        header("location:login_user.php");
    }
    //Kondisi ketika username dan password benar tetapi bukan sebagai "Admin" atau "User"
    else {
        echo "<script type='text/javascript'>alert('Data Anda tidak ditemukan!');</script>";
    }
}

//Kalau username dan password tidak ditemukan di database
else {
    echo "<script type='text/javascript'>alert('Username/Password yang Anda masukkan SALAH!');</script>";
}
?>

<html>
<head>
<title>Mainpage</title>
<style>
        body {
            background: url('terupload/bgadmin.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            background: rgba(255, 0, 0, 0.7);
            padding: 15px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        button {
            background: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #cc0000;
        }
        a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Maaf, Anda Gagal Login. Silahkan Coba Lagi!</h1>
    <button type="button">
    <a href="index.php">Kembali ke Halaman Utama</a>
</button>
</body>
</html>
