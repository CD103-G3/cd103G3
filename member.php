<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>會員中心</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" >
	<link rel="stylesheet" href="css/member.css">
</head>
<body onresize="myFunction()">

	<?php
		require_once("nav.php");
	?>

	<div class="member">
		<div class="member-list">
			<div class="member-list-item">
				<label class="member-Pic-box" for="upFile">
					<input type="file" id="upFile" name="upFile" accept="image/*">
					<img src="images/icon/user.svg" alt="member-Pic" title="會員頭像" class="member-Pic" id="member-Pic">
					<span class="member-camera"></span>
				</label>
				<script>
					window.addEventListener("load",function(){
						document.getElementById("upFile").onchange = function(e){
							var file = e.target.files[0];
							var reader = new FileReader();
							reader.onload = function(){
								document.getElementById("member-Pic").src = reader.result;
							}

							reader.readAsDataURL(file);
						};
					}, false);	
				</script>
				<button>修改頭像</button>
				<p class="member-list-item-contain">
					<span>  
						<img src="images/icon/user.svg" alt="member-Id" title="帳號" class="mem-icon">
						abcde
						<!-- ?php echo $memRow->member_Id ?>	 -->
					</span>
					<span>
						<img src="images/icon/money.svg" alt="member-Bonus" title="購物金" class="mem-icon">
						1552
						<!-- ?php echo $memRow->member_Bonus ?>	 -->
					</span>
					<span>
						<img src="images/icon/mobile.svg" alt="mobile" title="手機" class="mem-icon">
						0123456789
						<!-- ?php echo $memRow->mobile ?>	 -->
					</span>
				</p>
			</div>
			
			<div class="member-panel">	
				<label for="member-Information-radio">會員資料</label>
				<label for="member-Order-radio">訂餐紀錄</label>
				<label for=""><a href="javascript:void(0)">飯團查詢</a></label>
				<label for="member-Achievement-radio">我的成就</label>
				<label for=""><a href="javascript:void(0)">我的收藏</a></label>
			</div>
		</div>

		<div class="member-contain">
			
			<input type="radio" name="member-panel-radio" id="member-Information-radio" checked>	
			<div class="member-Information">

				<h2>基本資料</h2>
				<form action="">
					<table class="member-content">
						<tr>
							<td><label for="member-nickname">暱稱</label></td>
							<td>
								<input type="text" id="member-nickname" name="membId">
								<label for="member-nickname">請輸入暱稱</label>
							</td>
						</tr>
						<tr>
							<td><label for="member-email">E-mail</label></td>
							<td>
								<input type="email" id="member-email" name="memEmail">
								<label for="member-email">例:a123456@gmail.com</label>
							</td>
						</tr>
						<tr>
							<td><label for="member-tel">手機</label></td>	
							<td>
								<input type="tel" id="member-tel" name="memTel">
								<label for="member-tel">例:0987654321</label>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit">資料修改</button></td>
						</tr>
					</table>	
				</form>

				<h2>密碼修改</h2>
				<form action="">
					<table class="change-paw">
						<tr>
							<td><label for="old-paw">舊密碼</label></td>
							<td>
								<input type="text" id="old-paw" name="oldPaw">
								<label for="old-paw">請輸入舊密碼</label>
							</td>
						</tr>
						<tr>
							<td><label for="new-paw">新密碼</label></td>
							<td>
								<input type="text" id="new-paw" name="newPaw">
								<label for="new-paw">請輸入新密碼</label>
							</td>
						</tr>
						<tr>
							<td><label for="check-paw">確認新密碼</label></td>
							<td>
								<input type="text" id="check-paw" name="checkPaw">
								<label for="check-paw">請再次輸入新密碼</label>							
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2"><button type="submit">密碼修改</button></td>
						</tr>
					</table>
				</form>
			</div>

			<input type="radio" name="member-panel-radio" id="member-Order-radio">
			<div class="member-order">
				<h2>訂餐紀錄</h2>
				<ul class="member-filter-list">
					<li><button>尚未取餐</button></li>
					<li><button>訂單取消</button></li>
					<li><button>已取餐</button></li>
				</ul>
				<ul class="member-order-list">					
					<li>
						<div class="ordering-news">
							<div class="ordering-news-box1">
								<p class="memOrder-No">訂單編號　09</p>
								<p class="memOrder-Amount">訂單金額　$225</p>
							</div>
							<div class="ordering-news-box2">
								<p class="memOrder-Time"><span>下單時間</span>　<span>2018-07-07　09：00：00</span></p>
								<p class="memOrder-TakeTime"><span>取餐時間</span>　<span>2018-07-10　10：00：00</span></p>
							</div>
						</div>
						<div class="ordering-contain">
							<ul>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<div class="ordering-news">
							<div class="ordering-news-box1">
								<p class="memOrder-No">訂單編號　09</p>
								<p class="memOrder-Amount">訂單金額　$225</p>
							</div>
							<div class="ordering-news-box2">
								<p class="memOrder-Time"><span>下單時間</span>　<span>2018-07-07　09：00：00</span></p>
								<p class="memOrder-TakeTime"><span>取餐時間</span>　<span>2018-07-10　10：00：00</span></p>
							</div>
						</div>
						<div class="ordering-contain">
							<ul>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/定7.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>

			<input type="radio" name="member-panel-radio" id="member-Achievement-radio">
			<div class="member-achievement">
				<h2>我的成就</h2>
				<ul class="member-filter-list">
					<li><button>已達成</button></li>
					<li><button>尚未達成</button></li>
				</ul>
				<ul class="member-achievement-list">
					<li class="member-achievement-list-item1">
						<div class="achievement-pic"></div>
						<div class="achievement-contain">
							<h3>菜蟲</h3>
							<div class="meal-count">5/20</div>
							<p class="achievement-info">完成訂購一道菜</p>
							<p class="achievement-bonus">獎勵：5元折價券＊1</p>
						</div>
					</li>
					<li class="member-achievement-list-item2">
						<div class="achievement-pic"></div>
						<div class="achievement-contain">
							<h3>菜蟲</h3>
							<div class="meal-count">5/20</div>
							<p class="achievement-info">完成訂購一道菜</p>
							<p class="achievement-bonus">獎勵：5元折價券＊1</p>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="table-hide"></div>
	</div>

	<script>

		// 分頁 
		
		var memberPanelLabel = document.querySelectorAll('.member-panel label');

		var memberInformationRadio = document.querySelector('#member-Information-radio');
		var memberOrderRadio = document.querySelector('#member-Order-radio');
		var memberAchievementRadio = document.querySelector('#member-Achievement-radio');

		var memberInformation = document.querySelector('.member-Information');
		var memberOrder = document.querySelector('.member-order');
		var memberAchievement = document.querySelector('.member-achievement');

		for( i = 0 ; i < memberPanelLabel.length; i++){
			memberPanelLabel[i].addEventListener('click', myFunction1);
		}

		myFunction();

		function myFunction(){

			if(window.innerWidth<768){						

				for( i = 0 ; i < memberPanelLabel.length; i++){
					memberPanelLabel[i].style.display = "inline-block";
				}

				if(memberInformationRadio.checked){
					memberPanelLabel[0].style.display = "none";
				}else if(memberOrderRadio.checked){
					memberPanelLabel[1].style.display = "none";
				}else if(memberAchievementRadio.checked){
					memberPanelLabel[3].style.display = "none";
				}

			}else{

				for( i = 0 ; i < memberPanelLabel.length; i++){
					memberPanelLabel[i].style.display = "inline-block";
				}
			}
		}

		function myFunction1(){

			if(window.innerWidth<768){						

				for( i = 0 ; i < memberPanelLabel.length; i++){
					memberPanelLabel[i].style.display = "inline-block";
				}

				this.style.display = "none";

			}else{

				for( i = 0 ; i < memberPanelLabel.length; i++){
					memberPanelLabel[i].style.display = "inline-block";
				}
			}
		}
		
		// input 

		var memberInformationInput = document.querySelectorAll('.member-Information input');

		for(i=0;i<memberInformationInput.length;i++){
			
			memberInformationInput[i].addEventListener("change", function(){
			
				if(this.value==""){
					this.nextSibling.nextSibling.style.opacity = "1";
				}else{
					this.nextSibling.nextSibling.style.opacity = "0";		
				}
			});
		}

	</script>
</body>
</html>