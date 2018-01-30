<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="mod-custom mod-custom__<?php echo $moduleclass_sfx ?>" id="module_<?php echo $module->id; ?>">
  <div class="video-container" data-vide-bg="<?php echo JURI::base(); ?>media/video/video"></div>
  <div class="module-content">
    <div class="module-content-inner">
      <?php echo $module->content;?>
    </div>
  </div>
</div>