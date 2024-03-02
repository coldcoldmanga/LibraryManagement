<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

$date = date("M Y");
$call = mysqli_query($conn,"CALL most_borrowed()");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

    th,td{
        text-align: center;
    }

    .title1{

        margin-top: 20px;
        margin-left: 550px;
    }

    .table{
            position: relative;
            margin-top: 30px;
        }

    </style>
    
</head>
<body>

  
    <h2 class="title1">Members with most borrowed books in <?php echo $date;  ?></h2>
    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Member ID</th>
                <th scope="col" >Member Name</th>
                <th scope="col">Member Class</th>
                <th scope="col">Member email</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while($fetch = mysqli_fetch_assoc($call)){

            $memberID = $fetch['memberID'];
            $name = $fetch['name'];
            $class = $fetch['class'];
            $email = $fetch['email'];
            $amount = $fetch['amount'];

            ?>
            
            <tr>
                <td><?php echo $memberID;  ?></td>
                <td><?php echo $name;  ?></td>
                <td><?php echo $class;  ?></td>
                <td><?php echo $email;  ?></td>
                <td><?php echo $amount;  ?></td>
                <td><form action="rewardEmail.php" method="post">
                <input type="hidden" name="memberID" value="<?php echo $memberID?>">
                <input type="hidden" name="name" value="<?php echo $name?>">
                <input type="hidden" name="class" value="<?php echo $class?>">
                <input type="hidden" name="email" value="<?php echo $email?>">
                <input type="hidden" name="amount" value="<?php echo $amount?>">
                <button type="submit" name="submit" class="btn btn-primary email">Email</button></form>
                </td>
            </tr>
   <?php     }  
        
        ?>
        
        </tbody>
    </table>

    <div class="container">
            <a href="main.php" class="btn btn-secondary">Go Back</a>
        </div>

    </div>
    
 
</body>
</html>