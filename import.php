<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');

//Importing the Book
if(isset($_POST['book'])){

    if(isset($_FILES["importBook"]) && $_FILES["importBook"]["error"] == 0){
        $file = $_FILES["importBook"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $bookID = $csv[0];
        $title = ucwords($csv[1]);
        $author = ucwords($csv[2]);
        $publisher = ucwords($csv[3]);
        $type = $csv[4];
        $price = trim($csv[5]);
        $ISBN = $csv[6];
        $datetime = new DateTime($csv[7]);
        $formattedDateTime = $datetime->format('Y-m-d H:i:s'); //to make sure the format comply with mysql standard
        $stats = $csv[8];

        $insert = mysqli_query($conn, "INSERT INTO book VALUES ('$bookID','$title','$author','$publisher','$type','$price','$ISBN','$formattedDateTime','$stats')"); ?>

        

<div class="alert alert-success" role="alert">
<h4 class="text-center">
     Book Record Imported Successfully
</h4>
</div> 
  <?php  }
    
    }
    else{
        echo "<script>alert('Please upload a file before importing!')</script>";
}
}
    
//Importing the Member Record
if(isset($_POST['member'])){

if(isset($_FILES["importMember"]) && $_FILES["importMember"]["error"] == 0){

    $file = $_FILES["importMember"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $memberID = ucwords($csv[0]);
        $name = ucwords($csv[1]);
        $class = ucwords($csv[2]);
        $level = ucwords($csv[3]);
        $telephone = $csv[4];
        $email = $csv[5];
        $password = $csv[6];
        $penalty = trim($csv[7]);

        $insert = mysqli_query($conn, "INSERT INTO member(memberID, name, class, level, telephone, email, password, penalty) VALUES ('$memberID','$name','$class','$level','$telephone', '$email', '$password', '$penalty')"); ?> 

        <div class="alert alert-success" role="alert">
        <h4 class="text-center">
            Member Record Imported Successfully
        </h4>
        </div>
<?php }     

  } 
  else{
    echo "<script>alert('Please upload a file before importing!')</script>";
}
  
  ?>

<?php }             

//Importing the Borrow Record
if(isset($_POST['borrow'])){

    if(isset($_FILES["importBorrow"]) && $_FILES["importBorrow"]["error"] == 0){
        $file = $_FILES["importBorrow"]["tmp_name"];
        $file_open =fopen($file,"r");
        
        while(($csv = fgetcsv($file_open,1000,",")) !== false){
    
            $borrowID = ucwords($csv[0]);
            $bookID = ucwords($csv[1]);
            $memberID = ucwords($csv[2]);
            $Bdate = ($csv[3]);
            $Rdate = $csv[4];
            $status = $csv[5];
            $penalty = trim($csv[6]);
            
            mysqli_query($conn, "INSERT INTO borrow VALUES ('$borrowID','$bookID','$memberID','$Bdate','$Rdate','$status','$penalty')"); ?>
            
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">
                         Borrow Record Imported Successfully
                    </h4>
                </div>
 <?php   }
    

}else{
    echo "<script>alert('Please upload a file before importing!')</script>";
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

            text-align: center;
            margin: 50px 0 0 500px;
        }

        .container{

            text-align: center;
            margin-top: 10px;
        }

        button{
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <div class="card w-50 box">
        <h5 class="card-header">Import Book Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
            <input type="file" class="form-control" name="importBook">
                <button type="submit" name="book" class="btn btn-primary ">Import Book Data to database</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Import Member Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
                <input type="file" class="form-control" name="importMember">
                <button type="submit" name="member" class="btn btn-primary ">Import Member Data to database</button>
            </div>
            </form>
    </div>

    <div class="card w-50 box">
        <h5 class="card-header">Import Borrow Records</h5>
            <form action="import.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">
                <input type="file" class="form-control" name="importBorrow">
                <button type="submit" name="borrow" class="btn btn-primary ">Import Penalty Data to Excel</button>
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