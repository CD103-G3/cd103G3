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

  function chatBotSubmit() {
    //傳PHP端
    var obj = {};
    obj.keyword = chatUserText.value;
    var jsonStr = JSON.stringify(obj);
    $id("UserText").innerHTML = chatUserText.value;
    //使用者打的文字
    let newText =
      "<p class='chatBot-content-Q'>" +
      $id("UserText").innerText +
      "</p><div style='clear: both'></div>";
    $id("UserText").innerHTML = "";
    //清除小黑點content-Q的span
    delQpoint();
    //把使用者的文字加到對話區
    container.innerHTML += newText;
    //清空input的字
    chatUserText.value = "";
    chatBotScrollTo(container, content);

    //=====使用Ajax 回server端,取回關鍵字內容, 放到頁面上
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      if (xhr.status == 200) {
        if (xhr.responseText.indexOf("not found") != -1) {
          //回傳的資料中有not found
          alert("啊~甚麼~你可以點選關鍵字問問我");
        } else {
          //查有此keyword
          let BotText = `<p class="chatBot-content-A">${
            xhr.responseText
          }</p><div style="clear: both"></div>`;
          //把關鍵字內容加到對話區
          container.innerHTML += BotText;
          chatBotScrollTo(container, content);
          //卷軸滑到底
        }
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
    let Qpoint = document.querySelectorAll(".chatBot-content-Q span");
    //HTML包含小黑點
    let newText = `<p class="chatBot-content-Q"><span></span><span></span><span></span></p><div style="clear: both"></div>`;
    //輸入字串長度大於等於1時，新增div包含小白點
    if (chatUserText.value != "") { //如果內容沒有空值
      if (
        chatUserText.value === null ||
        chatUserText.value.match(/^ *$/) !== null
      ) {//如果內容的值是空白值
        $id("chatBot-search").disabled = true;
        return;
      }
      if (Qpoint.length < 1) { //判斷有沒有小黑點,沒有就加。
        $("#chatBot-container").append(newText);
      }
      if (window.event.which == 13) { //判斷鍵盤有按下Enter,就送出內容
        chatBotSubmit();
      }
    } else if (Qpoint.length >= 1) {//因為上面都沒有符合,等於無內容,那就可以移除小黑點。
      delQpoint();
    }
    chatBotScrollTo(container, content);
  });
  $id("chatBot-search").addEventListener("click", function() {
    if (chatUserText.value != "") {
      chatBotSubmit();
    }
  });
  //使用關鍵字
  var keyword = document.querySelectorAll(".chatBot-keyword li");
  for (let i = 0; i < keyword.length; i++) {
    keyword[i].addEventListener("click", function() {
      let newText = `<p class="chatBot-content-Q">${
        keyword[i].innerText
      }</p><div style="clear: both"></div>`;
      container.innerHTML += newText;
      chatBotScrollTo(container, content);
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

// //找到對話框的高度，並設定變數
// let windowX = event.clientX; //網頁總寬
// let myX = event.offsetX; //滑鼠在網頁的位置
// let a = windowX - myX;
// // console.log("windowX:"+windowX);
// // console.log("myX:" + myX);
// // console.log("a:"+a);
// // console.log("w:"+w);
// // let move =
