$(document).ready(function () {
	"use strict";

	

$(document).delegate(".menu-btn","click", function(){
	"use strict";
	$(this).toggleClass("menu-btn-open");	
	
	});
	
$(document).delegate(".menu-btn","click", function(){
	"use strict";
	$(document).find(".menu").toggleClass("menu-open");	
	
	});	


$(document).delegate(".menu__link","click", function(){
            "use strict";
            $(this).next(".sub-menu").toggleClass("my-active");

            });
	
$(document).delegate(".sub-menuzx","click", function(){
	"use strict";
	$(this).next(".sub-sub-menu").toggleClass("unset2");		
});	
	
$('.menu-btn').on('click', function() {
		  "use strict";

		var elem = $(this),
		    item = $('.menu__item'),
		    active = 'is-active',
			list = $('.menu__list'),
		    play = 'menu__item--play';

		if (  elem.hasClass(active) ) {
			elem.removeClass(active);
			item.each(function(i) {
				var row = $(this);
					setTimeout(function() {
						row.removeClass(play);
						
				}, );
			});
		}

		else {
			elem.addClass(active);
			item.each(function(i) {
				var row = $(this);
					setTimeout(function() {
						row.addClass(play);
						
				}, );
			});
		}

	});



	
	
	
$('.browse-by-cuisine').owlCarousel({
	loop: true,
	margin: 15,
	autoplay: true,
	nav: false,
	dots: false,
	responsiveClass: true,
	responsive: {
	  0: {
		items: 3.5,
		autoplay: true,
	  },
	  600: {
		items: 4,
	  },
	  1000: {
		items: 5,
		margin: 15,
	  }
	}
  });
	
	
$('.browse-by-exp').owlCarousel({
	loop: true,
	margin: 15,
	autoplay: true,
	nav: false,
	dots: false,
	responsiveClass: true,
	responsive: {
	  0: {
		items: 3.5,
		autoplay: true,
	  },
	  600: {
		items: 4,
	  },
	  1000: {
		items: 5,
		margin: 15,
	  }
	}
  });	
	 
	
$('.trending-rest').owlCarousel({
	margin: 15,
	nav: false,
	loop: true,
	dots: false,
	autoplay: true,
	responsiveClass: true,
	responsive: {
	  0: {
		items: 1.8,
	  },
	  600: {
		items: 3,
	  },
	  1000: {
		items: 4,
		margin: 20,
	  }
	}
  });
	

$('.attraction-caro').owlCarousel({
	margin: 15,
	nav: false,
	loop: true,
	dots: false,
	autoplay: true,
	responsiveClass: true,
	responsive: {
	  0: {
		items: 1.4,
	  },
	  600: {
		items: 3,
	  },
	  1000: {
		items: 3,
		margin: 20,
	  }
	}
});		
			
$(window).scroll(function() {
if ($(this).scrollTop() > 1){  

	  $('header').addClass("sticky");

 }
else{
	 $('header').removeClass("sticky");

 }
});
		
});

$('#example').on('click', function(e) {
  $('.input-prefix').click()
})

$(document).ready(function() {
	"use strict";

	$(".fancybox").fancybox({
		type: "iframe",
		});
	
   $('.fancybox').fancybox();

	

});


$('.js-anchor-link').click(function(e){
	"use strict";
  e.preventDefault();
  var target = $($(this).attr('href'));
  if(target.length){
    var scrollTo = target.offset().top;
    $('body, html').animate({scrollTop: scrollTo+'px'}, 800);
  }
});






var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();


  $(function() {
  $('.chart').easyPieChart({
    size: 50,
    barColor: "#28a745",
    scaleLength: 0,
    lineWidth: 4,
    trackColor: "#dbdbdb",
    lineCap: "circle",
    animate: 2000,
  });
});


$(document).ready(function(){
    $(".view-full").click(function(){
		var parent = $(this).parent();
		$(parent).find(".more-detail-menu").slideToggle();
		$(this).text( $(this).text() == 'View full menu' ? "View Less" : "View full menu");
    });
});

        /* accordion */
	$('.my-accordion').each(function () {
		var _this = $(this),
				activeIconClass = _this.attr('data-active-icon') || '',
				inactiveIconClass = _this.attr('data-inactive-icon') || '';
		$('.collapse', this).on('show.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title i').addClass(activeIconClass).removeClass(inactiveIconClass);
		}).on('hide.bs.collapse', function () {
			var id = $(this).attr('id');
			$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
			$('a[href="#' + id + '"] .panel-title i').addClass(inactiveIconClass).removeClass(activeIconClass);
		});
	});




	// Initialize tooltips
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	 tinymce.init({
            selector: 'textarea#editor',
          });


function hasClass(ele, cls) {
  return !!ele.className.match(new RegExp("(\\s|^)" + cls + "(\\s|$)"));
}

function addClass(ele, cls) {
  if (!hasClass(ele, cls)) ele.className += " " + cls;
}

function removeClass(ele, cls) {
  if (hasClass(ele, cls)) {
    var reg = new RegExp("(\\s|^)" + cls + "(\\s|$)");
    ele.className = ele.className.replace(reg, " ");
  }
}

//Add event from js the keep the marup clean
function init() {
  document.getElementById("open-make-reservation").addEventListener("click", toggleMenu);
  document.getElementById("body-overlay").addEventListener("click", toggleMenu);
}

//The actual fuction
function toggleMenu() {
  var ele = document.getElementsByTagName("body")[0];
  if (!hasClass(ele, "menu-open")) {
    addClass(ele, "menu-open");
  } else {
    removeClass(ele, "menu-open");
  }
}

//Prevent the function to run before the document is loaded
document.addEventListener("readystatechange", function () {
  if (document.readyState === "complete") {
    init();
  }
});
	
