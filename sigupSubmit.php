<?php
ob_start();
session_start();
try{
 $loginInfo = json_decode($_REQUEST["jsonStr"]);  //取得前端送來的json字串，並將其轉成物件
  require_once("connectBooks.php");

  $sql = "select * from member where member_Id=:member_Id " ;
  $member = $pdo->prepare($sql);
  $member->bindValue(":member_Id", $loginInfo->member_Id);
  $member->execute();

  if( $member->rowCount()==0){ //查無此人
    $sqlInto = "insert into member ( member_Id,member_Psw,member_Nick,email) 
        values(:member_Id, :member_Psw, :member_Nick, :email)" ;
    $memberInto = $pdo->prepare($sqlInto);
    $memberInto->bindValue(":member_Id", $loginInfo->member_Id);
    $memberInto->bindValue(":member_Psw", $loginInfo->member_Psw);
    $memberInto->bindValue(":member_Nick", $loginInfo->member_Nick);
    $memberInto->bindValue(":email", $loginInfo->email);
    $memberInto->execute();
    //自資料庫中取回資料
    $sqlCall = "select * from member where member_Id=:member_Id" ;
    $memberCall = $pdo->prepare($sqlCall);
    $memberCall->bindValue(":member_Id", $loginInfo->member_Id);
    $memberCall->execute();
    $memRow = $memberCall->fetch(PDO::FETCH_ASSOC);

    //將登入者的資訊寫入session暫存區
    $_SESSION["member_No"] = $memRow["member_No"]; //會員編號
    $_SESSION["member_Id"] = $memRow["member_Id"]; //會員帳號
    $_SESSION["member_Psw"] = $memRow["member_Psw"]; //會員密碼
    $_SESSION["member_Nick"] = $memRow["member_Nick"]; //會員暱稱
    $_SESSION["email"] = $memRow["email"];  //會員信箱
    $_SESSION["mobile"] = $memRow["mobile"];  //會員電話
    $_SESSION["member_Pic"] = $memRow["member_Pic"];  //會員大頭貼
    $_SESSION["member_Bonus"] = $memRow["member_Bonus"];  //會員購物金
    $_SESSION["member_buyCount"] = $memRow["member_buyCount"];  //會員購買數量
    setcookie("member_No", $memRow["member_No"], time() + 600);
    setcookie("member_Id", $memRow["member_Id"], time() + 600);
    setcookie("member_Psw", $memRow["member_Psw"], time() + 600);
    setcookie("member_Nick", $memRow["member_Nick"], time() + 600);
    setcookie("email", $memRow["email"], time() + 600);
    setcookie("member_Pic", $memRow["member_Pic"], time() + 600);
    setcookie("member_Bonus", $memRow["member_Bonus"], time() + 600);
    setcookie("member_buyCount", $memRow["member_buyCount"], time() + 600);
    //送出登入者的姓名資料
    echo "not found".','.$memRow["member_Nick"].','.$memRow["member_Pic"].','.$memRow["member_buyCount"]; 
    // echo 'not found'; //會員大頭貼
  }else{ //註冊失敗
    echo 'hasMember';
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>