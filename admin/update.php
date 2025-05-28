<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Update a cabin </title>
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
  <?php
  require('db.php');
  include("auth_session.php");

  $_SESSION['cabinTypeUp'] = $_POST['cabinTypeUp'];
  ?>
  <form action="updateProcess.php" method="POST" onsubmit="return;check();" enctype="multipart/form-data">
    <h2>Cabin to update <?php echo $_SESSION['cabinTypeUp']; ?></h2>
    <p>Please enter details to update.</p>
    <label for="cType">Cabin Type<input type="text" name="cType" id="cType"></label>
    <label for="cDescription">Cabin description<input type="text" name="cDescription" id="cDescription"></label>
    <label for="ppn">Price per night<input type="number" name="ppn" id="ppn" min="0"></label>
    <label for="ppw">Price per week<input type="text" name="ppw" id="ppw" min="0"></label>
    <label for="photoUpload">Photo<input type="file" name="photoUpload" id="photoUpload" accept="image/*"></label>
    <input type="submit" name="submit">
    <script>
      function check() {
        if (document.getElementById("ppn").value * 5 < parseInt(document.getElementById("ppw").value)) {
          alert("Price per week cannot be more than five time price per night!");
        }
      }
    </script>
  </form>
  <footer>
    <ul>
      <li><a href="../allCabins.php">Homepage</a> </li>
      <li><a href="adminMenu.php">Admin Menu</a> </li>
    </ul>

  </footer>
</body>

</html>