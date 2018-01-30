<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$app 		= JFactory::getApplication();
$tmpl 	= $app->getTemplate();
$template 	= $app->getTemplate(true);
include_once(JPATH_BASE.'/templates/'. $template->template .'/includes/functions.php');


// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');

?>
<!DOCTYPE html>
<head>
</head>
<body>
<div style="float: right; border: 2px solid black; width: 100%;"><video style="width: 100%;" src="http://bicf.org/images/apps/videos/IMSB3M/<?php echo $_GET['cur3mpreach'];?>" autoplay="autoplay" controls="controls">
	Your browser does not support the video tag.
  </video>
<h3 style="text-align: center;">圣经三分钟</h3>
</div>
</body>
</html>