<?php
// VERY VERY IMP NOTE
//INSENDER MAIL
// 1. Turn on 2-Step Verification
// 2. Create an app password

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pukarrimal11@gmail.com'; // your gmail address
        $mail->Password = 'kabl rgjo ohxf xcud'; // your gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('pukarrimal11@gmail.com'); // your gmail address
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Order Confirmation";
        $mail->Body = "Dear ". $_POST["name"]. ", This is to notify that your order has been confirm succesfully, your order will be reached within 1 week, thank you for choosing us";

        // Enable verbose debug output
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        $mail->send();

        echo "
        <script>
        alert('Sent successfully');
        window.location.href = 'index.php';
        </script>
        ";
    } catch (Exception $e) {
        echo "
        <script>
        alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
        </script>
        ";
    }
}
?>


