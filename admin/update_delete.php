<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert a new cabin</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
<div id="wrapper">
  <h2>Choose Update or Delete</h2>
  <div id="inner-wrapper">
<?php
require('db.php');
include("auth_session.php");
// Send query to database
$sqlC="SELECT * FROM Cabin";
$sql=mysqli_query($db,$sqlC);
// Push result to array and loop through all cabin.

while ($row=mysqli_fetch_array($sql)){
  // echo relative info to html tags.
  echo "<article><h3>".$row['cabinType']."</h3>";
  echo "<img src='../".$row['photo']."' alt='".$row['cabinType']."'>";
  echo "<p><span>Details: </span>".$row['cabinDescription']."</p>";
  echo "<p><span>Price per night: </span>".$row['pricePerNight']."</p>";
  echo "<p><span>Price per week: </span>".$row['pricePerWeek']."</p>";
  echo "<form action='update.php' method='POST'>";
  echo "<input type='hidden' name='cabinTypeUp' value='".$row['cabinType']."'>";
  echo "<input type='submit' name='Update' value='Update'>";
  echo "</form>";
  echo "<form action='delete.php' method='POST'>";
  echo "<input type='hidden' name='cabinTypeDe' value='".$row['cabinType']."'>";
  echo "<input type='submit' name='delete' value='Delete'>";
  echo "</form></article>";
  
}
?>

</div>
</div>

<footer> 
  <ul>
    <li><a href="../allCabins.php">Homepage</a> </li>
    <li><a href="adminMenu.php">Admin Menu</a> </li>
      </ul>

  </footer>
  </body>
</html>