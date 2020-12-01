<?php
session_start();
$_SESSION["status"] = "online";

header("location: index.php");
?>