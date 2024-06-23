<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@500&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Noto Sans SC', sans-serif;
}

body{
    background: #f2f2f2;
    background-image:url();
    background-size: cover;
}

nav{
    position: sticky;
    background:#9A76C5;
    z-index: 1;
    height: 90px;
}

nav:after{
    content:'';
    z-index: 1;
    clear:both;
    display:table;
}

nav .logo{

    float:left;
    margin-left:24px;
    margin-top: -80px;
}

nav .title{
    
    float:left;
    color:#faf3fc;
    font-size:40px;
    font-weight: 600;
    line-height:85px;
    margin-left:0px;
}

nav ul{
    float:right;
    list-style:none;
    margin-right:40px;
    position:relative;

}

nav ul li{
    float:none;
    display:inline-block;
    background:none;
    margin:0 5px;
    padding-top: 5px;;
}

nav ul li a{

    color:#faf3fc;
    text-decoration:none;
    line-height:75px;
    font-size:22px;
    z-index: 1;
    font-weight: 600;
    padding:8px 15px;
    width:100px;

}

nav ul li a:hover{

color:#cadefc;
border-radius:5px;
box-shadow: 0 0 5px #cadefc,
            0 0 5px #cadefc;
}

nav ul ul li a:hover{

    color:#cadefc;
    box-shadow: none;
}

nav ul ul{

    position:absolute;
    top:100px;
    opacity:0;
    visibility: hidden;
    transition: top .3s;
}

nav ul li:hover > ul{

    top: 80px;
    opacity:1;
    z-index: 1;
    background:#9A76C5;
    visibility:visible;
} 

nav ul ul li{
    
    position: relative;
    margin:0px -50px 0px -30px;
    width:180px;
    z-index: 1;
    float:none;
    display:list-item;
    border-bottom: solid rgba(#E6E6FA);
}

nav ul ul li a{

    line-height:50px;
}


    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="shadow-sm">

        <div class="logo"><a href="memberPage.php"><img src="img/logo1.png" alt="Logo" srcset="" width="150"  height="270"></a></div>
        <div class="title">Minimalist Library</div>

        <ul>
            <li><a href="Memberrequest.php">Request</a></li>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="memberLogout.php" onclick="return confirm('Proceed to Logout?');">Logout</a></li>
            
        </ul>

    </nav>

    
</body>
</html>