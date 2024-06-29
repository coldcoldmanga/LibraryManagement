<?php 

require('../config.php');
require('memberHeader.php');
require('memberNavbar.php');

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
        .container{
            margin-top: 25px;
        }

        .row{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
    </style>

</head>
<body>

    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h2>Search the book you want to request</h2>
                <div class="input-group input-group-lg">
                <input type="text" id="request" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg: Book ID or Title">
                </div>
            </div>

            <div id = "result"></div>
        </div>
    </div>

    <script type="text/javascript">
        
        $(document).ready(function(){
            
            $("#request").keyup(function(){
                var input = $(this).val();

                if(input != ""){

                    $.ajax({

                        url:"displayRequest.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){

                            $("#result").html(data);
                        }
                    });
                }
                else{

                    $("#result");
                }

            });

        });

    </script>
    
</body>
</html>

