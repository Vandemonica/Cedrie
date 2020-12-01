<?php
session_start();
$damage = mt_rand(9,20);

if($_SESSION["ran"] == 0){
    $_SESSION["pesan"] = "Kalian berdua saling bertahan tanpa menyerang";
}
elseif($_SESSION["ran"] == 1){
    $_SESSION["pesan"] = "Pertahananmu terlalu kuat bagi Cedrie";
    $_SESSION["cedHp"] -= $damage;
}
elseif($_SESSION["ran"] == 2){
    $_SESSION["pesan"] = "Cedrie terlalu cepat bagimu";
    $_SESSION["usrHp"] -= $damage;
}
header("location:/cedova/random/index.php");
?>