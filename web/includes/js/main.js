(function($) { 

	// if (Cookies.get('theme')=='' || Cookies.get('theme')== null ||  Cookies.get('theme')== 'undifined') {
	// 	Cookies.set('theme','dark');
	// }
	// if (Cookies.get('theme')=='dark') {
	// 	$link = $('<link/>', {rel: 'stylesheet',href: '/assets/css/dark.css'}).appendTo('head');
	// 	$('#darkch').prop('checked','true');
	// }else{
	// 	$("LINK[href='/assets/css/dark.css']").remove();
	// 	Cookies.set('theme','light');
	// 	$('#darkch').prop('checked','');
	// }

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

	// $('.drop-down a.dda').on("click", function() {
	// 	var parent = $(this).parent();
	// 	parent.toggleClass('ddActive');
	// });

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

// --------------------------------------------------------------------- //
function read_channels () {
	$.ajax({
		url: 'http://192.168.100.104:7678/tv/get_channel.php',
		type: 'GET',
		success: function (data) {

			n = JSON.parse(data);

			var a = {};
			var max = 10;
			if (Cookies.get('ch-favorites')) {
				a = JSON.parse(Cookies.get('ch-favorites'));
			}
			var logo_ch
			var html_channel="";
			var html_channel_rec="";
			var html_channel_fav="";
			var r_number={};
			var ii=0;
			var number=null;
			while(ii<9){
				number=Math.floor((Math.random() * n.length-1) + 1);
				if(r_number[number]==undefined){
					r_number[number]=number;
					var icon_ = '<i class="fr favorite mdi mdi-bookmark-outline"></i>';
					if (n[number].logo == "") {
						logo_ch	='<img src="/assets/img/tv.png">'
					}else{
						logo_ch	='<img src="/assets/img/' + n[number].name.toLowerCase() + '.png" alt="">'
					}

					html_channel_rec+='<div class="col-md-6 col-lg-4 mb-2 mb-lg-4"><div class="card" ><a href="singlepage.html" data-id="' + n[number].id + '" data-profile="' + n[number].profile + '" data-channelid="' + n[number].channelid + '" data-port="' + n[number].port + '" data-link="' + n[number].link + '"><div class="channel position-relative w-100"> <div class="ch-img position-absolute">' + logo_ch + '</div><div class="ch-data h-100"><h4 class="w-100">' + n[number].name + '</h4><p>Передача...</p><div class="progressbars"><div class="progress" start="10:25" stop="12:10"><div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div></div></div></div></a>' + icon_ + '</div></div>';

					ii++;

				}
			}
			for(var i=0; i < n.length-1; i++){
				var icon_ = '<i class="fr favorite mdi mdi-bookmark-outline"></i>';
				if (n[i].logo == "") {
					logo_ch	='<img src="/assets/img/tv.png">'
				}else{
					logo_ch	='<img src="/assets/img/' + n[i].name.toLowerCase() + '.png" alt="">'
				}
				if (a[ n[i].id ] != undefined) {
					icon_ = '<i class="fr favorite mdi mdi-bookmark"></i>';
					html_channel_fav+='<div class="col-md-6 col-lg-4 mb-2 mb-lg-4"><div class="card" ><a href="singlepage.html" data-id="' + n[i].id + '" data-profile="' + n[i].profile + '" data-channelid="' + n[i].channelid + '" data-port="' + n[i].port + '" data-link="' + n[i].link + '"><div class="channel position-relative w-100"> <div class="ch-img position-absolute">' + logo_ch + '</div><div class="ch-data h-100"><h4 class="w-100">' + n[i].name + '</h4><p>Передача...</p><div class="progressbars"><div class="progress" start="10:25" stop="12:10"><div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div></div></div></div></a>' + icon_ + '</div></div>';
				}

				html_channel+='<div class="col-md-6 col-lg-4 mb-2 mb-lg-4"><div class="card" ><a href="singlepage.html" data-id="' + n[i].id + '" data-profile="' + n[i].profile + '" data-channelid="' + n[i].channelid + '" data-port="' + n[i].port + '" data-link="' + n[i].link + '"><div class="channel position-relative w-100"> <div class="ch-img position-absolute">' + logo_ch + '</div><div class="ch-data h-100"><h4 class="w-100">' + n[i].name + '</h4><p>Передача...</p><div class="progressbars"><div class="progress" start="10:25" stop="12:10"><div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div></div></div></div></a>' + icon_ + '</div></div>';

			}
			if (n.length > 0) {

				//$('#allchannels').html('<div class="col-12"><div class="title">Все каналы</div></div>' + html_channel);
				//$('#recomended').html(html_channel_rec);
				if (html_channel_fav != "") {
					$('#favorites').html(html_channel_fav);
				}else{
					$('#favorites').html('<div class="col-12"><p>Нет данных...</p></div>');
				}
			} else{
				$('#allchannels').html('<div class="col-12"><p>Нет данных...</p></div>');
				$('#recomended').html('<div class="col-12"><p>Нет данных...</p></div>');
				$('#favorites').html('<div class="col-12"><p>Нет данных...</p></div>');
			}
		}
	});
}
read_channels();
// $('#allchannels, #favorites, #recomended').on("click", ".favorite", function () {
// 	read_channels();
//  	$(this).toggleClass('mdi-bookmark-outline mdi-bookmark');
//  	var p = $(this).parent();
//  	var a = {};
// 	if (Cookies.get('ch-favorites')) {
// 		a=JSON.parse(Cookies.get('ch-favorites'));
// 	}
// 	if (a[p.children('a').attr('data-id')]) {
// 		delete a[p.children('a').attr('data-id')];
// 	}else{
// 		a[p.children('a').attr('data-id')] = p.children('a').attr('data-id');
// 	}
// 	Cookies.set('ch-favorites', JSON.stringify(a));
//
// });
    $('.favorite').click(function () {
        $(this).toggleClass('mdi-bookmark-outline mdi-bookmark');
        var p = $(this).parent();
        var a = {};


        if (Cookies.get('ch-favorites')) {
            a = JSON.parse(Cookies.get('ch-favorites'));
        }
        if (a[p.children('a').attr('data-id')]) {
            delete a[p.children('a').attr('data-id')];
        } else {
            a[p.children('a').attr('data-id')] = p.children('a').attr('data-id');
        }
        Cookies.set('ch-favorites', JSON.stringify(a));

    });


Date.prototype.ddmm = function() {
	var yyyy = this.getFullYear().toString();
	var mm = (this.getMonth()+1).toString();
	var dd  = this.getDate().toString();
	var wd  = this.getDay();
	var mm_name = ['Янв.', 'Фев.', 'Мар.', 'Апр.', 'Май.', 'Июн.', 'Июл.', 'Авг.', 'Сен.', 'Окт.', 'Ноя.', 'Дек.'];
	var wd_name = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
	return (wd_name[wd] + " " + (dd[1]?dd:"0"+dd[0]) + " " + (mm_name[mm-1]));
};
var date = new Date();
date.setDate(date.getDate());
//$('#nav-d1-tab').text(date.ddmm());
date.setDate(date.getDate() + 1);
//$('#nav-d2-tab').text(date.ddmm());
date.setDate(date.getDate() + 2);
//$('#nav-d3-tab').text(date.ddmm());

setTimeout( function () {
	$('#allchannels, #recomended').on("click", "a", function() {
		Cookies.set('ch-id', $(this).attr('data-id'));
		Cookies.set('ch-profile', $(this).attr('data-profile'));
		Cookies.set('ch-channelid', $(this).attr('data-channelid'));
		Cookies.set('ch-link', $(this).attr('data-link'));
		Cookies.set('ch-port', $(this).attr('data-port'));
		Cookies.set('ch-name', $(this).find('h4').text());  
	});
} ,150);
if ($('.s-video')) {
	//$('.s-video').html('<source src="http://' + Cookies.get('ch-link') + ':' + Cookies.get('ch-port') + '/stream/channelid/'+ Cookies.get('ch-channelid') +'?profile=' + Cookies.get('ch-profile') + '">');
	//$('.s-p.title').html(Cookies.get('ch-name'));
	//$('title').text(Cookies.set('ch-name'));
}   
$(document).ready(function () {
	$.ajax({
		url: "https://robita.tj/programm.php?id=" + Cookies.set('ch-id'),
		dataType: "JSON",  
		success: function(chlist) {
			chl = chlist; 
			var	iconplay =""; 			
			var ptime = moment().format("YYYY-MM-DD");
			var now = moment().add(1,'days').format("YYYY-MM-DD");
			var tomorrow = moment().add(2,'days').format("YYYY-MM-DD");
			if(chl.length!=0){
				for(var i=0; i < chl.length-1; i++){ 
					ptime = moment(chl[i].start, "YYYYMMDDHHmmss").format("HH:mm");

					if (tomorrow == moment(chl[i].start, "YYYYMMDDHHmmss").format("YYYY-MM-DD")) {
						$("#nav-d3").append('<div class="d-inline-block transmission ' + ( i==0 ? "active":"" ) + ' mb-2 w-100"><div class="w-100"><div class="name"><b>' + ptime + '</b> ' + chl[i].title + '</div>' + (i==0 ? '<i class="mdi mdi-play tn"></i>' : '') + '</div><div>');
					}else if(now ==moment(chl[i].start, "YYYYMMDDHHmmss").format("YYYY-MM-DD")){
						$("#nav-d2").append('<div class="d-inline-block transmission ' + ( i==0 ? "active":"" ) + ' mb-2 w-100"><div class="w-100"><div class="name"><b>' + ptime + '</b> ' + chl[i].title + '</div>' + (i==0 ? '<i class="mdi mdi-play tn"></i>' : '') + '</div><div>');

					}
				} 
			}else{
				$('.psvprog').hide();
				$('.vrow').addClass('justify-content-center');
			}
			
		} 
	});
}); 

const player = new Plyr('#player', {
	autoplay: true, 
	volume: 1,
	controls: ['play-large', 'play', 'progress', 'volume', 'mute', 'captions',  'pip', 'airplay', 'fullscreen'],
	title: 'Example Title',
});

var elem = document.getElementById("player");
function AutoPlay() { 
	elem.autoplay = true;
	elem.load();
} 
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