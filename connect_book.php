<?php   
         
    $dsn = "mysql:host=127.0.0.1;dbname=cd103g3;port=3306;charset=utf8";
    $user = "root";
    $password = "1113";
    $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);

?>