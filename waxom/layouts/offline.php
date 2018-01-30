
<?php
/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();

// add css
$this['asset']->addFile('css', 'css:theme.css');

require_once JPATH_ADMINISTRATOR . '/components/com_users/helpers/users.php';
$twofactormethods = UsersHelper::getTwoFactorMethods();

?>

<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>" class="uk-height-1-1">

<head>
<?php echo $this->render('head', compact('error', 'title')); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>

<body class="uk-height-1-1 uk-vertical-align uk-text-center tt-offline">
        <div class="offline-logo"><div class="img"></div><div class="wrap">Waxom</div></div>
        <script>
            jQuery(function($) {
               "use strict";
               jQuery('.offline-logo .img').dblclick(function(){
                   jQuery('.tm-offline').fadeToggle();
               });

            });
        </script>
        <div class="uk-panel uk-width-1-1 uk-panel-box uk-vertical-align-middle message-offline uk-container-center">
            <jdoc:include type="message" />
            <?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != '') : ?>

            <p><?php echo $app->getCfg('offline_message'); ?></p>

            <?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', $message) != '') : ?>

            <p><?php echo $message; ?></p>

            <?php endif; ?>
        </div>
	<div class="tm-offline uk-panel uk-panel-box uk-vertical-align-middle uk-container-center">

		<form class="uk-form" action="<?php echo JRoute::_('index.php', true); ?>" method="post">

			<div class="uk-form-row">
				<input class="uk-width-1-1" type="text" name="username" placeholder="<?php echo JText::_('JGLOBAL_USERNAME') ?>">
			</div>

			<div class="uk-form-row">
				<input class="uk-width-1-1" type="password" name="password" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>">
			</div>

			<?php if (count($twofactormethods) > 1) : ?>
			<div class="uk-form-row">
				<input class="uk-width-1-1" type="text" name="secretkey" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>" />
			</div>
			<?php endif; ?>

			<div class="uk-form-row">
				<button class="uk-button uk-button-primary uk-width-1-1" type="submit" name="Submit"><?php echo JText::_('JLOGIN') ?></button>
			</div>

			<div class="uk-form-row">
				<div class="uk-form-controls">
					<input type="checkbox" name="remember" value="yes" placeholder="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>">
					<label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label>
				</div>
			</div>

			<input type="hidden" name="option" value="com_users">
			<input type="hidden" name="task" value="user.login">
			<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>">
			<?php echo JHtml::_('form.token'); ?>

		</form>

	</div>
        <div class="offline-socials">{modulepos offline}</div>

</body>
</html>