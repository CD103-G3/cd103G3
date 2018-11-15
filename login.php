<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>
<body>
<?php
$memId = $_POST["memId"];
$memPsw = $_POST["memPsw"];
try{
	$dsn = "mysql:host=localhost;port=3306;dbname=cd103g3;charset=utf8";
				$user = "Ben";
				$password = "nagi60303";
				$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
				$pdo = new PDO($dsn, $user, $password, $options);
	$sql = "select * from member where member_Id = '$memId' and member_Psw = '$memPsw'";
	$member = $pdo -> query( $sql );
    if( $member->rowCount() == 0){
    	echo "帳密錯誤, 請<a href='login.html'>重新輸入</a>";
    }else{
    	$memRow = $member->fetchObject();
    	echo $memRow->member_Nick, ", 您好~~ <br>";
        //登入成功, 寫入session
          $_SESSION["memNo"] = $memRow->member_No;
          $_SESSION["memId"] = $memRow->member_Id;
          $_SESSION["memName"] = $memRow->member_Nick;
          $_SESSION["email"] = $memRow->email;
        //是否從別支程式跳轉過來
          if(isset($_SESSION["where"]) == true){
            $where = $_SESSION["where"];
            unset( $_SESSION["where"]);
            header("location:$where");
          }
    }
}catch(PDOException $ex){
	echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
	echo "行號：",$ex->getLine(),"<br>";
}
?>	

<a href="dishes.php">菜色一覽</a>  
</body>
</html>