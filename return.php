<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

if(isset($_POST['return'])){

    date_default_timezone_set("Asia/Singapore");

    $bookID = ucwords($_POST['bookID']);
    $book = mysqli_query($conn,"SELECT * FROM book WHERE bookID = '$bookID' ");
    $checkBook = mysqli_num_rows($book);

    if(empty($bookID)){ ?>
      
        <div class="alert alert-warning" role="alert">
            <h4 class="text-center">
                Input field cannot be empty!
            </h4>
        </div>
        
 <?php   }

 
else if($checkBook == 0){ ?>

    <div class="alert alert-warning" role="alert">
        <h4 class="text-center">
            Book does not exist!
        </h4>
    </div>

<?php  }

    else if(!preg_match('/^[a-zA-Z0-9\s]{1,}$/',$bookID)){ ?>

        <div class="alert alert-warning" role="alert">
            <h4 class="text-center">
                Use only alphabets and numbers!
            </h4>
        </div>

<?php }

    else{

         //fetch all the information we need
    $borrow = mysqli_query($conn,"SELECT * FROM borrow WHERE bookID = '$bookID' AND status = 'Borrowing'  ");
    $result = mysqli_fetch_assoc($borrow);
    $memberID = $result['memberID'];

    //calculate the how many days the member returned late
        $date1 = strtotime($result['Rdate']);
        $date2 = strtotime("today");

        if($date2 > $date1){

            $day = (($date2 - $date1) /86400); 

            $fine = round($day) * 0.10;
            
            //Update the penalty in the borrow table
            $updatePenalty = mysqli_query($conn, "UPDATE borrow SET penalty = '$fine' WHERE bookID = '$bookID' AND memberID = '$memberID' AND status = 'Borrowing' ");

            //Fetch the penalty in the member table
            $amount = mysqli_query($conn,"SELECT * FROM member WHERE memberID = '$memberID' ");
            $result = mysqli_fetch_assoc($amount);
            $finalAmount = $result['penalty'] + $fine;

            $return = mysqli_query($conn,"UPDATE borrow SET status = 'Returned' WHERE bookID = '$bookID' AND status = 'Borrowing'"); 
            
             ?>
            
                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You need to pay RM<?php echo $finalAmount; ?> for your penalty! 
                        </h4>
                    </div>

<?php
        }
        else{

            $return = mysqli_query($conn,"UPDATE borrow SET status = 'Returned' WHERE bookID = '$bookID' AND status = 'Borrowing'"); ?>
                   
                   <div class="alert alert-success" role="alert">
                        <h4 class="text-center">
                            Returned Successfully!
                        </h4>
                    </div>

   <?php     }

      
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
    
    button{
        margin-left: 5px;
    }
    
</style>
   
</head>
<body>

    <div class="card w-50">
        <h5 class="card-header">Returning the Books</h5>
            <form action="return.php" method="post"> 
            <div class="card-body">
               
                <label for="bookID">Book ID</label>
                <input type="text" name="bookID" class="form-control" autocomplete="off">

                <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="return" class="btn btn-primary" style="margin-top: 20px;">Return</button>
                
            </div>
            </form>
    </div>

</body>
</html>