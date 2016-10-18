/*
CSS Browser Selector js v0.5.3 (July 2, 2013)

-- original --
Rafael Lima (http://rafael.adm.br)
http://rafael.adm.br/css_browser_selector
License: http://creativecommons.org/licenses/by/2.5/
Contributors: http://rafael.adm.br/css_browser_selector#contributors
-- /original --

Fork project: http://code.google.com/p/css-browser-selector/
Song Hyo-Jin (shj at xenosi.de)
*/

function css_browser_selector(n){var b=n.toLowerCase(),f=function(c){return b.indexOf(c)>-1},h="gecko",k="webkit",p="safari",j="chrome",d="opera",e="mobile",l=0,a=window.devicePixelRatio?(window.devicePixelRatio+"").replace(".","_"):"1";var i=[(!(/opera|webtv/.test(b))&&/msie\s(\d+)/.test(b)&&(l=RegExp.$1*1))?("ie ie"+l+((l==6||l==7)?" ie67 ie678 ie6789":(l==8)?" ie678 ie6789":(l==9)?" ie6789 ie9m":(l>9)?" ie9m":"")):(/firefox\/(\d+)\.(\d+)/.test(b)&&(re=RegExp))?h+" ff ff"+re.$1+" ff"+re.$1+"_"+re.$2:f("gecko/")?h:f(d)?d+(/version\/(\d+)/.test(b)?" "+d+RegExp.$1:(/opera(\s|\/)(\d+)/.test(b)?" "+d+RegExp.$2:"")):f("konqueror")?"konqueror":f("blackberry")?e+" blackberry":(f(j)||f("crios"))?k+" "+j:f("iron")?k+" iron":!f("cpu os")&&f("applewebkit/")?k+" "+p:f("mozilla/")?h:"",f("android")?e+" android":"",f("tablet")?"tablet":"",f("j2me")?e+" j2me":f("ipad; u; cpu os")?e+" chrome android tablet":f("ipad;u;cpu os")?e+" chromedef android tablet":f("iphone")?e+" ios iphone":f("ipod")?e+" ios ipod":f("ipad")?e+" ios ipad tablet":f("mac")?"mac":f("darwin")?"mac":f("webtv")?"webtv":f("win")?"win"+(f("windows nt 6.0")?" vista":""):f("freebsd")?"freebsd":(f("x11")||f("linux"))?"linux":"",(a!="1")?" retina ratio"+a:"","js portrait"].join(" ");if(window.jQuery&&!window.jQuery.browser){window.jQuery.browser=l?{msie:1,version:l}:{}}return i}(function(j,b){var c=css_browser_selector(navigator.userAgent);var g=j.documentElement;g.className+=" "+c;var a=c.replace(/^\s*|\s*$/g,"").split(/ +/);b.CSSBS=1;for(var f=0;f<a.length;f++){b["CSSBS_"+a[f]]=1}var e=function(d){return j.documentElement[d]||j.body[d]};if(b.jQuery){(function(q){var h="portrait",k="landscape";var i="smartnarrow",u="smartwide",x="tabletnarrow",r="tabletwide",w=i+" "+u+" "+x+" "+r+" pc";var v=q(g);var s=0,o=0;function d(){if(s!=0){return}try{var l=e("clientWidth"),p=e("clientHeight");if(l>p){v.removeClass(h).addClass(k)}else{v.removeClass(k).addClass(h)}if(l==o){return}o=l}catch(m){}s=setTimeout(n,100)}function n(){try{v.removeClass(w);v.addClass((o<=360)?i:(o<=640)?u:(o<=768)?x:(o<=1024)?r:"pc")}catch(l){}s=0}if(b.CSSBS_ie){setInterval(d,1000)}else{q(b).on("resize orientationchange",d).trigger("resize")}})(b.jQuery)}})(document,window);

/*
Available OS Codes [os]:

    win - Microsoft Windows (all versions)
    vista - Microsoft Windows Vista new
    linux - Linux (x11 and linux)
    mac - Mac OS
    freebsd - FreeBSD
    ipod - iPod Touch
    iphone - iPhone
    ipad - iPad new
    webtv - WebTV
    j2me - J2ME Devices (ex: Opera mini) changed from mobile to j2me
    blackberry - BlackBerry new
    android - Google Android new
    mobile - All mobile devices new

Available Browser Codes [browser]:

    ie - Internet Explorer (All versions)
    ie11 - Internet Explorer 11.x
    ie10 - Internet Explorer 10.x
    ie9 - Internet Explorer 9.x
    ie8 - Internet Explorer 8.x
    ie7 - Internet Explorer 7.x
    ie6 - Internet Explorer 6.x
    ie5 - Internet Explorer 5.x
    gecko - Mozilla, Firefox (all versions), Camino
    ff2 - Firefox 2
    ff3 - Firefox 3
    ff3_5 - Firefox 3.5
    ff3_6 - Firefox 3.6 new
    opera - Opera (All versions)
    opera8 - Opera 8.x
    opera9 - Opera 9.x
    opera10 - Opera 10.x
    konqueror - Konqueror
    webkit or safari - Safari, NetNewsWire, OmniWeb, Shiira, Google Chrome
    safari3 - Safari 3.x
    chrome - Google Chrome
    iron - SRWare Iron

*/









(function ($, Drupal) {

	$(":text").addClass("text");
	$(":image").addClass("image");
	$(":submit").addClass("submit");
	$(":checkbox").addClass("checkbox");
	$(":file").addClass("file");
	$(":radio").addClass("radio");
	$(":password").addClass("password");

	$("li:last-child").addClass("last");
	$("li:first-child,th:first,td:first").addClass("first");

	$('table').each( function() {
		$(this).find('tr:odd').addClass('odd');
		$(this).find('tr:even').addClass('even');
		$(this).find('tr:first').addClass('first');
		$(this).find('tr:last').addClass('last');
	});
	$('table th:nth-child(1), table td:nth-child(1), .css_table .css_cell:nth-child(1)').addClass('table_column1');
	$('table th:nth-child(2), table td:nth-child(2), .css_table .css_cell:nth-child(2)').addClass('table_column2');
	$('table th:nth-child(3), table td:nth-child(3), .css_table .css_cell:nth-child(3)').addClass('table_column3');
	$('table th:nth-child(4), table td:nth-child(4), .css_table .css_cell:nth-child(4)').addClass('table_column4');

	$('dl').each( function() {
		$(this).find('dt:first').addClass('first');
		$(this).find('dd:first').addClass('first');
		$(this).find('dt:last').addClass('last');
		$(this).find('dd:last').addClass('last');
	});


	// Add rel=external functionality for anchors
	$('a').each(function() {
		var newtarget = $(this).attr('rel');
		if (newtarget == 'external') { $(this).attr('target', '_blank'); }
	});

	// add wrapper around all buttons
	$('a.button,main input.button').each(function() {

		// add outer and inner wrappers
		$(this).wrap('<span class="button-container">');
		//$(this).wrapInner('<span class="button-inner">');
		$(this).append('<span class="button-decoration">');

		// add class based on inline, block, inline-block
		if ( $(this).hasClass('button-block') )	{
			$(this).parent().addClass('button-block');
		}
		else	{
			$(this).parent().addClass('button-inline-block');
		}

		// float
		if ( $(this).hasClass('float-left') )	{
			$(this).parent().addClass('float-left');
		}
		if ( $(this).hasClass('float-right') )	{
			$(this).parent().addClass('float-right');
		}

		// fixed
		if ( $(this).hasClass('width-100px') )	{
			$(this).parent().addClass('width-100px');
		}
		else if ( $(this).hasClass('width-200px') )	{
			$(this).parent().addClass('width-200px');
		}
		else if ( $(this).hasClass('width-300px') )	{
			$(this).parent().addClass('width-300px');
		}

	});


	// "has child" menu decoration
	$('.header_primary_menu .menu-item--expanded > a').before('<div class="has_child">');
	$(".has_child").click(function() {
		$(this).parent().toggleClass('child_menu_is_open');
	});


	// // mobile_menu
	// function mobile_menu()	{
	// 	if( $('#js_yardstick').height() < 769 )	{
	// 		$('body').addClass('mobile_menu_available');
	// 		$('#js_mobile_menu .mobile_menu_header').after( $('#js_primary_menu') );
	// 		$('#js_header_primary_menu_container #js_primary_menu').remove();
	// 	}
	// 	else	{
	// 		$('body').removeClass('mobile_menu_available');
	// 		$('#js_header_primary_menu_container').append( $('#js_primary_menu') );
	// 		$('#js_mobile_menu #js_primary_menu').remove();
	// 	}
	// }
	// mobile_menu();


	// mobile menu hide/show
	function mobile_menu_open()	{
		$('body').addClass('mobile_menu_is_open');
	}
	function mobile_menu_close()	{
		$('body').removeClass('mobile_menu_is_open');
	}
	$('#js_header_mobile_menu_toggle').click(function() {
		if ( $('body').hasClass('mobile_menu_is_open') )	{
			mobile_menu_close();
			}
		else	{
			mobile_menu_open();
			}
	});
	$('.mobile_menu_header .js_close').click(function() {
		mobile_menu_close();
	});


	// // phone_menu
	// function phone_menu()	{
	// 	if( $('#js_yardstick').height() < 641 )	{
	// 		$('body').addClass('phone_menu_available');
	// 		$('.header_items_2 .mobile_640_column_1 ul').append( $('.secondary_menu_member_login') );
	// 		$('.header_items_2 .mobile_640_column_2').append( $('.header_logo') );
	// 		$('.header_items_2 .mobile_640_column_3 ul').append( $('.secondary_menu_partner_with_us') );
	// 		$('.header_items_3 .mobile_640_column_1').append( $('.header_mobile_menu_toggle_container') );
	// 		$('.header_items_3 .mobile_640_column_3').append( $('#js_search_desktop') );
	// 	}
	// 	else	{
	// 		$('body').removeClass('phone_menu_available');
	// 		$('.header_secondary_menu ul').append( $('.secondary_menu_member_login') );
	// 		$('.header_logo_container').append( $('.header_logo') );
	// 		$('.header_secondary_menu ul').append( $('.secondary_menu_partner_with_us') );
	// 		$('.header_items').prepend( $('.header_mobile_menu_toggle_container') );
	// 		$('.header_search_container').append( $('#js_search_desktop') );
	// 	}
	// }
	// phone_menu();


	// phone menu hide/show
	function phone_menu_open()	{
		$('body').addClass('phone_menu_is_open');
	}
	function phone_menu_close()	{
		$('body').removeClass('phone_menu_is_open');
	}
	$('#js_header_mobile_menu_toggle').click(function() {
		if ( $('body').hasClass('phone_menu_is_open') )	{
			phone_menu_close();
			}
		else	{
			phone_menu_open();
			}
	});
	$('.mobile_menu_header .js_close').click(function() {
		phone_menu_close();
	});


	// search hide/show
	function search_open()	{
		$('body').addClass('search_is_open');
	}
	function search_close()	{
		$('body').removeClass('search_is_open');
	}
	$('header .js_search_toggle').click(function() {
		if ( $('body').hasClass('search_is_open') )	{
			search_close();
			}
		else	{
			search_open();
			}
	});
	$('header .search_form_container .js_close').click(function() {
		search_close();
	});


	// responsive_body_class
	function responsive_body_class()	{
		if( $('#js_yardstick').height() < 961 ) {
			$('body').addClass('responsive_960');
		}
		else {
			$('body').removeClass('responsive_960');
		}

		if( $('#js_yardstick').height() < 769 ) {
			$('body').addClass('responsive_768');
		}
		else {
			$('body').removeClass('responsive_768');
		}

		if( $('#js_yardstick').height() < 641 ) {
			$('body').addClass('responsive_640');
		}
		else {
			$('body').removeClass('responsive_640');
		}

		if( $('#js_yardstick').height() < 481 ) {
			$('body').addClass('responsive_480');
		}
		else {
			$('body').removeClass('responsive_480');
		}

		if( $('#js_yardstick').height() < 321 ) {
			$('body').addClass('responsive_320');
		}
		else {
			$('body').removeClass('responsive_320');
		}
	}
	responsive_body_class();


	// hero
	function hero()	{
		if( $('#js_yardstick').height() < 641 )	{
			$('.main_section_hero_left').prepend( $('.main_section_hero_left h1') );
			$('.main_section_hero_left').append( $('.main_section_hero_left .hero_content_text') );
			$('.main_section_hero_left').append( $('.main_section_hero_left .hero_content_button') );
			$('.main_section_hero_left .hero_content_button').addClass('button-container button-block');
			$('.main_section_hero_left .hero_content_button a').addClass('button').append('<span class="button-decoration">');
		}
		else	{
			$('.main_section_hero_left .hero_content').prepend( $('.main_section_hero_left .hero_content_text') );
			$('.main_section_hero_left .hero_content').prepend( $('.main_section_hero_left h1') );
			$('.main_section_hero_left .hero_content').prepend( $('.main_section_hero_left .hero_content_button') );
			$('.main_section_hero_left .hero_content_button').removeClass('button-container button-block');
			$('.main_section_hero_left .hero_content_button a').removeClass('button');
			$('.main_section_hero_left .hero_content_button a .button-decoration').remove();
		}
	}
	hero();


	// to meet design we need to move this view header outside the view
	$('.view-header-move').each(function() {
		var header = $(this).find('.view-header');
		header.before( $(this).find('h2:first-of-type') )
	});



	// scroll effects
	$(window).scroll(function() {

		//

	});


	// resize effects
	$(window).resize(function() {

		responsive_body_class();
		hero();

		mobile_menu();
		if ( $('body').hasClass('mobile_menu_is_open') )	{
			mobile_menu_close();
			}

		phone_menu();
		if ( $('body').hasClass('phone_menu_is_open') )	{
			phone_menu_close();
			}

		if ( $('body').hasClass('search_is_open') )	{
			search_close();
			}

	});

	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			mobile_menu_close();
			phone_menu_close();
			search_close();
		}
	});


})(jQuery, Drupal);

/*  create html elements so IE will display HTML5 properly  */
document.createElement('header');
document.createElement('section');
document.createElement('article');
document.createElement('footer');
document.createElement('nav');
document.createElement('main');
document.createElement('aside');
