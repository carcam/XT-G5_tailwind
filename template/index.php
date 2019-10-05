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

require_once JPATH_ROOT.'/libraries/xttailwind/vendor/autoload.php';

require_once 'XTHtmlAssetsBodyRenderer.php';
require_once 'XTHtmlAssetsRenderer.php';

use Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetTag;
use Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;
use Extly\Infrastructure\Support\HtmlAsset\Repository as HtmlAssetRepository;

// Let's add Tailwind generated scripts

// The HtmlAssetRepository, where all extensions coordinate the scripts and styles
$htmlAssetRepository = HtmlAssetRepository::getInstance();

// Add template js - JavaScript to be deferred
$templateJsFile = CMSHTMLHelper::script('template.js', ['version' => 'auto', 'relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(ScriptTag::create($templateJsFile));

// Add Stylesheets
// Stylesheet to be included inline
$templateCssFile = CMSHTMLHelper::stylesheet('template.css', ['version' => 'auto', 'relative' => true, 'pathOnly' => true]);
$htmlAssetRepository->push(LinkCriticalStylesheetTag::create($templateCssFile));

// And, now the gantry stuff

// Bootstrap Gantry framework or fail gracefully (inside included file).
$gantry = include __DIR__ . '/includes/gantry.php';

/** @var \Gantry\Framework\Theme $theme */
$theme = $gantry['theme'];

// All the custom twig variables can be defined in here:
$context = array();

// Render the page.
$renderedPage = $theme->render('index.html.twig', $context);

// Replace the Header Renderer
$noJDocPage = str_replace('<jdoc:include type="head" />', '<jdoc:include type="xthtmlassets" />', $renderedPage);

// Remove IE scripts
$noStylesScriptsPage = preg_split('#<!--\[if \(gte IE 8\)&\(lte IE 9\)\]>|<!\[endif\]-->#', $noJDocPage);

// Remove other g5 scripts
$restOfPage = $noStylesScriptsPage[2];
$restOfPageNoMainScript = preg_split('#<script type="text/javascript" src="/media/gantry5/assets/js/main|</script>#', $restOfPage);

// Rebuild the HTML page
$htmlPage = [];
$htmlPage[] = $noStylesScriptsPage[0];
$htmlPage[] = $restOfPageNoMainScript[0];

// Add our Body scripts renderer
$htmlPage[] = '<jdoc:include type="xthtmlassetsbody"  name="body" style="none" />';

$htmlPage[] = $restOfPageNoMainScript[2];

echo implode('', $htmlPage);
