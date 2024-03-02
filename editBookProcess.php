<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

if(isset($_POST['edit'])){

    $bookID = $_POST['bookID'];
    $search = mysqli_query($conn, "SELECT * FROM book WHERE bookID = '$bookID'");

    while($row = mysqli_fetch_assoc($search)){

        $bookID = $row['bookID'];
        $title = $row['title'];
        $author = $row['author'];
        $publisher = $row['publisher'];
        $type = $row['type'];
        $price = $row['price'];
        $ISBN = $row['ISBN'];
        $status = $row['stats'];
    }

}

if(isset($_POST['update'])){

    $bookID = ucwords($_POST['bookID']);
    $title = ucwords($_POST['title']);
    $author = ucwords($_POST['author']);
    $publisher = ucwords($_POST['publisher']);
    $type = ucwords($_POST['type']);
    $price = ucwords($_POST['price']);
    $ISBN = ucwords($_POST['ISBN']);
    $status = ucwords($_POST['stats']);

    if(empty($bookID) || empty($title) || empty($author) || empty($publisher) || empty($type) || empty($price) || empty($ISBN) || empty($status)){
      
        header("location:book.php");
        
    }

    else if(!preg_match('/^[A-Za-z0-9\s]{1,}$/',$bookID) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$title) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$author) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$publisher) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$type) OR !preg_match('/^[A-Za-z0-9.\s]{1,}$/',$price) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$ISBN) OR !preg_match('/^[A-Za-z0-9\s]{1,}$/',$status)){ ?>

        <div class="alert alert-warning" role="alert">
            <h4 class="text-center">
                Use only alphabets and numbers!
            </h4>
        </div>

        

<?php	}

    else{

        $update = mysqli_query($conn, "UPDATE book SET bookID = '$bookID', title = '$title', author = '$author', publisher = '$publisher', type = '$type', price = '$price', ISBN = '$ISBN', stats = '$status' WHERE bookID = '$bookID'"); 

    if($update){

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
        <h5 class="card-header">Update Book's Information</h5>
            <form action="editBookProcess.php" method="post"> 
            <div class="card-body">
               
                <input type="hidden" name="bookID" class="form-control" value="<?php echo $bookID; ?>">

                <label for="name" class="center">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">

                <label for="class">Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $author; ?>">

                <label for="class">Publisher</label>
                <input type="text" name="publisher" class="form-control" value="<?php echo $publisher; ?>">

                <label for="level" class="form-label">Type</label>
                    <select id="type" class="form-select type" name="type">
                        <option selected><?php echo $type; ?></option>
                        <option value="Fiction">Fiction</option>
                        <option value="Non-Fiction">Non-Fiction</option>
                        <option value="Journal">Journal</option>
                        <option value="Reference">Reference</option>
                    </select>
              
                <label for="class">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">

                <label for="class">ISBN</label>
                <input type="text" name="ISBN" class="form-control" value="<?php echo $ISBN; ?>">

                <label for="class">Status</label>
                <input type="text" name="stats" class="form-control" value="<?php echo $status; ?>">

                <a href="update.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary " style="margin-top: 20px;">Update</button>
                
            </div>
            </form>
    </div>
    
</body>
</html>