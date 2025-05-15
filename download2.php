<!DOCTYPE html>
<html lang="en">
<head>
    <title>List File Download</title>
    <style>
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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            width: 900px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
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

        .back-button {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            text-align: center;
        }

        .back-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List File Download</h1>
        <h1>(File di Folder Terupload)</h1>
        <table>
            <tr>
                <th>Nama File</th>
                <th>Gambar</th>
                <th>Download</th>
            </tr>
            <?php
            $directory = 'terupload/';
            if (is_dir($directory)) {//Mencari apakah folder terupload ada atau tidak
                $files = scandir($directory);//Membaca seluruh file yang ada di dalam folder terupload
                if ($files !== false) {
                    foreach ($files as $file) {
                        if ($file != "." && $file != "..") {
                            echo "<tr>";
                            echo "<td><p>$file<p></td>";
                            echo "<td><img src='terupload/$file' width='150px' height='150px' alt=''></td>";
                            echo "<td><a href='$directory/$file' download>Download</a></td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo '<tr><td colspan="3">Direktori Kosong</td></tr>';
                }
            } else {
                echo '<tr><td colspan="3">Direktori Tidak Ditemukan</td></tr>';
            }
            ?>
        </table>
        <a href="login_admin.php" class="back-button">Back</a>
    </div>
</body>
</html>
