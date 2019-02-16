<?php
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}
  $nom_fichier_html = 'html';
  $nom_fichier_csv = 'csv'; 
  $nouveau_nom_html = $nom_fichier_html." avec liens modifies".time().".html"; 
  $nouveau_nom_csv = $nom_fichier_csv."_".time().".csv"; 
  $upload_html = upload($nom_fichier_html,'uploads/'.$nouveau_nom_html,FALSE, array('html') );
  $upload_csv = upload($nom_fichier_csv,'uploads/'.$nouveau_nom_csv,FALSE, array('csv') );

  if($upload_csv==true && $upload_html==true){
    $liens = array();
    //Charger les liens
    $fichier = "uploads/".$nouveau_nom_csv;

    $csv = new SplFileObject($fichier);
    $csv->setFlags(SplFileObject::READ_CSV);
    $csv->setCsvControl(',');

    foreach($csv as $ligne){
      if(!empty($ligne) && $ligne[0]!=null && $ligne[1]!=null){
        $liens [] = array($ligne[0],$ligne[1]);
      }
    }
    //generer le nouveau html
    $nom_html='uploads/'.$nouveau_nom_html;
    $html = file_get_contents($nom_html);
    $nouveau_html = $html;
    for($i=0;$i<count($liens);$i++){
      $nouveau_html = str_replace( "LIEN".$liens[$i]['0'], $liens[$i]['1'], $nouveau_html);
    }
    $fp = fopen($nom_html, 'w+');
    fwrite($fp,$nouveau_html);
    fclose($fp);
  }
  function forcerTelechargement($nom, $situation, $poids)
  {
    header('Content-Type: application/octet-stream');
    header('Content-Length: '. $poids);
    header('Content-disposition: attachment; filename='. $nom);
    header('Pragma: no-cache');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    readfile($situation);
    exit();
  }
 
  /*******************************************************
  *  Appel de la fonction
  *******************************************************/
  forcerTelechargement('ma_newslettergenere.html', 'uploads/'.$nouveau_nom_html, 1073741824);
  header('Location: http://localhost/modificateurs_de_liens/index.php'); 
?>
