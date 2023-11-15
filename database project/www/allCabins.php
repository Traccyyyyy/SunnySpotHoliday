<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Accommodation</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- header area -->
<div id="header1">
  <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="allCabins.php">Accommodation</a></li>
        <li><a href="Contact.html">Contact Us</a></li>
        <li><a href="admin/login.php">Admin</a> </li>
        </ul>
  </nav>
  <header> 
    <div>
      <img src="images/accommodation.png" alt="Accommodation">
      <h1>Sunny Spot Holidays</h1>
    </div>
    <h2>Accommodation</h2>
  </header>
</div>
<div id="wrapper">

  <section>
    <?php
    // connect database
    require('admin/db.php');
    // Send query to database
    $sqlC="SELECT * FROM Cabin";
    $sql=mysqli_query($db,$sqlC);
    // Push result to array and loop through all cabin.
    while ($row=mysqli_fetch_array($sql)){
        // echo relative info to html tags.
        echo  "<article><h2>".$row['cabinType']."</h2>";
        echo "<img src='".$row['photo']."' alt='".$row['cabinType']."'>";
        echo "<p><span>Details: </span>".$row['cabinDescription']."</p>";
        echo "<p><span>Price per night: </span>".$row['pricePerNight']."</p>";
        echo "<p><span>Price per week: </span>".$row['pricePerWeek']."</p></article>";
    }
    ?>
  </section>

  
  <footer> 
    <ul>
<li>&copy;SunnySpot Holidays, 2000-2023</li>
<li><a href="privacy.html">Privacy</a></li>
<li><a href="admin/login.php">Admin</a> </li>

    </ul>
  </footer>
</body>
</html>
<!-- resource from sunny spot -->