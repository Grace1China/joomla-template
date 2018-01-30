/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */
jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);
    jQuery('.uk-navbar-toggle.desk-view').click(function(){
        jQuery(this).toggleClass('active');
    });
    
    jQuery('.presentation-wrap .info .play').on('click', function(ev) {
    jQuery(this).parent().parent().fadeOut();   
    jQuery("#video")[0].src += "&autoplay=1";
    ev.preventDefault();
    jQuery(".video-wrap").fadeIn(); 
  });
  
  
  jQuery('.item .count').counterUp({
    delay: 10, // the delay time in ms
    time: 1500 // the speed time in ms
  });
  
  jQuery('.filter-button-group button').click(function(){
     jQuery(this).toggleClass('active').siblings().removeClass('active'); 
  });
  
  jQuery('.search-wrap .uk-icon-search').click(function(){
    jQuery('.search-wrap .search-inner').fadeIn();
    jQuery(this).parent().addClass('active');
    jQuery('.main-menu-wrap').addClass('pad');
    jQuery('.search-wrap .uk-icon-remove').fadeIn();
  });
  jQuery('.search-wrap .uk-icon-remove').click(function(){
    jQuery(this).hide();
    jQuery(this).parent().removeClass('active');
    jQuery('.search-wrap .search-inner').hide();
    jQuery('.main-menu-wrap').removeClass('pad');
  });
  
 
});