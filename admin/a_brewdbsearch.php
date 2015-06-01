 <?php
 
require_once 'Pintlabs/Service/Brewerydb.php';     
$apikey = 'fcedc8bd35bff69c87fd220225a585e3';

$params = array("q" => $_REQUEST['search'],"type" => "beer","format" => "json","withBreweries" => "Y");
$bdb = new Pintlabs_Service_Brewerydb($apikey);
$bdb->setFormat('json'); // if you want to get php back.  'xml' and 'json' are also valid options.

//Then you can call the API:

try {
    // The first argument to request() is the endpoint you want to call
    // 'brewery/BrvKTz', 'beers', etc.
    // The third parameter is the HTTP method to use (GET, PUT, POST, or DELETE)
    $results = $bdb->request('search', $params, 'GET'); // where $params is a keyed array of parameters to send with the API call.
} catch (Exception $e) {
    $results = array('error' => $e->getMessage());
}
//print_r($results);
 echo json_encode($results['data']);
//echo $results.'<br />';
//print_r($results);

/*foreach ($results['data'] as $result)
{  
echo '<br />';
echo $result['id'];
echo '<br />';
echo $result['name'];
echo '<br />';
echo $result['description'];
echo '<br />';
echo $result['abv'];
echo '<img src="'.$result['labels']['icon'].'"/>';
echo '<br />';
echo '<img src="'.$result['labels']['medium'].'"/>';
echo '<br />';
echo '<img src="'.$result['labels']['large'].'"/>';
echo '<br />';

}*/

/* echo $results['data'][0]['id'];
  echo '<br />';
 echo $results['data'][0]['name'];
  echo '<br />';
 echo $results['data'][0]['description'];
  echo '<br />';
 echo $results['data'][0]['abv'];
   echo '<br />';
  echo $results['data'][0]['style']['name'];
  echo '<br />';
 echo '<img src="'.$results['data'][0]['labels']['icon'].'"/>';
  echo '<br />';
 echo '<img src="'.$results['data'][0]['labels']['medium'].'"/>';
  echo '<br />';
 echo '<img src="'.$results['data'][0]['labels']['large'].'"/>'; */ 

  //print_r($results);
?>