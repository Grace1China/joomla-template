<?php
/**
 * Torbara It's Me Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */

/*
 * Generate 3-column layout
 */
$config          = $this['config'];
$sidebars        = $config->get('sidebars', array());
$columns         = array('main' => array('width' => 60, 'alignment' => 'right'));
$sidebar_classes = '';

$gcf = function($a, $b = 60) use(&$gcf) {
    return (int) ($b > 0 ? $gcf($b, $a % $b) : $a);
};

$fraction = function($nominator, $divider = 60) use(&$gcf) {
    return $nominator / ($factor = $gcf($nominator, $divider)) .'-'. $divider / $factor;
};

foreach ($sidebars as $name => $sidebar) {
	if (!$this['widgets']->count($name)) {
        unset($sidebars[$name]);
        continue;
    }

    $columns['main']['width'] -= @$sidebar['width'];
    $sidebar_classes .= " tm-{$name}-".@$sidebar['alignment'];
}

if ($count = count($sidebars)) {
	$sidebar_classes .= ' tm-sidebars-'.$count;
}

$columns += $sidebars;
foreach ($columns as $name => &$column) {

    $column['width']     = isset($column['width']) ? $column['width'] : 0;
    $column['alignment'] = isset($column['alignment']) ? $column['alignment'] : 'left';

    $shift = 0;
    foreach (($column['alignment'] == 'left' ? $columns : array_reverse($columns, true)) as $n => $col) {
        if ($name == $n) break;
        if (@$col['alignment'] != $column['alignment']) {
            $shift += @$col['width'];
        }
    }
    $column['class'] = sprintf('tm-%s uk-width-medium-%s%s', $name, $fraction($column['width']), $shift ? ' uk-'.($column['alignment'] == 'left' ? 'pull' : 'push').'-'.$fraction($shift) : '');
}

/*
 * Add grid classes
 */
$positions = array_keys($config->get('grid', array()));
$displays  = array('small', 'medium', 'large');
$grid_classes = array();
$box_classes = array();
$display_classes = array();
foreach ($positions as $position) {

    $grid_classes[$position] = array();
    $box_classes[$position] = array();
    $grid_classes[$position][] = "tm-{$position} uk-grid";
    $display_classes[$position][] = '';

    if ($this['config']->get("grid.{$position}.divider", false)) {
        $grid_classes[$position][] = 'uk-grid-divider';
    }
    
    if ($this['config']->get("grid.{$position}.fullwidth", false)) {
        $box_classes[$position][] = 'tm-full-width';
    }
    
    if ($this['config']->get("grid.{$position}.collapse", false)) {
        $grid_classes[$position][] = 'uk-grid-collapse';
    }
    
    $box_classes[$position][] = $this['config']->get("grid.{$position}.box_style", "");
    $box_classes[$position][] = $this['config']->get("grid.{$position}.box_class", "");
    
    $widgets = $this['widgets']->load($position);

    foreach($displays as $display) {
        if (!array_filter($widgets, function($widget) use ($config, $display) { return (bool) $config->get("widgets.{$widget->id}.display.{$display}", true); })) {
            $display_classes[$position][] = "uk-hidden-{$display}";
        }
    }

    $display_classes[$position] = implode(" ", $display_classes[$position]);
    $grid_classes[$position] = implode(" ", $grid_classes[$position]);
    $box_classes[$position] = implode(" ", $box_classes[$position]);
}

/*
 * Add body classes
 */

$body_classes  = $sidebar_classes;
$body_classes .= $this['system']->isBlog() ? ' tm-isblog' : ' tm-noblog';
$body_classes .= ' '.$config->get('page_class');
if(!$this['config']->get('sticky_menu', false)){
    $body_classes .= ' tt-no-sticky-menu';
}


$config->set('body_classes', trim($body_classes));


/*
 * Sticky Navbar
 */
$sticky = array("media: 767");
$navbar = "";
switch ($this['config']->get('sticky_menu', false)) {
    // Always sticky
    case '1':
        $sticky   = 'data-uk-sticky="{'.implode(',', array_filter($sticky)).'}"';
        break;

    case '2':
        // Only sticky after target, Overlay, 2 Styles, Contrast
        $navbar  .= 'tm-navbar-overlay tm-navbar-transparent tm-navbar-contrast';
        $sticky[] = "top: '.uk-sticky-placeholder + *'";
        $sticky[] = "animation: 'uk-animation-slide-top'";
        $sticky[] = "clsinactive: 'tm-navbar-transparent tm-navbar-contrast'";
        $sticky   = 'data-uk-sticky="{'.implode(',', array_filter($sticky)).'}"';
        break;

    default:
        // Not Sticky
        $sticky   = '';
        break;
}


/*
 * Add social buttons
 */

$body_config = array();
$body_config['twitter']  = (int) $config->get('twitter', 0);
$body_config['plusone']  = (int) $config->get('plusone', 0);
$body_config['facebook'] = (int) $config->get('facebook', 0);
$body_config['style']    = $config->get('style');

$config->set('body_config', json_encode($body_config));

/*
 * Add assets
 */

// add css
$this['asset']->addFile('css', 'css:theme.css');
$this['asset']->addFile('css', 'warp:vendor/highlight/highlight.css');
$this['asset']->addFile('css', 'css:custom.css');
$this['asset']->addFile('css','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"');

// add scripts
$this['asset']->addFile('js', 'js:uikit.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/autocomplete.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/search.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/tooltip.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sticky.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideshow.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideset.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slider.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/lightbox.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/accordion.js');



//Additional components
if ($this['config']->get('js_grid')=="1"){
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/grid.js');
}

if ($this['config']->get('js_slider')=="0"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slider.js');
}

if ($this['config']->get('js_slideset')=="0"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideset.js');
}

if ($this['config']->get('js_parallax')=="1"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/parallax.js');
}

if ($this['config']->get('js_accordion')=="0"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/accordion.js');
}

if ($this['config']->get('js_sticky')=="0"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sticky.js');
}

if ($this['config']->get('js_tooltip')=="0"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/tooltip.js');
}

if ($this['config']->get('js_datepicker')=="1"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/datepicker.js');
}

if ($this['config']->get('js_timepicker')=="1"){ 
    $this['asset']->addFile('js', 'warp:vendor/uikit/js/components/timepicker.js');
}



$this['asset']->addFile('js', 'js:social.js');
$this['asset']->addFile('js', 'js:waypoints.js');
$this['asset']->addFile('js', 'js:jquery.counterup.min.js');
$this['asset']->addFile('js', 'js:Chart.bundle.js');
if ($this['config']->get('js_bundle')=="1"){ 
    $this['asset']->addFile('js', 'js:chart.js');
}
$this['asset']->addFile('js', 'js:theme.js');

// internet explorer
if ($this['useragent']->browser() == 'msie') {
	$head[] = sprintf('<!--[if IE 8]><link rel="stylesheet" href="%s"><![endif]-->', $this['path']->url('css:ie8.css'));
    $head[] = sprintf('<!--[if lte IE 8]><script src="%s"></script><![endif]-->', $this['path']->url('js:html5.js'));
}

if (isset($head)) {
    $this['template']->set('head', implode("\n", $head));
}