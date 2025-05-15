<?php
session_start();
include 'koneksi.php';

$koneksi = mysqli_connect($servername, $username, $password, $database);

$ID = @$_GET['ID']; //ambil data ID di URL ketika mengklik hapus di login_admin.php

$delete = mysqli_query($koneksi, "DELETE FROM login_new WHERE ID='$ID'");
if ($delete){
    echo "Selamat, data berhasil dihapus !";
    header ("location:login_admin.php");//kembali ke halaman tampil
}
else {
    echo "Gagal menghapus data!";
}
?>