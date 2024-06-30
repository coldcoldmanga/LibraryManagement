<?php 

require('config.php');
require('footer.php');

if(isset($_POST['login'])){

	$adminID = $_POST['adminID'];
	$password = $_POST['password'];

	if(empty($adminID) || empty($password)){

		header("location:index.php");
		exit();

	} 

	else if(!preg_match('/[A-Za-z0-9\s]+/',$adminID) || !preg_match('/[A-Za-z0-9\s]+/',$password)){


		echo "<script>alert('Use only alphabets and numbers);
			  window.location='index.php'</script>";
	}

	else{

		$sql = "SELECT * FROM admin WHERE adminID=? OR password=?;";

		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){

			echo"<script>alert('Failed Connectig to Server!');
					window.location='index.php'</script>";
		}

		else{

			mysqli_stmt_bind_param($stmt,"ss",$adminID,$password);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($result)){

				$pwdCheck = password_verify($password,$row['password']);




				if($pwdCheck == false){

					echo "<script>alert('Wrong Password!');
			  		window.location='index.php'</script>";

				}

				else{

					session_start();

					$status = "Login Succesfully";
					$_SESSION['adminID'] = $row['adminID'];
					header("location:main.php");
					exit($status);
				}

			}
			else{

				echo "<script>alert('Wrong Admin ID');
			  	window.location='index.php'</script>";
			}

		}
	}

	mysqli_stmt_close($stmt);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css">

<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- JavaScript Bundle with Popper -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>

<body>
	
	<div class="container">
		<div class="row content shadow-lg">
			<h4>Admin Login Portal</h4>
			<div class="col-md-6 mb-3">
				<img src="img/login.svg" class="img-fluid login" alt="image">
			</div>
			<div class="col-md-6 box">
			<img src="img/logo1.png" alt="Logo" class="logo"><h3 class="signin-text mb-3">Minimalist Library</h3>
					<form action="index.php" method="post">

						<div class="form-group">
						    <i class="bi bi-people-fill" style="font-size: 25px;"></i>
							<label for="adminID" style="margin-left: 5px; ">Admin ID</label>
							<input type="text" name="adminID" class="form-control" autocomplete="off">
						</div>

						<div class="form-group">
							<i class="bi bi-shield-lock-fill" style="font-size: 25px;"></i>
							<label for="password" style="margin-left: 5px;">Password</label>
							<input type="password" name="password" class="form-control">
						</div><br>

						<button class="btn btn-class" name="login">Login<i class="bi bi-send" style="margin-left: 10px;"></i></button>
						<a href="memberPage/memberLogin.php" style="margin-left: 10px;">Student? Click Here</a>

					</form>
			</div>
		</div>
	</div>
    
</body>

<footer>


</footer>



</html>