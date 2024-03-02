<?php 

require('config.php');

if(isset($_POST['delete'])){

  $bookID = $_POST['bookID'];

  $delete = mysqli_query($conn, "DELETE FROM book WHERE bookID = '$bookID'");

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