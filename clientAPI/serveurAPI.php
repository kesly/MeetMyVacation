<?php
/*
	if(isset($_GET['pays']) && $_GET['pays']!='')
	{
		$pays=$_GET["pays"];
	}
	else{
		$params= ["status" => -1, "msg"=>"Invalid Paramaters Supplied"];
		print json_encode($params);
		exit;
	}
  */

  //$typeRequete=$_GET['typeRequete'];
  $tabVille=[];

// chercher les villes de france
$urlPays= "https://andruxnet-world-cities-v1.p.rapidapi.com/?query=France&searchby=country";
// mettre header
$opts = [
    "http" => [
        "method" => "GET",
        "header" => "X-RapidAPI-Key:81a9eb3a49mshb1335e92c3d9c9fp186baajsn5e51e8aeea74\r\n" .
            "Cookie: foo=bar\r\n"
    ]
];

$context = stream_context_create($opts);

$jsonPays=file_get_contents($urlPays, false, $context);
$contenuPays = json_decode($jsonPays);

// interoger l'api pour trouver les ville de france

// recuperer les villes
//$tabDegree["froid" =>null, "chaud"=>null];

//$villeLaPlusFroide="";

// recuperer les villes
foreach ($contenuPays as $ville)
{

$nomVille=$ville->city;
// requete pour recuperer la temperature de la ville

$urlVille='https://api.openweathermap.org/data/2.5/weather?q='.$nomVille.'&appid=645cf13c9ea699ab969d3afe1fc1f814';
$jsonVille=file_get_contents($urlVille);
$contenuVille= json_decode($jsonVille);
if(isset($contenuVille->main->temp))
{
  $tempVille= $contenuVille->main->temp;

  // mettre la valeur dan sl tableau

  $tabVille[$nomVille]= $tempVille;
}




}

$tempLaPlusChaude= max($tabVille);

$nomVilleLaPlusChaude= array_search($tempLaPlusChaude, $tabVille);


echo $nomVilleLaPlusChaude;
// créer le json

/*
	$url='https://api.openweathermap.org/data/2.5/weather?q=' .$Ville. '&appid=645cf13c9ea699ab969d3afe1fc1f814' ;
	$json=file_get_contents($url);
	$contenu = json_decode($json);
	$temp = $contenu->{'main'}->{'temp'};
	//header('Content-type: application/json');
  $test = json_encode(array('temperature'=>$temp)); */
	//$test = json_encode(array('temperature'=>$temp));
	//var_dump($contenu->{'main'});
  //echo $test;
 //echo "paris";
//echo $_GET['ville'];

		/*switch($Ville){
		case "Paris":
			$data = array
			(
				"temp" => '25',
				"msg" => 'message'
			);
			header('Content-type: application/json');
			print json_encode(array('main'=>$data));
			break;
		default:
			$params = array("status" => 0, "msg"=>"Invalid Paramaters Supplied");
			print json_encode($params);
			break;
		}	*/
?>
