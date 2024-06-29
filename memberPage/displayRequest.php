<?php 

require('../config.php');
require('memberHeader.php');

if(isset($_POST['input'])){

    $input = $_POST['input'];

    $search = mysqli_query($conn, "SELECT * FROM book WHERE title LIKE '{$input}%' OR bookID LIKE '{$input}%' ");

    if(mysqli_num_rows($search) > 0){ ?>

        <table class="table table-striped table-bordered result">
            <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                
                    while($row = mysqli_fetch_assoc($search)){

                        $bookID = $row['bookID'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $publisher = $row['publisher'];
                        $type = $row['type'];
                        $status = $row['stats'];

                         ?>

                            <tr>
                            <td><?php echo $bookID;  ?></td>
                            <td><?php echo $title;  ?></td>
                            <td><?php echo $author;  ?></td>
                            <td><?php echo $publisher;  ?></td>
                            <td><?php echo $type;  ?></td>
                            <td><?php echo $status;  ?></td>
                            <td>
                                <form action="issue.php" method="post" style="display:inline-block;"><input type="hidden" name="bookID" value="<?php echo $bookID; ?>"><button type="submit" name="edit" class="btn btn-secondary">Request</button></form>
                            </td>
                        </tr>

                   <?php     }
                    
                
                ?>

            </tbody>
        </table>   

        <?php   }
        
        else{

            echo "<h6>No Data Found</h6>";
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

.table{
     width: 100%;
     margin-top: 20px;
    }

    .row{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

    </style>

</head>
<body>

</body>
</html>