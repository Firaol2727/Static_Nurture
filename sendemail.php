
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $subject=$_POST["subject"];
    $phonenumber=$_POST["phonenumber"];
    // Create a new PHPMailer instance
    //cnrw cpyo mvmo bblh
    $mail = new PHPMailer(true);

    try {
        // Set SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nurture.btc@gmail.com';
        $mail->Password = 'cnrw cpyo mvmo bblh';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email parameters
        $mail->setFrom($email,$name);
        $mail->addAddress('nurture.btc@gmail.com');
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body = "Name: $name \n\n Email: $email Phonenumber :$phonenumber  \n\n Message: $message";

        // Send the email
        $mail->send();
        $response['status'] = 'success';
        $response['data'] = 'Email sent successfully.';
        
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['data'] = 'Failed to send email. Error: ' . $mail->ErrorInfo;
        echo "Failed to send email. Error: " . $mail->ErrorInfo;
    }
}


?>