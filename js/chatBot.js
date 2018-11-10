function $id(id) {
  return document.getElementById(id);
}
document.getElementById("close-chatBot").addEventListener("click", function() {
  // document.getElementById("navctrl").checked = false;
  //輸入框
  let chatUserText = document.getElementsByClassName("chatBot-text")[0];
  //內容第一層overflow
  let content = document.getElementById("chatBot-content");
  //內容第二層(包p)
  let container = document.getElementById("chatBot-container");
  //送出按鈕
  //刪除小黑點
  function delQpoint() {
    // console.log(container.lastChild.previousSibling.tagName);
    // console.log(container.lastChild.tagName);
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
  var botSearch = "";
  function addChatText(text) {
    //新增內容
    //使用者打的文字
    $id("UserText").innerHTML = text;
    let newText =
      "<p class='chatBot-content-Q'>" +
      $id("UserText").innerText +
      "</p><div style='clear:both'></div>";
    botSearch = $id("UserText").innerText;
    $id("UserText").innerHTML = "";
    //把使用者的文字加到對話區
    container.innerHTML += newText;
    //清空input的字
    chatUserText.value = "";
    chatBotScrollTo(container, content);
  }
  function chatBotSubmit() {
    if (botSearch.indexOf("飯團") != -1) {
      if (
        botSearch.indexOf("參加") != -1 &&
        botSearch.indexOf("飯團") != -1 
      ) {
        botSearch = "參加飯團";
      } else if (
        botSearch.indexOf("發起") != -1 &&
        botSearch.indexOf("飯團") != -1 &&
        botSearch.indexOf("參加") == -1 &&
        botSearch.indexOf("折扣") == -1
      ) {
        botSearch = "發起飯團";
      } else if (botSearch.indexOf("折扣") != -1) {
        botSearch = "飯團折扣";
      }else if(botSearch != ""){
        botSearch = "啥東東啦";
      }
    } else if (
      botSearch.indexOf("時間") != -1 ||
      botSearch.indexOf("營業") != -1 ||
      botSearch.indexOf("優惠") != -1
    ) {
      if (botSearch.indexOf("營業") != -1 && botSearch.indexOf("優惠") == -1) {
        botSearch = "營業時間";
      }
    } else if (botSearch.indexOf("取餐") != -1) {
      console.log(botSearch);
      if (botSearch.indexOf("無法") != -1 && botSearch.indexOf("如何") == -1) {
        botSearch = "不要問我";
      } else if (botSearch.indexOf("如何") != -1) {
        botSearch = "如何取餐";
      }else if(botSearch != ""){
        botSearch = "啥東東啦";
      }
    } else if (botSearch.indexOf("購物金") != -1) {
      if (botSearch.indexOf("如何") != -1) {
        if (botSearch.indexOf("使用") != -1) {
          botSearch = "如何使用購物金";
        } else if (
          botSearch.indexOf("取") != -1 ||
          botSearch.indexOf("獲") != -1
        ) {
          botSearch = "如何獲得購取金";
        }
      }else if(botSearch != ""){
        botSearch = "啥東東啦";
      }
    } else if (botSearch != "") {
      botSearch = "安安";
    }
    CallAjax(botSearch);
  }
  var BotText ="";
  function CallAjax(text) {
    //傳PHP端
    var obj = {};
    obj.keyword = text;
    var jsonStr = JSON.stringify(obj);

    //=====使用Ajax 回server端,取回關鍵字內容, 放到頁面上
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      if (xhr.status == 200) {
        if (xhr.responseText.indexOf("not found") != -1) {
          //回傳的資料中有not found
          BotText = "啊~甚麼~你可以點選關鍵字問問我";
        } else {
          //查有此keyword
          BotText = xhr.responseText.replace(/(\r\n)/g , "<br>");
        }
        //把關鍵字內容加到對話區
        container.innerHTML += `<p class="chatBot-content-A">${BotText}</p><div style="clear: both"></div>`;
        //卷軸滑到底
        chatBotScrollTo(container, content);
      } else {
        alert(xhr.status);
      }
    };
    xhr.open("post", "chatBotSaveSession.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    var data_info = "jsonStr=" + jsonStr;
    xhr.send(data_info);
  }
  chatUserText.addEventListener("keyup", function() {
    //小黑點
    var Qpoint = document.querySelectorAll(".chatBot-content-Q span");
    //HTML包含小黑點
    let newText = `<p class="chatBot-content-Q"><span></span><span></span><span></span></p><div style="clear: both"></div>`;
    //輸入字串長度大於等於1時，新增div包含小白點
    if (chatUserText.value != "") {
      //如果內容沒有空值
      if (
        chatUserText.value === null ||
        chatUserText.value.match(/^ *$/) !== null
      ) {
        //如果內容的值是空白值
        $id("chatBot-search").disabled = true;
        return;
      }
      if (Qpoint.length < 1) {
        //判斷有沒有小黑點,沒有就加。
        $("#chatBot-container").append(newText);
      }
      if (window.event.which == 13) {
        //判斷鍵盤有按下Enter,就送出內容
        delQpoint();
        addChatText(chatUserText.value);
        chatBotSubmit();
      }
    }else{
      if (Qpoint.length >= 1) {
        //小黑點
        delQpoint();
      }
    }
    chatBotScrollTo(container, content);
  });
  $id("chatBot-search").addEventListener("click", function() {
    if (chatUserText.value != "") {
      delQpoint();
      addChatText(chatUserText.value);
      chatBotSubmit();
    }
  });
  //使用關鍵字
  var keyword = document.querySelectorAll(".chatBot-keyword li");
  for (let i = 0; i < keyword.length; i++) {
    keyword[i].addEventListener("click", function() {
      var Qpoint = document.querySelectorAll(".chatBot-content-Q span");

      if (Qpoint.length >= 1) {
        //小黑點
        delQpoint();
      }
      addChatText(keyword[i].innerText);
      CallAjax(keyword[i].innerText);
    });
  }
  //移動關鍵字
  var keywordWrap = document.querySelector(".chatBot-keyword");
  var cc = 0;
  var maxW = 0;
  var keywordWidth = [];
  for (let i = 0; i < keyword.length; i++) {
    keywordWidth.push(parseInt(getComputedStyle(keyword[i], null).width));
    maxW += keywordWidth[i];
    console.log(maxW);
  }
  keywordWrap.onmousewheel = addKey;
  function addKey(e) {
    var e = e || window.event;
    // console.log();
    if (keywordWrap.contains(e.target)) {
      var minW = -maxW;
      var orient = event.deltaY;
      if (orient > 0) {
        cc += 35;
        if (cc > maxW) {
          cc = maxW;
        }
      } else if (orient < 0) {
        cc -= 35;
        if (cc < minW) {
          cc = minW;
        }
      }
      keywordWrap.scrollTo({
        top: 0,
        left: cc,
        behavior: "smooth"
      });
    }
    event.preventDefault();
    e.stopPropagation();
  }
});
