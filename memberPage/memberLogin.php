<?php 

require('../config.php');
require('../footer.php');

if(isset($_POST['login'])){

	$id = $_POST['memberID'];
	$password = $_POST['password'];

	if(empty($id) || empty($password)){

		header("location:memberLogin.php");
		exit();

	} 

	else if(!preg_match('/[A-Za-z0-9@\s]+/',$id) || !preg_match('/[A-Za-z0-9\s]+/',$password)){


		echo "<script>alert('Use only alphabets and numbers);
			  window.location='memberLogin.php'</script>";
		exit();
	}

	else{

		$sql = "SELECT * FROM member WHERE memberID=? OR password =?;";

		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){

			echo"<script>alert('Failed Connectig to Server!');
					window.location='memberLogin.php'</script>";
			exit();
		}

		else{

			mysqli_stmt_bind_param($stmt,"ss",$id,$password);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($result)){

				$pwdCheck = password_verify($password,$row['password']);

				if($id != $row['memberID'] OR $pwdCheck == false){

					echo "<script>alert('Wrong ID or Wrong Password!');
			  		window.location='memberLogin.php'</script>";

				}

				else{

					session_start();

					$_SESSION['memberID'] = $row['memberID'];
					header("location:memberPage.php");
					exit();
				}

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

<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- JavaScript Bundle with Popper -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@500&display=swap');
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");

body
{
	font-family: 'Noto Sans SC', sans-serif;
	background-color: white;
}

label{
	font-size: 20px;
}

.content{

	margin-top:100px;
	background-color:#fff;
	padding:7rem 1rem 7rem 1rem;
	border-radius:35px;
	box-shadow:0 0 5px 5px rgba(0,0,0,0)
}

.logo{
	margin-top: -150px;
	margin-left: -50px;
	width: 200px;
	height: 400px;
}

.box{

	padding-top: 75px;
	padding-left:50px;
}

.signin-text{
	margin-top: -240px;
	margin-left: 140px;
	font-style:normal;
	font-weight: 600;
	font-size: 45px;
}

.form-group{
	padding-top: 40px;
}

.form-control{

	display:block;
	width:100%;
	font-size: 20px;
	font-weight: 400;
	line-height: 1.5;
	border-color:black;
	border-style:solid;
	border-width:0 0 1px 0;
	padding:0px;
	color:#495057;
	height:auto;
	border-radius:0;
	background-color:#fff;
	background-clip:padding-box;
}

.form-control:focus{

	color:black;
	background-color: #fff;
	border-color:#9A76C5;
	outline:0;
	box-shadow:none;
}

.btn-class{
	
	border-color:#9A76C5;
	color:#9A76C5;
}

.btn-class:hover{
	background-color:#9A76C5;
	color:#fff;
}

</style>

</head>

<body>
	
	<div class="container">
		<div class="row content shadow-lg">
		<h4>Member Login Portal</h4>
			<div class="col-md-6 mb-3">
				<img src="../img/login.svg" class="img-fluid login" alt="image">
			</div>
			<div class="col-md-6 box">
			<img src="../img/logo1.png" alt="Logo" class="logo"><h3 class="signin-text mb-3">Minimalist Library</h3>
					<form action="memberLogin.php" method="post">

						<div class="form-group">
						    <i class="bi bi-person-badge" style="font-size: 25px;"></i>
							<label for="memberID" style="margin-left: 5px; ">Member ID</label>
							<input type="text" name="memberID" class="form-control">
						</div>

						<div class="form-group">
							<i class="bi bi-shield-lock-fill" style="font-size: 25px;"></i>
							<label for="password" style="margin-left: 5px;">Password</label>
							<input type="password" name="password" class="form-control">
						</div><br>

						<button class="btn btn-class" name="login">Login<i class="bi bi-send" style="margin-left: 10px;"></i></button>
						<a href="index.php" style="padding-left: 10px;">Admin? Click Here</a>
						

					</form>
			</div>
		</div>
	</div>
    
</body>

<footer>


</footer>



</html>