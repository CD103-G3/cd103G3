<?php
    $db = 'mysql:hostname=loclhost;dbname=cd103g3;charset=utf8';
    $user = 'root';
    $ps = 'Pp0983510219';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($db, $user,$ps, $options);

    // echo 'connect successful';
?>