 <?php 

    include('config.php');
    require('header.php');

if(isset($_POST['input'])){

    $memberID = $_POST['input'];

        $borrow = mysqli_query($conn,"SELECT * FROM borrow WHERE memberID LIKE '{$memberID}%' AND status = 'Borrowing'  ");
        
        $title = mysqli_query($conn,"SELECT book.title FROM borrow INNER JOIN book ON borrow.bookID = book.bookID WHERE memberID LIKE '{$memberID}%' AND status = 'Borrowing' ");
       

        if(mysqli_num_rows($borrow) > 0){ ?>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Book ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Borrowed Date</th>
                        <th scope="col">Return Date</th>
                    </tr>
                </thead>

                <tbody>

                    <?php 
                    
                        while($resultBorrow = mysqli_fetch_assoc($borrow) AND  $fetchTitle = mysqli_fetch_assoc($title)){

                            $bookID = $resultBorrow['bookID'];
                            $bookTitle = $fetchTitle['title'];
                            $Bdate = $resultBorrow['Bdate'];
                            $Rdate = $resultBorrow['Rdate'];

                             ?>

                                <tr>
                                <td><?php echo $bookID;  ?></td>
                                <td><?php echo $bookTitle;  ?></td>
                                <td><?php echo $Bdate;  ?></td>
                                <td><?php echo $Rdate;  ?></td>
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
            margin-left: 300px;
        }

    </style>

</head>
<body>
    
</body>
</html>


    

    


    


