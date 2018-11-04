if(document.getElementById('control-chatBot')!=null){
	document.getElementById('control-chatBot').addEventListener('click',function () {
		document.getElementById('close-chatBot').checked=false;
		document.getElementById('navctrl').checked=false;
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

}
