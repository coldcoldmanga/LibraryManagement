<?php 

require('config.php');
require('header.php');
require('mailSend.php');

if(isset($_POST['approve'])){

    $requestID = $_POST['requestID'];
    $member = mysqli_query($conn, "SELECT * FROM request INNER JOIN member ON request.memberID = member.memberID WHERE requestID = '$requestID' ");
    $fetchMember = mysqli_fetch_assoc($member);
    $book = mysqli_query($conn, "SELECT * FROM request INNER JOIN book ON request.bookID = book.bookID WHERE requestID = '$requestID' ");
    $fetchBook = mysqli_fetch_assoc($book);

    $update = mysqli_query($conn, "UPDATE request SET status = 'Approved' WHERE requestID = '$requestID' ");

    $send = sendRequest($fetchMember['email'],$fetchBook['title']);



    if($send){

        echo "<script>alert('Updated and Email Sent Successfully');
		window.location='request.php'</script>";
    }
    else{

        echo "<script>alert('Failed');
		window.location='request.php'</script>";
    }
}

?>