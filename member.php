<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');
require('mailSend.php');

if(isset($_POST['register'])){

    $memberID = $_POST['id'];
	$name = ucwords($_POST['name']);
	$password = $_POST['id'];
	$class = ucwords($_POST['class']);
	$level = ucwords($_POST['level']);
	$telephone = $_POST['telephone'];


	if(empty($memberID) OR empty($name) OR empty($class) OR empty($level) OR  empty($telephone)){ ?>

		<script>window.location = 'member.php'</script>

<?php	} 

	else if(!preg_match('/[A-Za-z0-9\s]+/',$memberID) OR !preg_match('/[A-Za-z0-9\s]+/',$name) OR !preg_match('/[A-Za-z0-9\s]+/',$class) OR !preg_match('/[A-Za-z0-9\s]+/',$level) OR !preg_match('/[A-Za-z0-9\s]+/',$telephone)){ 

echo "<script>alert('Use only alphabets and numbers');
		window.location='member.php'</script>";

	}

	else{

		if($class != 'teacher' || $class != 'Teacher')
		{
			$email = $memberID."@student.mmu.edu.my";
		}
		else
		{
			$email = $memberID."@.mmu.edu.my";
		}

		$register = "SELECT name FROM member WHERE name = ?;";

		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$register)){

			header("location:member.php");
			exit('Error connecting to database');
		}

		else {
			mysqli_stmt_bind_param($stmt,"s",$_POST['name']);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0){

			  echo "<script>alert('NAME ALREADY IN DATABASE!');
			  window.location='member.php'</script>";
			

			}

			else{

				$hashpwd = password_hash($password,PASSWORD_DEFAULT);

				$insert = "INSERT INTO member (memberID,name,class,level,telephone,email,password) VALUES (?,?,?,?,?,?,?) ";

				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt,$insert)){

					header("location:member.php");
					exit('Error connecting to database');
				}

				else{

					mysqli_stmt_bind_param($stmt,"sssssss",$memberID,$name,$class,$level,$telephone,$email,$hashpwd);
					mysqli_stmt_execute($stmt);

                    if($stmt){

						//send email to student to update their password
						sendMail($email,"MMU Library","Please update your password. Your default password is your member ID. Thank you.");
						
						//move_uploaded_file($_FILES['img']['tmp_name'], "$img"); ?>
					
							<div class="alert alert-success" role="alert">
                            	<h4 class="text-center">
                                	Registered Successfully
                            	</h4>
                        	</div> 
				<?php	}
			  		
				}
			}
		}	
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">

	label{
		margin-left: 15px;	
	}

	.btn{
		margin-left: 15px;
		margin-bottom: 10px;
	}

	.card{
		margin-top: 100px;
		margin-left: 230px;
		
	}

	.id, .name, .class, .level, .telephone{
		margin-left: 15px;
	}

	.id{
		width: 98%;
	}

	.name{
		width: 98%;
	}

	.class{
		width:94%
	}

	.password{
		width: 96%;
	}

	.telephone{
		width: 94%;
	}

	</style>
</head>
<body>

	<div class="card w-75">
        <h5 class="card-header">Registering Member</h5>
            <form action="member.php" method="post" class="row g-3">

				<div class="col-4">
                    <label for="name" class="form-label">Member's ID</label>
                    <input type="text" class="form-control id" name="id" autocomplete="off">
                </div>

                <div class="col-4">
                    <label for="name" class="form-label">Member's Name</label>
                    <input type="text" class="form-control name" name="name" autocomplete="off">
                </div>

				<!-- <div class="col-4">
                    <label for="name" class="form-label">Member's Email</label>
                    <input type="text" class="form-control email" name="email" autocomplete="off">
                </div>

				<div class="col-4">
                    <label for="password" class="form-label">Member's Password</label>
                    <input type="text" class="form-control password" name="password" autocomplete="off">
                </div> -->

				<div class="col-md-4">
				<label for="class" class="form-label">Status</label>
                    <select id="level" class="form-select class" name="class">
                        <option selected>Faculty</option>
                        <option value="FIST">FIST</option>
                        <option value="FET">FET</option>
                        <option value="FOB">FOB</option>
                        <option value="FOL">FOL</option>
                    </select>
                </div>


                <div class="col-md-3">
                    <label for="level" class="form-label">Status</label>
                    <select id="level" class="form-select level" name="level">
                        <option selected>Status...</option>
                        <option value="Student">Student</option>
                        <option value="Vip Student">Vip Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Vip Teacher">Vip Teacher</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="telephone" class="form-label">Member's H.P Number</label>
                    <input type="text" class="form-control telephone" name="telephone" autocomplete="off">
                </div>

                <div class="col-12">
                    <a href="main.php" class="btn btn-secondary back">Go Back</a>
                    <button type="submit" class="btn btn-primary submit" name="register">Add Member</button>
                </div><br>
            </form>
	</div>




</body>
</html>

 
