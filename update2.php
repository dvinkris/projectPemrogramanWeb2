<?php
session_start();
include('koneksi.php');

//Ambil variabel data
$koneksi = mysqli_connect($servername, $username, $password, $database);

//$ID = @$_GET['ID']; //ambil data ID di URL
// $username = @$_GET['username'];
$username = $_POST['username'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konf_password = $_POST['konf_password'];
//$level = $_POST['level'];
//$email = $_POST['email'];

if ($password_baru !== $konf_password){
    $message = "Mohon masukkan Konfirmasi Password Baru sesuai dengan Password Baru Anda";
}
else {
    //menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"SELECT * from login_new WHERE username='$username' AND password='$password_lama'");

    //menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    //cek apakah username dan password ditemukan pada database
    if ($cek>0){
        //$update = mysqli_query($koneksi,"update login_new set ID='$ID', username = '$username', password = '$password', level = '$level', email='$email' where ID='$ID'");
        $update = mysqli_query($koneksi,"UPDATE login_new SET password = '$konf_password' WHERE username='$username' AND password='$password_lama'");
        if($update){
        // pesan dengan sistem session
        //$_SESSION['pesan'] = '<font color=green>berhasil ganti password!</font>';
        //header("location:login_admin.php"); //Kembali ke halaman tampil
        $message = "Selamat Anda telah berhasil mengganti password Anda !";
        }
        else {
            $message = "Maaf, Anda gagal mengganti password anda";
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Username/Password yang Anda masukkan SALAH!');</script>";
        $message = "Maaf, Anda gagal mengganti password anda";
    }
}
    //if ($username != [''])
    //{ echo "Maaf, Anda Gagal Ganti Password!"; }
    //Kalau username dan password tidak ditemukan di database
?>

<html>
    <head>
        <title>Update Password Success</title>
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
            text-align: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
    </head>
<body>
<div class="container">
    <?php echo $message; ?>
    </br>
    <a href="index.php" class="back-btn">KEMBALI KE HALAMAN UTAMA</a>
</div>
</body>
</html>