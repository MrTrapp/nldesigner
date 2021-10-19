<?php

################################################################################
## Daten aus dem Addon newsletter designer
$addon = 'nldesigner';
include(rex_path::frontend('redaxo/src/addons/nldesigner/data/htmlstyles.php')); //  Variablen inkludieren
################################################################################
####
$sliceID = 'REX_SLICE_ID';
#### Darstellung ####

##  Ausrichten Bild zu Textblock
$artkind = 'REX_VALUE[20]';

## Hintergrundfarbe
$selectBG = 'REX_VALUE[19]';
if($selectBG == '0') {
	$bgColor = 'transparent';
//	$textColor =  'inverted';
}
elseif($selectBG == '1') {
	$bgColor = $colordefaultbg;
	$textColor =  $colordefault;
}
elseif($selectBG == '2') {
	$bgColor = $colormutedbg;
	$textColor = $colormuted;
}
elseif($selectBG == '3') {
	$bgColor = $colorprimarybg;
	$textColor =  $colorprimary;
}
elseif($selectBG == '4') {
	$bgColor = $colorsecondarybg;
	$textColor =  $colorsecondary;
}
else {
	$bgColor = $bgcolortable;
	$textColor = $fontcolor;
}
## Test Inverted
$selectInverted = 'REX_VALUE[17]';
if($selectInverted == 1) {
	$textColor = $fontcoloriInverted;
}

##  Ausrichten
$selectTextAlign = 'REX_VALUE[18]';
if($selectTextAlign == 1) {
	$TextAlign = 'left';
}
elseif($selectTextAlign == 2) {
	$TextAlign = 'right';
}
elseif($selectTextAlign == 3) {
	$TextAlign = 'center';
}

#### Daten ####
## Headline
$headline = 'REX_VALUE[1]'; // REX_VALUE[1-20]
// $headlineJa = '<caption>'.$headline.'</caption>';
$headlineJa = '<tr><th colspan="2" style="max-width: 100%; background-color: '.$bgColor.';text-align:'.$TextAlign.';font-size: xx-large;">'.$headline.'</th></tr>';
$headlineJaNein = ($headline == '') ? '' : $headlineJa;

## Text
$htmlText = 'REX_VALUE[2]'; // 'REX_VALUE[id="2" output="html"]'; // redactor2
## Liste oder  Paragraph
$listeParagraph = 'REX_VALUE[8]';
####
if($listeParagraph == 1) {
$htmlText = '<p style="font-family:'.$fontfamily.'; font-size: '.$fontsize.'; line-hight: '.$lineheight.'; font-weight: '.$fontweight.'; color: '.$textColor.';">'.$htmlText.'</p>';
}
elseif($listeParagraph == 2) {
// ** Platzhalter ersetzen
$htmlText = str_replace("**", "</li><li>", $htmlText);

$htmlText = '<ul style=" font-family:'.$fontfamily.'; font-size: '.$fontsize.'; line-hight: '.$lineheight.'; font-weight: '.$fontweight.'; list-style-type: '.$libullet.'; list-style-position: '.$liinside.';color: '.$textColor.';">'.$htmlText.'</ul>';
}

## Media 1
$imagetype = 'rex_mediapool_maximized'; // 0600 / 0400 // Fest Image Grösse
## ukit 
$file = 'REX_MEDIA[1]';// Bild
## if media
if ($file != "" ) {	
	$media = rex_media::get($file); // Daten aus dem Medienpool zu diesem Bild
	$media1Titel = $media->getTitle(); // getFileName();
	$media1Type = $media->getType(); // z.B. image/png // ($media1Type != "image/svg+xml" ) 
	// alt="'.$media1_titel.'-'.rex::getServerName().'" 
    $name = $file; 
	$dateiEndung = substr($name, -3); 

### Media
// Media Manager Redaxo ab 5.7
// $MediaTypePfad = rex_media_manager::getUrl($imagetype, $file, $timestamp = null);
// $timestamp ist für Cache Busting interessant

$MediaManData = '<img src="'.rex::getServer().$MediaTypePfad.'"  alt="'.$media1Titel.'" title="'.$media1Titel.'">'; 

## Feste Grösse
$MediaSimpel = '<img width="100%" src="'.rex::getServer().'/media/'.$file.'" alt="'.$mediatitle.'">'; // uk-cover

$MediaSVG = '<img class=""  src="'.rex::getServer().'/media/'.$file.'" alt="'.$media1Titel.'" title="'.$media1Titel.'">'; //  uk-cover

## Responsive 
/* 
$MediaDataSize = '<img class="uk-responsive-width uk-align-center"
                    src="index.php?rex_media_type=optimum&rex_media_file='.$file.'"
                    data-sizes="auto"
                    data-srcset="index.php?rex_media_type=0300&rex_media_file='.$file.' 0400w,
                        index.php?rex_media_type=0600&rex_media_file='.$file.' 0600w,
                        index.php?rex_media_type=0900&rex_media_file='.$file.' 0900w,
                        index.php?rex_media_type=1200&rex_media_file='.$file.' 1280w
                        "
                    alt="'.$mediatitle.'"  title="'.$mediatitle.'"               
					 uk-cover>'; // uk-cover 
*/

// Media Manager Plus
// $MediaManPlus = mmp::generatePictureTag($imagetype, $file);

## Ausgabe nach Bildtype
if ($dateiEndung != 'svg' | $dateiEndung != 'gif' ){
$rexMediaJa = $MediaSimpel; // $MediaManPlus; // $MediaManData;   
}
else 
$rexMediaJa = $MediaSVG;

## gibt es ein Bild Ja/Nein

## if media ende
}
$rexMedia1JaNein = ($file == '' ) ? '' : $rexMediaJa;
######################################################

## Link 1
$linkIntern =  'REX_LINK[1]'; // Link Intern
if($linkIntern) {
 // Artikeldatensatz ermitteln
          $art = rex_article::get('REX_LINK[id=1]'); 
		  // dump($art);
          // Artikelinhalt auslesen inkl. aktuelle Sprache    
          $article = new rex_article_content($art->getId(), $art->getClang());

          //Weitere Informationen auslesen z.B. Titel, Beschreibung
          $art_title = $art->getName();

         // Weitere Daten der MetaInfos können wie folgt ausgelesen werden 
       // z.B. Beschreibung
         // $art_description =  $art->getValue('art_description');  
         
$linkInternJa = '<a class="btn" style="'.$btn.'" href="'.rex_getUrl($linkIntern).'"  target="_blank">';
}
else $linkIntern = '';

$linkExtern =  'REX_VALUE[5]'; // Link text
$linkExternJa = '<a class="btn" style="'.$btn.'" href="'.$linkExtern.'" target="_blank">'; // 
$linkText =  'REX_VALUE[6]'; // Link text
$linkTextJaNein = ($linkText != '') ? $linkText : (($art_title != '') ? $art_title : '{{mehr}}');

$linkInternExtern = ($linkIntern != '') ? $linkInternJa : (($linkExtern != '') ? $linkExternJa : '');

if($linkInternExtern) {
$btnLink = $linkInternExtern.''.$linkTextJaNein.'</a>';
}
else $btnLink = '';
##################################################
##  Ausrichtung vorbereiten: '.$align.'

$ausgabeMedia = '<th style="vertical-align: top;width:50%;">
        		<p>'.$rexMedia1JaNein.' </p>
			</th>';

$ausgabeText = '<th style="text-align:'.$TextAlign.';width:50%;">
		'.$htmlText.'
		'.$btnLink.'
</th>';



##  Ausrichtung rechts links  oder gesamt gewünscht!
if ($artkind == 1) { 
	// 'left'
	$ausgabeBody = $headlineJaNein.$ausgabeMedia.$ausgabeText;
}
elseif  ($artkind == 2) {
	// 'right'
	$ausgabeBody = 	$headlineJaNein.$ausgabeText.$ausgabeMedia;
}
elseif  ($artkind == 3) {
	//  'gesamte breite'
	$ausgabeBody = 	'<th style="max-width: 100%; background-color: '.$bgColor.';">'.$rexMedia1JaNein.'</th>
	'.$headlineJaNein.'
	<tr>
	<th style="max-width: 100%;padding:4%;background-color:'.$bgColor.';">
	'.$htmlText.'</th>
	</tr>';
}
// else $ausgabeBody = $ausgabeMedia.$ausgabeText;
##################################################
$ausgabe = '';
##################################################
if (rex::isFrontend()) {
$ausgabe .= '<table style="width:100%;padding:2%; background-color: '.$bgColor.';">  <tr>';
// $ausgabe .= '<tr>'.$headlineJaNein.'</tr>';
$ausgabe .= $ausgabeBody;
$ausgabe .= '</tr>
</table>';
echo $ausgabe;
}
else echo $headline.$ausgabeMedia.$ausgabeText;
##################################################
?>