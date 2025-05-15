<?php
include ('koneksi.php');
error_reporting(0);
session_start();
$conn = mysqli_connect($servername, $username, $password, $database);
$ID = $_GET['ID'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE ID='$ID'");
$d = mysqli_fetch_array($data);


if (isset($_POST['submit']))
{
    $NamaPemesan = $_POST['NamaPemesan'];
    $KodeBarang = $_POST['KodeBarang'];
    $NamaBarang = $_POST["NamaBarang"];
    $Jumlah = $_POST['Jumlah'];
    $TanggalPemesanan = $_POST['TanggalPemesanan'];
    $HargaSatuan = $_POST['HargaSatuan'];
    $HargaTotal = $_POST['HargaTotalInput'];
    $Keterangan = $_POST['Keterangan'];

    $sql = "INSERT INTO orderbarang (NamaPemesan, KodeBarang, NamaBarang, Jumlah, TanggalPemesanan, HargaSatuan, HargaTotal, Keterangan) VALUES (
    '$NamaPemesan','$KodeBarang','$NamaBarang','$Jumlah','$TanggalPemesanan','$HargaSatuan', '$HargaTotal','$Keterangan')";
    $result = mysqli_query($conn, $sql);
        if ($result)
        {
            echo "<script>alert('Selamat, input data berhasil! Pesanan anda akan segera diproses')</script>";
        }
        else
        {
            echo "<script>alert('Order Gagal')</script>";
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
</head>
<body>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: url('terupload/bgadmin.jpg') center center;
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

    h3 {
        color:  #f44336;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
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

    textarea {
        padding: 10px;
        margin: 5px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        resize: none;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
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

    img {
        max-width: 60%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 20px;
        align-self: center;
    }

    .jumlah-wrapper {
        display: flex;
        align-items: center;
        gap: 5px;
        max-width: 220px;
        margin-bottom: 15px;
    }

    .jumlah-wrapper button {
    width: 36px;
    height: 36px;
    font-size: 20px;
    font-weight: bold;
    padding: 0;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    }

    .jumlah-wrapper button:hover {
    background-color: #45a049;
    }

    .jumlah-wrapper input[type="number"] {
    -moz-appearance: textfield;
    appearance: textfield;
    width: 60px;
    height: 36px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    padding: 0;
    }

    .jumlah-wrapper input[type=number]::-webkit-inner-spin-button,
    .jumlah-wrapper input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
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
        <h1>Formulir Pemesanan Barang</h1>
        <form action="" method="POST">
            <label>Nama Pemesan :</label>
            <input type="text" name="NamaPemesan" placeholder="Silahkan masukkan nama anda ..." required>

            <label>Kode Barang :</label>
            <input type="text" name="KodeBarang" value="<?php echo $d['KodeBarang']; ?>" readonly>

            <label>Nama Barang :</label>
            <input type="text" name="NamaBarang" value="<?php echo $d['NamaBarang']; ?>" readonly>

            <label>Jumlah :</label>
            <div class="jumlah-wrapper">
                <button type="button" class="btn-minus">-</button>
                <input type="number" id="Jumlah" name="Jumlah" min="1" value="0" required>
                <button type="button" class="btn-plus">+</button>
            </div>

            <label>Tanggal Pemesanan :</label>
            <input type="date" name="TanggalPemesanan" required>

            <label>Harga Satuan :</label>
            <input type="text" value="Rp <?php echo number_format($d['Harga'], 0, ',', '.'); ?>,00" readonly>
            <input type="hidden" id="HargaSatuan" name="HargaSatuan" value="<?php echo $d['Harga']; ?>">

            <label>Catatan Pesanan :</label>
            <textarea name="Keterangan" placeholder="Contoh: Jangan pedas" required></textarea>

            <label><h3>Total Bayar :</h3></label>
            <input type="text" id="HargaTotalDisplay" placeholder="Rp 0" style="font-weight:bold; background-color:#f5f5f5;" readonly>
            <input type="hidden" id="HargaTotalInput" name="HargaTotalInput">

            <img src="terupload/gambarrekening.png" alt="Rekening Tujuan">

            <button name="submit">Order</button>
        </form>

        <div class="back-button">
            <a href="login_user.php">Back</a>
        </div>
    </div>
<script>
    const jumlahInput = document.getElementById('Jumlah');
    const hargaInput = document.getElementById('HargaSatuan');
    const hargaTotalDisplay = document.getElementById('HargaTotalDisplay');
    const hargaTotalInput = document.getElementById('HargaTotalInput');

    const updateTotal = () => {
        const jumlah = parseInt(jumlahInput.value) || 0;
        const harga = parseInt(hargaInput.value) || 0;
        const total = jumlah * harga;

        hargaTotalDisplay.value = "Rp " + total.toLocaleString('id-ID');
        hargaTotalInput.value = total;
    };

    jumlahInput.addEventListener('input', updateTotal);

    document.querySelector('.btn-plus').addEventListener('click', () => {
        jumlahInput.value = parseInt(jumlahInput.value || 0) + 1;
        updateTotal();
    });

    document.querySelector('.btn-minus').addEventListener('click', () => {
        let current = parseInt(jumlahInput.value || 1);
        if (current > 1) {
            jumlahInput.value = current - 1;
            updateTotal();
        }
    });
</script>
</body>
</html>