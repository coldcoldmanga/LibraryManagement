<?php 

require('config.php');
require('header.php');

if(isset($_POST['approve'])){

    $requestID = $_POST['requestID'];
    $member = mysqli_query($conn, "SELECT * FROM request INNER JOIN member ON request.memberID = member.memberID WHERE requestID = '$requestID' ");
    $fetchMember = mysqli_fetch_assoc($member);
    $book = mysqli_query($conn, "SELECT * FROM request INNER JOIN book ON request.bookID = book.bookID WHERE requestID = '$requestID' ");
    $fetchBook = mysqli_fetch_assoc($book);

    $update = mysqli_query($conn, "UPDATE request SET status = 'Approved' WHERE requestID = '$requestID' ");

    $to = $fetchMember['email'];
    $subject = "[SCHOOL LIBRARY] Your request have been approved";
    $content = "Dear $fetchMember[name], your request to borrow the book $fetchBook[title] have been approved, please come to the school library to redeem the book as soon as possible.";
    $headers = "From: Your-Email\r\n";

    $send = mail($to,$subject,$content,$headers);

    if($update AND $send){

        echo "<script>alert('Updated and Sent Successfully');
		window.location='request.php'</script>";
    }
    else{

        echo "<script>alert('Failed');
		window.location='request.php'</script>";
    }
}

?>