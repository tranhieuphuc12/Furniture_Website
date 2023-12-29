<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$username;
if(isset($_GET['username'])){
    $username=$_GET['username'];
}
//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tranthianhthu0711@gmail.com';                     //SMTP username
    $mail->Password   = 'jtxugdvwutdsekjn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $pos = strpos($username, "@",0);
    $name = mb_substr($username, 0, $pos);

    
    //Recipients
    $mail->setFrom('tranthianhthu0711@gmail.com', 'Office Furniture Store');
    $mail->addAddress($username, $name);    //Add a recipient
    //$mail->addAddress('22211tt4701@mail.tdc.edu.vn', 'Phuc');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirmation Your Order!';
    $mail->Body    = "Dear $name, <br><br>
    
    Thank you for your purchase!<br>

    Your order is being processed and should arrive at your destination within 3 days for delivery. Thank you again for your purchase. We would love to hear from you once you receive your items.<br>
    
    Kind Regards,<br>
    
    The Office Furniture Store sales team.
    
    ";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('location: http://localhost/Project_BE1/admin/index.php');