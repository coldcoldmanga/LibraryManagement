<?php 
require('../config.php');
require('memberHeader.php');
require('memberNavbar.php');
require('../mailSend.php');

//generate a random 6-digit otp number
function generateOTP()
{
    $digits = 6;
    $generatedOTP = "";
    for ($i = 0; $i < $digits; $i++) {
        $generatedOTP .= mt_rand(0, 9);
    }
    return $generatedOTP;
}

//only generate the otp if it is not set yet
if(!isset($_SESSION['otp_num']))
{
    $otp_num = generateOTP();
    $_SESSION['otp_num'] = $otp_num;
    $_SESSION['otp_expiry'] = time() + 300; // the timeout is 5 minutes
    $send = sendOTP($_SESSION['memberID']."@student.mmu.edu.my", $otp_num);
    if($send){
    echo "<script>alert('OTP has been sent to your email.')</script>";   
}
}

// Handle form submission
if (isset($_POST['submit'])) {
    $otp_input = $_POST['otp-input'];
    $pwd = $_POST['password'];
    $c_pwd = $_POST['c-password'];

    // Validate OTP
    if(isset($_SESSION['otp_num']) && isset($_SESSION['otp_expiry']) && time() < $_SESSION['otp_expiry']) {
        if ($otp_input === $_SESSION['otp_num']) {
            unset($_SESSION['otp_num']);
            unset($_SESSION['otp_expiry']);
            // Validate passwords match
            if ($pwd === $c_pwd) {
                $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
    
                $sql = "UPDATE member SET password = ? WHERE memberID = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<script>alert('Failed Connecting to Server!');
                            window.location='changePassword.php'</script>";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $_SESSION['memberID']);
                    mysqli_stmt_execute($stmt);
                    echo "<script>alert('Password Changed Successfully! Please re-login with your new password');
                    window.location='memberLogin.php'</script>";
                }
    
            } else {
                echo "<script>alert('Passwords do not match!');window.location='memberPage.php'</script></script>";
            }
        } else {
            echo "<script>alert('Invalid OTP!');window.location='memberPage.php'</script></script>";
        }
    }else{
        echo "<script>alert('OTP is expired!');window.location='memberPage.php'</script></script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Change Password</title>


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
		<h5 class="card-header">Changing Password</h5>
			<form action="changePassword.php" method="post">
				<div class="">
                    <label for="otp-num" class="form-label">OTP Number</label>
                    <input type="text" class="form-control" name="otp-input" autocomplete="off" required> 
                </div>

                <div class="password">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off" required> 
                </div>

                <div class="c-password">
                    <label for="otp-num" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="c-password" autocomplete="off" required> 
                </div>

				
				<a href="memberPage.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="submit" class="btn btn-primary " style="margin-top: 20px;">Submit</button>

			</form>
	</div>
    
</body>
</html>