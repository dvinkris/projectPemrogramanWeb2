<!DOCTYPE html>
<html>
<head>
<title>Testimoni</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: url('terupload/bgtestimoni.jpg') center center;
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

    h2 {
        margin-top: 20px;
        font-size: 22px;
        color: #333;
    }

    h3 {
        color: #f44336;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type="text"],
    input[type="number"] {
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

    .testimoni-box {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fafafa;
    }

    .testimoni-box strong {
        color: #4CAF50;
    }
</style>
</head>
<body>

<?php
session_start();
include ('koneksi.php');
$koneksi = mysqli_connect ($servername, $username, $password, $database);
$ID = @$_GET['ID'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE ID='$ID'");
$d = mysqli_fetch_array($data);

if (isset($_POST['submit'])) {
    $NamaBarang = $_POST["NamaBarang"];
    $Nama = $_POST['Nama'];
    $Testimoni = $_POST['Testimoni'];
    $Rating = $_POST['Rating'];
    $GambarBarangInput = $_POST['GambarBarangInput'];

    $sql = "INSERT INTO testimoni (Nama, Testimoni, Rating, GambarBarang) VALUES ('$Nama','$Testimoni','$Rating','$GambarBarangInput')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "<script>alert('Terima kasih, atas penilaian anda :)')</script>";
    } else {
        echo "<script>alert('Gagal menyimpan testimoni')</script>";
    }
}
?>

<div class="container">
    <h1>Testimoni</h1>
    <form action="" method="POST">
        <img src="terupload/<?php echo $d['GambarBarang']; ?>" alt="Gambar Barang">
        <input type="hidden" name="GambarBarangInput" value="<?php echo $d['GambarBarang']; ?>" readonly>

        <label>Nama Barang:</label>
        <input type="text" name="NamaBarang" value="<?php echo $d['NamaBarang']; ?>" readonly>

        <h2>Hasil Testimoni:</h2>
        <?php
        $data2 = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE GambarBarang='" . $d['GambarBarang'] . "'");
        while ($d2 = mysqli_fetch_array($data2)) {
        ?>
            <div class="testimoni-box">
                <strong>Nama:</strong> <?php echo htmlspecialchars($d2['Nama']); ?><br>
                <strong>Testimoni:</strong> <?php echo htmlspecialchars($d2['Testimoni']); ?><br>
                <strong>Rating:</strong> <?php echo htmlspecialchars($d2['Rating']); ?>/5
            </div>
        <?php
        }
        ?>

        <label>Nama:</label>
        <input type="text" name="Nama" placeholder="Silahkan masukkan nama anda ..." required>

        <label>Testimoni:</label>
        <input type="text" name="Testimoni" placeholder="Berikan komentar anda ..." required>

        <label>Rating:</label>
        <input type="number" name="Rating" min="1" max="5" placeholder="Berikan rating 1-5" required>

        <button name="submit">Submit</button>

        <div class="back-button">
            <a href="login_user.php">Back</a>
        </div>
    </form>
</div>

</body>
</html>