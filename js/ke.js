var closeChatBot = document.getElementById("close-chatBot");
closeChatBot.addEventListener("click", function() {
  // document.getElementById("navctrl").checked = false;
  //輸入框
  let chatUserText = document.getElementsByClassName("chatBot-text")[0];
  //內容第一層overflow
  let content = document.getElementById("chatBot-content");
  //內容第二層(包p)
  let container = document.getElementById("chatBot-container");
  //送出按鈕
  let submit = document.getElementById("chatBot-search");
  //刪除小黑點
  function delQpoint() {
    console.log(container.lastChild.previousSibling.tagName);
    console.log(container.lastChild.tagName);
    container.removeChild(container.lastChild.previousSibling); //刪除container的最後一個小孩的上一個兄弟
    container.removeChild(container.lastChild); //刪除container的最後一個小孩
  }
  //卷軸維持在最底端
  function chatBotScrollTo(container, content) {
    //找到對話框的高度，並設定變數
    let h = container.offsetHeight;
    //送出的同時滾動卷軸到最後一筆留言
    content.scrollTo({
      top: h,
      left: 0,
      behavior: "smooth"
    });
  }
  //送出字(value)後清除input的字(value)，清除小黑點
  function chatBotSubmit() {
    // var text = 把value轉文字 因為要抓空格
    let newText = `<p class="chatBot-content-Q">${
      chatUserText.value
    }</p><div style="clear: both"></div>`;
    //清除content-Q的span
    delQpoint();
    //把你打的字加到對話區
    container.innerHTML += newText;
    //清空input的字
    chatUserText.value = "";
    chatBotScrollTo(container, content);
    //存入暫存;
  }
  chatUserText.addEventListener("keyup", function() {
    //小黑點
    let Qpoint = document.querySelectorAll(".chatBot-content-Q span");
    //HTML包含小黑點
    let newText = `<p class="chatBot-content-Q"><span></span><span></span><span></span></p><div style="clear: both"></div>`;
    //輸入字串長度大於等於1時，新增div包含小白點
    if (chatUserText.value != 0) {
      if (Qpoint.length < 1) {
        $("#chatBot-container").append(newText);
      }
      if (window.event.which == 13) {
        console.log("good");
        // document.forms["chatBot"].submit();
        chatBotSubmit();
      }
    } else {
      if (Qpoint.length >= 1) {
        delQpoint();
      }
    }
    chatBotScrollTo(container, content);
  });
  submit.addEventListener("click", function() {
    if (chatUserText.value != 0) {
      console.log("good");
      // document.forms["chatBot"].submit();
      chatBotSubmit();
    }
  });
  let keyword = document.querySelectorAll(".chatBot-keyword li");
  for (let i = 0; i < keyword.length; i++) {
    keyword[i].addEventListener("click", function() {
      let newText = `<p class="chatBot-content-Q">${
        keyword[i].innerText
      }</p><div style="clear: both"></div>`;
      container.innerHTML += newText;
      chatBotScrollTo(container, content);
    });
  }
  let keywordWrap = document.getElementsByClassName("chatBot-keyword")[0];
  keywordWrap.addEventListener("mouseover", function() {

    window.onmousewheel=document.onmousewheel=scrollFunc;
    /*IE註冊事件*/ 
    if(document.attachEvent){ 
      document.attachEvent('onmousewheel',scrollFunc); 
    } 
    /*Firefox註冊事件*/ 
    if(document.addEventListener){ 
      document.addEventListener('DOMMouseScroll',scrollFunc,false); 
    } 
    var sum=0;
    function scrollFunc() {
      var orient=event.deltaY;
      // var speed=orient/100;
      if(orient== -100 && sum > -200){
        sum += orient;
      }else if(orient== 100 && sum < 200){
        sum += orient;
      }
      // console.log("speed:"+speed);
      console.log("sum:"+sum);
      keywordWrap.scrollTo({
        top: 0,
        left: sum,
        behavior: "smooth"
      });
    }
    //找到對話框的高度，並設定變數
    let w = keywordWrap.offsetWidth;
    let windowX = event.clientX;  //網頁總寬
    let myX = event.offsetX;//滑鼠在網頁的位置
    let a = windowX - myX;
    // console.log("windowX:"+windowX);
    console.log("myX:"+myX);
    // console.log("a:"+a);
    // console.log("w:"+w);

    // let move = 

  });
});

if (document.getElementById("control-login") != null) {
  document
    .getElementById("control-login")
    .addEventListener("click", function() {
      document.getElementById("close-login").checked = false;
      document.getElementById("navctrl").checked = false;
    });
  var eye = document.getElementsByClassName("eye");
  var needCheckId = document.getElementById("sigup-member-Id");
  var needCheckPsw = document.getElementById("sigup-member-Psw");
  var needCheckNick = document.getElementById("sigup-member-Nick");
  var needCheckEmail = document.getElementsByClassName("need-check-email");
  var newPlace = "<div class='login-placeholder'></div>";
  var checkAry = [];

  var memCheckReg = new RegExp(
    /[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\_)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\.)(\/) (\<)(\>)(\?)(\)]+/
  );

  var emailCheckReg = new RegExp(
    /[(\ )(\~)(\!)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\-)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\,)(\/) (\<)(\>)(\?)(\)]+/
  );

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

  function checkSubmit(a) {
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
    alert("YES");
    return true;
  }
}
if (document.getElementById("control-search") != null) {
  //搜尋

  var closebtn = document.getElementById("close-search");
  document.getElementById("control-search").addEventListener(
    "click",
    function() {
      closebtn.checked = false;
    },
    false
  );

  var grouponTagName = document.getElementsByName("groupon-TagName");

  for (let i = 0; i < grouponTagName.length; i++) {
    grouponTagName[i].addEventListener("input", function() {
      var N = "images/tag_N.svg";
      var Y = "images/tag_Y.svg";
      var b = $(this)
        .parent()
        .find($(".groupon-TagName")[i])
        .find($("img"));
      if ((grouponTagName[i].checked = true)) {
        $(".groupon-TagName")
          .find($("img"))
          .attr("src", N);
        b.attr("src", Y);
      }
    });
  }
  var markGroupon = document.getElementById("bookmark-animation-groupon");
  var markMeal = document.getElementById("bookmark-animation-meal");
  var markGrouponText = $("#bookmark-animation-groupon").text();
  var markMealText = $("#bookmark-animation-meal").text();
  // var markSearchValue = markSearch.placeholder;
  markGroupon.addEventListener("click", function() {
    $("#input-search").attr(
      "placeholder",
      "請輸入" + markGrouponText + "關鍵字"
    );
  });
  markMeal.addEventListener("click", function() {
    $("#input-search").attr("placeholder", "請輸入" + markMealText + "關鍵字");
  });
}
