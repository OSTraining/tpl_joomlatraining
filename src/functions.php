<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.ostrainingbreeze
 *
 * @copyright   Copyright (C) 2009, 2016 OSTraining.com
 * @license     GNU General Public License version 2 or later; see license.txt
 */

 // Restrict Access to within Joomla
 defined('_JEXEC') or die('Restricted access');

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Adjusting main content width
if ($this->countModules('left') && $this->countModules('right'))
{
	$span_component = "span6";
}
elseif ($this->countModules('left') && !$this->countModules('right'))
{
	$span_component = "span9";
}
elseif (!$this->countModules('left') && $this->countModules('right'))
{
	$span_component = "span9";
}
else
{
	$span_component = "span12";
}

// Adjusting bottom width
if ($this->countModules('bottom-a and bottom-b and bottom-c'))
{
	$span_bottom = "span4";
}elseif($this->countModules('bottom-a xor bottom-b xor bottom-c')){
	$span_bottom = "span12";
}else{
	$span_bottom = "span6";
}

// Adjusting footer width
if ($this->countModules('footer-a and footer-b and footer-c'))
{
	$span_footer = "span4";
}elseif($this->countModules('footer-a xor footer-b xor footer-c')){
	$span_footer = "span12";
}else{
	$span_footer = "span6";
}

// Logo file
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . $this->baseurl . '/' . $this->params->get('logoFile') . '" alt="'. $sitename .'" />';
}else
{
	$logo = '<img src="' . $this->baseurl . '/templates/' . $this->template . '/images/logo.png" alt="'. $sitename .'" />';
}

// background image
$fullbg = $this->baseurl . '/' . $this->params->get('bgFile');

// color scheme
$color_scheme = $this->params->get('colorScheme', '#2184CD');

// hover color
$hover_color = $this->params->get('hoverColor', '#41A1D6');

// Google font
$google_font = explode( ':', $this->params->get('googleFontName') );

// Footer text
$footer_text = $this->params->get('footerText');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/template.js');
$doc->addScript('templates/' .$this->template. '/js/jquery.mobilemenu.js');

// Add Stylesheets
$doc->addStyleSheet('templates/system/css/general.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

// Mobile menu
if ($this->params->get('mobileMenu', 1))
{
	$doc->addScript('templates/' .$this->template. '/js/mobilemenu.js');
	$doc->addStyleSheet('templates/'.$this->template.'/css/mobilemenu.css');
}

// font awesome
if ($this->params->get('fontAwesome', 1))
{
	$doc->addStyleSheet('templates/'.$this->template.'/css/font-awesome/css/font-awesome.min.css');
}

// custom css
if( file_exists('templates/'.$this->template.'/css/custom.css')){
	$doc->addStyleSheet('templates/'.$this->template.'/css/custom.css');
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
