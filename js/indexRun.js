$(document).ready(function() {
  function wheel() {
    var $windowTop = $(window).scrollTop();
    $(".indexJoin-bg > img").hide();
    if ($windowTop > $(".indexJoin").offset().top - 200) {
      $("#indexJoin-btnO , #indexJoin-ckO")
        .removeClass()
        .show()
        .addClass();
      $("#indexJoin-btnQr , #indexJoin-ckQr")
        .removeClass()
        .show()
        .addClass();
    }
  }

  // wheel();
  $(window).scroll(function() {
    wheel();
  });
});
