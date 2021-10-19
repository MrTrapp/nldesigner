<?php
// init mform
// base ID
$id = 1;

// init mform
$mform = new MForm();

$mform->addFieldset('Dialog');

// media button
$mform->addMediaField(1, array('label'=>'Bild', 'category'=>'35')); 

// $mform->addTextField("$id.0.headline", array('label'=>'headline'));

// add textinput field
$mform->addTextAreaField("$id.0.textarea1", array('label' => 'Dialog' , 'class' => 'redactorEditor2-nl')); // , 'class' => 'redactorEditor2-min'

$mform->addTextField("$id.0.linkurl", array('label'=>'Link URL'));
$mform->addTextField("$id.0.linktext", array('label'=>'Linktext'));

// selects
$mform->addSelectField("$id.0.status", array(1=>'Online',0=>'Offline'), array('label'=>'Status'));

// readonly textinput
// $mform->addTextReadOnlyField("$id.0.readonly", 'Addon Sprog Sprachersetzung Mehr', array('label'=>'Info')); 

// parse form
echo MBlock::show($id, $mform->show(), array('min'=>1,'max'=>2)); // add settings min and max

$more = sprogdown('{{more}}'); 
echo '<p>Maximal zwei Spalten pro Block</p><p>Linktext sonst <b>'.$more.' </b> <a title="AddOn zum bearbeiten öffne" target="_blank" href="index.php?page=sprog/wildcard/clang1">Siehe Addon Sprog der Platzhalter</a>  </p>';
?>