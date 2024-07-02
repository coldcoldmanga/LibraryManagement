<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

        .card{

            text-align: center;
            margin: 50px 0 0 500px;
        }

        .container{

            text-align: center;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <div class="card w-50 box">
        <h5 class="card-header">Backup Book Records</h5>
            <form action="backupBook.php" method="post"> 
            <div class="card-body">
                <button type="submit" name="book" class="btn btn-primary ">Export Book Data to Excel</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Backup Member Records</h5>
            <form action="backupMember.php" method="post"> 
            <div class="card-body">
                
                <button type="submit" name="member" class="btn btn-primary ">Export Member Data to Excel</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Backup Borrow Records</h5>
            <form action="backupBorrow.php" method="post"> 
            <div class="card-body">
                <button type="submit" name="borrow" class="btn btn-primary ">Export Borrow Data to Excel</button>
            </div>
            </form>
    </div>

        <div class="container">
            <a href="main.php" class="btn btn-sencondary">Go Back</a>
        </div>
     
    </div>
</div>
    
</body>
</html>