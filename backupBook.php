<?php 

require('config.php');

if(isset($_POST['book'])){

    $date = date("Y/m/d");

    @header("Content-Disposition: attachment; filename= BookBackup_$date.csv");

    $data = '';

    $book = mysqli_query($conn, "SELECT * FROM book");

    while($row = mysqli_fetch_assoc($book)){

        $data.= $row['bookID'].",";
        $data.= $row['title'].",";
        $data.= $row['author'].",";
        $data.= $row['publisher'].",";
        $data.= $row['type'].",";
        $data.= $row['price'].",";
        $data.= $row['ISBN'].",";
        $data.= $row['datetime'].",";
        $data.= $row['stats']."\n";
    }

    echo $data;
    exit();
}

?>