<?php 

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'mailConfig.php';

//send confirmation email upon registration of member
function sendMail($email, $subject, $message){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = USERNAME;
    $mail->Password = PASWORD;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;
  
    $mail->send();
}

//send otp to member for changing password
function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = USERNAME;
    $mail->Password = PASWORD;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Password Reset OTP";
    $mail->Body = "Your OTP is <b>$otp</b>";
    $mail->AltBody = "Your OTP is $otp";
  
    $mail->send();

    if($mail){
        return true;
    }
}

//send email to tell member their request is approved
function sendRequest($email, $bookID){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = USERNAME;
    $mail->Password = PASWORD;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Request Approved";
    $mail->Body = "Your request for $bookID is approved.";
    $mail->AltBody = "Your request for $bookID is approved.";
  
    $mail->send();

    if($mail){
        return true;
    }
}

//reminder for student to return book
function sendReminder($email,$name, $title, $Bdate, $Rdate){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = USERNAME;
    $mail->Password = PASWORD;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Reminder";
    $mail->Body = "Dear $name, you will need to return the book $title that you borrowed on $Bdate not later than $Rdate. If you returned the book late, you will need to pay the penalty.";
    $mail->AltBody = "Dear $name, you will need to return the book $title that you borrowed on $Bdate not later than $Rdate. If you returned the book late, you will need to pay the penalty.";
  
    $mail->send();

    if($mail){
        return true;
    }   
}

?>