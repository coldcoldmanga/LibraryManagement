<?php 

require('config.php');
require('memberHeader.php');

if(isset($_POST['bookID'])){

    $bookID = $_POST['bookID'];
    $date = date("Y-m-d");

    $insertIssue = mysqli_query($conn, "INSERT INTO request(memberID, bookID, requestDate) VALUES('$_SESSION[memberID]', '$bookID', '$date')");

    if($insertIssue){ 

        echo "<script>alert('Requested successfully!');
			  window.location='memberRequest.php'</script>";

 }

    else{ 

        echo "<script>alert(Failed to request!);
       window.location = 'memberRequest.php'</script>";

    }
}


?>