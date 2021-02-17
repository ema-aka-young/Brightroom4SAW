$(document).ready(function(){

    $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');

      if(value == "all")
      {
        $('.filter').css('opacity', '1.0');
    }
    else
    {
        $(".filter").not('.'+value).css('opacity', '0.25');
        $('.filter').filter('.'+value).css('opacity', '1.0');
    }
});

  if ($(".filter-button").removeClass("active")) {
      $(this).removeClass("active");
  }
  $(this).addClass("active");

});
