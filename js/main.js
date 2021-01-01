/*button search*/

$("button").click(function(event){
	event.preventDefault()
	$("input").animate({
		width: 'toggle'
	}, 150, function() {
		// animation complete
	});
});

/*--------------------*/

// Mobile Navigation
if ($('.nav-menu').length) {
	var $mobile_nav = $('.nav-menu').clone().prop({
		class: 'mobile-nav d-lg-none'
	});
	$('body').append($mobile_nav);
	$('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>');
	$('body').append('<div class="mobile-nav-overly"></div>');

	$(document).on('click', '.mobile-nav-toggle', function(e) {
		$('body').toggleClass('mobile-nav-active');
		$('.mobile-nav-toggle i').toggleClass('fa fa-bars');
		$('.mobile-nav-overly').toggle();
	});

	$(document).on('click', '.mobile-nav .drop-down > a', function(e) {
		e.preventDefault();
		$(this).next().slideToggle(300);
		$(this).parent().toggleClass('active');
	});

	$(document).click(function(e) {
		var container = $(".mobile-nav, .mobile-nav-toggle");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			if ($('body').hasClass('mobile-nav-active')) {
				$('body').removeClass('mobile-nav-active');
				$('.mobile-nav-toggle i').toggleClass('fa fa-bars');
				$('.mobile-nav-overly').fadeOut();
			}
		}
	});
} else if ($(".mobile-nav, .mobile-nav-toggle").length) {
	$(".mobile-nav, .mobile-nav-toggle").hide();
}



/*check if email already exists in DB*/

$(document).ready(function(){
	var offset = 100;

    if ($(window).scrollTop() > offset){ //on refresh, if you are not on the header
        $(".fixed-top").addClass("primary");
		$(".admin-container").children(".container").addClass("no-opacity");
    }

	$(document).scroll(function() {
		var scrollStart = $(this).scrollTop();

		if(scrollStart > offset){
			$(".fixed-top").addClass("primary");
			$(".admin-container").children(".container").addClass("no-opacity");
		}
		else{
			$(".fixed-top").removeClass("primary");
			$(".admin-container").children(".container").removeClass("no-opacity");
		}
	});

	$(".card").on({
		mouseenter: function () {
			/*$(this).find("div").fadeToggle("slow", "linear");
			$(this).find("img").animate({opacity: "0.8"}, 800);*/
	    },
	    mouseleave: function () {
			/*$(this).find("div").fadeToggle("slow", "linear");
			$(this).find("img").animate({opacity: "1"}, 800);*/
	    }
	});
});

/* */

$(document).ready(function() {
  validate();
  $('input').on('keyup', validate);
});

function validate() {
  var inputsWithValues = 0;

  // get all input fields except for type='submit'
  var myInputs = $("input:not([type='submit'])");

  myInputs.each(function(e) {
    // if it has a value, increment the counter
    if ($(this).val()) {
      inputsWithValues += 1;
    }
  });

  if (inputsWithValues == myInputs.length) {
    $("input[type=submit]").prop("disabled", false);
  } else {
    $("input[type=submit]").prop("disabled", true);
  }
}
