<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

//check member penalty amount
if(isset($_POST['check'])){

    $memberID = $_POST['memberID'];

    $check = mysqli_query($conn,"SELECT penalty FROM member WHERE memberID = '$memberID' ");

    $result = mysqli_fetch_assoc($check);
    $penalty = $result['penalty'];

    ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                <?php echo "Penalty Amount: RM $penalty"; ?>
                </h4>
            </div> 
            <?php
}

if(isset($_POST['submit'])){

    $memberID = ucwords($_POST['memberID']);
    $amount = $_POST['amount'];

    if(empty($memberID) || empty($amount)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                Input field cannot be empty!
                </h4>
            </div>
<?php    }
    else if(!preg_match('/[A-Za-z0-9\s]+/',$memberID) || !preg_match('/[0-9\s]+/',$amount)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                Use only alphabets and numbers! Use numbers only for amount!
                </h4>
            </div>

<?php    }
    else{

        $memberFine = mysqli_query($conn,"SELECT penalty FROM member WHERE memberID = '$memberID' ");
        $result = mysqli_fetch_assoc($memberFine);

        if($result['penalty'] <= 0){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                You don't have any penalty due!
                </h4>
            </div>

        <?php }else{

$check = $result['penalty'] - $amount;



if(!$check == 0){

    $update = mysqli_query($conn,"UPDATE member SET penalty = '$check' WHERE memberID = '$memberID' "); ?>

    <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    You still need to pay RM <?php echo $check; ?>!
                </h4>
            </div>
<?php    }

else{

    $update = mysqli_query($conn,"UPDATE member SET penalty = 0 WHERE memberID = '$memberID' "); ?>
    
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">
                    Thank you for paying your penalty!
                </h4>
            </div>

<?php   }
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

    .card{
        margin-left: 500px;
        margin-top: 100px;
    }

    .btn{
        margin-top: 20px; 
        margin-left:5px;
    }

</style>

</head>
<body>

    <div class="card w-50">
        <h5 class="card-header">Settling Penalty Fee</h5>

            <form action="penalty.php" method="post">
            <div class="card-body">
            <label for="studentID">Check Member Penalty</label>
            <input type="text" name="memberID" class="form-control" autocomplete="off">
            <button type="submit" name="check" class="btn btn-primary">Check</button>
            </div>
            </form>

            <form action="penalty.php" method="post"> 
            <div class="card-body">
               
                <label for="studentID">Member's ID</label>
                <input type="text" name="memberID" class="form-control" autocomplete="off">

                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" autocomplete="off">

                <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="submit" class="btn btn-primary">Pay</button>
                
            </div>
            </form>
    </div>

</body>
</html>