<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>會員中心</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" >
	<link href="https://cdn.bootcss.com/cropper/3.1.3/cropper.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
</head>
<body onresize="myFunction()">

	<?php
		require_once("nav.php");
	?>
	<script src="https://cdn.bootcss.com/cropper/3.1.3/cropper.min.js"></script>

	<div class="image-cutting-contain">
		<div class="container">
			<img src="" id="photo">
		</div>
		<p>裁切會員頭像</p>
		<button onclick="cansel()" id="image-cutting-cancel">取消</button>
		<button onclick="crop()">確定</button>			
	</div>

	<div class="member">
		<div class="member-list">
			<div class="member-list-item">
				<label class="member-Pic-box" for="upFile">
					<!-- <input type="file" id="input" class="sr-only"> -->
					<input type="file" id="upFile" name="upFile" accept="image/*">
					<img src="images/top1.svg" alt="member-Pic" title="會員頭像" class="member-Pic" id="member-Pic">
					<span class="member-camera"></span>
				</label>
				<button class="subBTN">修改頭像</button>
				<p class="member-list-item-contain">
					<span>  
						<img src="images/icon/user_black.svg" alt="member-Id" title="帳號" class="mem-icon">
						abcde
						<!-- ?php echo $memRow->member_Id ?>	 -->
					</span>
					<span>
						<img src="images/icon/money_black.svg" alt="member-Bonus" title="購物金" class="mem-icon">
						1552
						<!-- ?php echo $memRow->member_Bonus ?>	 -->
					</span>
					<span>
						<img src="images/icon/mobile_black.svg" alt="mobile" title="手機" class="mem-icon">
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
			<div class="notebook"></div>
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
							<td><button class="subBTN" type="submit">資料修改</button></td>
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
							<td colspan="2"><button class="subBTN" type="submit">密碼修改</button></td>
						</tr>
					</table>
				</form>
			</div>

			<input type="radio" name="member-panel-radio" id="member-Order-radio">
			<div class="member-order">
				<h2>訂餐紀錄</h2>
				<ul class="member-filter-list">
					<li><button class="subBTN">尚未取餐</button></li>
					<li><button class="subBTN">訂單取消</button></li>
					<li><button class="subBTN">已取餐</button></li>
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
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
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
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
									<p>天婦羅定食＊1</p>
								</li>
								<li>
									<img src="images/meals/ben_01.png" alt="meal">
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
					<li><button class="subBTN">已達成</button></li>
					<li><button class="subBTN">尚未達成</button></li>
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
	<script>
		window.addEventListener("load",function(){
			var imgCutCon = document.querySelector('.image-cutting-contain');

			document.getElementById("upFile").onchange = function(e){
				imgCutCon.style.display = 'inline-block';
				// var file = e.target.files[0];
				// var reader = new FileReader();
				// reader.onload = function(){
				// 	document.getElementById("member-Pic").src = reader.result;
				// }

				// reader.readAsDataURL(file);
			};
		}, false);	
	</script>
	<script>
		// 修改自官方demo的js
		var initCropper = function (img, input){
			var $image = img;
			var options = {
				aspectRatio: 1/1, // 纵横比
				viewMode: 2,
				background: false,
				// preview: '.img-preview' // 预览图的class名
			};
			$image.cropper(options);
			var $inputImage = input;
			var uploadedImageURL;
			if (URL) {
				// 给input添加监听
				$inputImage.change(function () {
					var files = this.files;
					var file;
					if (!$image.data('cropper')) {
						return;
					}
					if (files && files.length) {
						file = files[0];
						// 判断是否是图像文件
						if (/^image\/\w+$/.test(file.type)) {
							// 如果URL已存在就先释放
							if (uploadedImageURL) {
								URL.revokeObjectURL(uploadedImageURL);
							}
							uploadedImageURL = URL.createObjectURL(file);
							// 销毁cropper后更改src属性再重新创建cropper
							$image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
							$inputImage.val('');
						} else {
						window.alert('请选择一个图像文件！');
					}
				}
			});
			} else {
				$inputImage.prop('disabled', true).addClass('disabled');
			}
		}
		var cansel = function(){
			var imgCutCon = document.querySelector('.image-cutting-contain');
			imgCutCon.style.display = 'none';
		}
		var crop = function(){
			
			var imgCutCon = document.querySelector('.image-cutting-contain');
			imgCutCon.style.display = 'none';

			var $image = $('#photo');
			var $target = $('#member-Pic');
			$image.cropper('getCroppedCanvas',{
				width:300, // 裁剪后的长宽
				height:300
			}).toBlob(function(blob){
				// 裁剪后将图片放到指定标签
				$target.attr('src', URL.createObjectURL(blob));
			});
		}
		$(function(){
			initCropper($('#photo'),$('#upFile'));
		});
	</script>
</body>
</html>