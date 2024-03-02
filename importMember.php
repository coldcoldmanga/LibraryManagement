<?php   

require('config.php');


if(isset($_POST['member'])){

    $file = $_FILES["importMember"]["tmp_name"];
    $file_open =fopen($file,"r");
    
    while(($csv = fgetcsv($file_open,1000,",")) !== false){

        $memberID = $csv[0];
        $name = ucwords($csv[1]);
        $class = ucwords($csv[2]);
        $level = ucwords($csv[3]);
        $telephone = $csv[4];
        $email = $csv[5];
        $password = $csv[6];
        $penalty = $csv[7];

        mysqli_query($conn, "INSERT INTO member VALUES ('$memberID','$name','$class','$level','$telephone', '$email', '$password', '$penalty')"); 
 
 }
}

?>