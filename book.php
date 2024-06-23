<?php 

require('config.php');
require('header.php');
include('navbar.php');
require('footer.php');

$getBookID = mysqli_query($conn, "SELECT * FROM book ORDER BY bookID DESC");

if(isset($_POST['add'])){

    date_default_timezone_set("Asia/Singapore");

    $bookID = ucwords($_POST['bookID']);
    $title = ucwords($_POST['title']);
    $author = ucwords($_POST['author']);
    $publisher = ucwords($_POST['publisher']);
    $type = ucwords($_POST['type']);
    $ISBN = $_POST['ISBN'];
    $price = $_POST['price'];
    $datetime = date("Y-m-d H:i:s");

    if(empty($bookID) || empty($title) || empty($author) || empty($publisher) || empty($type) || empty($ISBN) || empty($price)){ ?>
      
            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Input field cannot be empty!
                </h4>
            </div>
        
<?php    }

    else if(!preg_match('/^[a-zA-Z0-9\s]{1,}$/',$bookID) || !preg_match('/^[a-zA-Z0-9\s]{1,}$/',$title) || !preg_match('/^[a-zA-Z0-9\s]{1,}$/',$author) || !preg_match('/^[a-zA-Z0-9\s]{1,}$/',$publisher) || !preg_match('/^[a-zA-Z0-9\s]{1,}$/',$type) || !preg_match('/^[0-9\s]{1,}$/',$ISBN) || !preg_match('/^[0-9\s.]{1,}$/',$price)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Use only alphabets and numbers!
                </h4>
            </div>

            

<?php	}

    else{

        /*switch($type){

            case "Fiction": $bookID = "F".$bookID;
            break;

            case "Non-Fiction": $bookID = "NF".$bookID;
            break;

            case "Journal": $bookID = "J".$bookID;
            break;

            case "Reference": $bookID = "R".$bookID;
            break;

            default: $bookID = "O".$bookID;
        }*/

        $sql = "INSERT INTO book (bookID,title,author,publisher,type,price,ISBN,datetime) VALUES('$bookID','$title','$author','$publisher','$type','$price','$ISBN','$datetime')";
        $insert = mysqli_query($conn,$sql); 
?>

    <div class='alert alert-success' role='alert'>
        <h4 class='text-center'>
            Book Added Successfully
        </h4>
    </div>
                        
     <?php }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/book.css">
   
</head>
<body>  

<div class="container">
    <div class="card">
        <h5 class="card-header">Key in the Books</h5>
            <form action="book.php" method="post" class="row g-3"> 
                <div class="col-md-3">
                    <label for="bookID" class="form-label">Book ID</label>
                    <input type="text" name="bookID" class="form-control" placeholder="Enter Book ID (numbers only)" list="bookID" autocomplete="off">
                    <datalist id="bookID">
                        <?php while($row = mysqli_fetch_assoc($getBookID)):; ?>
                        <option value="<?php echo $row['bookID'];?>"></option>
                        <?php  endwhile;  ?>
                    </datalist>
                </div>

                <div class="col-md-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" autocomplete="off" required> 
                </div>

                <div class="col-md-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control author" name="author" autocomplete="off" required>
                </div>

                <div class="col-md-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" name="publisher" autocomplete="off" required>
                </div>

                <div class="col-md-3">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" class="form-select" name="type" required>
                        <option selected>Type...</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Non-Fiction">Non-Fiction</option>
                        <option value="Journal">Journal</option>
                        <option value="Reference">Reference</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="ISBN" class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="ISBN" autocomplete="off" required>
                </div>

                <div class="col-md-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control price" name="price" autocomplete="off" required>
                </div>

                <div class="col-12">
                    <a href="main.php" class="btn btn-secondary back">Go Back</a>
                    <button type="submit" name="add" class="btn btn-primary submit">Add Book</button>
                </div><br>
            </form>
    </div>
</div>

</body>
</html>