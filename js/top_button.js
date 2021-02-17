$(function() {

    var $btn = $('#TopButton');
    var $home = $('#topSection');
    var startpoint = $home.scrollTop() + $home.height();

    $(window).on('scroll', function() {
      if($(window).scrollTop() > startpoint) {
        $btn.show();
      } else {
        $btn.hide();
      }
    })
  })

  function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}