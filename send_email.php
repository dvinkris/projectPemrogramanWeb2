<?php
    include "koneksi.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'C:\Users\Davin\phpmailer\vendor\autoload.php';
    //Create an instance; passing 'true' enables exceptions
    $mail = new PHPMailer(True);
    $koneksi = mysqli_connect($servername, $username, $password, $database);

    if(isset($_POST['email']))
    {
        $body = "Klik link berikut untuk Reset Password : <a href = 'http://localhost/PROJECTWEB2/forget4.php'>ResetPassword</a>"; //Isi dari email
        
        // $mail -> CharSet = "utf-8";
        $mail->IsSMTP();
        //enable SMTP authentication
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        //GMAIL Username
        $mail->Username = 'happybananapxh@gmail.com';
        //Gmail Password
        $mail->Password = "dshw fvoq imwt sptq";
        $mail->SMTPSecure = "ssl";
        //sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        //set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From ='happybananapxh@gmail.com';
        $mail->FromName='Layanan Reset Password F&B Web';
        $email = $_POST['email'];
        $mail->AddAddress($email, 'User Sistem');
        $mail->Subject = 'Reset Password';
        $mail->IsHTML(true);
        $mail->MsgHTML($body);

        if($mail->Send())
        {
            echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset');</script>";//jika pesan terkirim
            //echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset');window.location = 'index.html'</script>";//jika pesan terkirim
        }
        else
        {
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }
    else {
        echo "<script> alert('Email anda tidak terdaftar di sistem'); </script>";//jika pesan terkirim tetapi email tidak ada
    }
    //}
    echo 'Message has been sent';
?>

<html>
    <head>
        <title>Send_Email</title>
</head>
<body>
    <h1>Silahkan buka inbox Gmail untuk me-reset password anda</h1>
</body>
</html>