<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

$call = mysqli_query($conn, "CALL reminder()");


if(mysqli_num_rows($call) > 0){ ?>

    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Member ID</th>
                <th scope="col" >Member Name</th>
                <th scope="col" >Member Email</th>
                <th scope="col">Book ID</th>
                <th scope="col">Book Title</th>
                <th scope="col">Borrowed Date</th>
                <th scope="col">Expected Return Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while($fetch = mysqli_fetch_assoc($call)){

            $memberID = $fetch['mID'];
            $name = $fetch['name'];
            $email = $fetch['email'];
            $bookID = $fetch['bID'];
            $title = $fetch['title'];
            $Bdate = $fetch['Bdate'];
            $Rdate = $fetch['Rdate'];
           

            ?>
            
            <tr>
                <td><?php echo $memberID;  ?></td>
                <td><?php echo $name;  ?></td>
                <td><?php echo $email;  ?></td>
                <td><?php echo $bookID;  ?></td>
                <td><?php echo $title;  ?></td>
                <td><?php echo $Bdate;  ?></td>
                <td><?php echo $Rdate;  ?></td>
                <td><form action="reminderEmail.php" method="post">
                <input type="hidden" name="memberID" value="<?php echo $memberID?>">
                <input type="hidden" name="name" value="<?php echo $name?>">
                <input type="hidden" name="email" value="<?php echo $email?>">
                <input type="hidden" name="bookID" value="<?php echo $bookID?>">
                <input type="hidden" name="title" value="<?php echo $title?>">
                <input type="hidden" name="Bdate" value="<?php echo $Bdate?>">
                <input type="hidden" name="Rdate" value="<?php echo $Rdate?>">
                <!--<a href="mailto:" <?php $email?> name="submit" class="btn btn-primary email">Email</button></form>-->
                <?php echo "<button class='btn btn-primary' name='submit'><a href='mailto:" . $email . "?body=" . "test" . "' style='color:white'>Send</button>";?>
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

<?php 
}
else{ ?>

<h2 class="text-center">No Member with due date lesser than 3 day from now</h2>


    
<?php }

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
    
</body>
</html>