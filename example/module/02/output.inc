<?php
################################################################################
## Daten aus dem Addon newsletter designer
$addon = 'nldesigner';
include(rex_path::frontend('redaxo/src/addons/nldesigner/data/htmlstyles.php')); //  Variablen inkludieren
################################################################################
############################## MBlock ###############################
## MBlock Addon >> Friends Of REDAXO >> Joachim Dörr
// https://github.com/FriendsOfREDAXO/mblock/
$values = rex_var::toArray("REX_VALUE[1]");
// dump($values);
$teile = 'REX_VALUE[1]';
$teile = explode("},", $teile);
// Test: echo '<br>Count: '. 
$count = count($teile, COUNT_RECURSIVE); 
##################### Datenausgabe START ############################
// Standard Rex-Doko
// https://redaxo.org/doku/master/redaxo-variablen
######################################################################
$auszB = '<table style="width:100%;padding:2%; background-color: '.$bgColor.';">
  <tr>'; 
########################### for Schleife #############################
for ($i=0; $i<$count; $i++) {
######################################################################
### Variablen
$status = $values[$i]['status'];
$headline = $values[$i]['headline'];
######################################################################
## if Status Start
if ($status == 1) {

################################ Bild 1 #############################// Bild 1 Start
// Bild 1 Start
$imagetype = 'nlmax';
// $file = "REX_MEDIA[1]"; // Rex Standard
$file = $values[$i]['REX_MEDIA_1']; // REX_INPUT_MEDIA_1 // AddOn MBlock

if ($file != "" ) {	
	$media = rex_media::get($file); // Daten aus dem Medienpool zu diesem Bild
	$media1Titel = $media->getTitle(); // getFileName();
	$media1Type = $media->getType(); // z.B. image/png // ($media1Type != "image/svg+xml" ) 
	// alt="'.$media1_titel.'-'.rex::getServerName().'" 
    $name = $file; 
    $dateiEndung    = substr($name, -3); 
####
// Media Manager Redaxo ab 5.7
$MediaTypePfad = rex_media_manager::getUrl($imagetype, $file, $timestamp = null);
// $timestamp ist für Cache Busting interessant

$MediaManData = '<img src="'.rex::getServer().$MediaTypePfad.'"  alt="'.$media1Titel.'" title="'.$media1Titel.'">'; 

## Feste Grösse
$MediaSimpel = '<img width="100%" src="'.rex::getServer().'/media/'.$file.'" alt="'.$mediatitle.'">'; // uk-cover

$MediaSVG = '<img class="uk-responsive-width"  src="'.rex::getServer().'/media/'.$file.'" alt="'.$media1Titel.'" title="'.$media1Titel.'">'; 

// Media Manager Plus
$MediaManPlus = mmp::generatePictureTag($imagetype, $file);

## Ausgabe nach Bildtype
if ($dateiEndung != 'svg' | $dateiEndung != 'gif' ){
$rexMediaJa = $MediaSimpel; // $MediaManPlus; // $MediaManData;   
}
else 
$rexMediaJa = $MediaSVG;
}
// if Media Ende
$fileJaNein = ($file == '' ) ? '' : $rexMediaJa;
################################################################### // Bild 1 Ende


############################# HTML ###################################
$auszB .= ' <th style="vertical-align:top;width:50%;text-align:left;font-size:medium;width:50%;padding: 2%;background-color: white;">'.$fileJaNein.''.$values[$i]['textarea1'].'</th>';		
######################################################################
###  for ENDE
}
###  if status ENDE
}
######################################################################
$auszB .= '</tr>
</table>';
############################ AUSGABE #################################
print $auszBJaNein = ($i == 0) ? '' : $auszB; 
?>
<?php 
	/*
/// Struktur Table Beispiel \\\
<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>
*/ 
?>