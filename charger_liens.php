<?php

    $fichier = "uploads/csv_1550330373.csv";

    $csv = new SplFileObject($fichier);
    $csv->setFlags(SplFileObject::READ_CSV);
    $csv->setCsvControl(',');
    $table="<table>";

    foreach($csv as $ligne){
    	if(!empty($ligne) && $ligne[0]!=null && $ligne[1]!=null){
	    	$table.="<tr>";
	      	$table.="<td>".$ligne[0]."</td>";
	      	$table.="<td>".$ligne[1]."</td>";
	      	$table.="</tr>";
    	}

    }
    $table.="</table>";
    echo $table;
?>