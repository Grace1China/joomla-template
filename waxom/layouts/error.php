<?php
/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */
// add css
$app = JFactory::getApplication();
$this['asset']->addFile('css', 'css:theme.css');
?>

<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>" class="uk-height-1-1 tm-error">

<head>
<?php echo $this->render('head', compact('error', 'title')); ?>
</head>

<body class="uk-height-1-1 uk-vertical-align uk-text-center">

	<div class="uk-vertical-align-middle uk-container-center waxom-error">

		<h1 class="tm-error-headline"><?php echo $error; ?></h1>

		<h2 class="uk-h3 tm-error-title"><?php echo $title; ?></h2>

		<p><?php echo $message; ?></p>
 
	</div>

</body>
</html>