$(document).ready(function() {
  if ($(window).width() > 840) {
    function wheel() {
      var $windowTop = $(window).scrollTop();

      if ($windowTop > $(".indexMeal-desc").offset().top - 500) {
        $(".top1")
          .delay(1600)
          .animate({ top: "0px" }, 1000, "easeInBack");
        $(".top2")
          .delay(800)
          .animate({ top: "31px" }, 1000, "easeInBack");
        $(".top3").animate({ top: "31px" }, 1000, "easeInBack");
      }
    }

    wheel();
    $(window).scroll(function() {
      wheel();
    });
  }
});

$(document).ready(function() {
  function wheel() {
    var $windowTop = $(window).scrollTop();

    if ($windowTop > $(".indexLogin").offset().top - 500) {
      $(".indexLogin-info > img").animate(
        { top: "0px" },
        1000,
        "easeOutBounce"
      );
      $(".indexLogin-info > div").animate(
        { bottom: "40px" },
        1000,
        "easeOutBounce"
      );
    }
  }

  wheel();
  $(window).scroll(function() {
    wheel();
  });
});
