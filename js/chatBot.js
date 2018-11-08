document.getElementById("close-chatBot").addEventListener("click", function() {
  document.getElementById("navctrl").checked = false;
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
        // console.log("window.event.which == 13");
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
      // console.log("chatUserText.value != 0");
      // document.forms["chatBot"].submit();
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
  for (let i = 0;  i < keyword.length; i++) {
    keywordWidth.push(parseInt(getComputedStyle(keyword[i], null).width));
    maxW += keywordWidth[i];
    console.log(maxW);
  }
  keywordWrap.onmousewheel = addKey;
    function addKey(e) {
      var e = e || window.event;
      // console.log();
      if (keywordWrap.contains(e.target)) {
        var minW = -(maxW);
        var orient = event.deltaY;
        if(orient > 0 ){
          cc += 35;
          if(cc > maxW){
            cc = maxW;
          }
        }else if(orient < 0){
          cc -= 35;
          if(cc < minW){
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
      e.stopPropagation()
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