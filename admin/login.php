<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet" type="text/css">
    <title>Admin Login</title>
</head>
<body>

    
    <!-- header area -->
    <div id="header1">
    <nav>
      <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../allCabins.php">Accommodation</a></li>
        <li><a href="../Contact.html">Contact Us</a></li>
        <li><a href="login.php">Admin</a> </li>
        </ul>
      </nav>
  <header> 
    <div>
    <img src="../images/accommodation.png" alt="Accommodation">
    <h1>Sunny Spot Holidays</h1>
  </div>
      <h2>Admin</h2>
  </header>
</div>
<div id="wrapper">
<div id="inner-wrapper">
<?php
require("db.php");
session_start();
//check user name and password and create session on submit.
if (isset($_POST['username'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $sqlU="SELECT * FROM Admin where userName='$username'";
    //check username exist or die
    $sql=mysqli_query($db,$sqlU);
    if (mysqli_num_rows($sql)>0){   
    //get username details row from database, fetch as array
    $check=mysqli_fetch_assoc($sql);
    $userPassword=$check['password'];
    //check password
        if ($password===$userPassword){
            $_SESSION['username']=$username;
            header("Location:adminMenu.php");
        }else{
            //error message 
            echo "
            <div class='form'>
                <h3>Wrong name or password.<br/> Please try again.</h3>
                <p>CLick here to <a href='login.php'>login</a>again.</p>
            </div>";
        }
    } else
        {
            //username not exist;
             echo "Something went wrong";}
}else{
    ?>
    <!-- login form -->
    <h2>Admin Login </h2>
<form class="form" method="post" id="login">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <button type="submit" name="login">LOGIN</button>
    </div>
</form>
<?php
}
?>
</div>
</div>

<footer> 
      <ul>
    <li><a href="../allCabins.php">Homepage</a> </li>
      </ul>

  </footer>
  </body>
</html>