function $id(id) {
  return document.getElementById(id);
}
document.getElementById("close-search").addEventListener("click", function() {
  searchAjax();
});

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
  $("#input-search").attr("placeholder", "請輸入" + markGrouponText + "關鍵字");
});
markMeal.addEventListener("click", function() {
  $("#input-search").attr("placeholder", "請輸入" + markMealText + "關鍵字");
});
// $id('start-search').addEventListener('click',function () {
  
// },false);

function searchAjax() {
  //傳PHP端
  var obj = {};
  obj.meal_Genre = "meal_Genre";
  obj.grouponTag = "grouponTag";
  var jsonStr = JSON.stringify(obj);

  //=====使用Ajax 回server端,取回關鍵字內容, 放到頁面上
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    if (xhr.status == 200) {
      if (xhr.responseText.indexOf("not found") != -1) {
        //回傳的資料中有not found
        // return "";
        alert("not found");
      } else {
        //查有此keyword
        alert("OK");
      }
    } else {
      alert(xhr.status);
    }
  };
  xhr.open("post", "searchAjax.php", true);
  xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  var data_info = "jsonStr=" + jsonStr;
  xhr.send(data_info);
}