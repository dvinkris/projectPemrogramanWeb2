<?php

//ambil data file
$namaFile = $_FILES['berkas']['name'];//nama asli file
$namaSementara = $_FILES['berkas']['tmp_name'];//nama sementara file di server

//tentukan lokasi file akan dipindahkan
$dirUpload = "terupload/";

//pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Status</title>
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
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .message {
            font-size: 18px;
            color: #444;
            margin-bottom: 15px;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: linear-gradient(90deg, #4CAF50, #2E8B57);
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            width: 150px;
            margin-left: auto;
            margin-right: auto;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(90deg, #45a049, #228B22);
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Status</h2>
        <div class="message">
            <?php
            if ($terupload) {
                echo "Upload berhasil!<br/>";
                echo "<br>Lihat File : <a href='" . $dirUpload . $namaFile . "'>" . $namaFile . "</a>";
            } else {
                echo "Upload Gagal!";
            }
            ?>
        </div>
        <a href="login_admin.php" class="btn">Back</a>
    </div>
</body>
</html>
