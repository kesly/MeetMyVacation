<?php

if(isset($_GET['pays']) && $_GET['pays']!='')
{
  $pays=$_GET["pays"];
}
else{
  $params= ["status" => -1, "msg"=>"Invalid Paramaters Supplied"];
  print json_encode($params);
  exit;
}


$urlPays= "https://andruxnet-world-cities-v1.p.rapidapi.com/?query=$pays&searchby=country";

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "X-RapidAPI-Key:81a9eb3a49mshb1335e92c3d9c9fp186baajsn5e51e8aeea74\r\n" .
            "Cookie: foo=bar\r\n"
    ]
];

$context = stream_context_create($opts);

$jsonPays=file_get_contents($urlPays, false, $context);
$contenuPays= json_decode($jsonPays);

// recuperer 5 villes
$nomVille1=$contenuPays[0]->city;
$nomVille2=$contenuPays[1]->city;
$nomVille3=$contenuPays[2]->city;
$nomVille4=$contenuPays[3]->city;
$nomVille5=$contenuPays[4]->city;

// requete de temperature

$urlTemp1="https://api.openweathermap.org/data/2.5/weather?q=$nomVille1&appid=645cf13c9ea699ab969d3afe1fc1f814";
$jsonTemp1=file_get_contents($urlTemp1);
$contenuTemp1=json_decode($jsonTemp1)->main->temp;
$temp1= $contenuTemp1 -273;

$urlTemp2="https://api.openweathermap.org/data/2.5/weather?q=$nomVille2&appid=645cf13c9ea699ab969d3afe1fc1f814";
$jsonTemp2=file_get_contents($urlTemp2);
$contenuTemp2=json_decode($jsonTemp2)->main->temp;
$temp2= $contenuTemp2 -273;

$urlTemp3="https://api.openweathermap.org/data/2.5/weather?q=$nomVille3&appid=645cf13c9ea699ab969d3afe1fc1f814";
$jsonTemp3=file_get_contents($urlTemp3);
$contenuTemp3=json_decode($jsonTemp3)->main->temp;
$temp3= $contenuTemp1 -273;


$urlTemp4="https://api.openweathermap.org/data/2.5/weather?q=$nomVille4&appid=645cf13c9ea699ab969d3afe1fc1f814";
$jsonTemp4=file_get_contents($urlTemp4);
$contenuTemp4=json_decode($jsonTemp4)->main->temp;
$temp4= $contenuTemp4 -273;

$urlTemp5="https://api.openweathermap.org/data/2.5/weather?q=$nomVille5&appid=645cf13c9ea699ab969d3afe1fc1f814";
$jsonTemp5=file_get_contents($urlTemp5);
$contenuTemp5=json_decode($jsonTemp5)->main->temp;
$temp5= $contenuTemp5 -273;





// traitement
$urlVille1= 'https://fr.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$nomVille1;
$jsonVille1=file_get_contents($urlVille1);
$contenuVille1= json_decode($jsonVille1);
foreach ($contenuVille1->query->pages as $page) {
  $wiki1 = $page->extract;
}

$urlVille2= 'https://fr.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$nomVille2;
$jsonVille2=file_get_contents($urlVille2);
$contenuVille2= json_decode($jsonVille2);
foreach ($contenuVille2->query->pages as $page) {
  $wiki2 = $page->extract;
}

$urlVille3= 'https://fr.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$nomVille3;
$jsonVille3=file_get_contents($urlVille3);
$contenuVille3= json_decode($jsonVille3);
foreach ($contenuVille3->query->pages as $page) {
  $wiki3 = $page->extract;
}

$urlVille4= 'https://fr.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$nomVille4;
$jsonVille4=file_get_contents($urlVille4);
$contenuVille4= json_decode($jsonVille4);
foreach ($contenuVille4->query->pages as $page) {
  $wiki4 = $page->extract;
}

$urlVille5= 'https://fr.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles='.$nomVille5;
$jsonVille5=file_get_contents($urlVille5);
$contenuVille5= json_decode($jsonVille5);
foreach ($contenuVille5->query->pages as $page) {
  $wiki5 = $page->extract;
}



// créer tableau

$tabVille1=["nomVille"=> $nomVille1, 'temperature'=> $temp1, "wikipedia" =>$wiki1 ];
$tabVille2=["nomVille"=>$nomVille2, 'temperature'=> $temp2, "wikipedia" =>$wiki2 ];
$tabVille3=["nomVille"=>$nomVille3, 'temperature'=> $temp3, "wikipedia" =>$wiki3 ];
$tabVille4=["nomVille"=>$nomVille4, 'temperature'=> $temp4, "wikipedia" =>$wiki4 ];
$tabVille5=["nomVille"=>$nomVille5, 'temperature'=> $temp5, "wikipedia" =>$wiki5 ];



$reponse=['ville1'=>$tabVille1, 'ville2'=>$tabVille2, 'ville3'=>$tabVille3, 'ville4'=>$tabVille4, 'ville5'=>$tabVille5  ];

$reponseFinale=json_encode($reponse);

echo ( $reponseFinale);
// requete






 ?>
