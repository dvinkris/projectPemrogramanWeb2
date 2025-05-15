<?php
include ('koneksi.php');
error_reporting(0);
session_start();
$conn = mysqli_connect($servername, $username, $password, $database);
// $ID = $_GET['ID'];
// $data = mysqli_query();
// $d = mysqli_fetch_array($data);

if (isset($_POST['submit']))
{
    //$ID = $_POST['ID'];
    $KodeBarang = $_POST['KodeBarang'];
    $NamaBarang = $_POST['NamaBarang'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $BankTujuan = $_POST['BankTujuan'];
    $Nominal = $_POST['Nominal'];
    $BuktiBayar = $_FILES['BuktiBayar']['name'];

    $namaSementara = $_FILES['BuktiBayar']['tmp_name'];//nama sementara file di server

    //tentukan lokasi file akan dipindahkan
    $dirUpload = "terupload/";

    //pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$BuktiBayar);

    $sql = "INSERT INTO payment (KodeBarang, NamaBarang, NamaPelanggan, BankTujuan, Nominal, BuktiBayar) VALUES ('$KodeBarang', '$NamaBarang',
    '$NamaPelanggan', '$BankTujuan', '$Nominal', '$BuktiBayar')";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('Selamat, Anda telah melakukan konfirmasi pembayaran! Kami akan segera mengantarkan pesanan anda')</script>";
    }
    else
    {
        echo "<script>alert('Konfirmasi pembayaran gagal!')</script>";
    }
}
?>
<html>
    <head>
        <title>Payment</title>
        <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: url('terupload/bgdelicious.jpg') center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
            margin: 20px;
        }

        h1 {
            margin: 10px 0;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="file"] {
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            width: auto;
            margin: 10px auto;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #f44336;
            transition: 0.3s;
            text-align: center;
        }

        a:hover {
            background-color: #d32f2f;
        }

        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Kode Barang :</label>
            <input type="text" name="KodeBarang" placeholder="KodeBarang" required>

            <label>Nama Barang :</label>
            <input type="text" name="NamaBarang" placeholder="NamaBarang" required>

            <label>Nama Pelanggan :</label>
            <input type="text" name="NamaPelanggan" placeholder="Silahkan masukkan nama anda ..." required>

            <label>Bank Tujuan :</label>
            <input type="text" name="BankTujuan" placeholder="Bank Tujuan (BNI, BCA, ETH, dsb)" required>

            <label>Nominal :</label>
            <input type="text" name="Nominal" placeholder ="Total Bayar dalam Rupiah (contoh : '50000')" required>

            <label>Upload Bukti Bayar :</label>
            <input type="file" name="BuktiBayar" required>

            <button name="submit">Submit</button>
        </form>

        <div class="back-button">
            <a href="login_user.php">Back</a>
        </div>
    </div>
</body>
</html>
