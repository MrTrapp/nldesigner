<?php
// htmlspecialchars()
// rex_string::normalize()
// rex_escape()

### Variablen 
$styleName = $sql->getValue('nlname');
$styleNameJa = ' <b>'.$styleName.'</b>';
$styleNameJaNein = ($styleName == '') ? '' : $styleNameJa;

## Farben Font
$colordefault = $sql->getValue('colordefault');
$colormuted = $sql->getValue('colormuted');
$colorprimary = $sql->getValue('colorprimary');
$colorsecondary = $sql->getValue('colorsecondary');

## Farben BG
$colordefaultbg = $sql->getValue('colordefaultbg');
$colormutedbg = $sql->getValue('colormutedbg');
$colorprimarybg = $sql->getValue('colorprimarybg');
$colorsecondarybg = $sql->getValue('colorsecondarybg');

## Body Header Footer
$bgcolorbody = $sql->getValue('bgcolorbody');
$bgcolorheader = $sql->getValue('bgcolorheader');
$bgcolortable = $sql->getValue('bgcolortable');
$bgcolorfooter = $sql->getValue('bgcolorfooter');

## Tabelle
$tbwidth = $sql->getValue('tbwidth'); // 650 >> metaviewport **
$tbborder = $sql->getValue('tbborder');
$tbbordercolor = $sql->getValue('tbbordercolor');
$cellpadding = $sql->getValue('cellpadding');
$cellmargin = $sql->getValue('cellmargin');

## Font
$fontfamily = $sql->getValue('fontfamily');
$fontcolor = $sql->getValue('fontcolor');
$fontcoloriInverted = $sql->getValue('fontcolorinverted');
$fontsize = $sql->getValue('fontsize');
$lineheight = $sql->getValue('lineheigh');
$fontweight = $sql->getValue('fontweight');

## Link
$linkcolor = $sql->getValue('alinkcolor');
$linkcolorhover = $sql->getValue('alinkcolorhover');
$linkcolorvisited = $sql->getValue('alinkcolorvisited');
$linkdecoration = $sql->getValue('alinkdecoration');

## Button
$btncolor = $sql->getValue('btncolor');
$btncolorhover = $sql->getValue('btncolorhover');
$btncolorbg = $sql->getValue('btncolorbg');
$btncolorbghover = $sql->getValue('btncolorbghover');
$btnpadding = $sql->getValue('btnpadding');
$btnborder = $sql->getValue('btnborder');

## Headline
$headingfontfamily = $sql->getValue('headingfontfamily');
$headingfontcolor = $sql->getValue('headingfontcolor');
$headingfontsize = $sql->getValue('headingfontsize');
$headingfontweight = $sql->getValue('headingfontweight');
$headinglineheight = $sql->getValue('headinglineheight');
$headingtransform = $sql->getValue('headingtexttransform');

## Liste
$libullet = $sql->getValue('libullet');
$liinside = $sql->getValue('liinside');
// $linr = $sql->getValue('linr');

## Bilder
$logofile = $sql->getValue('logofile');
$bgimage = $sql->getValue('bgfile');
$bgimagePfad =  rex::getServer().'media/'.$bgimage; ## /media/venezianischen-palast.jpg

## Redaxo Elemente
$templateid  = $sql->getValue('templateid');
$status = $sql->getValue('status');



## Hintergrundbild oder nur Hintergrundfarbe
if($bgimage) {
	$background = 'url('.$bgimagePfad.') fixed  '.$bgcolorbody; // repeat-y
}
else $background = $bgcolorbody;
// 	background-color: '.$bgcolorbody.';
################################################################################
### Styles
################################################################################ 
### Farben
$stylecolordefault = 'color: '.$colordefault.';';
$stylecolordefaultbg = 'background-color: '.$colordefaultbg.';';
$stylecolormuted = 'color: '.$colormuted.';';
$stylecolormutedbg = 'background-color: '.$colormutedbg.';';
$stylecolorprimary = 'color: '.$colorprimary.';';
$stylecolorprimarybg = 'background-color: '.$colorprimarybg.';';
$stylecolorsecondary = 'color: '.$colorsecondary.';';
$stylecolorsecondarybg = 'background-color: '.$colorsecondarybg.';';

### Body
## Abstand
$stylePadding = 'padding: '.$cellpadding.'; ';

$styleMargin = 'margin: '.$cellmargin.'; ';

$styletbborder = 'border: '.$tbborder.'; ';


$styleBody = 'body {
	font: '.$fontsize.'/'.$lineheight.'  '.$fontfamily.';
	font-weight: '.$fontweight.'; 
	text-align: left;
	color: '.$fontcolor.';
	text-decoration: none;
	background: '.$background.';
-webkit-font-smoothing: antialiased;
-webkit-text-size-adjust: 100%;
}';

### Meta
$metaviewport = '<meta name="viewport" content="width='.$tbwidth.'">'; // 650  **
/*
Hierdurch wird die „Ansicht“ in der Mail-App auf 650px Breite gezoomt, da iOS sonst eine Breite von 980px suggerieren würde, was die E-Mail demzufolge sehr klein darstellt. 650px ist in dem Fall die Breite Inhaltscontainers, so dass die Newsletter E-Mail auch optimal in Outlook & Co. dargestellt wird.
*/

### Table
$styletablebody = ' background-color:'.$bgcolortable.';color: '.$fontcolor.';border-color: '.$tbbordercolor.';padding: '.$cellpadding.';';
//  width:'.$tbwidth.'; padding: '.$cellpadding.'; margin: '.$cellmargin.';


## TYPO	
## h1
$styleh1 = ' font-family: '.$headingfontfamily .'; font-size: '.$headingfontsize.'; line-height: '.$headinglineheight.'; font-weight: '.$headingfontweight.'; transform: '.$headingtransform.'; color: '.$headingfontcolor.';';

## h2

## p Tag
$stylep = ' font-family:'.$fontfamily.'; font-size: '.$fontsize.'; line-hight: '.$lineheight.'; font-weight: '.$fontweight.'; color: '.$fontcolor.';';

## ul
$styleul = ' font-family:'.$fontfamily.'; font-size: '.$fontsize.'; line-hight: '.$lineheight.'; font-weight: '.$fontweight.'; color: '.$fontcolor.'; list-style-type: '.$libullet.'; list-style-position: '.$liinside.';';

## a:link
$styleA = '	color: '.$linkcolor.';
	text-decoration: '.$linkdecoration.';';
$styleLink = '
a,a:link {
	'.$styleA.'
}
a:focus, a:hover, a:active {
 color: '.$linkcolorhover.';
}
a:visited  {
 color: '.$linkcolorvisited.';
}';

## a:link:button 
$btn = '  text-decoration: none;
  display: inline-block;
  width: auto;
  padding: '.$btnpadding.';
  text-align: center;
  line-height: '.$lineheight.';
  color: '.$btncolor.';
  background-color: '.$btncolorbg.';
  outline: '.$btnborder.';';

$stylebutton = '
a.btn, a.btn:link {
	'.$btn.'
}
a.btn:hover, a.btn:active  {
	color: '.$btncolorhover.';
	background: '.$btncolorbghover.' !important; 
}
a.btn:visited {     
	  background-color: '.$btncolorbg.';
}';

### Image
$round = '
img.round {
border-radius: 100%;
-webkit-border-radius: 100%;
-moz-border-radius: 100%;
width: 360px;
height: 360px;
	text-align: center;
	margin-left: 20%;
	margin-right: auto;
	margin-bottom: 6%;
}';
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
img {max-width: 100%; height: auto;}
'.$round.'
';
################################################################################
/*
@media only screen and (max-width: 480px) {

table[class=table], td[class=cell] { width: 300px !important; }
table[class=promotable], td[class=promocell] { width: 325px !important; }

}
*/
