function wheel() {
  var $window_top = $(window).scrollTop(); //取得視窗位置
  alert($window_top);
  var $window_indexThird = $(".indexGroupon").offset().top;
  alert($window_top);

  if ($window_top >= $window_indexThird) {
    alert("666");
    $(".indexGroupon-part1 .indexGroupon-sum .indexGroupon-count p").animate(
      { width: "87px" },
      500
    );
    $(".indexGroupon-part2 .indexGroupon-sum .indexGroupon-count p").animate(
      { width: "20px" },
      500
    );
    $(".indexGroupon-part3 .indexGroupon-sum .indexGroupon-count p").animate(
      { width: "33px" },
      500
    );
    $(".indexGroupon-part4 .indexGroupon-sum .indexGroupon-count p").animate(
      { width: "95px" },
      500
    );
  }
}

wheel();

$(window).scroll(function() {
  //視窗滾動時
  alert(66);
  wheel();
});
