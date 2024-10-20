<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // تأكد من أن المسار صحيح

$mail = new PHPMailer(true);

try {
    // إعدادات السيرفر
    $mail->isSMTP();                                        // استخدام SMTP
    $mail->Host       = 'smtp.gmail.com';                 // خادم Gmail
    $mail->SMTPAuth   = true;                             // تمكين المصادقة
    $mail->Username   = 'iikhlassagoubi@gmail.com';           // بريدك الإلكتروني
    $mail->Password   = 'Darjdida$123';                  // كلمة المرور
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // تشفير TLS
    $mail->Port       = 587;                              // منفذ SMTP

    // المستلم
    $mail->setFrom('iikhlassagoubi@gmail.com', 'ikhlass');
    $mail->addAddress('iikhlassagoubi@gmail.com');        // المستلم

    // المحتوى
    $mail->isHTML(true);                                  // إرسال كـ HTML
    $mail->Subject = 'موضوع الرسالة';
    $mail->Body    = 'هذا هو نص الرسالة.';
    $mail->AltBody = 'هذا هو نص الرسالة للنص العادي';

    // إرسال
    $mail->send();
    echo 'تم إرسال الرسالة بنجاح';
} catch (Exception $e) {
    echo "لم تتمكن من إرسال الرسالة. خطأ في المرسل: {$mail->ErrorInfo}";
}