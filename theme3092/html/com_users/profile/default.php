<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tooltip');

$app = JFactory::getApplication('site');
$template = $app->getTemplate(true);
include_once(JPATH_BASE.'/templates/'. $template->template .'/includes/functions.php');
?>
<div class="page_profile page_profile__<?php echo $this->pageclass_sfx?>">
	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
	<ul class="btn-toolbar pull-right">
		<li class="btn-group">
			<a class="btn" href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id='.(int) $this->data->id);?>"><i class="fa fa-user"></i> <?php echo JText::_('COM_USERS_Edit_Profile'); ?></a>
		</li>
	</ul>
	<?php endif;
	if ($this->params->get('show_page_heading')) : ?>
	<div class="page_header">
		<?php echo wrap_with_tag(wrap_with_span($this->escape($this->params->get('page_heading'))), $template->params->get('categoryPageHeading')); ?>
	</div>
	<?php endif;
	echo $this->loadTemplate('core');
	echo $this->loadTemplate('params');
	echo $this->loadTemplate('custom'); ?>
</div>