<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php



    //$Ville=$_GET["nameVille"];


    $aContext = array(
    	'http' => array (
    		'proxy'=>'tcp://cache.iutbayonne.univ-pau.fr:3128', 'request_fulluri' => true
    	),
    	'https' => array (
    		'proxy'=>'tcp://cache.iutbayonne.univ-pau.fr:3128', 'request_fulluri' => true
    	)
    );

    $cxContext = stream_context_create($aContext);
    print "Proxy OK (cache)<br>";
    //$url='https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=645cf13c9ea699ab969d3afe1fc1f814' ;
    $url='http://iparla.iutbayonne.univ-pau.fr/~tvtran/WebService/TP5/wsTP5.php?nameVille=Toulouse' ;
    $json=file_get_contents($url, False, $cxContext);

    $contenu = json_decode($json);
    //echo '.$contenu['coord'].';
    var_dump(json_decode($json));
    //$temp = $contenu->{'main'}->{'temp'};

    //echo 'temperature: ' .$temp;





    ?>


  </body>
</html>
