<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">

</head>
<body>

    <!-- Navbar -->
    <nav class="shadow-sm">

        <div class="logo"><a href="main.php"><img src="img/logo1.png" alt="Logo" srcset="" width="150"  height="270"></a></div>
        <div class="title">Minimalist Library</div>

        <ul>
            <li><a href="borrow.php" class="">Borrow</a></li>
            <li><a href="return.php" >Return</a></li>
            <li><a href="book.php">Key In</a></li>
            <li>
                <a href="#">Register</a>
                <ul>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
        
            </li>
            <li><a href="request.php">Request</a></li>
            <li>
              <a href="#">Utilities</a>
              <ul>
                <li><a href="search.php">Search</a></li>
                <li><a href="fine.php">Penalty</a></li>
                <li><a href="reward.php">Reward</a></li>
                <li><a href="reminder.php">Reminder</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="backup.php">Backup</a></li>
                <li><a href="import.php">Import</a></li>
              </ul>
            </li>
            <li><a href="logout.php" onclick="return confirm('Proceed to Logout?');">Logout</a></li>
            
        </ul>

    </nav>

    
</body>
</html>