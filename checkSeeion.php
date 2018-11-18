<?php
ob_start();
session_start();
try{
    if(isset($_SESSION['member_No']) == false ) { //無登入會員資料
      echo "not found";
    } else {
      echo $_SESSION['member_No'];
    } 
}catch(PDOException $e){
  echo $e->getMessage();
}
?>