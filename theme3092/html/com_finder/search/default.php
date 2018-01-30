<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

JHtml::_('behavior.framework');
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::stylesheet('com_finder/finder.css', false, true, false);
?>
<div class="page_finder page_finder__<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php if ($this->escape($this->params->get('page_heading'))) :
		echo $this->escape($this->params->get('page_heading'));
		else :
		echo $this->escape($this->params->get('page_title'));
		endif; ?>
	</h1>
	<?php endif;

	if ($this->params->get('show_search_form', 1)): ?>
	<div id="search-form">
		<?php echo $this->loadTemplate('form'); ?>
	</div>
	<?php endif;

	// Load the search results layout if we are performing a search.
	if ($this->query->search === true):
	?>
	<div id="search-results">
		<?php echo $this->loadTemplate('results'); ?>
	</div>
	<?php endif; ?>
</div>