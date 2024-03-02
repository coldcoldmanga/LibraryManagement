<?php 

require('config.php');
require('header.php');

if(isset($_POST['generate'])){

    $start = ucwords($_POST['start']);
    $end = ucwords($_POST['end']);

    if(empty($start) || empty($end)){
      
        header("location:idCard.php");
        
    }

    else if(!preg_match('/^[A-Za-z0-9\s]{1,}$/',$start) || !preg_match('/^[A-Za-z0-9\s]{1,}$/',$end)){ ?>

            <div class="alert alert-warning" role="alert">
                <h4 class="text-center">
                    Use only alphabets and numbers!
                </h4>
            </div>

<?php	}

    else{

            $select = mysqli_query($conn, "SELECT * FROM member WHERE memberID BETWEEN '$start' AND '$end'");

            while($row = mysqli_fetch_assoc($select)){

                $img = $row['img'];
                $memberID = $row['memberID'];
                $name = $row['name'];
                $level = $row['level'];

                $output = "
                <div class='box' style='display: inline-block;'>
                                
                <div class='container' style='margin-left: 200px; margin-top: 20px; margin-bottom: 20px; border-style: solid; border-color: black; width:680px; height:275px;'>
                
                <div class='img'>
                <img src='$img' style='width: 300px; height: 250px; margin:10px;'>
                </div>

                <div class='name' style='margin-left: 330px; margin-top: -200px'>
                <h3>$name</h3>
                </div>

                <div class='id' style=' margin-left: 330px;'>
                <h2>ID: $memberID</h2>
                </div>

                <div class='level' style='margin-left: 330px;'>
                <h2>Status: $level</h2>
                </div>

                </div>   

                </div>           
                ";

                echo $output;

            }  
       }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Jquery Cdn-->
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style type="text/css">

@media print {
  #printPageButton {
    display: none;
  }
}

        .fab-container{

            position: fixed;
            bottom: 50px;
            right: 50px;
            z-index: 999;
            cursor: pointer;

        }

        .fab-container-back{

        position: fixed;
        bottom: 150px;
        right: 50px;
        z-index: 999;
        cursor: pointer;

}

        .fab-icon-holder{
            width: 75px;
            height: 75px;
            border-radius: 100%;
            background: #9A76C5;

            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        .fab-icon-holder:hover{
            background: #9A76C5;
            opacity: 0.8;
        }

        .fab-icon-holder i{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            font-style: 25px;
            color: #faf3fc;
            font-size: 30px;
        }


    </style>

</head>
<body>

    <div class="fab-container">
        <button class="fab-icon-holder btn" id="printPageButton" onclick="window.print();">
        <i class="bi bi-printer-fill"></i>
    </button>
    </div>

    <div class="fab-container-back">
        <a class="fab-icon-holder btn" id="printPageButton" href="main.php">
        <i class="bi bi-house-fill"></i>
    </a>
    </div>
    
</body>
</html>