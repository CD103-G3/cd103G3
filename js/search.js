function $id(id) {
  return document.getElementById(id);
}
document.getElementById("close-search").addEventListener("click", function() {
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
});
