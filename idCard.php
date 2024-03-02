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
        margin-left: 500px;
        margin-top: 100px;
    }

    .btn{
        margin-top: 20px;
        
    }

    .form-control{

        width: 98%;
        margin-left: 10px;
    }

    label{

        margin-left: 10px;
    }

     .back{

        margin-left: 10px;
        margin-bottom: 10px;
    }

    button{
        margin-left: 5px;
        margin-bottom: 10px;
    }

    </style>

</head>
<body>
    
    <div class="card w-50">
        <h5 class="card-header">Generate Member Card</h5>
        <form action="printID.php" method="post">
            <label for="adminID" class="form-label">Generate ID from: </label>
            <input type="text" class="form-control" name="start" autocomplete="off">

            <label for="adminID" class="form-label">To:</label>
            <input type="text" class="form-control" name="end" autocomplete="off">

            <a href="main.php" class="btn btn-secondary back">Go Back</a>
            <button type="submit" class="btn btn-primary" name="generate">Generate</button>

        </form>
    </div>

</body>
</html>