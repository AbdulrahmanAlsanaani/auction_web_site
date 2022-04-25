/**
* Template Name: HeroBiz - v2.1.0
* Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
var countDownDate = new Date("May 10, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});

	/////////////////////////////////////////

	// Products Slick
	$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

	// Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#product-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
					vertical: false,
					arrows: false,
					dots: true,
        }
      },
    ]
  });

	// Product img zoom
	var zoomMainProduct = document.getElementById('product-main-img');
	if (zoomMainProduct) {
		$('#product-main-img .product-preview').zoom();
	}

	/////////////////////////////////////////

	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})
	});

	var priceInputMax = document.getElementById('price-max'),
			priceInputMin = document.getElementById('price-min');

	priceInputMax.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	priceInputMin.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	function updatePriceSlider(elem , value) {
		if ( elem.hasClass('price-min') ) {
			console.log('min')
			priceSlider.noUiSlider.set([value, null]);
		} else if ( elem.hasClass('price-max')) {
			console.log('max')
			priceSlider.noUiSlider.set([null, value]);
		}
	}

	// Price Slider
	var priceSlider = document.getElementById('price-slider');
	if (priceSlider) {
		noUiSlider.create(priceSlider, {
			start: [1, 999],
			connect: true,
			step: 1,
			range: {
				'min': 1,
				'max': 999
			}
		});

		priceSlider.noUiSlider.on('update', function( values, handle ) {
			var value = values[handle];
			handle ? priceInputMax.value = value : priceInputMin.value = value
		});
	}

})(jQuery);

document.addEventListener('DOMContentLoaded', () => {
	"use strict";
  
	/**
	 * Preloader
	 */
	const preloader = document.querySelector('#preloader');
	if (preloader) {
	  window.addEventListener('load', () => {
		preloader.remove();
	  });
	}
  
	/**
	 * Sticky header on scroll
	 */
	const selectHeader = document.querySelector('#header');
	if (selectHeader) {
	  document.addEventListener('scroll', () => {
		window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
	  });
	}
  
	/**
	 * Navbar links active state on scroll
	 */
	let navbarlinks = document.querySelectorAll('#navbar .scrollto');
  
	function navbarlinksActive() {
	  navbarlinks.forEach(navbarlink => {
  
		if (!navbarlink.hash) return;
  
		let section = document.querySelector(navbarlink.hash);
		if (!section) return;
  
		let position = window.scrollY;
		if (navbarlink.hash != '#header') position += 200;
  
		if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
		  navbarlink.classList.add('active');
		} else {
		  navbarlink.classList.remove('active');
		}
	  })
	}
	window.addEventListener('load', navbarlinksActive);
	document.addEventListener('scroll', navbarlinksActive);
  
	/**
	 * Function to scroll to an element with top ofset
	 */
	function scrollto(el) {
	  const selectHeader = document.querySelector('#header');
	  let offset = 0;
  
	  if (selectHeader.classList.contains('sticked')) {
		offset = document.querySelector('#header.sticked').offsetHeight;
	  } else if (selectHeader.hasAttribute('data-scrollto-offset')) {
		offset = selectHeader.offsetHeight - parseInt(selectHeader.getAttribute('data-scrollto-offset'));
	  }
	  window.scrollTo({
		top: document.querySelector(el).offsetTop - offset,
		behavior: 'smooth'
	  });
	}
  
	/**
	 * Fires the scrollto function on click to links .scrollto
	 */
	let selectScrollto = document.querySelectorAll('.scrollto');
	selectScrollto.forEach(el => el.addEventListener('click', function(event) {
	  if (document.querySelector(this.hash)) {
		event.preventDefault();
  
		let mobileNavActive = document.querySelector('.mobile-nav-active');
		if (mobileNavActive) {
		  mobileNavActive.classList.remove('mobile-nav-active');
  
		  let navbarToggle = document.querySelector('.mobile-nav-toggle');
		  navbarToggle.classList.toggle('bi-list');
		  navbarToggle.classList.toggle('bi-x');
		}
		scrollto(this.hash);
	  }
	}));
  
	/**
	 * Scroll with ofset on page load with hash links in the url
	 */
	window.addEventListener('load', () => {
	  if (window.location.hash) {
		if (document.querySelector(window.location.hash)) {
		  scrollto(window.location.hash);
		}
	  }
	});
  
	/**
	 * Mobile nav toggle
	 */
	const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
	if (mobileNavToogle) {
	  mobileNavToogle.addEventListener('click', function(event) {
		event.preventDefault();
  
		document.querySelector('body').classList.toggle('mobile-nav-active');
  
		this.classList.toggle('bi-list');
		this.classList.toggle('bi-x');
	  });
	}
  
	/**
	 * Toggle mobile nav dropdowns
	 */
	const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');
  
	navDropdowns.forEach(el => {
	  el.addEventListener('click', function(event) {
		if (document.querySelector('.mobile-nav-active')) {
		  event.preventDefault();
		  this.classList.toggle('active');
		  this.nextElementSibling.classList.toggle('dropdown-active');
  
		  let dropDownIndicator = this.querySelector('.dropdown-indicator');
		  dropDownIndicator.classList.toggle('bi-chevron-up');
		  dropDownIndicator.classList.toggle('bi-chevron-down');
		}
	  })
	});
  
	/**
	 * Auto generate the hero carousel indicators
	 */
	let heroCarouselIndicators = document.querySelector('#hero .carousel-indicators');
	if (heroCarouselIndicators) {
	  let heroCarouselItems = document.querySelectorAll('#hero .carousel-item')
  
	  heroCarouselItems.forEach((item, index) => {
		if (index === 0) {
		  heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}" class="active"></li>`;
		} else {
		  heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}"></li>`;
		}
	  });
	}
  
	/**
	 * Scroll top button
	 */
	const scrollTop = document.querySelector('.scroll-top');
	if (scrollTop) {
	  const togglescrollTop = function() {
		window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
	  }
	  window.addEventListener('load', togglescrollTop);
	  document.addEventListener('scroll', togglescrollTop);
	  scrollTop.addEventListener('click', window.scrollTo({
		top: 0,
		behavior: 'smooth'
	  }));
	}
  
	/**
	 * Initiate glightbox
	 */
	const glightbox = GLightbox({
	  selector: '.glightbox'
	});
  
	/**
	 * Porfolio isotope and filter
	 */
	let portfolionIsotope = document.querySelector('.portfolio-isotope');
  
	if (portfolionIsotope) {
  
	  let portfolioFilter = portfolionIsotope.getAttribute('data-portfolio-filter') ? portfolionIsotope.getAttribute('data-portfolio-filter') : '*';
	  let portfolioLayout = portfolionIsotope.getAttribute('data-portfolio-layout') ? portfolionIsotope.getAttribute('data-portfolio-layout') : 'masonry';
	  let portfolioSort = portfolionIsotope.getAttribute('data-portfolio-sort') ? portfolionIsotope.getAttribute('data-portfolio-sort') : 'original-order';
  
	  window.addEventListener('load', () => {
		let portfolioIsotope = new Isotope(document.querySelector('.portfolio-container'), {
		  itemSelector: '.portfolio-item',
		  layoutMode: portfolioLayout,
		  filter: portfolioFilter,
		  sortBy: portfolioSort
		});
  
		let menuFilters = document.querySelectorAll('.portfolio-isotope .portfolio-flters li');
		menuFilters.forEach(function(el) {
		  el.addEventListener('click', function() {
			document.querySelector('.portfolio-isotope .portfolio-flters .filter-active').classList.remove('filter-active');
			this.classList.add('filter-active');
			portfolioIsotope.arrange({
			  filter: this.getAttribute('data-filter')
			});
			if (typeof aos_init === 'function') {
			  aos_init();
			}
		  }, false);
		});
  
	  });
  
	}
  
	/**
	 * Clients Slider
	 */
	new Swiper('.clients-slider', {
	  speed: 400,
	  loop: true,
	  autoplay: {
		delay: 5000,
		disableOnInteraction: false
	  },
	  slidesPerView: 'auto',
	  breakpoints: {
		320: {
		  slidesPerView: 2,
		  spaceBetween: 40
		},
		480: {
		  slidesPerView: 3,
		  spaceBetween: 60
		},
		640: {
		  slidesPerView: 4,
		  spaceBetween: 80
		},
		992: {
		  slidesPerView: 6,
		  spaceBetween: 120
		}
	  }
	});
  
	/**
	 * Testimonials Slider
	 */
	new Swiper('.testimonials-slider', {
	  speed: 600,
	  loop: true,
	  autoplay: {
		delay: 5000,
		disableOnInteraction: false
	  },
	  slidesPerView: 'auto',
	  pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true
	  }
	});
  
	/**
	 * Testimonials Slider
	 */
	new Swiper('.portfolio-details-slider', {
	  speed: 600,
	  loop: true,
	  autoplay: {
		delay: 5000,
		disableOnInteraction: false
	  },
	  slidesPerView: 'auto',
	  pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true
	  }
	});
  
	/**
	 * Animation on scroll function and init
	 */
	function aos_init() {
	  AOS.init({
		duration: 1000,
		easing: 'ease-in-out',
		once: true,
		mirror: false
	  });
	}
	window.addEventListener('load', () => {
	  aos_init();
	});
  
  });