<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>日食扭蛋機</title>
    <link rel="stylesheet" href="css/gameCapusle.css">
</head>
<body>
	<?php
  		require_once('nav.php');
	?>
    <div id="gameCapusle">
    	<div class="niu_danji">
		<div class="game_qu">
			<div class="game_go"></div>
		</div>

		<!--球-->
		<div class="dan_gund">
			<span class="qiu_1 diaol_1"></span>
			<span class="qiu_2 diaol_2"></span>
			<span class="qiu_3 diaol_3"></span>
			<span class="qiu_4 diaol_4"></span>
			<span class="qiu_5 diaol_5"></span>
			<span class="qiu_6 diaol_6"></span>
			<span class="qiu_7 diaol_7"></span>
			<span class="qiu_8 diaol_8"></span>
			<span class="qiu_9 diaol_9"></span>
			<span class="qiu_10 diaol_10"></span>
		</div>

		<div class="medon"></div>
		<div class="zjdl ">
			<span></span>
		</div>

	</div>

	<!-- ---------------------------吃甚麼小遊戲------------------------ -->
	<?php 
		try{
			$dsn = "mysql:host=localhost;port=3306;dbname=cd103g3;charset=utf8";
			$user = "Ben";
			$password = "nagi60303";
			$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$pdo = new PDO($dsn, $user, $password, $options);
			$sql = "select * from meal ORDER BY RAND() LIMIT 10";
			$dishes = $pdo -> query($sql);
			$dishesRows = $dishes->fetchAll(PDO::FETCH_ASSOC);
			$rowCount = count($dishesRows);
		foreach( $dishesRows as $i => $dishesRow ){
	?>
	<div class="zonj_zezc none" id="jianpin_<?php echo $i;?>">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<h1>以下是為您挑選的餐點：</h1>
			<div class="dishes-img">
				<img src="images/<?php echo substr_replace($dishesRow["meal_Pic"],'',-7); ?>/<?php echo $dishesRow["meal_Pic"];?>" alt="">
			</div>
			<h2>
				<b><?php echo $dishesRow["meal_Name"];?></b><span>NT $<?php echo $dishesRow["meal_Price"];?></span>
			</h2>
			<span class="checkDishes nextBTN" href="javascript::">確認</span>
			
		</div>
	</div>
	<?php         
    	}
    }catch(PDOException $e){
        echo "Error ?",$e->getMessage(),"<br>";
        echo "Error line?",$e->getLine(),"<br>";    
    }
    ?>

	<!-- <div class="zonj_zezc none" id="jianpin_two">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當2</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_three">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當3</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_four">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當4</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_five">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當5</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_six">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當6</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_seven">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當7</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_eight">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當8</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>

	<div class="zonj_zezc none" id="jianpin_nine">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當9</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div>
	
	<div class="zonj_zezc none" id="jianpin_ten">
		<div class="jpzs aiqiyi tc_anima">
			<em><img src="images/close.png" /></em>
			<div class="dishes-img">
				<img src="images/rice.png" alt="">
			</div>
			<h2>
				<b>日式便當10</b><span>NT $65</span>
			</h2>
			<a class="checkDishes nextBTN" href="javascript::">確認</a>
		</div>
	</div> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous"></script>

	<script type="text/javascript">
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth / 640;
		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)) {
			var version = parseFloat(RegExp.$1);
			// andriod 2.3
			if (version > 2.3) {
				document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' +
					phoneScale + ', target-densitydpi=device-dpi">');
				// andriod 2.3以上
			} else {
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
			// 其他系统
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
		//微信去掉下方刷新栏
		if (RegExp("MicroMessenger").test(navigator.userAgent)) {
			document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
				WeixinJSBridge.call('hideToolbar');
			});
		}
	</script>

	<script>
		$(document).ready(function (e) {
			// 按鈕轉動
			$(".game_go").click(function(){
				rotateButton(360, ".game_go");
			});
			function rotateButton(d){
				var elem = $(".game_go");

				$({deg:0}).animate({deg: d},{
					duration:1000,
					step: function(now){
						elem.css({
							transform: "rotate(" + now + "deg)"
						});
					}
				});
			}
			//一等奖 关闭0
			$("#jianpin_1 em img").click(function () {
				$("#jianpin_1").hide();
			});
			//二等奖 关闭
			$("#jianpin_2 em img").click(function () {
				$("#jianpin_2").hide();
			});
			//三等奖 关闭
			$("#jianpin_3 em img").click(function () {
				$("#jianpin_3").hide();
			});
			$("#jianpin_4 em img").click(function () {
				$("#jianpin_4").hide();
			});
			$("#jianpin_5 em img").click(function () {
				$("#jianpin_5").hide();
			});
			$("#jianpin_6 em img").click(function () {
				$("#jianpin_6").hide();
			});
			$("#jianpin_7 em img").click(function () {
				$("#jianpin_7").hide();
			});
			$("#jianpin_8 em img").click(function () {
				$("#jianpin_8").hide();
			});
			$("#jianpin_9 em img").click(function () {
				$("#jianpin_9").hide();
			});
			$("#jianpin_10 em img").click(function () {
				$("#jianpin_10").hide();
			});
			// 扭蛋動畫
			var count = 10;
			$(".wdjifen").html(count);
			$(".game_go").click(function () {
				count -= 1;
				if (count < 0) {
					for (i = 1; i <= 11; i++) {
						$(".qiu_" + i).removeClass("wieyi_" + i);
					}
					$("#no_jifeng").show();
				} else {
					draw()
				}
			});
			function draw() {
				var number = Math.floor(10 * Math.random() + 1);
				for (i = 1; i <= 10; i++) {
					$(".qiu_" + i).removeClass("diaol_" + i);
					$(".qiu_" + i).addClass("wieyi_" + i);
				};

				setTimeout(function () {
					for (i = 1; i <= 10; i++) {
						$(".qiu_" + i).removeClass("wieyi_" + i);
					}
				}, 1100);
				setTimeout(function () {
					switch (number) {
						case 1:
							$(".zjdl").children("span").addClass("diaL_one");
							break;
						case 2:
							$(".zjdl").children("span").addClass("diaL_two");
							break;
						case 3:
							$(".zjdl").children("span").addClass("diaL_three");
							break;
						case 4:
							$(".zjdl").children("span").addClass("diaL_four");
							break;
						case 5:
							$(".zjdl").children("span").addClass("diaL_five");
							break;
						case 6:
							$(".zjdl").children("span").addClass("diaL_six");
							break;
						case 7:
							$(".zjdl").children("span").addClass("diaL_seven");
							break;
						case 8:
							$(".zjdl").children("span").addClass("diaL_eight");
							break;
						case 9:
							$(".zjdl").children("span").addClass("diaL_nine");
							break;
						case 10:
							$(".zjdl").children("span").addClass("diaL_ten");
							break;
					}
					$(".zjdl").removeClass("none").addClass("dila_Y");
					setTimeout(function () {
						switch (number) {
							case 1:
								$("#jianpin_1").show();
								break;
							case 2:
								$("#jianpin_2").show();
								break;
							case 3:
								$("#jianpin_3").show();
								break;
							case 4:
								$("#jianpin_4").show();
								break;
							case 5:
								$("#jianpin_5").show();
								break;
							case 6:
								$("#jianpin_6").show();
								break;
							case 7:
								$("#jianpin_7").show();
								break;
							case 8:
								$("#jianpin_8").show();
								break;
							case 9:
								$("#jianpin_9").show();
								break;
							case 10:
								$("#jianpin_10").show();
								break;
						}
					}, 900);
				}, 1100)

				//取消动画
				setTimeout(function () {
					$(".zjdl").addClass("none").removeClass("dila_Y");
					$(".wdjifen").html(count);
					$(".zjdl").children("span").removeAttr('class');
				}, 2500)
			}
		});
	</script>
</body>
</html>