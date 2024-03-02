<?php 

require('config.php');

if(isset($_POST['submit'])){

    $date = date("M");

    $memberID = $_POST['memberID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bookID = $_POST['bookID'];
    $title = $_POST['title'];
    $Bdate = $_POST['Bdate'];
    $Rdate = $_POST['Rdate'];

    $to = $email;
    $subject = "[SCHOOL LIBRARY] Gentle Reminder";
    $content = "Dear $name, you will need to return the book $title that you borrowed on $Bdate not later than $Rdate. If you returned the book late, you will need to pay the penalty. Thank you.";
    $headers = "From: Your-Email\r\n";

    $send = mail($to,$subject,$content,$headers); 

    if($send){

        echo "<script>alert('Email sent successfuly');
		window.location='reminder.php'</script>";
    }
    else{

        echo "<script>alert('There is an error when sending the email');
        window.location = 'reminder.php'</script>";
    }
}
?>