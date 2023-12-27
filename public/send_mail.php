<?php
$to = "22211tt0252@mail.tdc.edu.vn";
$subject = "Test Email";
$message = "
Your order has been sent!";
$headers = "From: 22211tt0253@mail.tdc.edu.vn\r\n" .
    "Reply-To: 22211tt0253@mail.tdc.edu.vn\r\n" .
    "X-Mailer: PHP/" . phpversion();

// Gửi email
$mailSuccess = mail($to, $subject, $message, $headers);

// Kiểm tra xem email có được gửi thành công hay không
if ($mailSuccess) {
    echo "Email đã được gửi thành công.";
} else {
    echo "Có lỗi xảy ra khi gửi email.";
}
// use PHPMailer;
// use Exception;

// require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của PHPMailer

// // Tạo một đối tượng PHPMailer
// $mail = new PHPMailer(true);

// try {
//     // Thiết lập thông tin cấu hình SMTP
//     $mail->isSMTP();
//     $mail->Host       = 'smtp.example.com';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'your_username';
//     $mail->Password   = 'your_password';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port       = 587;

//     // Thiết lập thông tin email
//     $mail->setFrom('sender@example.com', 'Your Name');
//     $mail->addAddress('recipient@example.com');
//     $mail->Subject = 'Test Email';
//     $mail->Body    = 'This is a test email sent from PHPMailer.';

//     // Gửi email
//     $mail->send();
//     echo 'Email đã được gửi thành công.';
// } catch (Exception $e) {
//     echo "Có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
// }
// 
//header('location: http://localhost/Project_BE1/public/show_cart.php');