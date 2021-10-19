<style>
	.tab-content {
		background-color: #e9fff2 !important;
	}
</style>
<?php
if (rex_backend_login::createUser()) { 
  $user = rex::getUser()->getName(); 
   echo '<legend>Hallo '.$user.'</legend>';
}

################################################################################
$addon = 'nldesigner';
## Farben
$colordefaultbg = rex_addon::get($addon)->getConfig('colordefault-bg');
$colormutedbg = rex_addon::get($addon)->getConfig('colormuted-bg');
$colorprimarybg = rex_addon::get($addon)->getConfig('colorprimary-bg');
$colorsecondarybg = rex_addon::get($addon)->getConfig('colorsecondary-bg');
################################################################################
// init mform
$mform = new MForm();
//$mblock = new MForm();
// $mblock_id = 3;


// tab >
$mform->addTab('Text', array('class' => 'rex-tab'));

$mform->addTextField(1, array('label'=>'Überschrift'));

## Ausrichtung
// select use set option method
$mform->addSelectField(8);
$mform->addOption('1. Paragraphs', 1);
$mform->addOption('2. Liste  formatieren mit **', 2);
$mform->setLabel('Textart');
// add textinput field
$mform->addTextAreaField(2, array('label' => 'Text','style' => 'height:300px')); 
// , 'class' => 'redactorEditor2-xx'  ,'style' => 'height:300px' 
/// , 'class' => 'markitupEditor-textile-xx'
//// , 'setDefaultValue' =>'default value string'

// text 
// $mform->addTextAreaField("15.li", array('label'=>'Liste'));

// readonly textinput
$mform->addTextReadOnlyField("14", 'Bei Liste vor jeder neue Liste zwei Sternchen eingeben **', array('label'=>'Info'));

// tab <
$mform->closeTab(); 


// tab >
$mform->addTab('Bild', array('class' => 'rex-tab'));
// media button
$mform->addMediaField(1,array('preview'=>1,'category'=>35,'label'=>'Media'));
// img list
// $mform->addImagelistField(116, array('label' => 'Imagelist'));
// tab <
$mform->closeTab(); 

// tab >
$mform->addTab('Link', array('class' => 'rex-tab'));
// custom link
// $mform->addCustomlinkField(6,array('label' => 'Link'));

// link button
$mform->addLinkField(1)
       ->setParameters(array('label'=>'Intern', 'category'=>31));
$mform->addTextField(5, array('label'=>'Extern', 'placeholder' => 'http://'));
$mform->addTextField(6, array('label'=>'Linktext', 'placeholder' => 'Mehr'));

$mform->closeTab();


// tab >
$mform->addTab('Darstellung', array('class' => ''))->pullRight(); // <i class="rex-icon rex-icon-system"></i>

## Hintergrundfarbe
// select use set option method
$mform->addSelectField(19);
$mform->addOption('--- Keine --- ', 0);
$mform->addOption('1. '.$colordefaultbg.' ', 1);
$mform->addOption('2. '.$colormutedbg.'', 2);
$mform->addOption('3. '.$colorprimarybg.' ', 3);
$mform->addOption('4. '.$colorsecondarybg.'', 4);
$mform->setLabel('Farbe');

// checkbox
$mform->addCheckboxField(17,array(1=>'Inverted'),array('label'=>'Font Color'));

## Ausrichtung
// select use set option method
$mform->addSelectField(20);
$mform->addOption('1. Bild Links', 1);
$mform->addOption('2. Bild Rechts', 2);
$mform->addOption('3. Bild über Text - gesamte Breite', 3);
$mform->setLabel('Bild zu Text');

## Ausrichtung
// select use set option method
$mform->addSelectField(18);
$mform->addOption('1. Links', 1);
$mform->addOption('2. Rechts', 2);
$mform->addOption('3. Zentriert', 3);
$mform->setLabel('Text ausrichten');

// tab <
$mform->closeTab(); 

// parse form
echo $mform->show();
//echo $mblock->show();

?>
<?php
print '<p><a href="'.rex_url::backendPage($addon.'/config').'">Daten im Addon '.$addon.' verwaltet.</a></p><hr>';
## Platzhalter aus dem AddOn Sprog
$ewadmore = sprogdown('{{readmore}}'); 

$more = sprogdown('{{more}}'); 
echo '<p>Linktext sonst <b>'.$more.' </b> <a title="AddOn zum bearbeiten offene" target="_blank" href="index.php?page=sprog/wildcard/clang1">Siehe Addon Sprog der Platzhalter</a>  </p>';
?>