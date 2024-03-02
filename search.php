<?php 

require('config.php');
require('header.php');
require('footer.php');
include('navbar.php');  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Jquery Cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <style type="text/css">

        .book{
           margin-top: 150px;
           margin-left:350px
        }

        .member{
           margin-top: 100px;
           margin-left: 350px;
          
        }

    </style>

</head>
<body>
<div class="container text-center">
    <div class="row">
        <div class="col-12 book">
            <h2>Related to Books</h2>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><a href="main.php"><i class="bi bi-house-fill" style="margin-right: 10px;  color:black; font-size: 25px;"></i></a>Search For Books</span>
                <input type="text" id="live-search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg: Book Title or Author">
        </div>
        </div>
        
        <div id="searchResult"></div>
    
        
        

        <div class="col-12 member">
            <h2>Member's Borrowing Record</h2>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><a href="main.php"><i class="bi bi-house-fill" style="margin-right: 10px;  color:black; font-size: 25px;"></i></a>For Borrowing Record</span>
                <input type="text" id="live-searchStudent" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg: Member ID">
            </div>
        </div>
        <div id="searchResultStudent"></div>
    </div>
</div>
    

<script type="text/javascript">
//Book Section
    $(document).ready(function(){

        $("#live-search").keyup(function(){
            var input = $(this).val();
            //alert(input);

            if(input != ""){

                $.ajax({

                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){

                        $("#searchResult").html(data);
                    }

                });
            }

            else{

                $("#searchResult");
            }
        })

    });

//Student Section
$(document).ready(function(){

$("#live-searchStudent").keyup(function(){
    var input = $(this).val();
    //alert(input);

    if(input != ""){

        $.ajax({

            url:"livesearchStudent.php",
            method:"POST",
            data:{input:input},

            success:function(data){

                $("#searchResultStudent").html(data);
            }

        });
    }

    else{

        $("#searchResultStudent");
    }
})

});


    </script>
    
</body>
</html>