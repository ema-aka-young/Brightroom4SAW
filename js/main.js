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
