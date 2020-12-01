<?php
session_start();
$damage = mt_rand(9,20);

if($_SESSION["ran"] == 0){
    $_SESSION["pesan"] = "Kau terlalu cepat bagi Cedrie";
    $_SESSION["cedHp"] -= $damage;
}
elseif($_SESSION["ran"] == 1){
    $_SESSION["pesan"] = "Sayapmu terpotong dan kau terjatuh";
    $_SESSION["usrHp"] -= $damage;
}
elseif($_SESSION["ran"] == 2){
    $_SESSION["pesan"] = "Kalian terbang ke angkasa, seri";
}
header("location:/cedova/random/index.php");
?>