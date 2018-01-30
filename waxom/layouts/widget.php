<?php
/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */

/*
 * Theme params
 */

foreach (array('suffix', 'panel', 'title_size', 'center', 'class', 'badge', 'icon', 'display') as $var) {
	$$var = isset($params[$var]) ? $params[$var] : null;
}

// Set default panel
if ($panel == '' && in_array($widget->position, array('top-a', 'top-b', 'top-c', 'top-d', 'top-e', 'top-f', 'top-g', 'bottom-a', 'bottom-b', 'bottom-c', 'bottom-d', 'bottom-e', 'bottom-f', 'bottom-g', 'main-top', 'main-bottom', 'sidebar-a', 'sidebar-b'))) {
    $panel = $this['config']->get("panel_default.{$widget->position}.panel", '');
}
// Set panel for specific positions
else if (in_array($widget->position, array('toolbar-r' ,'toolbar-l', 'footer', 'offcanvas'))) {
	$panel = 'uk-panel';
}

// Set badge
$badge = ($badge && $badge['text']) ? '<div class="'.$badge['type'].'">'.$badge['text'].'</div>': '';

// Set icon
$icon  = ($icon && preg_match('/\.(gif|png|jpg|jpeg|svg)$/', $icon)) ? '<img src="'.$this['path']->url('site:').'/'.$icon.'" alt="'.$widget->title.'"> ' : ($icon ? '<i class="'.$icon.'"></i> ':'');

/*
 * Widget params
 */

$content = $widget->content;
$title   = ($widget->showtitle) ? $widget->title : '';

// Set title
if (in_array($widget->position, array('toolbar-r' ,'toolbar-l', 'footer'))) {
	$title = '';
} elseif ($title && !($widget->position == 'menu')) {
	$title = '<h3 class="'.($title_size ? $title_size : 'uk-panel-title').'">'.$icon.$title.'</h3>';
}

// Render menu
if ($widget->menu) {

	// Set menu renderer
	if (isset($params['menu'])) {
		$renderer = $params['menu'];
	} else if (in_array($widget->position, array('menu'))) {
		$renderer = 'navbar';
		$widget->nav_settings["modifier"] = "uk-hidden-small";
	} else if (in_array($widget->position, array('toolbar-l', 'toolbar-r', 'footer'))) {
		$renderer = 'subnav';
		$widget->nav_settings["modifier"] = "uk-subnav-line";
        if ($widget->position == 'footer') $widget->nav_settings["modifier"] .= " uk-flex-center";
	} else if (in_array($widget->position, array('offcanvas'))) {
		$renderer = 'nav';
		$widget->nav_settings["modifier"] = "uk-nav-offcanvas";
	} else {
		$renderer = 'nav';
		$widget->nav_settings["accordion"] = true;
	}

	$content = $this['menu']->process($widget, array('pre', 'subnav', $renderer, 'post'));
}

// Render widget
if (in_array($widget->position, array('breadcrumbs', 'logo', 'logo-small', 'search', 'debug')) || (($widget->position == 'offcanvas') && $widget->menu)) {
	echo $content;
} elseif ($widget->position == 'menu') {
	if ($widget->menu) {
		echo $content;
	} else {
		echo '
		<ul class="uk-navbar-nav uk-hidden-small">
			<li class="uk-parent" data-uk-dropdown>
				<a href="#">'.$title.'</a>
				<div class="uk-dropdown uk-dropdown-navbar">'.$content.'</div>
			</li>
		</ul>';
	}
} else {

	$classes = array($panel);

    // Set display
    if ($display) {
        foreach ($display as $device => $visible) {
            if (!$visible) {
                $classes[] = 'uk-hidden-'.$device;
            }
        }
    }

    if ($center) $classes[] = "uk-text-center";
	if ($class)  $classes[] = $class;
	if ($suffix) $classes[] = $suffix;

	// Individual module animations
    $animation = $this['config']->get("widgetsanimations.{$widget->id}.animation", null);
    $animation_repeat = $this['config']->get("widgetsanimations.{$widget->id}.animation_repeat", null);
    $animation_delay = $this['config']->get("widgetsanimations.{$widget->id}.animation_delay", null);

    $tm_animation = "";
    if ($animation) { $tm_animation = 'data-uk-scrollspy="{cls:\''.$animation.'\''.(($animation_repeat) ?', repeat: true':'').(($animation_delay) ?', delay: '.intval($animation_delay).' ':'').'}"'; }

    echo '<div class="'.implode(' ', $classes).'" '.$tm_animation.'>'.$badge.$title.$content.'</div>';
}
