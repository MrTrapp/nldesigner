<!DOCTYPE html>
<?php print '<html lang="'. rex_clang::getCurrent()->getCode() .'">'; ?>
<?php 
	$articleId = $this->getValue("article_id");
	$artname = rex_article::get($articleId)->getName(); 
	$templateID = 'REX_TEMPLATE_ID'; 
	if($templateID) {
	$addQueryTemplateID = ' AND rex_nldesigner.templateid = '.$templateID.' ';
}
else $addQueryTemplateID = '';
?>
<?php
################################################################################
## Daten aus dem Addon newsletter designer
$addon = 'nldesigner';
include(rex_path::frontend('redaxo/src/addons/nldesigner/data/htmlstyles.php')); //  Variablen inkludieren
################################################################################
?>
<head>
    <meta charset="utf-8" />
    <base href="<?php echo \rex_addon::get('yrewrite')->isAvailable() ? \rex_yrewrite::getCurrentDomain()->getUrl() : \rex::getServer(); ?>" />
    <meta title="<?php echo $artname.' '. rex::getServerName(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=<?php echo $tbwidth; // 650 ?>">
<!-- 
	/// Fonts ///
    <link href="<?php echo rex::getServer(); ?>theme/public/css/Webfonts.css" rel="stylesheet">
    <link href="<?php echo rex::getServer(); ?>theme/public/css/icon.css" rel="stylesheet">
-->
    <style>

<?php echo $htmlStyles; ?>
    </style>
</head>

<body style="<?php echo $styletablebody; ?>">
<p style="text-align:center">
<a href="<?php echo rex::getServer(); ?>" target="_blank"><img class="uk-responsive-width" src="<?php echo rex::getServer().'media/'.$logofile;?>" width="360px" alt="<?php echo rex::getServerName(); ?>"></a></p>
<p style="text-align:center;font-size: medium;"><a href="+++NEWSLETTERLINK+++">Im Browser anzeigen.</a></p>
	<!-- /// GESAMTE TABELLE START \\\ -->
<?php echo '<table  border="'.$tbborder.'" align="center" '.$styletablebody.'>
  <tr>
    <td  width="'.$tbwidth.'">'; ?>
REX_ARTICLE[ctype=2] <!-- Teaser --->
<p style="color: '.$fontcolor.'; text-align: center;font-size: large;">+++TITLE+++ +++GRAD+++ +++FIRSTNAME+++ +++LASTNAME+++</p>

REX_ARTICLE[ctype=1] <!-- Content --->

<p style="text-align: center;">
<a href="<?php echo rex::getServer(); ?>" target="_blank"><img src="<?php echo rex::getServer().'media/'.$logofile; ?>" width="240px" alt="<?php echo rex::getServerName(); ?>"></a>
    <br clear="all">
 </td>
  </tr>
<!-- /// GESAMTE TABELLE ENDE \\\ -->
</table>
<p>
<footer>
<p style="text-align: center;font-size: medium;">	<a title="Von dieser Newsletter abmelden" style="color:#ad9963; text-decoration: none" href="+++ABMELDELINK+++">Abmelden</a>  |   <a style="color: #ad9963;text-decoration: none;" href="+++LINK_PRIVACY_POLICY+++" target="_blank">Datenschutzerklärung</a></p>
    </footer>
</body>
</html>