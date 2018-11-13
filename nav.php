<?php
ob_start();
session_start();
	require_once("login.php");
	require_once("search.php");
	require_once("chatBot.php");
?>
<meta name="format-detection" content="telephone=no">
<header>
	<input type="checkbox" id="navctrl">
	<div class="phone-nav">
		<div id="view1"></div>
		<div class="nav-left">
			<label class="hb" for="navctrl">
				<span class="line"></span>
			</label>
		</div>
		<div class="logo">
			<a href="javascript:void(0)">
				<img src="images/logo.png" alt="logo">
			</a>
		</div>
		<div class="nav-right">			
			<label for="close-search" class="seach-button">
				<img src="images/icon/search_black.svg" width="25" alt="seach">
				搜尋
			</label>
		</div>
	</div>
	<nav>
		<ul>
			<li class="logo">
				<div id="view4"></div>
				<a href="javascript:void(0)">
					<img src="images/logo.png" alt="logo">
				</a>
			</li>
			<li class="index-member">
				<div id="view6"></div>
				<label for="close-login" class="before-login">
					註冊／登入
				</label>
				<div class="after-login">
					<div>
						<a href="member.php">
							<img src="images/icon/user_white.svg" alt="member-Pic" class="member-Pic">
						</a>
					</div>
					<div>
						<span><img src="images/icon/riceball_white.svg" width="30" alt="achievement-Pic" class="achievement-Pic">300積分</span><br>
						<span>Sara. always</span>
					</div>
				</div>
			</li>
			<li class="meals">
					<div id="view5"></div>
				<a href="javascript:void(0)">日食餐點</a>
			</li>
			<li class="initiate">			
				<div id="view2"></div>
				<a href="javascript:void(0)">發起飯團</a>
			</li>
			<li class="participate">
				<div id="view3"></div>
				<a href="javascript:void(0)">參加飯團</a>
			</li>
			<li class="table-hidden"><a href="member.php">會員中心</a></li>
			<li class="table-hidden"><label for="close-chatBot">客服雞器人</label></li>
			<li class="table-hidden" id="clearMemberCookie"><a href="javascript:void(0)">登出</a></li>
		</ul>
	</nav>
	<label class="white-Point" for="white-Point-control">
		<ul>
			<div id="view7"></div>
			<li>
				<a href="shopping_cart.php">
					<img class="phone-hidden" src="images/icon/cart_black.svg" alt="cart">
					<img class="table-hidden" src="images/icon/cart_white.svg" alt="cart"><br>
					購物車
					<span>3</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
					<img class="phone-hidden" src="images/icon/qrcode_black.svg" alt="qrcode">
					<img class="table-hidden" src="images/icon/qrcode_white.svg" alt="cart"><br>
					快速取餐
					<span>2</span>
				</a>
			</li>
			<li class="table-hidden">
				<a href="javascript:void(0)">
					<img src="images/icon/game_white.svg" alt="game"><br>
					想吃什麼？
				</a>
			</li>
			<li class="table-hidden">
				<a href="javascript:void(0)">
					<img src="images/icon/heart_white.svg" alt="mc"><br>
					我的收藏
				</a>
			</li>
			<li class="table-hidden">
				<a href="javascript:void(0)">
					<img src="images/icon/riceball_white.svg" alt="riceball"><br>
					我的飯團
				</a>
			</li>		
		</ul>
	</label>
</header>
<div class="nav_height"></div>
<!-- <script src="js/floaty.js"></script>S -->
<!-- <script src="js/svgColor.js"></script> -->
<script src="js/login.js"></script>
<script src="js/chatBot.js"></script>
<script src="js/search.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

	for (var i = 1; i <= 7; i++) {
	
		var view = document.querySelector("#view" +　i);

		struct1 = document.createElement("div");     
		struct1.className = "slice s" + 3;
	
		for (var j = 2; j > 0; j--) {
	
			struct2 = document.createElement("div");     
			struct2.className = "slice s" + j;
	
			struct2.appendChild(struct1);

			struct1 = struct2;
		}
	
		view.appendChild(struct2);
		
	}

	//-----------------------whitePoint--------------------------//

	var isMousemove = false;

	document.body.addEventListener('mousemove', function(event){
		mouseX = event.clientX;//滑鼠x位置
		mouseY = event.clientY;//滑鼠y位置

		if(isMousemove){
			whitePointDown();
		}
	});  

	var whitePoint = document.querySelector('.white-Point'),
		childList = whitePoint.children[0].children,
		whitePointLock = true;

	whitePoint.addEventListener('mousedown', function(){ // 按下鼠標左鍵時
	
		whitePointDown();
	}); 
	
	whitePoint.addEventListener('touchstart', whitePointDown, false); //觸摸元素時
	

	function whitePointDown(){

		whitePoint.style.transition = "0.05s";
		// whitePoint.style.top = mouseY - 25 + 'px';
		// whitePoint.style.left = mouseX - 25 + 'px';
		// whitePoint.style.top = mouseY;
		// whitePoint.style.left = mouseX;
		isMousemove = true; //處於按壓拖移小白點狀態
	}

	document.body.addEventListener('mouseup', whitePointClose, true); //在body釋放鼠標左鍵時
	document.body.addEventListener('touchend', whitePointClose, true); //從body元素移除手指時

	function whitePointClose(){

		var w = window.innerWidth,
			h = window.innerHeight;

		if(w<1024){
			whitePoint.style.width = "50px";
			whitePoint.style.height = "50px";
			
			whitePointBeforeY = mouseY - 25;

			whitePoint.style.left = w-50 + "px";
			whitePointBeforeX = w-50;

			for(i=0;i<childList.length;i++){
				childList[i].style.display = 'none';
			}
		}else{

			whitePoint.style.transition = "0s";
			whitePoint.style.width = '14.28571428%';
			whitePoint.style.height = "100px";
			whitePoint.style.display = 'static';

			for(i=0;i<childList.length;i++){
				childList[i].style.display = 'none';
			}

			for(i=0;i<3;i++){
				childList[i].style.display = 'inline-block';
			}
		}
	}

	whitePoint.addEventListener('mouseup', function(){

		isOpen = !isOpen; //現在是否打開小白點
		whitePointUp();

	}, true); //釋放鼠標左鍵時
	
	whitePoint.addEventListener('touchend', function(){

		isOpen = !isOpen; //現在是否打開小白點
		whitePointUp();

	}, true); //從元素移除手指時

	var isOpen = false,
		whitePointBeforeX = 0;
		whitePointBeforeY = 75;

	function whitePointUp(){
	
		var w = window.innerWidth,
			h = window.innerHeight,
			minwh = w > h ? h : w;

		isMousemove = false; //離開按壓拖移小白點狀態

		//取得小白點前後位置,判斷使用者想要開啟或拖移小白點
		whitePointLock = Math.abs(whitePointBeforeX - mouseX) < 50 && Math.abs(whitePointBeforeY - mouseY) < 50;

		if(w<1024){
			whitePoint.style.display = 'fixed';
			whitePoint.style.transition = "0.5s";

			if(isOpen && whitePointLock){

				whitePoint.style.width = minwh * 0.7 + 'px';
				whitePoint.style.height = minwh * 0.7  + 'px';
				
				whitePoint.style.top = (h / 2) - (minwh * 0.35) + 'px';
				whitePoint.style.left = (w / 2) - (minwh * 0.35) + 'px';
				
				for(i=0;i<childList.length;i++){
					childList[i].style.display = 'inline-block';
				}

			}else{

				whitePoint.style.width = "50px";
				whitePoint.style.height = "50px";
				
				whitePointBeforeY = mouseY - 25;

				if(mouseX < w/2){
					whitePoint.style.left = 0;
					whitePointBeforeX = 0; 
				}else{
					whitePoint.style.left = w-50 + "px";
					whitePointBeforeX = w-50;
				}

				for(i=0;i<childList.length;i++){
					childList[i].style.display = 'none';
				}
			}
		}else{

			whitePoint.style.transition = "0s";
			whitePoint.style.width = '14.28571428%';
			whitePoint.style.height = "100px";
			whitePoint.style.display = 'static';

			for(i=0;i<childList.length;i++){
				childList[i].style.display = 'none';
			}

			for(i=0;i<3;i++){
				childList[i].style.display = 'inline-block';
			}
		}
	}

	whitePoint.addEventListener('mousemove', whitePointMove); //在元素內移動時
	whitePoint.addEventListener('Touchmove', whitePointMove, false); //移動手指時

	function whitePointMove(){
	}

	window.addEventListener("resize", function(){
    	whitePointUp();
	});

</script>
<script>

	function delCookie(name)
	{
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var cval=cookie(name);
		if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
	}
	function cookie(name){    
	   var cookieArray=document.cookie.split("; "); //得到分割的cookie名值對    
	   var cookie=new Object();    
	   for (var i=0;i<cookieArray.length;i++){  
	      // console.log(cookieArray);
	      var arr=cookieArray[i].split("=");       //將名和值分開
	      console.log(arr);
	      console.log(arr[0]+'='+arr[1]);
	      if(arr[0]==name) return unescape(arr[1]); //如果是指定的cookie，則返回它的值    
	   } 
	   return ""; 
	} 
	function checkCookie() {
		 //獲得coolie 的值

	beforeLogin = document.getElementsByClassName("before-login")[0];
	afterLogin = document.getElementsByClassName("after-login")[0];
	clearMemberCookie = document.getElementById('clearMemberCookie');
	  member_No = cookie("member_No");
	  member_Id = cookie("member_Id");
	  member_Psw = cookie("member_Psw");
	  member_Nick = cookie("member_Nick");
	  email = cookie("email");
	  member_Pic = cookie("member_Pic");
	  member_Bonus = cookie("member_Bonus");
	  member_buyCount = cookie("member_buyCount");
	  if (member_No != null && member_No != "") {
	    beforeLogin.style.display = "none";
	    afterLogin.style.display = "inline-block";
	    clearMemberCookie.style.display = "inline-block";
		var buyCount = document.querySelectorAll(".after-login span")[0];
		var memberyPic = document.querySelectorAll(".after-login img")[0];
		var nike = document.querySelectorAll(".after-login span")[1];
		nike.innerText = member_Nick;
		memberyPic.src = member_Pic;
		buyCount.innerHTML = `<img src="images/icon/riceball_white.svg" width="30" alt="achievement-Pic" class="achievement-Pic">${member_buyCount}`;

	  } else {
		beforeLogin.style.display = "inline-block";
	    afterLogin.style.display = "none";
	    clearMemberCookie.style.display = "none";
	  }
	}

	document.getElementById('clearMemberCookie').addEventListener('click',function(){
		delCookie("member_No");
		delCookie("member_Id");
		delCookie("member_Psw");
		delCookie("member_Nick");
		delCookie("email");
		delCookie("member_Pic");
		delCookie("member_Bonus");
		delCookie("member_buyCount");
		checkCookie();
	    // beforeLogin.style.display = "inline-block";
	    // afterLogin.style.display = "none";
	    // clearMemberCookie.style.display = "none";
	},false);
	window.addEventListener('load',function(){
		checkCookie();
	},false);
</script>