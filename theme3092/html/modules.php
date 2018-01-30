<?php
defined('_JEXEC') or die;
$app    = JFactory::getApplication(); 
$template = $app->getTemplate();
require_once JPATH_BASE . DS . 'templates' . DS . $template . DS . 'includes' . DS . 'Mobile_Detect.php';

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */


/*
 * themeHtml5 (chosen themeHtml5 tag and font headder tags)
 */

function modChrome_themeHtml5($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  $moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
  $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable {$moduleClassSfx} {$moduleClass}\"><div class=\"module_container\">";

    if ((bool) $module->showtitle)
    {
      $html .= "<header><{$headerTag} class=\"moduleTitle {$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>";
    }

    $html .= $module->content;
    $html .= "</div></{$moduleTag}>";

    echo $html;
  }
}

function modChrome_themeHtml5_noMobile($module, &$params, &$attribs)
{
$detect = new Mobile_Detect;
  if(!$detect->isMobile()){
    $moduleTag      = $params->get('module_tag');
    $headerTag      = htmlspecialchars($params->get('header_tag'));
    $headerClass    = $params->get('header_class');
    $bootstrapSize  = $params->get('bootstrap_size');
    $moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
    $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

    if (!empty ($module->content))
    {
      $html  = "<{$moduleTag} class=\"moduletable {$moduleClassSfx} {$moduleClass}\"><div class=\"module_container\">";

      if ((bool) $module->showtitle)
      {
        $html .= "<header><{$headerTag} class=\"moduleTitle {$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>";
      }

      $html .= $module->content;
      $html .= "</div></{$moduleTag}>";

      echo $html;
    }
  }
}

function modChrome_html5nosize($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable {$moduleClassSfx}\"><div class=\"module_container\">";

    if ((bool) $module->showtitle){
      $html .= "<header><{$headerTag} class=\"moduleTitle {$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>";
    }

    $html .= $module->content;
    $html .= "</div></{$moduleTag}>";

    echo $html;
  }
}

function modChrome_html5nosizeMap($module, &$params, &$attribs)
{
  $themeLayout = JFactory::getApplication()->getTemplate(true)->params->get('themeLayout');
  switch ($themeLayout) {
    case '0':
      $containerClass = 'container';
      break;

    case '1':
      $containerClass = 'container-fluid';
      break;
    
    default:
      $containerClass = 'container';
      break;
  }
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html  = "<{$moduleTag} class=\"moduletable {$moduleClassSfx}\"><div class=\"module_container\">";

    if ((bool) $module->showtitle){
      $html .= "<div class=\"row-container\">
            <div class=\"".$containerClass."\">
              <header><{$headerTag} class=\"moduleTitle {$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>
              </div>
              </div>";
    }

    $html .= $module->content;
    $html .= "</div></{$moduleTag}>";

    echo $html;
  }
}

function modChrome_html5nosize_noMobile($module, &$params, &$attribs)
{
  $detect = new Mobile_Detect;
  if(!$detect->isMobile()){
    $moduleTag      = $params->get('module_tag');
    $headerTag      = htmlspecialchars($params->get('header_tag'));
    $headerClass    = $params->get('header_class');
    $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

    if (!empty ($module->content))
    {
      $html  = "<{$moduleTag} class=\"moduletable {$moduleClassSfx}\"><div class=\"module_container\">";

      if ((bool) $module->showtitle){
        $html .= "<header><{$headerTag} class=\"moduleTitle {$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>";
      }

      $html .= $module->content;
      $html .= "</div></{$moduleTag}>";

      echo $html;
    }
  }
}

function modChrome_modal($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $bootstrapSize  = $params->get('bootstrap_size');
  $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

  if (!empty ($module->content))
  {
    $html = "<{$moduleTag} class=\"moduletable {$moduleClassSfx}\">";

    if ((bool) $module->showtitle){
      $html .= "<div class=\"modal-header\"><header><{$headerTag} class=\"{$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header></div>";
    }

    $html .= "<div class=\"modal-body\">";
    $html .= $module->content;
    $html .= "</div>";
    $html .= "</{$moduleTag}>";

    echo $html;
  }
}

function modChrome_sidebar($module, &$params, &$attribs)
{
  $moduleTag      = $params->get('module_tag');
  $headerTag      = htmlspecialchars($params->get('header_tag'));
  $headerClass    = $params->get('header_class');
  $moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));
  if (!empty ($module->content))
  {
    $html = "<{$moduleTag} class=\"moduletable {$moduleClassSfx}\">";
    if ((bool) $module->showtitle){
      $html .= "<header><{$headerTag} class=\"{$headerClass}\">".wrap_with_span($module->title)."</{$headerTag}></header>";
    }
    $html .= $module->content;
    $html .= "</{$moduleTag}>";
    echo $html;
  }
}