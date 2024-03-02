<?php 

require('config.php');

if(isset($_POST['delete'])){

  $memberID = $_POST['memberID'];

  $delete = mysqli_query($conn, "DELETE FROM member WHERE memberID = '$memberID'");

  if($delete){
    echo "<script>alert('Deleted Successfully');
		window.location='update.php'</script>";

  }
  else{
    echo "<script>alert('Failed to Delete');
		window.location='update.php'</script>";

  }
  
}

?>