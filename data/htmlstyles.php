<?php
$addon = 'nldesigner';
########################################
## MySQL-Abfrage REX 5 SQL
######################################## 
$sql = rex_sql::factory();
// $sql->setDebug();
$sql->setQuery('
			SELECT 
			*
			FROM rex_nldesigner
			WHERE rex_nldesigner.status = 1
			'.$addQueryTemplateID.'	
			ORDER BY rex_nldesigner.prio
			LIMIT 1
			');
## Daten Ausgabe
########################################
$num_rows = ($sql->getRows()); // Gibt es ein Ergebnis ?
// for Schleife
for($i=0; $i<$sql->getRows(); $i++) {
################################################################################
## Daten aus dem Addon newsletter designer
include(rex_path::frontend('redaxo/src/addons/nldesigner/data/variablen.php')); //  Variablen inkludieren
################################################################################
## AUSGABE
$sql->next();
}
?>
