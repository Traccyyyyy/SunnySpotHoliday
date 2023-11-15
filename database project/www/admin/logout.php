<?php
include("auth_session.php");
session_destroy();
header("Location:login.php");
exit();
?>