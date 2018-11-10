function $id(id) {
  return document.getElementById(id);
}
var memCheckReg = new RegExp(
  /[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\_)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\.)(\/) (\<)(\>)(\?)(\)]+/
);

var emailCheckReg = new RegExp(
  /[(\ )(\~)(\!)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\/) (\<)(\>)(\?)(\)]+/
);
var checkAry = [];

document.getElementById("close-login").addEventListener("click", function() {
  document.getElementById("navctrl").checked = false;
  var eye = document.getElementsByClassName("eye");
  var needCheckId = document.getElementById("sigup-member-Id");
  var needCheckPsw = document.getElementById("sigup-member-Psw");
  var needCheckNick = document.getElementById("sigup-member-Nick");
  var needCheckEmail = document.getElementsByClassName("need-check-email");
  var newPlace = "<div class='login-placeholder'></div>";

  needCheckId.addEventListener("input", function() {
    //帳號
    this.parentNode.lastChild.style.display = "block";
    var VL = this.value.length;
    var hasNumABC = false;
    var temp = this.value.toUpperCase().split("");
    var temp2 = memCheckReg.test(this.value);
    for (let i = 0; i < temp.length; i++) {
      var char = temp[i];
      if (char >= "0" && char <= "9") {
        hasNumABC = true;
      } else if (char >= "A" && char <= "Z") {
        hasNumABC = true;
      } else if (temp2 == true) {
        hasNumABC = false;
        break;
      } else {
        hasNumABC = false;
        break;
      }
    }
    if (hasNumABC === false) {
      // 1111111
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("請用英文或數字");
      checkAry[1] = false;
    } else if (VL < 3 || VL > 40 || this.value == "") {
      var PlaceholderLenght = 3 - needCheckId.value.length;
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("還差" + PlaceholderLenght + "個字");

      checkAry[1] = false;
    } else {
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .remove();
      this.parentNode.lastChild.src = "images/checkY.svg";

      checkAry[1] = true;
    }
  });

  needCheckPsw.addEventListener("input", function() {
    //密碼
    this.parentNode.lastChild.style.display = "block";
    var VL = this.value.length;
    var hasNumABC = false;
    var temp = this.value.toUpperCase().split("");
    var temp2 = memCheckReg.test(this.value);
    for (let i = 0; i < temp.length; i++) {
      var char = temp[i];
      if (char >= "0" && char <= "9") {
        hasNumABC = true;
      } else if (char >= "A" && char <= "Z") {
        hasNumABC = true;
      } else if (temp2 == true) {
        hasNumABC = false;
        break;
      } else {
        hasNumABC = false;
        break;
      }
    }
    if (hasNumABC === false) {
      // 1111111
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("請用英文或數字");
      this ? this.preventDefault() : (event.returnValue = false);
      checkAry[2] = false;
    } else if (VL < 3 || VL > 40 || this.value == "") {
      var PlaceholderLenght = 3 - needCheckPsw.value.length;
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("還差" + PlaceholderLenght + "個字");

      checkAry[2] = false;
    } else {
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .remove();
      this.parentNode.lastChild.src = "images/checkY.svg";

      checkAry[2] = true;
    }
  });

  needCheckNick.addEventListener("input", function() {
    //暱稱
    this.parentNode.lastChild.style.display = "block";
    var VL = this.value.length;
    var hasNumABC = true;
    var temp2 = memCheckReg.test(this.value);
    for (let i = 0; i < VL; i++) {
      if (temp2 == true) {
        hasNumABC = false;
        break;
      }
    }
    if (hasNumABC === false) {
      // 1111111
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("請用英文或數字");
      checkAry[3] = false;
    } else if (VL < 1 || VL > 10) {
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("店員將以此名稱呼您");
      $(this)
        .parent()
        .find($(".login-placeholder")).style.width = "80%";
      checkAry[3] = false;
    } else {
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .remove();
      this.parentNode.lastChild.src = "images/checkY.svg";
      checkAry[3] = true;
    }
  });
  needCheckEmail[0].addEventListener("change", function() {
    //註冊信箱
    this.parentNode.lastChild.style.display = "block";
    var VL = this.value.length;
    var hasNumABC = true;
    var temp2 = emailCheckReg.test(this.value);
    for (let i = 0; i < VL; i++) {
      if (temp2 == true) {
        hasNumABC = false;
        break;
      }
    }
    if (hasNumABC === false) {
      // 1111111
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("email格式有誤");
      checkAry[4] = false;
    } else if (this.value.indexOf("@") < 1 || this.value.indexOf(".com") < 1) {
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("請輸入email格式");
      this.parentNode.lastChild.src = "images/checkN.svg";
      checkAry[4] = false;
    } else {
      this.parentNode.lastChild.src = "images/checkY.svg";
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .remove();
      checkAry[4] = true;
    }
  });
  needCheckEmail[1].addEventListener("change", function() {
    //申請密碼信箱
    this.parentNode.lastChild.style.display = "block";
    var VL = this.value.length;
    var hasNumABC = true;
    var temp2 = emailCheckReg.test(this.value);
    for (let i = 0; i < VL; i++) {
      if (temp2 == true) {
        hasNumABC = false;
        break;
      }
    }
    if (hasNumABC === false) {
      // 1111111
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("email格式有誤");
      checkAry[0] = false;
    } else if (this.value.indexOf("@") < 1 || this.value.indexOf(".com") < 1) {
      this.parentNode.lastChild.src = "images/checkN.svg";
      $(this)
        .parent()
        .append(newPlace);
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .text("請輸入email格式");
      this.parentNode.lastChild.src = "images/checkN.svg";
      checkAry[0] = false;
    } else {
      $(this)
        .parent()
        .find($(".login-placeholder"))
        .remove();
      this.parentNode.lastChild.src = "images/checkY.svg";
      checkAry[0] = true;
    }
  });
});
var beforeLogin = document.getElementsByClassName('before-login')[0];
var afterLogin = document.getElementsByClassName('after-login')[0];
var memberPic = document.getElementsByClassName('member-Pic')[0];

$id('siginSubmit').addEventListener('click',function () {
  var obj = {};
  obj.member_Id=$id("sigin-member-Id").value;
  obj.member_Psw=$id("sigin-member-Psw").value;
  var jsonStr = JSON.stringify( obj );

  //產生XMLHttpRequest物件
  xhr = new XMLHttpRequest();
 //註冊callback function寫法2 -> onload=4
  xhr.onload = function (){
      if( xhr.status == 200){ //OK
          if(xhr.responseText.indexOf("not found") != -1){ //回傳的資料中有not found
            alert("帳密錯誤");
          }else{ //登入成功
            beforeLogin.style.display='none';
            afterLogin.style.display='inline-block';
            // alert(xhr.responseText);
            var nike = document.querySelectorAll('.after-login span')[1];
            var aaa = xhr.responseText.split(',');
            alert(aaa[0]);
            alert(aaa[1]);
            nike.innerText = aaa[0];
            // memberPic.src = '';
            // //將登箱中表單上的資料清空，並隱藏起來
            // $id('lightBox').style.display = 'none';
            // $id('memId').value = '';
            // $id('memPsw').value = ''; 
            // $id('spanLogin').innerHTML = '登出';  
            document.getElementById("close-login").checked = true;
          }
      }else{
        alert(xhr.status);
      }
  }
  xhr.open("post", "siginSubmit.php", true);//設定好所要連結的程式
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");//setRequestHeader("head","value") 設定HTTP請求的請求標頭
  var data_info = "jsonStr=" + jsonStr;
  xhr.send(data_info);  //送出資料

},false);
$id('sigupSubmit').addEventListener('click',function () {
  if(LoginAjax(1)==true){
    var needCheckEmail = document.getElementsByClassName("need-check-email")[1];
    var obj = {};
    obj.member_Id=$id("sigup-member-Id").value;
    obj.member_Psw=$id("sigup-member-Psw").value;
    obj.member_Nick=$id("sigup-member-Nick").value;
    obj.email=needCheckEmail.value;
    var jsonStr = JSON.stringify( obj );
  
    //產生XMLHttpRequest物件
    xhr = new XMLHttpRequest();
   //註冊callback function寫法2 -> onload=4
    xhr.onload = function (){
        if( xhr.status == 200){ //OK
          var aaa = xhr.responseText.split(',');
          alert("aaa.indexOf('not found'):"+aaa.indexOf("not found"));
          alert(aaa);
            if(xhr.responseText.indexOf("not found") != -1){ //回傳的資料中有not found 表示尚無此資料
              beforeLogin.style.display='none';
              afterLogin.style.display='inline-block';
              // alert(xhr.responseText);
              var nike = document.querySelectorAll('.after-login span')[1];
              alert("aaa[0]"+aaa[0]);
              alert("aaa[1]"+aaa[1]);
              alert("aaa[2]"+aaa[2]);
              nike.innerText = aaa[1];
              // memberPic.src = '';
              // //將登箱中表單上的資料清空，並隱藏起來
              // $id('lightBox').style.display = 'none';
              // $id('memId').value = '';
              // $id('memPsw').value = ''; 
              // $id('spanLogin').innerHTML = '登出';  
              document.getElementById("close-login").checked = true;
            }else{ //註冊失敗
              if(xhr.responseText.indexOf("hasName") != -1){
                alert("已有人使用");
              }
            }
        }else{
          alert(xhr.status);
        }
    }
    xhr.open("post", "sigupSubmit.php", true);//設定好所要連結的程式
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");//setRequestHeader("head","value") 設定HTTP請求的請求標頭
    var data_info = "jsonStr=" + jsonStr;
    xhr.send(data_info);  //送出資料
  }else{
    alert("填寫完整才能註冊唷!");
  }

},false);
$id('getPswSubmit').addEventListener('click',function () {
	LoginAjax(0);
},false);

function LoginAjax(a) {
  //判斷是否填寫完整
  for (let i = a; i < 5; i++) {
    if (checkAry[a] == false) {
      alert("內" + i + ": " + checkAry[i]);
      return false;
    }
    alert("外" + i + ": " + checkAry[i]);
    if (checkAry[i] == false) {
      alert("內" + i + ": " + checkAry[i]);
      return false;
    }
  }
  return true;
}
