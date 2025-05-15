<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <style>
        body {
            background: url('terupload/bgadmin.jpg')center center;
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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            width: 900px;
        }

        h1, h2, h3 {
            margin: 10px 0;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td img {
            width: 150px;
            height: 150px;
            border-radius: 5px;
        }

        a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #4CAF50;
            transition: 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        .action-buttons {
            display: grid;
            flex-wrap: wrap;
            justify-content: center;
            gap: 5px;
        }

        .logout-change-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .logout-change-buttons a {
            background-color: #f44336;
            color: white;
        }

        .logout-change-buttons a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    //cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }

    ?>
<div class="container">
    <h1>Halaman Admin</h1>
    <h2>Selamat! <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</h2>
    <br/>
    <h3>Data User Admin</h3>
    <br/>
    <a href="tambah_new.php">+ TAMBAH DATA</a>
    <br/>
    <br/>
    <table>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Level</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Action</th>
        </tr>
        <?php
        include 'koneksi.php';
        $koneksi = mysqli_connect($servername, $username, $password, $database);
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM login_new ORDER BY ID ASC");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo$d['ID']; ?></td>
                <td><?php echo$d['username']; ?></td>
                <td><?php echo$d['password']; ?></td>
                <td><?php echo$d['level']; ?></td>
                <td><?php echo$d['email']; ?></td>
                <td><img src="terupload\<?php echo $d['nama_file'];?>"></td>
                <td class="action-buttons">
                    <a href="edit.php?ID=<?php echo $d['ID']; ?>">EDIT</a>
                    <a href="javascript:del(<?php echo $d['ID'];?>)">HAPUS</a>
                    <a href="upload.php?ID=<?php echo $d['ID']; ?>">UPLOAD</a>
                    <a href="download.php?ID=<?php echo $d['ID']; ?>">DOWNLOAD</a> 
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="logout-change-buttons">
            <a href="forget4.php">GANTI PASSWORD</a>
            <a href="index.php">LOGOUT</a>
        </div>
</div>
<script language="JavaScript" type="text/javascript"> 
    function del(ID){ 
        if (confirm("Apakah anda yakin akan menghapus data ini ?")){ 
            window.location.href = 'hapus.php?ID=' + ID; 
        }
    } 
</script>
</body>
</html>