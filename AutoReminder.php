<?php

require("config.php");

$call = mysqli_query($conn, "CALL reminder()");

if(mysqli_num_rows($call)  <  1){

}
else{
	
	while($fetch = mysqli_fetch_assoc($call)){

		$memberID = $fetch['mID'];
		$name = $fetch['name'];
		$email = $fetch['email'];
		$bookID = $fetch['bID'];
		$title = $fetch['title'];
		$Bdate = $fetch['Bdate'];
		$Rdate = $fetch['Rdate'];

			$to = $email;
			$subject = "[SCHOOL LIBRARY] Gentle Reminder";
			$content = "Dear $name, you will need to return the book $title that you borrowed on $Bdate not later than $Rdate. If you returned the book late, you will need to pay the penalty. Thank you.";
			$headers = "From: Your-Email\r\n";
			$send = mail($to, $subject, $content, $headers);

		}
		
			
	}

?>