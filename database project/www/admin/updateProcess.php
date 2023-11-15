<?php
require('db.php');
include("auth_session.php");

$photo_dir="images/";
$photo_file=$photo_dir.basename($_FILES["photoUpload"]["name"]);
$imageType=strtolower(pathinfo($photo_file,PATHINFO_EXTENSION));
$cabinToUpdate=$_SESSION['cabinTypeUp'];

if (isset($_POST["submit"])){
        //create variable from form value
        if ($_POST["cType"]>0){
            $cType="cabinType='".$_POST['cType']."'";
        // Send query to database
            $sqlC=" UPDATE Cabin SET $cType WHERE cabinType='$cabinToUpdate'";
            $sql=mysqli_query($db,$sqlC);
            echo "Cabin Type Updated<br/>";
        }
        if ($_POST["cDescription"]>0){
            $cDescription="cabinDescription='".$_POST['cDescription']."'";
            $sqlC=" UPDATE Cabin SET $cDescription WHERE cabinType='$cabinToUpdate'";
            $sql=mysqli_query($db,$sqlC);
            echo "Cabin Description Updated<br/>";
        }
        if ($_POST["ppn"]>0){
            $ppn="pricePerNight='".$_POST['ppn']."'";
            $sqlC=" UPDATE Cabin SET $ppn WHERE cabinType='$cabinToUpdate'";
            $sql=mysqli_query($db,$sqlC);
            echo "Price Per Night Updated<br/>";
        }
        if ($_POST["ppw"]>0){
            $ppw="pricePerWeek='".$_POST['ppw']."'";
            $sqlC=" UPDATE Cabin SET $ppw WHERE cabinType='$cabinToUpdate'";
            $sql=mysqli_query($db,$sqlC);
            echo "Price Per Week Updated<br/>";
        }
        if ($_FILES["photoUpload"]["size"]>0){
            $photo="photo='basename(".$_FILES["photoUpload"]["name"]."'";   
            $sqlC=" UPDATE Cabin SET $Photo WHERE cabinType='$cabinToUpdate'";
            $sql=mysqli_query($db,$sqlC);
            echo "Photo Updated<br/>";
        }

echo "<script>setTimeout(function(){ window.location.href = 'adminMenu.php'; }, 1000);</script>";
}

exit;
?>