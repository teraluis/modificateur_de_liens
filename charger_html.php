<?php
	$nom_html="uploads/html avec liens modifies1550330405.html";
	$html = file_get_contents($nom_html);
	$liens = array(
		array("1","https://www.vinylfactory.fr/"),
		array("2","https://freak-show.fr/")
	);
	$nouveau_html = $html;
	for($i=0;$i<count($liens);$i++){
		
		$nouveau_html = str_replace( "LIEN".$liens[$i]['0'], $liens[$i]['1'], $html);
	}

$fp = fopen($nom_html, 'w+');
fwrite($fp,$nouveau_html);
fclose($fp);