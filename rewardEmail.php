<?php 

require('config.php');

if(isset($_POST['submit'])){

    $date = date("M");

    $memberID = $_POST['memberID'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $to = $email;
    $subject = "[SCHOOL LIBRARY] You Borrowed the most book in $date!";
    $content = "Dear $name, you must love reading a lot to achieve this. You have borrowed $amount books this month. Please come to the school library to redeem your reward.";
    $headers = "From: Your-Email\r\n";

    $send = mail($to,$subject,$content,$headers); 

    if($send){

        echo "<script>alert('Email sent successfuly');
		window.location='reward.php'</script>";
    }
    else{

        echo "<script>alert('There is an error when sending the email');
        window.location = 'reward.php'</script>";
    }
}
?>a