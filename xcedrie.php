<?php
include "vocab.php";

$dunno = "Saya tidak paham, ketik '/?' untuk mengetahui kemampuan saya";

function RNG($min,$max){
    global $ranNum;
    $ranNum = mt_rand($min,$max);
}
function RNGP(){
    global $ran0;
    global $ran1;
    $ran0 = mt_rand(0,2);
    $ran1 = mt_rand(0,2);
}

function BatuGuntingKertas(){
    global $conn;
    global $waktu;
    global $timeStamp;
    global $bgk;
    $nama = $_SESSION["nama"];

    if($_SESSION["cedHp"] >= 0 || $_SESSION["usrHp"] >= 0){
        echo("<a href='bgk/batu.php' class='bgkBtn'>Batu</a>");
        echo("<a href='bgk/gunting.php' class='bgkBtn'>Gunting</a>");
        echo("<a href='bgk/kertas.php' class='bgkBtn'>Kertas</a><br>");

        $_SESSION["ran"] = mt_rand(0,2);

        echo("<br>".$bgk[$_SESSION['ran']]."<br>");
        if($_SESSION["usrHp"] < 1){
            $endP = mysqli_real_escape_string($conn,"<span style='color: red;'>Kau kalah!</span>, haha");
            mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                    VALUES(null,'$endP','c$nama','$waktu','$timeStamp')");
            $_SESSION["status"] = "online";
            $_SESSION["usrHp"] = null;
            $_SESSION["cedHp"] = null;
            header("refresh:1");
        }
        elseif($_SESSION["cedHp"] < 1){
            $endP = mysqli_real_escape_string($conn,"<span style='color: greenyellow;'>$nama menang!</span>, selamat");
            mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                    VALUES(null,'$endP','c$nama','$waktu','$timeStamp')");
            $_SESSION["status"] = "online";
            $_SESSION["usrHp"] = null;
            $_SESSION["cedHp"] = null;
            header("refresh:1");
        }
    }
    
    
}

if(isset($_POST["wake"])){
   header("location: status.php");
}
//////////////////////////////////////////////
if($_SESSION["status"] == "online"){
    if($_SESSION["nama"] == null){
        if(isset($_POST["inBtn"])){
            $inTxt = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["text"]));
            
            if(in_array(strtolower($inTxt),$byeU)){
                $_SESSION["status"] = "shutdown";
            }
            elseif(in_array(strtolower($inTxt), $haiU)){
                RNG(0,3);
                $ppsh = $haiN[$ranNum];
            }
            elseif($inTxt == "/nama"){
                $_SESSION["status"] = "checking";
                $ppsh = "Masukkan nama anda!";
            }
            elseif($inTxt == "/?"){
                $ppsh = nl2br($help);
            }
            else {
                $ppsh = "Saya tidak paham, ketik '/?' untuk mengetahui kemampuan saya";
            }
        $ppshClass = "ppsh";
        }
    }
    elseif($_SESSION["nama"] != null){
        if(isset($_POST["inBtn"])){
            RNGP();
            $inTxt = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["text"]));
            $nama = $_SESSION["nama"];

            if(empty(trim($inTxt))){
                RNG(0,3);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$bye[$ranNum]','c$nama','$waktu','$timeStamp')");
            }
            elseif(in_array(strtolower($inTxt),$byeU)){
                RNG(0,3);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$inTxt','$nama','$waktu','$timeStamp')");
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$bye[$ranNum]','c$nama','$waktu','$timeStamp')");
                $_SESSION["status"] = "shutdown";
            }
            elseif(in_array(strtolower($inTxt),$haiU)){
                RNG(0,5);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$inTxt','$nama','$waktu','$timeStamp')");
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$hai[$ranNum]','c$nama','$waktu','$timeStamp')");
                if($ran0 == $ran1){
                    $tamS = mysqli_real_escape_string($conn, $tam[$ran0]);
                    mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$tamS','c$nama','$waktu','$timeStamp')");
                }
            }
            elseif(in_array(strtolower($inTxt),$gamU)){
                RNG(0,3);
                $gamS = mysqli_real_escape_string($conn,$gam[$ranNum]);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$inTxt','$nama','$waktu','$timeStamp')");
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$gamS','c$nama','$waktu','$timeStamp')");
            }
            elseif(in_array(strtolower($inTxt),$whoU)){
                RNG(0,3);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$inTxt','$nama','$waktu','$timeStamp')");
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$who[$ranNum]','c$nama','$waktu','$timeStamp')");
            }
            elseif($inTxt == "/?"){
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'nl2br($help)','c$nama','$waktu','$timeStamp')");
            }
            elseif($inTxt == "/bgk" || $inTxt == "/batuguntingkertas" || $inTxt == "/BatuGuntingKertas"){
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$bgkO','c$nama','$waktu','$timeStamp')");
                $_SESSION["status"] = "playing";
                $_SESSION["game"] = "bgk";
                header("refresh:0.1");
            }
            else {
                $dtxt = mysqli_real_escape_string($conn,$dunno);
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$inTxt','$nama','$waktu','$timeStamp')");
                mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$dtxt','c$nama','$waktu','$timeStamp')");
            }
        }
    }
}
elseif($_SESSION["status"] == "checking"){
    if(isset($_POST["inBtn"])){
        $nama = ucfirst(htmlspecialchars(mysqli_real_escape_string($conn,$_POST["text"])));

        if(empty(trim($nama))){
            $ppsh = "Isi namamu dengan benar!";
            return 0;
        }
        elseif(in_array(strtolower($nama),$byeU)){
            $_SESSION["status"] = "shutdown";
        }
        ///////////////////////ditambahkan disini agar terbaca///////////////////////////////////
        $greetN = array(
            "Hai $nama!\n perkenalkan aku Cedrie", "Senang bertemu denganmu $nama",
            "$nama? perkenalkan aku Cedrie", "Halo $nama apa kabarmu?"
        );
        $greetF = array(
            "Hai $nama kau kembali", "$nama? senang melihatmu lagi",
            "Oh, hai lagi $nama!", "Hari yang indah kan $nama?"
        );
        /////////////////////////////////////////////////////////////////////////////////////////
        RNG(0,2);
        $greetNS = mysqli_real_escape_string($conn, $greetN[$ranNum]);
        $greetFS = mysqli_real_escape_string($conn, $greetF[$ranNum]);

        $_SESSION["nama"] = ucfirst($nama);
        $_SESSION["status"] = "online";
        $_SESSION["sql"] = "select";

        $check = mysqli_query($conn, "SELECT nama FROM cedroom WHERE nama = '$nama'");
        if(mysqli_num_rows($check) != 0){
            mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$greetFS','c$nama','$waktu','$timeStamp')");
        }
        else{
            mysqli_query($conn,"INSERT INTO cedroom(id,teks,nama,pada,tistamp)
                                VALUES(null,'$greetNS','c$nama','$waktu','$timeStamp')");
        }
    }
}
elseif($_SESSION["status"] == "playing"){
    if(isset($_POST["inBtn"])){
        $inTxt = htmlspecialchars(mysqli_real_escape_string($conn,$_POST["text"]));

        if($inTxt == "quit"){
            $_SESSION["status"] = "online";
            header("refresh:0.1");
        }
    }
}


?>