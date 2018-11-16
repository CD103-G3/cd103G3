function $id(id) {
  return document.getElementById(id);
}

var resetInput = document.querySelectorAll(".login-form");
var btnCup = document.getElementsByClassName("btn-cup");
var lgImg = document.querySelectorAll(".longing-input>img");
var lgPlace = document.getElementsByClassName("login-placeholder");
function resetSig() {
  for (let j = 0; j < resetInput.length; j++) {
    resetInput[j].reset();
  }
  for (let i = 0; i < lgImg.length; i++) {
    lgImg[i].style.display = "none";
  }
  for (let k = 0; k < lgPlace.length; k++) {
    lgPlace[k].remove();
  }
  // $(".login-placeholder").remove();
}

$id("close-login").addEventListener("click", function() {
  $id("navctrl").checked = false;
});

var siginTime = 0;
var sigupTime = 0;
var getpswTime = 0;
$id("to-sigin").addEventListener("click", function() {
  siginTime++;
  sigupTime = 0;
  getpswTime = 0;
  if (siginTime <= 1) {
    resetSig();
  }
});
$id("to-sigup").addEventListener("click", function() {
  siginTime = 0;
  sigupTime++;
  getpswTime = 0;
  if (sigupTime <= 1) {
    resetSig();
  }
});
$id("to-get-Psw").addEventListener("click", function() {
  siginTime = 0;
  sigupTime = 0;
  getpswTime++;
  if (getpswTime <= 1) {
    resetSig();
  }
});

var memCheckReg = new RegExp(
  /[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\.)(\/) (\<)(\>)(\?)(\)]+/
);

var emailCheckReg = new RegExp(
  /[(\ )(\~)(\!)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\/) (\<)(\>)(\?)(\)]+/
);
// var emailCheckReg = new RegExp(
//   /([\w\-]+@[\w\.]+[(\.)]+[$c][$o][$m])/g
// );
var checkAry = [];

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
//註冊的email
needCheckEmail[0].addEventListener("input", function() {
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
    $(this)
      .parent()
      .find($(".login-placeholder"))
      .remove();
    this.parentNode.lastChild.src = "images/checkY.svg";
    checkAry[4] = true;
  }
  // if(this.value.match(emailCheckReg)==null){
  //   this.parentNode.lastChild.src = "images/checkN.svg";
  //   console.log(this.parentNode.lastChild.src);
  //     $(this)
  //       .parent()
  //       .append(newPlace);
  //     $(this)
  //       .parent()
  //       .find($(".login-placeholder"))
  //       .text("請輸入email格式");
  //     checkAry[4] = false;
  // }else{
  //   this.parentNode.lastChild.src = "images/checkY.svg";
  //   console.log(this.parentNode.lastChild.src);
  //     $(this)
  //       .parent()
  //       .find($(".login-placeholder"))
  //       .remove();
  //     checkAry[4] = true;
  // }
});
//忘記密碼的email
needCheckEmail[1].addEventListener("input", function() {
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
var beforeLogin = document.getElementsByClassName("before-login")[0];
var afterLogin = document.getElementsByClassName("after-login")[0];
var memberPic = document.getElementsByClassName("member-Pic")[0];

$id("siginSubmit").addEventListener(
  "click",
  function() {
    var obj = {};
    obj.member_Id = $id("sigin-member-Id").value;
    obj.member_Psw = $id("sigin-member-Psw").value;
    var jsonStr = JSON.stringify(obj);

    //產生XMLHttpRequest物件
    xhr = new XMLHttpRequest();
    //註冊callback function寫法2 -> onload=4
    xhr.onload = function() {
      if (xhr.status == 200) {
        //OK
        if (xhr.responseText.indexOf("not found") != -1) {
          //回傳的資料中有not found
          // swal("", "帳號或密碼錯誤!", "error");
          // alert("帳密錯誤");
          var siginAns = false;
          var siginTimer = 5000;
          swal({
            title: "帳號或密碼錯誤!",
            icon: "error",
            closeOnClickOutside: true,
            // timer: 3000,
            content: {
              element: "a",
              attributes: {
                href: "javascript:",
                text: "忘記密碼?",
                className: "want-psw"
              }
            }
          });
          document.getElementsByClassName("want-psw")[0].addEventListener(
            "click",
            function() {
              $id("to-get-Psw").checked = true;
              this.parentNode.parentNode.parentNode.className = "swal-overlay";
            },
            false
          );
        } else {
          //登入成功
          checkCookie();
          document.getElementById("close-login").checked = true;
          swal({
            title: "歡迎!",
            text: "快來看看",
            icon: "success",
            content: {
              element: "a",
              attributes: {
                href: "https://www.youtube.com/?gl=TW&hl=zh-tw",
                text: "目前最HOT!HOT!飯團"
              }
            }
          });
        }
      } else {
        alert(xhr.status);
      }
    };
    xhr.open("post", "siginSubmit.php", true); //設定好所要連結的程式
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded"); //setRequestHeader("head","value") 設定HTTP請求的請求標頭
    var data_info = "jsonStr=" + jsonStr;
    xhr.send(data_info); //送出資料
  },
  false
);
$id("sigupSubmit").addEventListener(
  "click",
  function() {
    if (LoginAjax(1) != false) {
      var obj = {};
      obj.member_Id = $id("sigup-member-Id").value;
      obj.member_Psw = $id("sigup-member-Psw").value;
      obj.member_Nick = $id("sigup-member-Nick").value;
      obj.email = needCheckEmail[0].value;
      var jsonStr = JSON.stringify(obj);

      //產生XMLHttpRequest物件
      xhr = new XMLHttpRequest();
      //註冊callback function寫法2 -> onload=4
      xhr.onload = function() {
        if (xhr.status == 200) {
          //OK
          if (xhr.responseText.indexOf("not found") != -1) {
            checkCookie();
            document.getElementById("close-login").checked = true;
            swal({
              title: "歡迎!",
              text: "日食送你一張每日刮刮樂，快去看看吧!",
              icon: "success",
              content: {
                element: "a",
                attributes: {
                  href: "https://www.youtube.com/?gl=TW&hl=zh-tw",
                  text: "前往刮刮樂"
                }
              }
            });
          } else {
            //註冊失敗
            if (xhr.responseText.indexOf("hasMember") != -1) {
              swal("帳號已有人使用!!", "再想想吧!", "error");
            }
          }
        } else {
          alert(xhr.status);
        }
      };
      xhr.open("post", "sigupSubmit.php", true); //設定好所要連結的程式
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded"); //setRequestHeader("head","value") 設定HTTP請求的請求標頭
      var data_info = "jsonStr=" + jsonStr;
      xhr.send(data_info); //送出資料
    } else {
      swal(
        "欄位還沒有填寫完整唷!",
        "你知道嗎? 註冊新會員就有機會獲得神秘大禮!!",
        "error"
      );
    }
  },
  false
);
$id("getPswSubmit").addEventListener(
  "click",
  function() {
    if (LoginAjax(0) != false) {
      var obj = {};
      obj.member_Id = $id("get-Psw-member-Id").value;
      obj.email = needCheckEmail[1].value;
      var jsonStr = JSON.stringify(obj);

      //產生XMLHttpRequest物件
      xhr = new XMLHttpRequest();
      //註冊callback function寫法2 -> onload=4
      xhr.onload = function() {
        if (xhr.status == 200) {
          //OK
          console.log(xhr.responseText);
          if (xhr.responseText.indexOf("not found") != -1) {
            swal({
              title: "帳號或信箱錯誤!",
              text: "實在想不起來?",
              icon: "error",
              content: {
                element: "a",
                attributes: {
                  href: "tel:+886-3-4257387",
                  text: "聯絡客服(03)-4257387"
                }
              }
            });
            // swal(
            //   "帳號或密碼錯誤!",
            //   "實在想不起來? 聯絡客服(03)4712399",
            //   "error"
            // );
          } else {
            swal("已寄出新密碼!", "您的信箱:" + xhr.responseText, "success");
          }
        } else {
          alert(xhr.status);
        }
      };
      xhr.open("post", "getPswSubmit.php", true); //設定好所要連結的程式
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded"); //setRequestHeader("head","value") 設定HTTP請求的請求標頭
      var data_info = "jsonStr=" + jsonStr;
      xhr.send(data_info); //送出資料
    } else {
      swal("還有欄位沒有填寫唷!", "填寫資料讓我們幫助你找回密碼!!", "error");
    }
  },
  false
);

function LoginAjax(a) {
  //判斷是否填寫完整
  if (a == 0) {
    if (
      checkAry[a] == false ||
      checkAry[a] == "" ||
      $id("get-Psw-member-Id").value == undefined ||
      $id("get-Psw-member-Id").value == ""
    ) {
      console.log("false");
      return false;
    } else {
      console.log("true");
      return true;
    }
  } else
    for (let i = a; i < 5; i++) {
      alert("外" + i + ": " + checkAry[i]);
      if (
        checkAry[i] == false ||
        checkAry[i] == undefined ||
        checkAry[i] == ""
      ) {
        alert("內i" + i + ": " + checkAry[i]);
        return false;
      }
    }
}
