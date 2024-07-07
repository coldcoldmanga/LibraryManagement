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
    try{
        $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPKeepAlive = true;
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
    catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

//send otp to member for changing password
function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);
    try{
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
    $mail->Body = "
    <html>
    <body>
        <p>Good day,</p>
        
        <p>Your OTP code is <b>$otp</b></p>
        
        <p>Do not reply this email.</p>
        
        <p>Best regards,<br>
        Minimalist Library</p>
    </body>
    </html>
    ";;
    $mail->AltBody = "Your OTP is $otp";
  
    $mail->send();

    if($mail){
        return true;
    }
    }
    catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

//send email to tell member their request is approved
function sendRequest($email, $bookTitle, $name){
    $mail = new PHPMailer(true);
    try{
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
        $mail->Body = $mail->Body = "
        <html>
        <body>
            <p>Good day $name,</p> 
            
            <p>Your request for book: $bookTitle has been approved.</p>
            
            <p>You may come to the library to borrow the book.</p>
            
            <p>Best regards,<br>
            Minimalist Library</p>
        </body>
        </html>
        ";
        $mail->AltBody = "Your request for $bookTitle is approved.";
      
        $mail->send();
    
        if($mail){
            return true;
        }
    }
    catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   
}

//reminder for student to return book
function sendReminder($email,$name, $title, $Bdate, $Rdate){
    $mail = new PHPMailer(true);
    try{
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
        $mail->Body = "
    <html>
    <body>
        <p>Dear $name,</p>
        
        <p>This is a friendly reminder about the book you borrowed:</p>
        
        <ul>
            <li>Book Title: $title</li>
            <li>Borrowed Date: $Bdate</li>
            <li>Return Due Date: $Rdate</li>
        </ul>
        
        <p>Please ensure you return the book no later than the due date to avoid any late fees.</p>
        
        <p>If you have any questions or need to extend your loan, please don't hesitate to contact us.</p>
        
        <p>Thank you for using our library services.</p>
        
        <p>Best regards,<br>
        Minimalist Library</p>
    </body>
    </html>
    ";
        $mail->AltBody = "Dear $name, you will need to return the book $title that you borrowed on $Bdate not later than $Rdate. If you returned the book late, you will need to pay the penalty.";
      
        $mail->send();
    
        if($mail){
            return true;
        }  
    }
    catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

?>