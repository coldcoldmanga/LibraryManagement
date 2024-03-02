<?php 

require('config.php');

if(isset($_POST['member'])){

$date = date("Y/m/d");

@header("Content-Disposition: attachment; filename= MemberBackup_$date.csv"); 

$data = '';

$member = mysqli_query($conn, "SELECT * FROM member");

while($row = mysqli_fetch_assoc($member)){

    $data.= $row['memberID'].",";
    $data.= $row['img'].",";
    $data.= $row['name'].",";
    $data.= $row['class'].",";
    $data.= $row['level'].",";
    $data.= $row['telephone'].",";
    $data.= $row['email'].",";
    $data.= $row['password'].",";
    $data.= $row['penalty']."\n";
}

echo $data;
exit();

}

?>