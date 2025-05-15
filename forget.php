<!DOCTYPE html>
<html lang="en">
    <head>
         <title>Reset Password</title>
         <style>
            body {
                background: url('terupload/bggantipassword.png') center center no-repeat;
                background-size: cover;
                display: flex;
                font-family: Arial, sans-serif;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            form {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                width: 300px;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            label {
                font-size: 14px;
                color: #555;
                display: block;
                margin-bottom: 5px;
            }

            input[type="email"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                text-align: center;
            }

            button {
                background-color: #28a745;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                background-color: #218838;
            }

        </style>
    </head>
    <body>
        <h1>Reset Password</h1>
        <br>
        <form action="send_email.php" method="POST">
            <label>Email Address</label>
            <input type="email" name="email" class="form" placeholder="email@gmail.com">
            <br>
            <button type="submit" name="reset" class="btn-success">Submit</button>
        </form>
    </body>
</html>