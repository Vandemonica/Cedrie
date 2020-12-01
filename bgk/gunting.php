<?php
session_start();
$damage = mt_rand(9,20);

if($_SESSION["ran"] == 0){
    $_SESSION["pesan"] = "Pertahanan Cedrie terlalu kuat";
    $_SESSION["usrHp"] -= $damage;
}
elseif($_SESSION["ran"] == 1){
    $_SESSION["pesan"] = "Pertarungan pedang kalian hebat, tapi tidak ada yang jatuh";
}
elseif($_SESSION["ran"] == 2){
    $_SESSION["pesan"] = "Kau menebas sayap Cedrie";
    $_SESSION["cedHp"] -= $damage;
}
header("location:/cedova/random/index.php");
?>