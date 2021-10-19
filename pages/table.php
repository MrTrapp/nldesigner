<?php
//$list = rex_list::factory('SELECT * FROM rex_nldesigner');
//$list->show();
?>
<?php
// Datenabank anzeigen
## https://redaxo.org/doku/master/formulare

###########################################################################################
$func = rex_request('func','string','');
$table = 'nldesigner'; // rex_bio_sortiment - Prefix wird durch rex::getTable hinzugefügt

// Das Formular wird angezeigt, wenn der Request-Parameter func (get oder post) gleich "add" oder "edit" ist
if (in_array($func,['add','edit'])) {
    // Formular-Objekt erstellen
    $form = rex_form::factory(rex::getTable($table), 'Newsletter Designer', 'id=' . rex_request('id', 'int', 0),'post',false);
    // Die ID muss immer mit übergeben werden, sonst funktioniert das Speichern nicht
    $form->addParam('id',rex_request('id', 'int', 0));
    // Sortierparameter werden ebenso behalten wie die Position in der Liste
    $form->addParam('nlname',rex_request('nlname', 'string', ''));
    $form->addParam('templateid',rex_request('templateid', 'string', ''));
    $form->addParam('status',rex_request('stauts', 'string', ''));
    $form->addParam('prio',rex_request('prio', 'int', 0));
    $form->addParam('status',rex_request('status', 'int', 0));

    // Textfeld  Label 
    $field = $form->addTextField('nlname');
    $field->setLabel('Name');
    // $field->setAttribute('int','0');
    // $field->getValidator()->add( 'notEmpty', 'Das Feld darf nicht leer sein.');
    // $field = $form->addReadOnlyTextField('name');
    // $fieldContainer->setAttribute('style', 'display: none');
    $field->setAttribute('placeholder','name');
    $field->setNotice(' Name als Bezeichnung des Styles-Set.'); // /normal, lighter, bold, lighter, bolder / 100-900

$field = $form->addFieldset('Farben - Module');


    $field = $form->addTextField('colordefault');
    $field->setLabel('Color default');

    $field = $form->addTextField('colormuted');
    $field->setLabel('Color muted');
   
    $field = $form->addTextField('colorprimary');
    $field->setLabel('Colorprimary');
    
	$field = $form->addTextField('colorsecondary');
    $field->setLabel('Color secondary');

    $field = $form->addTextField('colordefaultbg');
    $field->setLabel('BG Color Default');

	$field = $form->addTextField('colormutedbg');
    $field->setLabel('BG Colormuted');

	$field = $form->addTextField('colorprimarybg');
    $field->setLabel('BG Colorprimary');

	$field = $form->addTextField('colorsecondarybg');
    $field->setLabel('BG Colorsecondary');
    

$field = $form->addFieldset('Tabelle Farben');

	$field = $form->addTextField('bgcolorbody');
    $field->setLabel('BG Colorbody');

	$field = $form->addTextField('bgcolorheader');
    $field->setLabel('BG Colorheader');

	$field = $form->addTextField('bgcolortable');
    $field->setLabel('BG Colortable - gesamt');
 
	$field = $form->addTextField('bgcolorfooter');
    $field->setLabel('BG Colorfooter');

$field = $form->addFieldset('Tabelle');

	$field = $form->addTextField('tbwidth');
    $field->setLabel('Table width');
    $field->setAttribute('placeholder','650px');

	$field = $form->addTextField('tbborder');
    $field->setLabel('Table border');
    $field->setAttribute('placeholder','0');

	$field = $form->addTextField('tbbordercolor');
    $field->setLabel('Table bordercolor');
    $field->setAttribute('placeholder','none');

	$field = $form->addTextField('cellpadding');
    $field->setLabel('Table cellpadding');
    $field->setAttribute('placeholder','2%');

	$field = $form->addTextField('cellmargin');
    $field->setLabel('Table cellmargin');
    $field->setNotice('https://developer.mozilla.org/de/docs/Learn/HTML/Tables');
    
$field = $form->addFieldset('Schrift');

	$field = $form->addTextField('fontfamily');
    $field->setLabel('Fontfamily');
    $field->setAttribute('placeholder','Arial, sans-serif');
    $field->setNotice('Arial, sans-serif'); 

	$field = $form->addTextField('fontcolor');
    $field->setLabel('Font-color');

	$field = $form->addTextField('fontcolorinverted');
    $field->setLabel('Font-color-inverted');

	$field = $form->addTextField('fontsize');
    $field->setLabel('Font-size');

	$field = $form->addTextField('lineheigh');
    $field->setLabel('Line-heigh');

	$field = $form->addTextField('fontweight');
    $field->setLabel('Font-weight');
    $field->setNotice('normal, lighter, bold, lighter, bolder / 100-900'); 
    

    // Select Feld
	$field = $form->addSelectField('texttransform','',['class'=>'form-control selectpicker']);
	// die Klasse selectpicker aktiviert den Selectpicker von Bootstrap
	// $field->setAttribute('multiple', 'multiple');
	$field->setLabel("Text-transform");
	$select = $field->getSelect();
	$select->setSize(1);
	$select->addOption('none','none');
	$select->addOption('lowercase','lowercase');
	$select->addOption('capitalize','capitalize');
	$select->addOption('uppercase','uppercase');
	$field->setNotice('https://developer.mozilla.org/de/docs/Web/CSS/font-weight'); 

$field = $form->addFieldset('Link');
   
	$field = $form->addTextField('alinkcolor');
    $field->setLabel('a-Link Color');

	$field = $form->addTextField('alinkcolorhover');
    $field->setLabel('a-Link Color hover');

	$field = $form->addTextField('alinkcolorvisited');
    $field->setLabel('a-Link Color visited');

	$field = $form->addTextField('alinkdecoration');
    $field->setLabel('a-Link-decoration');


$field = $form->addFieldset('Headline');

//	$field = $form->addTextField('styleheading');
//  $field->setLabel('Styleheading');

	$field = $form->addTextField('headingfontfamily');
    $field->setLabel('Heading-font-family');
     $field->setAttribute('placeholder','Times, serif');
    $field->setNotice('Times, serif'); 

	$field = $form->addTextField('headingfontcolor');
    $field->setLabel('Heading-font-color');

	$field = $form->addTextField('headingfontsize');
    $field->setLabel('Heading-font-size');

	$field = $form->addTextField('headinglineheight');
    $field->setLabel('Heading-line-height');
    
    $field = $form->addTextField('headingfontweight');
    $field->setLabel('Heading-font-weight');
    $field->setNotice('normal, lighter, bold, lighter, bolder / 100-900'); 

	$field = $form->addTextField('headingtexttransform');
    $field->setLabel('Heading-text-transform');
    

$field = $form->addFieldset('Button');

	$field = $form->addTextField('btncolor');
    $field->setLabel('Button-Color');

	$field = $form->addTextField('btncolorhover');
    $field->setLabel('Button-Color-hover');

	$field = $form->addTextField('btncolorbg');
    $field->setLabel('Button-Color-bg');

	$field = $form->addTextField('btncolorbghover');
    $field->setLabel('Button-Color-bg-hover');
	

	$field = $form->addTextField('btnpadding');
    $field->setLabel('Button-padding');
    $field->setNotice('5px 5px 3px 5px'); 

	$field = $form->addTextField('btnborder');
    $field->setLabel('Button-border');
    $field->setNotice('1px solid black'); 

$field = $form->addFieldset('liste');

    // Select Feld
	$field = $form->addSelectField('libullet','',['class'=>'form-control selectpicker']); 
	// die Klasse selectpicker aktiviert den Selectpicker von Bootstrap
	// $field->setAttribute('multiple', 'multiple');
	$field->setLabel("Li Style");
	$select = $field->getSelect();
	$select->setSize(1);
	$select->addOption('none','none');
	$select->addOption('circle','circle');
	$select->addOption('square','square');
	$select->addOption('decimal','decimal'); 
	$select->addOption('decimal-leading-zero', 'decimal-leading-zero');
	$select->addOption('upper-roman','upper-roman'); 
	$select->addOption('lower-alpha','lower-alpha'); 
	$select->addOption('upper-alpha','upper-alpha');
	$select->addOption('cjk-decimal','cjk-decimal'); 	
	// $field->getValidator()->add( 'values', 'Shop Link Bereich: Bitte geben Sie an: Kategorie oder Abo', ['1','2']); 
	
    // Select Feld
	$field = $form->addSelectField('liinside','',['class'=>'form-control selectpicker']);
	// die Klasse selectpicker aktiviert den Selectpicker von Bootstrap
	// $field->setAttribute('multiple', 'multiple');
	$field->setLabel("Li Style");
	$select = $field->getSelect();
	$select->setSize(1);
	$select->addOption('outside','outside');
	$select->addOption('inside','inside');
	$field->setNotice('https://developer.mozilla.org/de/docs/Web/CSS/list-style'); 

$field = $form->addFieldset('Border');
	
	$field = $form->addTextField('hrstyle');
    $field->setLabel('hr-style');
	$field->setNotice('1px solid silver'); 

$field = $form->addFieldset('Bilder');

	// Bild hinzufügen
	$field = $form->addMediaField('logofile');
	$field->setLabel('Brand Logo');
	$field->setPreview(1); 
	// legt die Start-Medienkategorie fest 
	$field->setCategoryId('1');
	// Legt die erlaubten Typen fest 
	$field->setTypes('jpg,gif,png,svg'); 
	// $field->setAttribute('preview','1');
	
	// Bild hinzufügen
	$field = $form->addMediaField('bgfile');
	$field->setLabel('Hintergrundbild');
	$field->setPreview(1); 
	// legt die Start-Medienkategorie fest 
	$field->setCategoryId('1');
	// Legt die erlaubten Typen fest 
	$field->setTypes('jpg,png'); 
	// $field->setAttribute('preview','1');

	// Textarea mit Label redactorEditor2-min
	$field = $form->addTextAreaField('note','',['style'=>'background-color: yellow']); // ; height: 300px; class'=>'redactorEditor2-min
	$field->setLabel('Notiz');


$field = $form->addFieldset('Redaxo');

	// Selectfeld Datenbank
$formElements = [];
$n = [];
$n['label'] = '<label for="config_template_id">' . $this->i18n('config_template_id') . '</label>';
$select = new rex_select();
	// Werte werden aus einer anderen Tabelle holen
	$field = $form->addSelectField('templateid','',['class'=>'form-control selectpicker']);
	$field->setLabel('Template ID');
	//  *<br> <a href="index.php?page=rezepte&subpage=gruppen" target="_blank">Eingabe</a>
	$select = $field->getSelect();
	$select->setSize(1);
	$select->addOption('Auswahl','1');
	//$query = 'SELECT gruppe as label, id FROM '.$REX['TABLE_PREFIX'].'553_gruppen';
	$query = 'SELECT name AS LABEL, id AS id FROM rex_template ORDER BY id LIMIT 30';
   	$select->addSqlOptions($query); // AS label, catname
$select->setSelected($this->getConfig('template_id'));
$n['field'] = $select->get();
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/container.php');
##############################

	// Select Feld Prio
	$field = $form->addPrioField('prio');
	$field->setLabel('Priorität');
	$field->setAttribute('class', 'selectpicker form-control');
	$field->setLabelField('prio');
		
	// Select Feld Online/Offline
	$field = &$form->addSelectField('status','',['class'=>'form-control selectpicker']);
	$field->setLabel("Status");
	$select = &$field->getSelect();
	$select->setSize(1);
	$select->addOption('Online',1);
	$select->addOption('Offline',0);
	// $select->setAttribute('style','width: 100px');


###########################################################################################

    // Formular auslesen
    $content = $form->get();
###########################################################################################
} else {
    // Listen-Objekt erstellen. 10 Datensätze pro Seite
    $list = rex_list::factory('SELECT id, nlname, templateid, status  FROM '.rex::getTable($table), 20, $table, 0);

    // Icon für die erste Spalte "+" = hinzufügen
    $th_icon = '<a href="'.$list->getUrl(['func' => 'add']).'" title="'.rex_i18n::msg('add').'"><i class="rex-icon rex-icon-add-action"></i></a>';
    // Edit-Icon
    $td_icon = '<i class="rex-icon fa-file-text-o"></i>';
    $list->addColumn($th_icon, $td_icon, 0, ['<th class="rex-table-icon">###VALUE###</th>', '<td class="rex-table-icon">###VALUE###</td>']);
    $list->setColumnParams($th_icon, ['func' => 'edit', 'id' => '###id###', 'nlname' => rex_request('nlname', 'int', NULL)]);

   	// Edit Spaltenkoepfe > Liste
	$list->setColumnParams('nlname', array('func' => 'edit', 'id' => '###id###'));

    // Sortierbare Spaltenkoepfe
    $list->setColumnSortable('nlname'); 
    $list->setColumnSortable('templateid'); 

    $list->setColumnSortable('prio');
    $list->setColumnSortable('status');

    
    // Beschriftungen für Spaltenköpfe
	//	$list->setColumnLabel('id', 'ID');
	$list->setColumnLabel('nlname', 'Name');
	$list->setColumnLabel('templateid', 'Template');
	$list->setColumnLabel('prio', 'Prio');
	$list->setColumnLabel('status', 'Status');
	
	// Liste auslesen
    $content = $list->get();

}
###########################################################################################

// Listen- und Formularinhalt in Fragment "section" ausgeben
$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', 'Newsletter Daten', false);
$fragment->setVar('body', $content, false);
$content = $fragment->parse('core/page/section.php');

echo $content;

?>