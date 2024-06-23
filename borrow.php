<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

if(isset($_POST['borrow'])){

    date_default_timezone_set("Asia/Singapore");

    $bookID = ucwords($_POST['bookID']);
    $memberID = ucwords($_POST['memberID']);
    $Bdate = date("Y-m-d");
    $status = "Borrowing";

    //check if book or student exists
    $book = mysqli_query($conn,"SELECT * FROM book WHERE bookID = '$bookID' ");
    $checkBook = mysqli_num_rows($book);
    $member = mysqli_query($conn,"SELECT * FROM member WHERE memberID = '$memberID' ");
    $checkMember = mysqli_num_rows($member);

    //check if the book is borrowed
    $book = mysqli_query($conn,"SELECT * FROM borrow WHERE bookID = '$bookID' AND status = 'Borrowing' ");
    $checkBorrowed = mysqli_num_rows($book);

    //check if the student got fine to pay
    $fine = mysqli_query($conn,"SELECT * FROM member WHERE memberID = '$memberID' ");
    $result = mysqli_fetch_assoc($fine);
    $checkFine = mysqli_num_rows($fine);

    if(empty($bookID) OR empty($memberID)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Input field cannot be empty!
                </h4>
            </div>

<?php	} 

	else if(!preg_match('/^[A-Za-z0-9\s]{1,}$/',$bookID) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$memberID)){ ?>


            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Use only alphabets and numbers!
                </h4>
            </div>

            

<?php	}

else if($checkBook == 0){ ?>

    <div class="alert alert-warning" role="alert">
        <h4 class="text-center">
            Book does not exist!
        </h4>
    </div>

<?php  }

    else if($checkMember == 0){ ?>

                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            Member does not exist!
                        </h4>
                    </div>

  <?php  }

    else if($checkBorrowed > 0){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    This book is borrowed!
                </h4>
            </div>
  <?php  }


    else if($result['penalty'] > 0){ ?>

                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You haven't settle RM<?php echo $result['penalty']; ?> for your penalty! 
                        </h4>
                    </div>
   

  <?php  }

    else{

        //check student's status
        $member = mysqli_query($conn,"SELECT * FROM member WHERE memberID = '$memberID' ");
        $row = mysqli_fetch_assoc($member);

        if($row['level'] == "Student"){

            //check book limit
            $limit = mysqli_query($conn,"SELECT * FROM borrow WHERE memberID = '$memberID' AND status = 'Borrowing' ");
            $checkLimit = mysqli_num_rows($limit);

            if($checkLimit >=2){?>
                    
                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You already borrowed 2 books!
                        </h4>
                    </div>
          <?php  }

            else{
                 $Rdate = date("Y-m-d",strtotime("+1 week"));
                 $insert = mysqli_query($conn,"INSERT INTO borrow (bookID,memberID,Bdate,Rdate,status) VALUES ('$bookID','$memberID','$Bdate','$Rdate','$status') ");
                 //$update = mysqli_query($conn,"UPDATE book SET stats = 'Borrowed' WHERE bookID = '$bookID' ");

                    ?> <div class="alert alert-success" role="alert">
                            <h4 class="text-center">
                                Borrowed Successfully
                            </h4>
                       </div>
                 
          <?php  }
        }
        else if($row['level'] == "Vip Student"){

            //check book limit
            $limit = mysqli_query($conn,"SELECT * FROM borrow WHERE memberID = '$memberID' AND status = 'Borrowing' ");
            $checkLimit = mysqli_num_rows($limit);

            if($checkLimit >=4){ ?>

                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You already borrowed 4 books!
                        </h4>
                    </div>

        <?php    }

            else{
                 $Rdate = date("Y-m-d",strtotime("+2 week"));
                 $insert = mysqli_query($conn,"INSERT INTO borrow (bookID,memberID,Bdate,Rdate,status) VALUES ('$bookID','$memberID','$Bdate','$Rdate','$status') "); 
                 //$update = mysqli_query($conn,"UPDATE book SET stats = 'Borrowed' WHERE bookID = '$bookID' ");?>

                 <div class="alert alert-success" role="alert">
                            <h4 class="text-center">
                                Borrowed Successfully
                            </h4>
                       </div>
          <?php  }

        }

        else if($row['level'] == "Teacher"){

            //check book limit
            $limit = mysqli_query($conn,"SELECT * FROM borrow WHERE memberID = '$memberID' AND status = 'Borrowing' ");
            $checkLimit = mysqli_num_rows($limit);

            if($checkLimit >=4){ ?>

                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You already borrowed 4 books!
                        </h4>
                    </div>

        <?php  }

            else{
                 $Rdate = date("Y-m-d",strtotime("+2 week"));
                 $insert = mysqli_query($conn,"INSERT INTO borrow (bookID,memberID,Bdate,Rdate,status) VALUES ('$bookID','$memberID','$Bdate','$Rdate','$status') ");
                 //$update = mysqli_query($conn,"UPDATE book SET stats = 'Borrowed' WHERE bookID = '$bookID' "); ?>

                        <div class="alert alert-success" role="alert">
                            <h4 class="text-center">
                                Borrowed Successfully
                            </h4>
                        </div>                
       <?php   }

        }

        else if($row['level'] == "Vip Teacher"){

            //check book limit
            $limit = mysqli_query($conn,"SELECT * FROM borrow WHERE memberID = '$memberID' AND status = 'Borrowing' ");
            $checkLimit = mysqli_num_rows($limit);

            if($checkLimit >=8){ ?>
                
                    <div class="alert alert-warning" role="alert">
                        <h4 class="text-center">
                            You already borrowed 8 books!
                        </h4>
                    </div>

      <?php  }

            else{
                 $Rdate = date("Y-m-d",strtotime("+4 week"));
                 $insert = mysqli_query($conn,"INSERT INTO borrow (bookID,memberID,Bdate,Rdate,status) VALUES ('$bookID','$memberID','$Bdate','$Rdate','$status') ");
                 //$update = mysqli_query($conn,"UPDATE book SET stats = 'Borrowed' WHERE bookID = '$bookID' "); ?>

                        <div class="alert alert-success" role="alert">
                            <h4 class="text-center">
                                Borrowed Successfully
                            </h4>
                        </div>               
        <?php   }

        }

        else{ ?>

            <div class="alert alert-danger" role="alert">
                <h4 class="text-center">
                    No such status!
                </h4>
            </div>

   <?php    }
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


    <div class="card w-50 box">
        <h5 class="card-header">Borrow</h5>
            <form action="borrow.php" method="post"> 
            <div class="card-body">
               
                <label for="bookID" class="center">Book ID</label>
                <input type="text" name="bookID" class="form-control" autocomplete="off">

                <label for="studentkID">Member ID</label>
                <input type="text" name="memberID" class="form-control" autocomplete="off">

                <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="borrow" class="btn btn-primary " style="margin-top: 20px;">Borrow</button>
                
            </div>
            </form>
    </div>

</body>
</html>


