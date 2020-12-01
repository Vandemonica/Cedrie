<?php
$user = $_SESSION["nama"];

$haiN = array(
    "Hai, bagaimana saya boleh memanggil anda?",
    "Apa kabar, bisa beritahu nama anda?",
    "Bolehkah kah saya tau ini siapa?",
    "Umm.. apakah kita pernah bertemu?"
);
$help =
    "Berikut hal-hal yang bisa saya lakukan\n
    1. Merespon beberapa macam 'hai'.

    2. Game! (hanya satu) yakni: '/BatuGuntingKertas' atau '/bgk'.

    3. Untuk menghapus sesi anda bisa masukan beberapa macam ucapan 'selamat tinggal'.

    4. Mengingat namamu dan menyimpannya ke database (untuk mengaktifkan ketik '/nama' lalu masukkan nama anda).
    
    dan mungkin ada lagi dimasa mendatang.

    *note: Masukan nama untuk mengaktifkan fitur penuh
    ";
$who = array(
    "Aku? aku Cedrie", "Namaku Cedrie", "Sebut saja Cedrie",
    "Perkenalkan aku Cedrie"
);
$hai = array(
    "Hey ya!", "hai ^_^", "Hai $user", "Ada perlu apa $user?",
    "Umm....?", "Oh hai $user"
);
$bye = array(
    "Kau mau pergi?.. \nbaiklah", "Okay aku pergi", 
    "Jumpa lagi $user", "ByeBye $user"
);
$gam = array(
    "$user mau main denganku? \n kau bisa cek <span style='color: yellowgreen; font-weight: bold;'>'/?'</span> untuk melihat fiturku",
    "Yay kau mau permainan? \n<span style='color: yellowgreen; font-weight: bold;'>'/?'</span> untuk melihat list permainan",
    "Bermain?.. tentu! <span style='color: yellowgreen; font-weight: bold;'>'/?'</span> untuk mencari permainan",
    "Jadi $user mau permainan? aku punya beberapa di <span style='color: yellowgreen; font-weight: bold;'>'/?'</span>"
);
$tam = array(
    "Bagaimana harimu $user?",
    "Apa kau sedang senggang $user? \nJangan lupa selesaikan tugas dan kewajibanmu!",
    "Hari ini aku sangat bersemangat! \nbagaimana denganmu $user?",
    "^_^"
);
$bgk = array(
    "Cedrie menyiapkan kuda-kuda",
    "Cedrie mengasah pedangnya",
    "Cedrie lebih ringan dari angin"
);
$bgkO =
    "Ini adalah permainan Batu Gunting Kertas dengan sentuhan RPG\n
    Kuharap kau suka";

/////////////////////////////////////////////////////////////
$haiU = array(
    "hai", "hello", "hi", "hei", "hey", "hullo", "hulo", "hay",
    "heyhey", "hey ya", "heya", "halo", "hallo", "haihai", "heihei"
);
$byeU = array(
    "bye", "dadah", "good bye", "byebye", "selamat tinggal",
    "mati", "offlinelah", "sudah dulu", "bye bye", "aku pergi",
    "pergi offline", "tidurlah"
);
$whoU = array(
    "siapa kau", "tentang kau", "perkenalkan dirimu", "dirimu", "kau",
    "engkau", "u", "you", "about you", "who are you"
);
$gamU = array(
    "game", "permainan", "aku mau game", "mau game",
    "ada game?", "ada game", "bermain", "bermain bersama",
    "bermain bersamamu", "main", "play", "play game",
    "ayo bermain", "ayo main", "lets play",
);
?>