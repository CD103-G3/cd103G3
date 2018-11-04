$(document).ready(function() {
  if ($(window).width() > 1200) {
    function wheel() {
      var $windowTop = $(window).scrollTop();

      if ($windowTop > $(".indexMeal").offset().top - 200) {
        $(".top1")
          .delay(1600)
          .animate({ top: "0px" }, 1000);
        $(".top2")
          .delay(800)
          .animate({ top: "31px" }, 1000);
        $(".top3").animate({ top: "31px" }, 1000);
      }
    }

    wheel();
    $(window).scroll(function() {
      wheel();
    });
  }
});
