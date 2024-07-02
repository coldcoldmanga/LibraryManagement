<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

if(isset($_POST['edit'])){

    $memberID = $_POST['memberID'];
    $search = mysqli_query($conn, "SELECT * FROM member WHERE memberID = '$memberID'");

    while($row = mysqli_fetch_assoc($search)){

        $memberID = $row['memberID'];
        $name = $row['name'];
        $class = $row['class'];
        $level = $row['level'];
        $telephone = $row['telephone']; 
    
        
    }
}



if(isset($_POST['update'])){

    $memberID = $_POST['memberID'];
    $img = $_FILES['img']['name'];
    $name = ucwords($_POST['name']);
    $class = ucwords($_POST['class']);
    $level = ucwords($_POST['level']);
    $telephone = ucwords($_POST['telephone']);

    if(empty($name) || empty($class) || empty($level) || empty($telephone)){
      
        header("location:book.php");
        
    }
    else if(!preg_match('/^[A-Za-z0-9\s]{1,}$/',$name) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$class) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$level) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$telephone)){ ?>

        <div class="alert alert-warning" role="alert">
            <h4 class="text-center">
                Use only alphabets and numbers!
            </h4>
        </div>
<?php  }

    else{

        $update = mysqli_query($conn, "UPDATE member SET name = '$name', class = '$class', level = '$level', telephone = '$telephone' WHERE memberID = '$memberID'"); 

    if($update){

        //move_uploaded_file($_FILES['img']['tmp_name'], "$img");

        echo "<script>alert('Updated Successfully');
		window.location='update.php'</script>";
    }
    else{

        echo "<script>alert('Failed to Update');
		window.location='update.php'</script>";
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

    </style>
    
</head>
<body>

<div class="card w-50 box">
        <h5 class="card-header">Update Member's Information</h5>
            <form action="editMemberProcess.php" method="post" enctype="multipart/form-data"> 
            <div class="card-body">

                <input type="hidden" name="memberID" value="<?php echo $memberID;?>">

                <label for="name" class="center">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">

                <label for="class">Class</label>
                <input type="text" name="class" class="form-control" value="<?php echo $class; ?>">

                <label for="level" class="form-label">Status</label>
                    <select id="level" class="form-select level" name="level">
                        <option selected><?php echo $level; ?></option>
                        <option value="Student">Student</option>
                        <option value="Vip Student">Vip Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Vip Teacher">Vip Teacher</option>
                    </select>
              
                <label for="class">Telephone</label>
                <input type="text" name="telephone" class="form-control" value="<?php echo $telephone; ?>">

                <a href="update.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary " style="margin-top: 20px;">Update</button>
                
            </div>
            </form>
    </div>
    
</body>
</html>