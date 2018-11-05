if(document.getElementById('control-chatBot')!=null){
	var closeChatBot = document.getElementById('close-chatBot');
	document.getElementById('control-chatBot').addEventListener('click',function () {
		closeChatBot.checked=false;
		document.getElementById('navctrl').checked=false;
	});	
	var chatBotText = document.getElementsByClassName('chatBot-text')[0];
	var content = document.getElementById('chatBot-content');
	var container = document.getElementById('chatBot-container');

	chatBotText.addEventListener('keyup',function () {
		//HTML包含小黑點
		var newText = `<p class="chatBot-content-Q"><span></span><span></span><span></span></p><div style="clear: both"></div>`;
		// var = chatBotText.lastChild
		//小黑點
		var span = document.querySelectorAll('.chatBot-content-Q span')
		//輸入字串長度大於等於1時，新增HTML包含小白點
		if(chatBotText.value.length >= 1){
			console.log("chatBotText.value.length >= 1:"+chatBotText.value.length);
			$('#chatBot-content').append(newText);
			// container.removeChild(container.lastChild.previousSibling);
		}else if(chatBotText.value.length < 1){
			console.log("chatBotText.value.length < 1:"+chatBotText.value.length);
			content.removeChild(content.lastChild);
			// $('.chatBot-container').remove('span');
		};				
		if(span.length<1){
			console.log("span.length:"+span.length);

		};

		var h = container.offsetHeight;
		//送出的同時滾動卷軸到最後一筆留言
		document.getElementById('chatBot-content').scrollTo({
			top: h,
			left: 0,
			behavior: 'smooth',
		});
	});
	document.getElementById('chatBot-search').addEventListener('click',function () {
		var newText = `<p class="chatBot-content-Q">${chatBotText.value}</p><div style="clear: both"></div>`;
		//清除content-Q的span
		content.removeChild(content.lastChild);
		// content.removeChild(content.lastChild.previousSibling);
		//把你打的字加到對話區
		container.innerHTML += newText;
		// //清空textarea中的字
		chatBotText.value = '';
		//找到對話框的高度，並設定變數
		var h = container.offsetHeight;
		//送出的同時滾動卷軸到最後一筆留言
		document.getElementById('chatBot-content').scrollTo({
			top: h,
			left: 0,
			behavior: 'smooth',
		});		
	});

	
}
if(document.getElementById('control-login')!=null){
	document.getElementById('control-login').addEventListener('click',function () {
		document.getElementById('close-login').checked=false;
		document.getElementById('navctrl').checked=false;		
	});
	var eye = document.getElementsByClassName('eye');
	var needCheckId = document.getElementById('sigup-member-Id');
	var needCheckPsw = document.getElementById('sigup-member-Psw')
	var needCheckNick = document.getElementById('sigup-member-Nick');
	var needCheckEmail = document.getElementsByClassName('need-check-email');
	var newPlace = "<div class='login-placeholder'></div>";
	var checkAry = [];

	var memCheckReg = new RegExp(/[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\_)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\.)(\/) (\<)(\>)(\?)(\)]+/);

	var emailCheckReg = new RegExp(/[(\ )(\~)(\!)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\/) (\<)(\>)(\?)(\)]+/);


	needCheckId.addEventListener('input',function () {	//帳號
		this.parentNode.lastChild.style.display='block';
		var VL = this.value.length;
		var hasNumABC = false;
		var temp = this.value.toUpperCase().split("");
		var temp2 = memCheckReg.test(this.value);
			for( let i=0; i<temp.length; i++){
				var char = temp[i];
				if( char >= '0' && char <= '9'){
					hasNumABC = true;
				}else if(char >= 'A' && char <= 'Z'){
					hasNumABC = true;
				}else if(temp2==true){
					hasNumABC = false;
					break;
				}else{
					hasNumABC = false;
					break;
				}
			}
		if( hasNumABC===false ){   // 1111111
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("請用英文或數字");
			checkAry[1]=false;
		}else if(VL < 3 || VL > 40 || this.value == ""){	
			var PlaceholderLenght = 3 - needCheckId.value.length;
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("還差"+ PlaceholderLenght+"個字");
		
			checkAry[1]=false;
		}else{
			$(this).parent().find($('.login-placeholder')).remove();
			this.parentNode.lastChild.src='images/checkY.svg';
			
			checkAry[1]=true;					

		}
	});

	needCheckPsw.addEventListener('input',function () {	//密碼
		this.parentNode.lastChild.style.display='block';
		var VL = this.value.length;
		var hasNumABC = false;
		var temp = this.value.toUpperCase().split("");
		var temp2 = memCheckReg.test(this.value);
			for( let i=0; i<temp.length; i++){
				var char = temp[i];
				if( char >= '0' && char <= '9'){
					hasNumABC = true;
				}else if(char >= 'A' && char <= 'Z'){
					hasNumABC = true;
				}else if(temp2==true){
					hasNumABC = false;
					break;
				}else{
					hasNumABC = false;
					break;
				}
			}
		if( hasNumABC===false ){   // 1111111
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("請用英文或數字");
			this? this.preventDefault() : event.returnValue = false;
			checkAry[2]=false;
		}else if(VL < 3 || VL > 40 || this.value == ""){	
			var PlaceholderLenght = 3 - needCheckPsw.value.length;
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("還差"+ PlaceholderLenght+"個字");
		
			checkAry[2]=false;
		}else{
			$(this).parent().find($('.login-placeholder')).remove();
			this.parentNode.lastChild.src='images/checkY.svg';
			
			checkAry[2]=true;					
		}
	});

	needCheckNick.addEventListener('input',function () {	//暱稱
		this.parentNode.lastChild.style.display='block';
		var VL = this.value.length;
		var hasNumABC = true;
		var temp2 = memCheckReg.test(this.value);
			for( let i=0; i<VL; i++){
				if(temp2==true){
					hasNumABC = false;
					break;
				}
			}
		if( hasNumABC===false ){   // 1111111
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("請用英文或數字");
			checkAry[3]=false;
		}else if(VL < 1 || VL > 10){
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("店員將以此名稱呼您");
			$(this).parent().find($('.login-placeholder')).style.width='80%';
			checkAry[3]=false;	
		}else{
			$(this).parent().find($('.login-placeholder')).remove();
			this.parentNode.lastChild.src='images/checkY.svg';
			checkAry[3]=true;
		}			
	});
	needCheckEmail[0].addEventListener('change',function () {	//註冊信箱
		this.parentNode.lastChild.style.display='block';
		var VL = this.value.length;
		var hasNumABC = true;
		var temp2 = emailCheckReg.test(this.value);
			for( let i=0; i<VL; i++){
				if(temp2==true){
					hasNumABC = false;
					break;
				}
			}
		if( hasNumABC===false ){   // 1111111
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("email格式有誤");
			checkAry[4]=false;
		}else if(this.value.indexOf('@') < 1  || this.value.indexOf('.com') < 1){
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("請輸入email格式");
			this.parentNode.lastChild.src='images/checkN.svg';
			checkAry[4]=false;
		}else{
			this.parentNode.lastChild.src='images/checkY.svg';
			$(this).parent().find($('.login-placeholder')).remove();
			checkAry[4]=true;
		}		
	});
	needCheckEmail[1].addEventListener('change',function () {	//申請密碼信箱
		this.parentNode.lastChild.style.display='block';
		var VL = this.value.length;
		var hasNumABC = true;
		var temp2 = emailCheckReg.test(this.value);
			for( let i=0; i<VL; i++){
				if(temp2==true){
					hasNumABC = false;
					break;
				}
			}
		if( hasNumABC===false ){   // 1111111
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("email格式有誤");
			checkAry[0]=false;
		}else if(this.value.indexOf('@') < 1  || this.value.indexOf('.com') < 1){
			this.parentNode.lastChild.src='images/checkN.svg';
			$(this).parent().append(newPlace);
			$(this).parent().find($('.login-placeholder')).text("請輸入email格式");
			this.parentNode.lastChild.src='images/checkN.svg';
			checkAry[0]=false;
		}else{
			$(this).parent().find($('.login-placeholder')).remove();
			this.parentNode.lastChild.src='images/checkY.svg';
			checkAry[0]=true;
		}		
	});

	function checkSubmit(a) {	//判斷是否填寫完整
		for (let i = a; i < 5; i++) {
			if(checkAry[a]==false){
				alert("內"+i +': '+checkAry[i]);
				return false;
			}
			alert("外"+i +': '+checkAry[i]);
			if(checkAry[i]==false){
				alert("內"+i +': '+checkAry[i]);
				return false;
			}
		}
		alert("YES");
		return true;
		}
}
if(document.getElementById('control-search')!=null){//搜尋

	var closebtn = document.getElementById('close-search');
	document.getElementById('control-search').addEventListener("click", function () {
		closebtn.checked = false;
	}, false);

	var grouponTagName = document.getElementsByName('groupon-TagName');

	for (let i = 0; i < grouponTagName.length; i++) {
		grouponTagName[i].addEventListener('input',function () {
			var N = 'images/tag_N.svg' ;
			var Y = 'images/tag_Y.svg' ;
			var b = $(this).parent().find($('.groupon-TagName')[i]).find($('img'));
			if(grouponTagName[i].checked=true){
				$('.groupon-TagName').find($('img')).attr('src',N);
				b.attr('src',Y);
			}
		})
	};	
	var markGroupon = document.getElementById('bookmark-animation-groupon');
	var markMeal = document.getElementById('bookmark-animation-meal');
	var markGrouponText = $('#bookmark-animation-groupon').text();
	var markMealText = $('#bookmark-animation-meal').text();
	// var markSearchValue = markSearch.placeholder;
	markGroupon.addEventListener('click',function () {
		$('#input-search').attr("placeholder","請輸入"+markGrouponText+"關鍵字");
	})
	markMeal.addEventListener('click',function () {
		$('#input-search').attr("placeholder","請輸入"+markMealText+"關鍵字");
	})
}
