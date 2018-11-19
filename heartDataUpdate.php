<?php

ob_start();
session_start();

try{
  require_once('phpDB/connectDB_CD103G3.php');

  if($_POST["mealState"]=="false"){ //會員是否收藏過此餐點

      //新增
      $sql = "INSERT INTO membercoll (member_No, meal_No) 
              VALUES(:member_No, :meal_No)";

      $member = $pdo->prepare( $sql);
      $member->bindValue(":member_No", $_SESSION["member_No"]);
      $member->bindValue(":meal_No", substr($_POST["mealNo"], 2));
      $member->execute();

  }else{  

    //刪除
    $sql = "DELETE FROM membercoll  
            WHERE member_No = :member_No && meal_No = :meal_No";

    $member = $pdo->prepare( $sql);
    $member->bindValue(":member_No", $_SESSION["member_No"]);
    $member->bindValue(":meal_No", substr($_POST["mealNo"], 2));
    $member->execute();

  };
    


}catch(PDOException $e){
  echo $e->getMessage();
}
?>

