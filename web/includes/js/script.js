(function($) { 

	var lastScrollTop = 0;

	$(window).scroll(function () {
		var st = $(this).scrollTop();
		if ((window.innerWidth || document.documentElement.clientWidth) < 768) {
			if (st > lastScrollTop){
				$('.top').removeClass('fixed');
			} else {
				$('.top').addClass('fixed tn-n');
			}
			lastScrollTop = st;
			if (st > 133) { 
				$('.s-video-p').addClass('fixed');
				if ($('.top').hasClass('fixed')) {

				}else{
					$('.s-video-p').attr('style','');
				}
			}else{
				$('.top').removeClass('trn tn-n');
				$('.s-video-p').removeClass('fixed'); 
			}
			setTimeout( function () {
				if ($('.top').hasClass('tn-n')) {
					$('.top').removeClass('fixed trn tn-n');
				}
			} ,8000)

		}
	}); 
	//collapse
	$(".ic-menu, .bg-black").on("click", function(){
		$("body").toggleClass('collapsed');
	});
	//menu slider
	var whatTab = $(".s-menu ul li.active").index();
	var howFar = 50 * whatTab;
	$(".s-menu ul li.slider").css({top: howFar + "px"});

	$(".s-menu ul li a.nav-link").on("click", function(e) {
		$(".s-menu ul li").removeClass('active'); 
		var parent = $(this).parent();
		parent.toggleClass("active");
		if (parent.hasClass('dropdown')) { 
			$('.s-menu ul li .sub-menu').hide(300);
		}else{
			$('.s-menu ul li .sub-menu').hide(300);
		}
		var whatTab = parent.index();  
		var howFar = 50 * whatTab;
		$(".slider").css({top: howFar + "px"});
	});

	$('.dropdown').on("click", function() {
		$('.dropdown .sub-menu').toggleClass('active'); 
		var sub_menu = $(this).children('.sub-menu');
	});

	$('.drop-down a.dda').on("click", function() {
		var parent = $(this).parent();
		parent.toggleClass('ddActive');
	});  

	function resizeColl() { 
		var winWidth = (window.innerWidth || document.documentElement.clientWidth);
		var winHeight = (window.innerHeight || document.documentElement.clientHeight);
		if (winWidth >= 1366) {
			$("body").addClass('collapsed');
		}else{
			$("body").removeClass('collapsed');
		}
		if (winWidth < 999) {
			($('.fixed-t-n-btn') && $('.fixed-t-names')).hide(80);
		}
		$('.tab-pane').css('height', $('.s-video').height() - $('.video-height nav').height());
	}

	var width="200px"; 
	var height="100px";
	setInterval (function (){ 
		var w = $('.s-video').width() 
		var h = $('.s-video').height(); 
		$('.s-video-p').parent().css('height', $('.s-video').height());
		if ((window.innerWidth || document.documentElement.clientWidth) > 768) {

		}
		if ((window.innerWidth || document.documentElement.clientWidth) < 768) {
			width=w; 
			height=h;
			if ($('.show-more').hasClass('showed')) {
				$('.video-h .tab-pane').addClass('scroll-y').css({"overflow-y":"auto", "height":"450px"});
			}else{
				$('.video-h .tab-pane').removeClass('scroll-y').css({"overflow-y":"hidden", "height":"140px"});
			}
		}else{
			if(h != height|| width != w){
				$('.video-h .tab-pane').css({"overflow-y":"auto", "height": + $('.s-video').height() - $('.video-h nav').height()});
				width=w; 
				height=h;
			}
			if ($('.s-video-p').hasClass('fixed')) {
				$('.s-video-p').removeClass('fixed');
			}
		}  
	},200); 

	$('.show-more').on('click', function () {
		$(this).toggleClass('showed');
	});

	resizeColl();

	$(window).resize(function () {
		resizeColl() 
	}); 

	$('.telephone').on("keyup", function() {
		this.value = this.value.replace(/\D/gi, '').replace(/^0+/, ''); 
	});
	$('.con-code').on("keyup", function() {
		this.value = this.value.replace(/\D/gi, '').replace(/^0+/, '');
	});
	$('#darkch').on("click", function() {
		if ($('#darkch').prop('checked') == true){
			Cookies.set('theme', 'dark'); 
			$('head').append('<link rel="stylesheet" href="/assets/css/dark.css" type="text/css" />');
		}else{
			Cookies.set('theme', 'light');  
			$("LINK[href='/assets/css/dark.css']").remove();
		}
	});
function openFullscreen() {
	if (elem.requestFullscreen) {
		return elem.requestFullscreen();
	} else if (elem.mozRequestFullScreen) {
		elem.mozRequestFullScreen();
	} else if (elem.webkitRequestFullscreen) {
		elem.webkitRequestFullscreen();
	} else if (elem.msRequestFullscreen) {
		elem.msRequestFullscreen();
	}
} 
function closeFullscreen() {
	if (document.exitFullscreen) {
		document.exitFullscreen();
	} else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	} else if (document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	} else if (document.msExitFullscreen) {
		document.msExitFullscreen();
	}
}
})(jQuery);