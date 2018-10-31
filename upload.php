<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/plgq4piypr8l/PHPMailer/src/Exception.php';
require '/home/plgq4piypr8l/PHPMailer/src/PHPMailer.php';
require '/home/plgq4piypr8l/PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

    //Recipients
    $mail->setFrom('dyeung@citruseducation.co', 'Mailer');
    $mail->addAddress('younith0202@gmail.com', 'David Yeung');     // Add a recipient
    //$mail->addCC('iloveyouxiaoyue@gmail.com', 'Mary Ma');

    //Attachments
    $mail->addAttachment($_FILES['usr_file']);         // Add attachments

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['name'].$_POST['email'].$_POST['number']."[".$_POST["programs"]."]";
    $mail->Body    = $_POST['subject'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
