<?php
/**
 * IceMegaMenu Extension for Joomla 3.0 By IceTheme
 * 
 * 
 * @copyright	Copyright (C) 2008 - 2012 IceTheme.com. All rights reserved.
 * @license		GNU General Public License version 2
 * 
 * @Website 	http://www.icetheme.com/Joomla-Extensions/icemegamenu.html
 * @Support 	http://www.icetheme.com/Forums/IceMegaMenu/
 *
 */



$icemegamenu->render($params, 'modIceMegaMenuXMLCallback');
?>
<script>
	jQuery(function($){
		var $scrollEl = ($.browser.mozilla || $.browser.msie) ? $('html') : $('body');
 		if($('body').hasClass('desktop_mode') || ($('body').hasClass('mobile') && screen.width>767)){
		  $('.icemegamenu li>a').click(function(){
		  	var link = $(this);
		   	if(link.closest('li').hasClass("parent")){
		    	if(link.closest('li').hasClass("hover")){
		     		if(link.attr('href').length){
		      		window.location = link.attr('href');
		     		}
		    	}
		    	else{
		     		$('.icemegamenu li.parent').not(link.closest('li').parents('li')).not(link.closest('li')).removeClass('hover');
		     		link.closest('li').addClass('hover').attr('data-hover','true');
		     		link.closest('li').find('>ul.icesubMenu').addClass('visible');
		     		return false;
		    	}
		   	}
			})
		}
		else{
			$('#icemegamenu li.parent[class^="iceMenuLiLevel"]').hover(function(){
				$('#icemegamenu li.parent[class^="iceMenuLiLevel"]').not($(this).parents('li')).not($(this)).removeClass('hover');
				$(this).addClass('hover').attr('data-hover','true');
				$(this).find('>ul.icesubMenu').addClass('visible');
			},
			function(){
				$(this).attr('data-hover','false');
				$(this).delay(800).queue(function(n){
					if($(this).attr('data-hover') == 'false'){
						$(this).removeClass('hover').delay(250).queue(function(n){
							if($(this).attr('data-hover') == 'false'){
								$(this).find('>ul.icesubMenu').removeClass('visible');
							}
							n();
						});
					}
					n();
				})
			})
		}
		if(screen.width>767){
			$(window).load(function(){
				$('#icemegamenu').parents('[id*="-row"]').scrollToFixed({minWidth: 768});
			})
		}
		var idArray=[],click_scroll=false,init_hash=window.location.hash;$('.home_menu .icemegamenu li.iceMenuLiLevel_1>a[href^="#"]').each(function(a){idArray[a]=$(this).attr("href")});var isMobile=navigator.userAgent.match(/(iPhone)|(iPod)|(iPad)|(android)|(Windows Phone)|(BlackBerry)|(iemobile)|(symbian)|(BB10)|(PlayBook)|(webOS)/i);if(isMobile){$(".icemegamenu li>a").click(function(){var a=$(this);if(a.closest("li").hasClass("parent")){if(a.closest("li").hasClass("hover")){if(a.attr("href").length){window.location=a.attr("href")}}else{$(".icemegamenu li.parent").not(a.closest("li").parents("li")).not(a.closest("li")).removeClass("hover");a.closest("li").addClass("hover").attr("data-hover","true");a.closest("li").find(">ul.icesubMenu").addClass("visible");return false}}});$('.home_menu .icemegamenu li.iceMenuLiLevel_1>a[href^="#"]').click(function(){var a=$(this);if(a.closest("li").hasClass("parent")){if(a.closest("li").hasClass("hover")){a.delay(800).queue(function(b){if(a.closest("li").attr("data-hover")=="false"){a.closest("li").removeClass("hover").delay(250).queue(function(c){if(a.closest("li").attr("data-hover")=="false"){a.closest("li").find(">ul.icesubMenu").removeClass("visible")}c()})}b()});if($(a.attr("href")).length){click_scroll=true;$(".home_menu .icemegamenu li.iceMenuLiLevel_1").each(function(){$(this).removeClass("hover").find(">a").removeClass("icemega_active")});a.addClass("icemega_active");if(history.pushState){history.pushState(null,null,a.attr("href"))}$scrollEl.animate({scrollTop:$(a.attr("href")).offset().top-$(".scroll-to-fixed-fixed").outerHeight()},400,function(){$(this).delay(200).queue(function(b){click_scroll=false;$(this).delay(1200).queue(function(c){if(typeof $.fn.lazy=="function"){$("img.lazy").lazy({bind:"event",effect:"fadeIn",effectTime:500})}c()});b()})})}return false}else{$('.home_menu .icemegamenu li.parent[class^="iceMenuLiLevel"]').not(a.closest("li").parents("li")).not(a.closest("li")).removeClass("hover");a.closest("li").addClass("hover").attr("data-hover","true");a.closest("li").find(">ul.icesubMenu").addClass("visible");return false}}else{if($(a.attr("href")).length){click_scroll=true;$(".home_menu .icemegamenu li.iceMenuLiLevel_1").each(function(){$(this).removeClass("hover").find(">a").removeClass("icemega_active")});a.addClass("icemega_active");if(history.pushState){history.pushState(null,null,a.attr("href"))}$scrollEl.animate({scrollTop:$(a.attr("href")).offset().top-$(".scroll-to-fixed-fixed").outerHeight()},400,function(){$(this).delay(200).queue(function(b){click_scroll=false;$(this).delay(1200).queue(function(c){if(typeof $.fn.lazy=="function"){$("img.lazy").lazy({bind:"event",effect:"fadeIn",effectTime:500})}c()});b()})})}return false}})}else{$('.home_menu .icemegamenu li.iceMenuLiLevel_1>a[href^="#"]').click(function(){var a=$(this);if($(a.attr("href")).length){click_scroll=true;$(".home_menu .icemegamenu li.iceMenuLiLevel_1").each(function(){$(this).removeClass("hover").find(">a").removeClass("icemega_active")});a.addClass("icemega_active");if(history.pushState){history.pushState(null,null,a.attr("href"))}$scrollEl.animate({scrollTop:$(a.attr("href")).offset().top-$(".scroll-to-fixed-fixed").outerHeight()},400,function(){$(this).delay(200).queue(function(b){click_scroll=false;$(this).delay(1200).queue(function(c){if(typeof $.fn.lazy=="function"){$("img.lazy").lazy({bind:"event",effect:"fadeIn",effectTime:500})}c()});b()})})}return false})}var lastScrollTop=0;$(window).scroll($.throttle(500,change_menu_item));$(window).load(function(){change_menu_item();if($(this).scrollTop()>24){$("body:first").addClass("scrolled")}else{$("body:first").removeClass("scrolled")}});function change_menu_item(){if(!click_scroll){var a=$(window).scrollTop(),d="";if(!init_hash||init_hash==""){if(a>lastScrollTop){for(var b=0,c=idArray.length;b<c;b++){if($(idArray[b]).length){if(a+($(window).height()-$(".scroll-to-fixed-fixed").outerHeight())/2>=$(idArray[b]).offset().top){d=idArray[b]}}}}else{for(var b=idArray.length-1;b>=0;b--){if($(idArray[b]).length){if(a+($(window).height()-$(".scroll-to-fixed-fixed").outerHeight())/2<=$(idArray[b]).offset().top){d=idArray[b-1]}}}}lastScrollTop=a;if(window.location.hash!=d&&d!=""){if(history.pushState){history.pushState(null,null,d)}$(".home_menu .icemegamenu li.iceMenuLiLevel_1").each(function(){$(this).removeClass("hover").find(">a").removeClass("icemega_active")});$("a[href="+d+"]").addClass("icemega_active")}}else{if($("a[href="+init_hash+"]").length){$(".home_menu .icemegamenu li.iceMenuLiLevel_1").each(function(){$(this).removeClass("hover").find(">a").removeClass("icemega_active")});$("a[href="+init_hash+"]").addClass("icemega_active")}if($(init_hash).length){click_scroll=true;$scrollEl.animate({scrollTop:$(init_hash).offset().top-$(".home_menu").parents("div[id*=row]").outerHeight()},400,function(){$(this).delay(200).queue(function(e){click_scroll=false;init_hash=false;$(this).delay(1200).queue(function(f){if(typeof $.fn.lazy=="function"){$(".lazy_container img").lazy({bind:"event",effect:"fadeIn",effectTime:500})}f()});e()})})}}return false}};
	});
</script>