<?php
//include session start php code;
include("auth_session.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Admin </title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- header area -->
    <div id="header1">
<nav>
  <ul>
  <li><a href="adminMenu.php">Admin Menu</a> </li>
  <li><a href="update_delete.php">Update and Delete</a> </li>
   <li><a href="insertCabin.php">Insert</a> </li>
  <li><a href="logout.php">Log Out</a> </li>
  </ul>
</nav>
  <header> 
    <div>
    <img src="../images/accommodation.png" alt="Accommodation">
    <h1>Sunny Spot Holidays</h1>
  </div>
  </header>
</div>


<h3>Hi, <?php echo $_SESSION['username'];?> </h3>
  <section>
    <ul>
    <li><a href="insertCabin.php">Insert a new cabin.</a></li>
    <li><a href="update_delete.php">Update or delete a Cabin</a></li>
    </ul>
  </section>
  
  <footer> 
    <li></li><a href="../allCabins.php">Homepage</a> 
  </footer>
</body>
</html>