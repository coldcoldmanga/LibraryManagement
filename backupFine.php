<?php 

require('config.php');

if(isset($_POST['fine'])){

$date = date("Y/m/d");

@header("Content-Disposition: attachment; filename= PenaltyBackup_$date.csv"); 

$data = '';

$penalty = mysqli_query($conn, "SELECT * FROM borrow  WHERE borrow.penalty > 0");

while($row = mysqli_fetch_assoc($penalty)){

    $data.= $row['borrowID'].",";
    $data.= $row['memberID'].",";
    $data.= $row['penalty']."\n";
}

echo $data;
exit();

}

?>