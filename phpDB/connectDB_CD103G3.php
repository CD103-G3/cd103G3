<?php

    $db = 'mysql:host=localhost;port=3306;dbname=cd103g3;charset=utf8';
    $user = 'cd103g3';
    $ps = 'cd103g3';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($db, $user,$ps, $options);

    // echo 'connect successful';
?>