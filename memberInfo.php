
<?php
if(isset($_SESSION["member_Id"])){
	$memId = $_SESSION["member_Id"];
	try{
		require_once("connectMember.php");
		$sql = "select * from member where member_Id = '$memId'";
		$member = $pdo -> query( $sql );
		  if( $member->rowCount() != 0){
			$memRow = $member->fetchObject();
			// echo $memRow->member_Id, ", 您好~~ <br>";
			//登入成功, 寫入session
			$_SESSION["member_No"] = $memRow->member_No; // 會員編號
			//是否從別支程式跳轉過來
			//   print_r($memRow);
			?>
			<div>
				<a href="member.php">
					<img src="images/<?php echo $memRow->member_Pic?>" alt="member-Pic" class="member-Pic">
				</a>
			</div>
			<div>
				<span><img src="images/icon/riceball_white.svg" width="30" alt="achievement-Pic" class="achievement-Pic"><?php echo $memRow->member_buyCount ?> </span><br>
				<span><?php echo $memRow->member_Nick ?></span>
			</div>
	
			<?php
	
		  }
	  }catch(PDOException $ex){
		echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
		echo "行號：",$ex->getLine(),"<br>";
	  }
}else{
	?>

		<div>
				<a href="member.php">
					<img src="images/" alt="member-Pic" class="member-Pic">
				</a>
		</div>
		<div>
			<span><img src="images/icon/riceball_white.svg" width="30" alt="achievement-Pic" class="achievement-Pic"></span><br>
			<span></span>
		</div>
	<?php
}
?>



