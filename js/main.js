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

function app(){
	var lastElement = $(".card-columns");
	//$(".card-columns").html("");
	var txt = '<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 7</h5>\
			<p class="card-text">Some quick example text to build on the card Some quick example text to build on the card Some quick example text to build on the card Some quick example text to build on the card Some quick example text to build on the card Some quick example text to build on the card title and make up the bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>\
	<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 8</h5>\
			<p class="card-text">e bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>\
	<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 9</h5>\
			<p class="card-text">Some quick example text to build on the card title and maSome quick example text to build on the card Some quick example text to build on the cardke up the bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>\
	<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 10</h5>\
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>\
	<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 11</h5>\
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>\
	<div class="card ">\
		<div class="card-body">\
			<h5 class="card-title">Card title 12</h5>\
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content. and make up the bulk of the card\'s content. and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Prenota ora</a>\
		</div>\
	</div>';

	$('.card').fadeOut(1000, function(){
		lastElement.hide().html(txt).fadeIn(1000);
	});
}
