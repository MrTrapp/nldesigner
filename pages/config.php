<?php

$content = '';
$buttons = '';
// Einstellungen speichern
if (rex_post('formsubmit', 'string') == '1') {
    $this->setConfig(rex_post('config', [
        ['class_colorpicker', 'string'],
        ['templateid', 'int'],

    //    ['pageids', 'string'],
    ]));
    echo rex_view::success($this->i18n('config_saved'));
}
######################################################################
$content = '';

//  'https://www.emailtooltester.com/en/blog/free-newsletter-templates/';


### Font Colour
// Einfaches Textfeld > class_colorpicker  minicolors form-control // type="password"
$formElements = [];
$n = [];
$n['label'] = '<label for="nld_config_class_colorpicker">' . $this->i18n('nld_config_class_colorpicker') . '</label>';
$n['field'] = '<input class="form-control" placeholder="" type="text" id="nld_config-class_colorpicker" name="config[class_colorpicker]" value="' . $this->getConfig('class_colorpicker') . '"/>
'; // <p class="help-block"></p>
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/container.php');

#################################
// Selectfeld Datenbank
$formElements = [];
$n = [];
$n['label'] = '<label for="nld_config_templateid">' . $this->i18n('templates') . '</label>';
$select = new rex_select();
$select->setId('nld_config-templateid');
$select->setAttribute('class', 'form-control');
$select->setName('config[templateid]');
	$select->setSize(1);
	$select->addOption('Auswahl','1');
	$query = 'SELECT name AS LABEL, id FROM rex_template ORDER BY id LIMIT 30';
   	$select->addSqlOptions($query); // AS label, catname
$select->setSelected($this->getConfig('templateid'));
$n['field'] = $select->get();
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$content .= $fragment->parse('core/form/container.php');

#################################
// Save-Button
$formElements = [];
$n = [];
$n['field'] = '<button class="btn btn-save rex-form-aligned" type="submit" name="save" value="' . $this->i18n('nld_config_save') . '">' . $this->i18n('config_save') . '</button>';
$formElements[] = $n;
$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$buttons = $fragment->parse('core/form/submit.php');

$buttons = '
<fieldset class="rex-form-action">
    ' . $buttons . '
</fieldset>';
#################################
// Ausgabe Formular
$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', $this->i18n('nld_config'));
$fragment->setVar('body', $content, false);
$fragment->setVar('buttons', $buttons, false);
$output = $fragment->parse('core/page/section.php');
$output = '
<form action="' . rex_url::currentBackendPage() . '" method="post">
<input type="hidden" name="formsubmit" value="1" />
    ' . $output . '
</form>
';
echo $output;
?>

<p>https://help.litmus.com/article/206-which-clients-support-media-queries<br>
	https://www.emailtooltester.com/en/blog/free-newsletter-templates/<br>
	Thomas Skerbis  am 10.01.2020 im Slack:<br>
	Als Gestaltungshilfe für die Newsletter kann ich grapejs empfehlen:<br>
	https://grapesjs.com/demo-newsletter-editor.html<br>
</p>