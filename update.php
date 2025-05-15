<?php
session_start();
include 'koneksi.php';

$koneksi = mysqli_connect($servername, $username, $password, $database);

$ID = @$_GET['ID']; //ambil data ID di URL ketika mengklik submit di edit.php
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$email = $_POST['email'];
$nama_file = $_POST['nama_file'];


$update = mysqli_query($koneksi, "UPDATE login_new set ID='$ID', username='$username', password='$password', level='$level', email='$email', nama_file='$nama_file' WHERE ID='$ID'");
if ($update){
    $_SESSION['pesan'] = '<font color=green>data berhasil diupdate!</font>'; 
    header ("location:login_admin.php");//kembali ke halaman login_admin
}
else {
    echo "Gagal update data!";
}
?>