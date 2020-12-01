<?php
date_default_timezone_set('Asia/Jakarta');
$timeStamp = date('Y-m-d H:i:s');
$waktu = date('d-M-Y h:ia');

/*
$host = "localhost";
$user = "id15455753_cyannya";
$pass = "Ivani 1828";
$datb = "id15455753_cyanyadb";

$connect = mysqli_connect($host, $user, $pass, $datb);
*/

$host = "localhost";
$user = "root";
$pass = "";
$datb = "disdb";

$conn = mysqli_connect($host, $user, $pass, $datb);
//echo($waktu);
?>