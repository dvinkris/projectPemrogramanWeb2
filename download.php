<?php
include 'koneksi.php';
$koneksi = mysqli_connect($servername, $username, $password, $database);

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];//ambil data ID dari URL ketika mengklik download di login_admin.php
    
    // Ambil data file dari database
    $data = mysqli_query($koneksi, "SELECT nama_file FROM login_new WHERE ID='$ID'");
    $d = mysqli_fetch_array($data);
    
    if ($d) {
        $file = 'terupload/'.$d['nama_file'];
        
        if (file_exists($file)) {
            // Set header untuk mengunduh file
            header('Content-Description: File Transfer');//Memberitahu browser bahwa ini adalah File Transfer
            header('Content-Type: application/octet-stream');//Mengatur tipe file menjadi binary supaya bisa di download
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');//Memerintahkan agar file langsung di download bukan dibuka di browser
            header('Expires: 0');//Mengatur agar file tidak disimpan di cache browser (mencegah file lama tersimpan)
            header('Cache-Control: must-revalidate');//Menyuruh browser untuk memvalidasi file sebelum menyimpan di dalam cache
            header('Pragma: public');//Supaya bisa lebih umum digunakan di berbagai browser (termasuk browser lama)
            header('Content-Length: ' . filesize($file));//Memberitahu browser ukuran file
            readfile($file);//,Membaca isi file
            exit;
        } else {
            echo "File tidak ditemukan.";
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
