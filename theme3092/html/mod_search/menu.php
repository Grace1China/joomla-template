<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<i class="fa fa-search"></i>
<div role="search" class="mod-search mod-search__<?php echo $moduleclass_sfx ?> hidden">
  <form action="<?php echo JRoute::_('index.php');?>" method="post" class="navbar-form">
  	<?php
		$output = '<label for="searchword" class="element-invisible">' . $label . '</label> <input id="searchword" name="searchword" maxlength="' . $maxlength . '"  class="inputbox mod-search_searchword" type="text" size="' . $width . '" placeholder="' . $text . '" required>';

			if ($button) :
			if ($imagebutton) :
				$btn_output = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
			else :
				$btn_output = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();"><i class="fa fa-search"></i>' . $button_text . '</button>';
			endif;

			switch ($button_pos) :
				case 'top' :
					$output = $btn_output . '<br />' . $output;
					break;

				case 'bottom' :
					$output .= '<br />' . $btn_output;
					break;

				case 'right' :
					$output .= $btn_output;
					break;

				case 'left' :
				default :
					$output = $btn_output . $output;
					break;
			endswitch;

		endif;

		echo $output;
		?>
  	<input type="hidden" name="task" value="search">
  	<input type="hidden" name="option" value="com_search">
  	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>">
  </form>
  <i class="fa fa-times"></i>
</div>

<script>
jQuery(function($){
	$('.icemega_modulewrap.<?php echo $moduleclass_sfx; ?>>.fa-search').click(function(){
		$(this).addClass('hidden').next().removeClass('hidden');
		$('.mod-search__<?php echo $moduleclass_sfx; ?> #searchword').focus();
	});
	$('.mod-search__<?php echo $moduleclass_sfx; ?> .fa-times').click(function(){
		$('.mod-search__<?php echo $moduleclass_sfx ?>').addClass('hidden');
		$('.<?php echo $moduleclass_sfx ?> .fa-search').removeClass('hidden');
	})
})
</script>