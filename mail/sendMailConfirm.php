<?php
$username = '22211tt0252@mail.tdc.edu.vn';
// if (isset($_SESSION["username"])) {
//     $username = $_SESSION['username'];
// }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
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

    $pos = strpos($username, "@",0);
    $name = mb_substr($username, 0, $pos);

    
    //Recipients
    $mail->setFrom('tranthianhthu0711@gmail.com', 'Office Furniture Store');
    $mail->addAddress($username, $name);     //Add a recipient
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
    $mail->Body    = "Hello $name,<br><br>

    We’re happy to let you know that we’ve received your order.<br>
    
    Once your package ships, we will send you an email with a tracking number and link so you can see the movement of your package.<br>
    
    If you have any questions, contact us here or call us on +84 123 456 789 !<br>
    
    We are here to help!<br>

    Thank you!
    ";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
}
header('location: http://localhost/Project_BE1/public/index.php');
