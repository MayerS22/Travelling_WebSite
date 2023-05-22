<?php

$conn = mysqli_connect('localhost', 'root', '', 'user_db');

    
?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Travelopedia</title>

    <link rel="stylesheet" href="../css.css">
    


</head>

<body>

    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>T</span>ravelopedia</a>

        <nav class="navbar">
            <i>Welcome Admin</i>
            <a href="admin_booking_page/books.php">books </a>
            <a href="admin_trips_page/trips.php">Trips</a>
            <a href="admin_travels_page/travels.php">Travels</a>
            <a href="logOut.php" >Log out</a>
        </nav>
    </header>

    <script src="js.js"></script>

</body>

</html>