<?php 

include("header.php");

//logout
session_unset();
session_destroy();
header("Location: login.php");
exit;
