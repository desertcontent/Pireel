 <?php
 //set POST variables
//$url = $_POST['url'];
//$_POST['search']='Mickeys';

//$datei = new DateTime();
$timestamp = time()*1000;
$instamp = "";
$instamp = "23750450b8934b75b7edc2bb016e4185\n";
$instamp .= "GET\n";
$instamp .= "9ff7e6fa99024e10a4737034e49204c8\n";
$instamp .=  $timestamp."\n";
$instamp .=  "/search/wines\n";
// echo $instamp;
// echo '<br />******';
$lcinstamp = strtolower($instamp);
// echo $lcinstamp;
// echo '<br />******';
 
$sig = md5($lcinstamp);
//echo $sig;
//echo '<br />******';
//exit;
 $opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
              "User-agent: BROWSER-DESCRIPTION-HERE\r\n" .
              "Authorization: Cruvee appId=23750450b8934b75b7edc2bb016e4185, sig=$sig, timestamp=$timestamp, uri=/search/wines\r\n"
  )
); 
 

$context = stream_context_create($opts);

$search = $_REQUEST['search'];
$usearch = urlencode($search);
// Open the file using the HTTP headers set above
$file = file_get_contents('http://apiv1.cruvee.com/search/wines?q='.$usearch.'&fmt=json&page=1,&rpp=1', false, $context);
 
echo $file 
    
   //var_dump(json_decode($file));
  //echo $file;
/*   $data =json_decode($file); 
  echo count($data->results[0]->brand->name);
  $wineimage = $data->results[0]->bottleShot->URL;
  echo '<img src="'.$wineimage.'"/>';
  $wineryname = $data->results[0]->brand->name;
  echo '<p>Winery:'.$wineryname.'</p>';
  $winetype = $data->results[0]->declaredVariety->name;
  echo '<p>Type:'.$winetype.'</p>';
  $winename = $data->results[0]->name;
  echo '<p>Name:'.$winename.'</p>';
  $wineabv = $data->results[0]->ABV;
  echo '<p>ABV:'.$wineabv.'</p>';
    $winerycountry = $data->results[0]->region->lineage[0]->name;
    $winerystate = $data->results[0]->region->lineage[1]->name;
   $wineryarea = $data->results[0]->region->lineage[2]->name;
   echo '<p>Country:'.$winerycountry.'</p>';
  echo '<p>State:'.$winerystate.'</p>';
 echo '<p>Area:'.$wineryarea.'</p>';
 $winedesc = $data->results[0]->text[0]->description;
  echo '<p>Description:'.$winedesc.'</p>';
  $wineurl = $data->results[0]->products[0]->buyURL;
  echo '<p>Description:'.$wineurl.'</p>';
   $wineynid = $data->results[0]->brand->ynId;
  echo '<p>Description:'.$wineynid.'</p>';

$winewidget = $data->results[0]->brand->widgetWide;
  echo $winewidget;

  

   var_dump(json_decode($file));

    print_r($file); 

 $venue =json_decode($json); */
 
?>