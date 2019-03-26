<?php

//VARIABLES
$ville= "Paris";




// traitement
$url= "https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=Paris&format=json";

$jsonVille=file_get_contents($url, false);
$contenuVille= json_decode($jsonVille);
echo $contenuVille;
// requete






 ?>
