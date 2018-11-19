<?php
  $dsn = "mysql:host=localhost;dbname=foodday;port=3306;charset=utf8";
  $user = "root";
  $password = "Pp0983510219";
  $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO($dsn, $user, $password, $options);
?>