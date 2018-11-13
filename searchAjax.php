<?php
ob_start();
session_start();
try{
  $searchInfo = json_decode($_REQUEST["jsonStr"]);  //取得前端送來的json字串，並將其轉成物件
  require_once("connectBooks.php");
  $mealGenreSql = "select * from ".$searchInfo->meal_Genre;
  $mealGenre = $pdo->query($mealGenreSql);

  while ($mealGenreRow = $meal_genre->fetch(PDO::FETCH_ASSOC)) {
    $i = 0;
    $_SESSION["mealGenre_Name"][$i] = $mealGenreRow["mealGenre_Name"];
    $i++;
  }
  $TagSql = "select * from ".$searchInfo->grouponTag;
  $grouponTag  = $pdo->query($TagSql);

  while ($grouponTagRow = $grouponTag->fetch(PDO::FETCH_ASSOC)) {
    $i = 0;
    $_SESSION["groupon_TagName"][$i] = $grouponTagRow["groupon_TagName"];
    $i++;
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>
