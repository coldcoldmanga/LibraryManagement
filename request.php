<?php 

require('config.php');
require('header.php');
require('navbar.php');
require('footer.php');

$superAdmin = mysqli_query($conn, "SELECT superAdmin FROM admin WHERE adminID = '$_SESSION[adminID]' ");
$fetchSuper = mysqli_fetch_assoc($superAdmin);

if($fetchSuper['superAdmin'] == 1){

    $request = mysqli_query($conn, "SELECT * FROM request WHERE status = 'Pending' ");
    $memberName = mysqli_query($conn, "SELECT member.name FROM request INNER JOIN member ON request.memberID = member.memberID WHERE status = 'Pending' ");
    $fetchName = mysqli_fetch_assoc($memberName);
    $bookTitle = mysqli_query($conn, "SELECT book.title FROM request INNER JOIN book ON request.bookID = book.bookID WHERE status = 'Pending' ");

$check = mysqli_num_rows($request);

if($check > 0){ ?>

    <div class= "container">

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Request No.</th>
                <th scope="col">Member ID</th>
                <th scope="col">Member Name</th>
                <th scope="col">BookID</th>
                <th scope="col">Book Title</th>
                <th scope="col">Request Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            
            $no = 1;

            while($row = mysqli_fetch_assoc($request) AND $fetchTitle = mysqli_fetch_assoc($bookTitle)){ ?>

                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['memberID']; ?></td>
                    <td><?php echo $fetchName['name']; ?></td>
                    <td><?php echo $row['bookID']; ?></td>
                    <td><?php echo $fetchTitle['title']; ?></td>
                    <td><?php echo $row['requestDate']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><form action="approveRequest.php" method="post" style="display:inline-block;"><input type="hidden" name="requestID" value="<?php echo $row['requestID']; ?>"><button type="submit" name="approve" class="btn btn-primary" onclick="return confirm('Are you sure you want to approve?')">Approve</button>
                        <button type="submit" name="ignore" class="btn btn-secondary" onclick="return confirm('Are you sure you want to ignore?')">Ignore</button>
                        </form></td>
                </tr>
       
 <?php   $no++; }
            
            ?>

        </tbody>
    </table>

    <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>

    </div>

    
    
<?php }

else{ ?>

    <div class="container">
        <h2 class="noRequest">No request pending</h2>

        <a href="main.php" class="btn btn-secondary" style="margin-top: 20px;">Go Back</a>
    </div>
    
<?php }
}

else{

    echo "You have no access to this page";
}





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

        .table{

            margin-top: 100px;
        }

        .noRequest{

            margin-top: 20px;
            margin-left: 500px;
        }

    </style>

</head>
<body>

</body>
</html>