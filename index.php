<?php
session_start();
ob_start();
if(!isset($_SESSION["status"])){
    $_SESSION["status"] = "offline";
}
if(!isset($_SESSION["nama"])){
    $_SESSION["nama"] = null;
}
if(!isset($ppsh)){
    $ppsh = null;
}
if(!isset($ppshClass)){
    $ppshClass = "ppshN";
}

///////////////////////////////

if($_SESSION["status"] == "playing"){
    $gameClass = "game";
}
else{
    $gameClass = "gameN";
}

///////////////////////////////



///////////////////////////////
include "database.php";
include "xcedrie.php";

if(!isset($_SESSION["sql"])){
    $sql = mysqli_query($conn,"SELECT * FROM emptytb");
}
elseif($_SESSION["sql"] == "select"){
    $nama = $_SESSION["nama"];
    $sql = mysqli_query($conn,"SELECT * FROM cedroom WHERE nama = '$nama' OR nama = 'c$nama' ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Cedrie.css">
    <title>Cedrie</title>
</head>
<body>
    <div>
    <form method="POST">
        <div class="label">
            <a class="ced">Cedrie -Bot-</a>
            <button class="wake" type="submit" name="wake">Wake</button><br>
            <a class="<?=$_SESSION['status'];?>"><?=$_SESSION["status"];?></a>
        </div>
        <div class="output">
            <p class="<?=$ppshClass;?>"><?=$ppsh;?></p>
<!--------------------------------------------------------------------------------->
        <div class="<?=$gameClass;?>">
            <?php if($_SESSION["status"] == "playing"):?>
                <p class="cedChat">Cedrie Hp:<?=$_SESSION["cedHp"];?></p>
                <?php if($_SESSION["game"] == "bgk"){
                        if(!isset($_SESSION["usrHp"])){
                            $_SESSION["cedHp"] = 100;
                            $_SESSION["usrHp"] = 100;
                            $_SESSION["pesan"] = null;
                        }
                            BatuGuntingKertas();
                        }   
                ?>
                <p class="userChat"><?=$nama;?> Hp:<?=$_SESSION["usrHp"];?></p>
                <p class="<?=$gameClass;?>"><?=$_SESSION["pesan"];?></p>
            <?php endif;?>
        </div>
<!--------------------------------------------------------------------------------->
            <?php while($result = mysqli_fetch_assoc($sql)):?>
                <?php
                    if($result["nama"] == "c$nama"){
                        $class = "cedChat";
                    }
                    elseif($result["nama"] == "$nama"){
                        $class = "userChat";
                    }
                ?>
            <p class="<?=$class;?>"><?=nl2br($result["teks"]);?>
                    <br><span class="pada"><?=$result["pada"];?></span>
            </p>
            <?php endwhile;?>
        </div>
        <div class="input">
            <textarea class="textIn" name="text"></textarea>
            <button class="inBtn" type="submit" name="inBtn">>></button>
        </div>
    </form>
    </div>
</body>
</html>
<?php
if($_SESSION["status"] == "shutdown"){
    sleep(2);
    $_SESSION["status"] = "offline";
    session_destroy();
    session_unset();
    header("refresh: 2");
}
?>