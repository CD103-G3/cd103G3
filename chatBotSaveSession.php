<?php
// ob_start();
// session_start();
try{

  $BotInfo = json_decode($_REQUEST["jsonStr"]);  //取得前端送來的json字串，並將其轉成物件

  require_once("connectBooks.php");
  $sql = "select * from chatbot where keyword=:keyword"; //要換成百分比(包含)
  $chatBot = $pdo->prepare( $sql);
  $chatBot->bindValue(":keyword", $BotInfo->keyword);
  $chatBot->execute();

  if( $chatBot->rowCount()==0){ //查無此keyword
	  echo "not found";
  }else{ //查有此keyword
    //自資料庫中取回資料
  	$BotRow = $chatBot->fetch(PDO::FETCH_ASSOC);

  	//將資訊寫入session暫存區
  	// $_SESSION["chatBot-text"] = $BotRow["content"];
  	//送出登入者的姓名資料
  	echo $BotRow["content"];
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>