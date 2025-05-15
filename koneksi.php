<?php
//mysql_Connect("localhost","root","");
//mysql_select_db("projectweb2");

$servername = "localhost";
$username = "root";
$password = "";
$database = "projectweb2";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi)
{
    die("Koneksi Gagal:" .mysqli_connect_error());
}

//echo "Koneksi berhasil";
mysqli_close($koneksi);
?>