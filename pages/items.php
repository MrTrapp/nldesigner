
<?php
################################################################################
## Daten aus dem Addon newsletter designer
$addon = 'nldesigner';
 
$templateid = rex_addon::get($addon)->getConfig('templateid');
$templateidJa = 'Template-ID: '.$templateid.' ';
$templateidJaNein = ($templateid == '') ? '' :$templateidJa;
include(rex_path::frontend('redaxo/src/addons/nldesigner/data/htmlstyles.php')); //  Variablen inkludieren
################################################################################
?>
<!-- /// panel panel-default 1 \\\ -->
 <div class="panel panel-default">
	 
<div class="panel-heading">
	 <div class="panel-title"><?php echo  $this->i18n('mld_dump_style').' '.$styleNameJaNein.' '.$templateidJaNein; ?></div>
</div><!-- panel-heading //-->

<div class="panel-body">
	  
<?php
################################################################################
### Styles
################################################################################ 
### Farben
print '<dl class="dl-horizontal">
  <dt>Farben</dt><dd>';
$stylecolordefault = 'background-color: '.$colordefault.';';
print_r($stylecolordefault);
$stylecolormuted = 'background-color: '.$colormuted.';';
print_r($stylecolormuted);
$stylecolorprimary = 'background-color: '.$colorprimary.';';
print_r($stylecolorprimary);
$stylecolorsecondary = 'background-color: '.$colorsecondary.';';
print_r($stylecolorsecondary);
print '</dd>
</dl>';
print '<hr>';
### Body
print '<dl class="dl-horizontal">
  <dt>Body</dt><dd>';
$stylePadding = 'padding: '.$cellpadding.'; ';
print_r($stylePadding);
$styleMargin = 'margin: '.$cellmargin.'; ';
print_r($styleMargin);
$styletbborder = 'border: '.$tbborder.'; ';
print_r($styletbborder);
	/* background-image: url(<?php echo rex::getServer(); ?>/media/td_bg.png ); */
	print '<hr>';
$styleBody = 'body {
	font: '.$fontsize.'/'.$lineheight.'  '.$fontfamily.';
	font-weight: '.$fontweight.'; 
	text-align: left;
	color: '.$fontcolor.';
	text-decoration: none;
	background-color: '.$bgcolorbody.';
-webkit-font-smoothing: antialiased;
}';
print_r($styleBody);
print '</dd>
</dl>';

print '<hr>';

### Table
print '<dl class="dl-horizontal">
  <dt>Tabelle</dt><dd>';
print_r($styletablebody);
print '</dd>
</dl>';
print '<hr>';

## TYPO	// line-height: 32px;
## h1
print '<dl class="dl-horizontal">
  <dt>h1</dt><dd>';
print_r($styleh1);
print '</dd>
</dl>';

print '<hr>';

## h2


## p Tag
print '<dl class="dl-horizontal">
  <dt>p</dt><dd>';
print_r($stylep);
print '</dd>
</dl>';
print '<hr>';

## ul
print '<dl class="dl-horizontal">
  <dt>List</dt><dd>';
print_r($styleul);
print '</dd>
</dl>';
print '<hr>';

## a:link
echo '<style="'.$styleLink.'"></style>'; 
print '<dl class="dl-horizontal">
  <dt>Link</dt><dd>';
print_r($styleLink);
print '</dd>
</dl>';
print '<hr>';


## a:link:button
echo '<style="'.$stylebutton.'"></style>'; 
print '<dl class="dl-horizontal">
  <dt>Button</dt><dd>';
print_r($stylebutton);
print '</dd>
</dl>';
print '<hr>';
################################################################################
## Alle Styles zusammen
################################################################################
$htmlStyles = '
'.$styleBody.'
p { '.$stylep.' }
.padding {'.$stylePadding.'}
h1 {'.$styleh1.'}
'.$styleLink.'
'.$stylebutton.'
';
// echo '<style>'.$htmlStyles.'</styles>';
################################################################################
?>

</div><!-- panel-body //-->
</div><!-- panel panel-default //-->



<!-- /// panel panel-default 2 \\\ -->
 <div class="panel panel-default">
	 
<div class="panel-heading">
	 <div class="panel-title"><?php echo  $this->i18n('mld_generate_style').' '.$styleNameJaNein.' '.$templateidJaNein; ?></div>
</div><!-- panel-heading //-->

<div class="panel-body">
<?php
################################################################################
## Beispiel
################################################################################
if($logofile) {
	$logofileJa = '<a href="'.rex::getServer().'" target="_blank"><img src="'.rex::getServer().'media/'.$logofile.'" width="240px" alt="'.rex::getServerName().'"></a>';  
}
else $logofileJa = '<p>Keine Logo Datei eingebunden.</p>';

$table = '
<table width="'.$tbwidth.'"  border="'.$tbborder.'"   align="center" '.$styletablebody.'>
  <tr>
    <th style="'.$stylePadding.'">
<h1 style="'.$styleh1.'">h1 Heading 1</h1>
<hr>
'.$logofileJa.'
<hr>
<p style="'.$stylep.'">p-tag - Paragraphs</p>
<hr>
<p style="'.$stylep.'">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
<hr>
<p style="'.$stylep.'"><a style="'.$styleA.'" href="#">a-link-tag</a></p>
<hr>
<ul style="'.$styleul.'" > List 1
  <li>List Item 1-1</li>
  <li>List Item 1-2</li>
  <li>List Item 1-3</li>
  <li>List Item 1-4</li>
</ul>
<hr>
<a class="btn" style="'.$btn.'" href="#">a-button-tag</a>
<a class="btn" style="'.$btn.'" href="#" target="_blank">a-buttun-tag</a>
<hr>
 </th>
  </tr>
</table>';
################################################################################
print $table;
print '<p class="text-center">Hover Effekte werden nur im Template angezeigt.</p>';
?>
</div><!-- panel-body //-->
</div><!-- panel panel-default //-->
