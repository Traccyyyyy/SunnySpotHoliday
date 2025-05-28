<?php
require('db.php');
include("auth_session.php");

$photo_dir="images/";
$photo_file=$photo_dir.basename($_FILES["photoUpload"]["name"]);
$imageType=strtolower(pathinfo($photo_file,PATHINFO_EXTENSION));
//more detailed than echo
// var_dump($_FILES);
if (isset($_POST["submit"])){
        //create variable from form value

        $cType=$_POST["cType"];
        $cDescription=$_POST["cDescription"];
        $ppn=$_POST["ppn"];
        $ppw=$_POST["ppw"];
        $photo="images/testCabin.jpg";
        //check image file real or fake
        

            if ($_FILES["photoUpload"]["size"]>0){
        $photo="images/".basename($_FILES["photoUpload"]["name"]);
      
            }

        // Send query to database
        $sqlC="INSERT INTO Cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) 
        VALUES ('$cType','$cDescription','$ppn','$ppw','$photo')";
        $sql=mysqli_query($db,$sqlC);
echo "Insert successful";
}
?>