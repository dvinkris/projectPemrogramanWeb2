<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
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
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #bbb;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            background: linear-gradient(90deg, #4CAF50, #2E8B57);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #45a049, #228B22);
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form action="upload2.php" method="post" enctype="multipart/form-data">
            <input type="file" name="berkas" required />
            <input type="submit" name="upload" value="Upload" />
        </form>
        <a href="login_admin.php">Back</a>
    </div>
</body>
</html>