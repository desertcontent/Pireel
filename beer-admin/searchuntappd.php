 <?php
 //set POST variables
//$url = $_POST['url'];
//$_POST['search']='Mickeys';
 
$url = "https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q=".$_REQUEST['search']."";
 
//$url = "https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q=Coors";
 
$json = file_get_contents($url);
//var_dump(json_decode($json));
$beer =json_decode($json);  
$beerlabel = $beer->response->beers->items[0]->beer->beer_label;
$brewerylabel = $beer->response->beers->items[0]->brewery->brewery_label;
$beerid = $beer->response->beers->items[0]->beer->bid;
file_put_contents("/var/www/beer-admin/beerimages/".$beerid.".jpg", file_get_contents("".$beerlabel.""));  
file_put_contents("/var/www/beer-admin/breweryimages/".$beerid.".jpg", file_get_contents("".$brewerylabel.""));  
echo $json;
?>