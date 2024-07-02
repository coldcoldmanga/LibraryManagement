<?php 

require('config.php');

if(isset($_POST['borrow'])){

$date = date("Y/m/d");

@header("Content-Disposition: attachment; filename= BorrowRecordBackup_$date.csv"); 

$data = '';

$borrow = mysqli_query($conn, "SELECT * FROM borrow");

while($row = mysqli_fetch_assoc($borrow)){

    $data.= $row['borrowID'].",";
    $data.= $row['bookID'].",";
    $data.= $row['memberID'].",";
    $data.= $row['Bdate'].",";
    $data.= $row['Rdate'].",";
    $data.= $row['status'].",";
    $data.= $row['penalty']."\n";
}

echo $data;
exit();

}

?>