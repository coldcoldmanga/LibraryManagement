<?php 

include('config.php');
require('header.php');

if(isset($_POST['input'])){

$memberID = $_POST['input'];

    $search = mysqli_query($conn,"SELECT * FROM member WHERE name LIKE '{$memberID}%' OR memberID LIKE '{$memberID}%' ");

    if(mysqli_num_rows($search) > 0){ ?>

        <table class="table table-striped table-bordered resultMember">
            <thead>
                <tr>
                    <th scope="col">Member ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class/Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                
                    while($row = mysqli_fetch_assoc($search)){

                        $memberID = $row['memberID'];
                        $name = $row['name'];
                        $class = $row['class'];
                        $status = $row['level'];
                        $telephone = $row['telephone'];

                         ?>

                            <tr>
                            <td><?php echo $memberID;  ?></td>
                            <td><?php echo $name;  ?></td>
                            <td><?php echo $class;  ?></td>
                            <td><?php echo $status;  ?></td>
                            <td><?php echo $telephone;  ?></td>
                            <td>
                                <form action="editProcess.php" method="post"><input type="hidden" name="memberID" value="<?php echo $memberID; ?>"><button type="submit" name="edit" class="btn btn-secondary">Edit</button></form>
                                <form action="deleteMember.php" method="post" onsubmit="return confirm('Are you sure you want to delete this member?')"><input type="hidden" name="memberID" value="<?php echo $memberID; ?>"><button type="submit" name="delete" class="btn btn-danger">Delete</button></form>
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

body{
    background: #f2f2f2;
}


    .table{
        position: relative;
        margin-top: 30px;
        margin-left: 150px;
        width: 960px;
    }

    

    </style>

</head>
<body>

</body>
</html>










