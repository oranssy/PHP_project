<?php
    $host = "localhost";
    $user = "earth52";
    $pass = "love25r!";
    $db = "earth52";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");


    // 연결 확인용 (글자가 화면 왼쪽 모서리에 뜹니다.)

    if(mysqli_connect_errno()){
        echo "Database Connect False";
    } else {
        echo "Database Connect True";
    }
?>