<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>chatBot</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" name="close-chatBot" id="close-chatBot" checked>
	<div id="chatBot" class="clearfix">
		<div class="chatBot-contenier-wrap">
			<h3>日食客服機器人</h3>
			<label for="close-chatBot" class="close-chatBot"></label>
			<div id="chatBot-content" class="clearfix">
				<p class="chatBot-content-A">HI! 很高興為您服務，您可以點擊下方關鍵字或是直接輸入詢問內容!</p>
				<div style="clear: both"></div>
				<p class="chatBot-content-Q">請問營業時間?</p>
				<div style="clear: both"></div>
				<p class="chatBot-content-A">我們從週一到週五二十四小時不休息唷!</p>
				<div style="clear: both"></div>
				<p class="chatBot-content-A">我們從週一到週五二十四小時不休息唷!</p>
				<div style="clear: both"></div>
				<p class="chatBot-content-A">我們從週一到週五二十四小時不休息唷!</p>
				<div style="clear: both"></div>
			</div>
			<ul class="chatBot-keyword clearfix">
				<li>營業時間</li>
				<li>參加飯團</li>
				<li>發起飯團</li>
				<li>發起飯團</li>
				<li>發起飯團</li>
				<li>發起飯團</li>
			</ul>
			<form action="" method="POST" class="chatBot-text-Wrap">
				<button type="submit" id="chatBot-search" class="cancelBTN">送出</button>
				<input type="text" class="chatBot-text">
			</form>
		</div>
		<label for="close-chatBot" class="close-chatBot-pic">
			<img src="images/chatBot.svg" alt="日食客服機器人"  class="chatBot-pic">			
		</label>

	</div>
</body>
</html>