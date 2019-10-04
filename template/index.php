<?php
/**
 * @package   Gantry 5 Theme
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

defined('_JEXEC') or die;

// Bootstrap Gantry framework or fail gracefully (inside included file).
$gantry = include __DIR__ . '/includes/gantry.php';

/** @var \Gantry\Framework\Theme $theme */
$theme = $gantry['theme'];

// All the custom twig variables can be defined in here:
$context = array();

// Render the page.
$renderedPage = $theme->render('index.html.twig', $context);

// Remove JDocument head
$noJDocPage = str_replace('<jdoc:include type="head" />', '', $renderedPage);

// Remove IE scripts
$noStylesScriptsPage = preg_split('#<!--\[if \(gte IE 8\)&\(lte IE 9\)\]>|<!\[endif\]-->#', $noJDocPage);

// Remove other g5 scripts
$restOfPage = $noStylesScriptsPage[2];
$restOfPageNoMainScript = preg_split('#<script type="text/javascript" src="/media/gantry5/assets/js/main|</script>#', $restOfPage);

// Rebuild the HTML page
$htmlPage = [];
$htmlPage[] = $noStylesScriptsPage[0];
$htmlPage[] = $restOfPageNoMainScript[0];
$htmlPage[] = $restOfPageNoMainScript[2];

echo implode('', $htmlPage);
