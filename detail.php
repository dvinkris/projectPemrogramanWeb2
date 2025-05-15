<!DOCTYPE html>
<html>
<head>
<title>Detail Barang</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: url('terupload/bguser.jpg') center center;
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

    input[type="text"] {
        padding: 10px;
        margin: 5px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

    input[readonly] {
    color: #2c3e50;
    background-color: #f5f5f5;
    font-weight: bold;
    border: 1px solid #bbb;
    }

    img {
        max-width: 60%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 20px;
        align-self: center;
    }

    a {
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        background-color: #4CAF50;
        transition: 0.3s;
        text-align: center;
    }

    a:hover {
        background-color: #45a049;
    }

    .back-button {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    
    textarea {
    padding: 10px;
    margin: 5px 0 15px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    resize: none;
    background-color: #f5f5f5;
    color: #2c3e50;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    }
</style>
</head>
<body>

<?php
session_start();
include ('koneksi.php');
$koneksi = mysqli_connect ($servername, $username, $password, $database);
$ID = @$_GET['ID'];
$data = mysqli_query($koneksi, "SELECT * FROM barang where ID='$ID'");
$d = mysqli_fetch_array($data);
?>

<div class="container">
    <h1>Detail Barang</h1>
    <form action="" method="POST">
        <img src="terupload/<?php echo $d['GambarBarang']; ?>" alt="Gambar Barang">
        
        <label>ID:</label>
        <input type="text" name="ID" value="<?php echo $d['ID']; ?>" readonly>

        <label>Kode Barang:</label>
        <input type="text" name="KodeBarang" value="<?php echo $d['KodeBarang']; ?>" readonly>

        <label>Nama Barang:</label>
        <input type="text" name="NamaBarang" value="<?php echo $d['NamaBarang']; ?>" readonly>

        <label>Harga:</label>
        <input type="text" name="Harga" value="Rp <?php echo number_format($d['Harga'], 0, ',', '.'); ?>,00" readonly>

        <label>Keterangan:</label>
        <textarea name="Detail" readonly><?php echo $d['Detail']; ?></textarea>

        <div class="back-button">
            <a href="login_user.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>