<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

if(isset($_POST['register'])){

	$adminID = $_POST['adminID'];
	$name = ucwords($_POST['name']);
	$password = $_POST['password'];
	$Rpassword = $_POST['Rpassword'];
	$superAdmin = $_POST['superAdmin'];


	if(empty($adminID) || empty($name) || empty($password) || empty($Rpassword)){ ?>

		<script>window.location = 'admin.php'</script>

<?php	} 

	else if(!preg_match('/[A-Za-z0-9\s]+/',$adminID) || !preg_match('/[A-Za-z0-9\s]+/',$name) || !preg_match('/[A-Za-z0-9]+/',$password) || !preg_match('/[A-Za-z0-9]+/',$Rpassword)){ 
	
		echo "<script>alert('Use only alphabets and numbers');
		window.location='admin.php'</script>";

	}

	else{

		$register = "SELECT name FROM admin WHERE name = ?;";

		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$register)){

			header("location:admin.php");
			exit();
		}

		else {
			mysqli_stmt_bind_param($stmt,"s",$_POST['name']);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0){

			  echo "<script>alert('NAME ALREADY IN DATABASE!');
			  window.location='admin.php'</script>";
			  exit();

			}

			else{

				if($Rpassword != $password){ ?>

					<div class="alert alert-alert" role="alert">
                            <h4 class="text-center">
                                Password are not the same!
                            </h4>
                        </div>
			<?php	}

				$insert = "INSERT INTO admin (adminID,name,password,superAdmin) VALUES (?,?,?,?) ";

				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt,$insert)){

					header("location:admin.php");
					exit();
				}

				else{

					$hashpwd = password_hash($password,PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"sssi",$adminID,$name,$hashpwd,$superAdmin);
					mysqli_stmt_execute($stmt); ?>

						<div class="alert alert-success" role="alert">
                            <h4 class="text-center">
                                Registered Successfully
                            </h4>
                        </div>
			<?php	}
			}


		}

		
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

 ?>

<?php 

	$admin = mysqli_query($conn, "SELECT * FROM admin WHERE adminID = '$_SESSION[adminID]'");
	$row = mysqli_fetch_assoc($admin);
	
	if($row['superAdmin'] != 1)
	{
		echo "Only superAdmin has access to this page!";
	}

	else
	{ ?>
		<!DOCTYPE html>
<html lang="en">
<head>
	
<style type="text/css">

	label{
		margin-left: 20px;
		margin-top: 10px;
	}

	.card{

		margin-top: 150px;
		margin-left: 500px;
	}

	.form-control{

		width: 97%;
		margin-left: 10px;
	}

	.form-select{

		width: 97%;
		margin-left: 10px;
	}

	a{

		margin-left: 0px;
		margin-bottom: 10px;
	}

	button, .btn{
		margin-left: 10px;
		margin-bottom: 10px;
	}

</style>

</head>
<body>
	
	<div class="card w-50">
		<h5 class="card-header">Registering Admin</h5>
			<form action="admin.php" method="post">
				<div class="">
                    <label for="adminID" class="form-label">Admin ID</label>
                    <input type="text" class="form-control" name="adminID" autocomplete="off" required> 
                </div>

				<div class="">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" required> 
                </div>

				<div class="">
                    <label for="password" class="form-label">Password (Numbers and alphabets only)</label>
                    <input type="text" class="form-control" name="password" autocomplete="off" required> 
                </div>

				<div class="">
                    <label for="Rpassword" class="form-label">Repeat Password</label>
                    <input type="text" class="form-control" name="Rpassword" autocomplete="off" required> 
                </div>

				<div class="">
                    <label for="superAdmin" class="form-label">Super Admin</label>
                    <select id="type" class="form-select" name="superAdmin" required>
                        <option selected value = 0>No</option>
                        <option value= 1>Yes</option>
                    </select>
                </div>
				
				<a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="register" class="btn btn-primary " style="margin-top: 20px;">Register</button>

			</form>
	</div>


</body>
</html>

 

<?php	}

?>


