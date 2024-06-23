<?php 

include('footer.php');
require('memberHeader.php');
require('config.php');

    //get the member's borrowing record
    $borrowRecord = mysqli_query($conn, "SELECT * FROM borrow WHERE memberID = '$_SESSION[memberID]' AND status = 'Borrowing' ");
    $title = mysqli_query($conn,"SELECT book.title FROM borrow INNER JOIN book ON borrow.bookID = book.bookID WHERE memberID = '$_SESSION[memberID]' AND status = 'Borrowing' ");
    $checkRow = mysqli_num_rows($borrowRecord);


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="wide=device-width,initial-scale=1.0">
<link rel="stylesheet" href="gradient.css">
<link rel="stylesheet" href="css/nav.css">

<!-- Bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Jquery -->
<script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<style>
    .container{
        display: flex;
        flex-direction: column;
    }

    .header{
        display: flex;
        justify-content: center;
    }


</style>

</head>

<body>

<!-- Navbar -->
    <nav class="shadow-sm">

        <div class="logo"><a href="memberPage.php"><img src="img/logo1.png" alt="Logo" srcset="" width="150"  height="270"></a></div>
        <div class="title">Minimalist Library</div>

        <ul>
            <li><a href="memberRequest.php" class="">Request</a></li>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="memberLogout.php" onclick="return confirm('Proceed to Logout?');">Logout</a></li>
            
        </ul>

    </nav>

    <div class="container">
        <div class="header">
            <h1>Borrowing Record</h1>
        </div>
    <?php  
    
    if($checkRow > 0){ ?>
        
        <table class="table table-striped table-bordered resultMember">
            <thead>
                <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Title</th> 
                <th scope="col">Borrowed Date</th>
                <th scope="col">Date to Return</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                
                while($row = mysqli_fetch_assoc($borrowRecord) AND $fetchTitle = mysqli_fetch_assoc($title)){ ?>

                    <tr>
                        <td><?php echo $row['bookID'];  ?></td>
                        <td><?php echo $fetchTitle['title'];  ?></td>
                        <td><?php echo $row['Bdate'];  ?></td>
                        <td><?php echo $row['Rdate'];  ?></td>
                    </tr>


        <?php   }
                
                ?>

            </tbody>
        </table>
    
 <?php   }
    else{

        echo "<center><h4>You have no ongoing borrowing record</h4></center>";
    }
    
    ?>
  

    

</div>

   

</body>



</html>