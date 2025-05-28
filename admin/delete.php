
<?php
require('db.php');

include("auth_session.php");

    $c=$_POST['cabinTypeDe'];
if (isset($_POST['delete'])){
            $sqlC="DELETE FROM Cabin WHERE cabinType='$c'";
            $sql=mysqli_query($db,$sqlC);
            // $result=mysqli_fetch_array($sql);
            echo "Deleted $c";
}
?>
