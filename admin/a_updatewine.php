<?php
     
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
    //$image = file_get_contents(urlencode($_POST['beer_label_url']));
   // file_put_contents("beerimages/img".$_POST['id'].".jpg", $image);
    file_put_contents("wineimages/".ltrim($_POST['id'],'0').".jpg", file_get_contents("".$_POST['wine_label_url'].""));  
    file_put_contents("wineryimages/".ltrim($_POST['id'],'0').".jpg", file_get_contents("".$_POST['winery_label_url'].""));  
 
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
$_POST['wine_desc'] =mysql_real_escape_string($_POST['wine_desc']);    
//$sql = 'UPDATE wine SET id = "'.$_POST['i'].'" ,wine_name = "'.$_POST['wine_name'].'" ,wine_style = "'.$_POST['wine_type'].'" ,wine_desc = "'.$_POST['wine_desc'].'" ,wine_abv = "'.$_POST['wine_abv'].'" ,wine_ibu = "'.$_POST['wine_ibu'].'",winery_id = "'.$_POST['winery_id'].'",winery_name = "'.$_POST['winery_name'].'",winery_city = "'.$_POST['winery_city'].'",winery_url = "'.$_POST['winery_url'].'" WHERE id = '.$_POST['id'].'';

$sql = 'INSERT INTO wine VALUES ("'.$_POST['id'].'","'.$_POST['wine_name'].'","'.$_POST['wine_type'].'","'.$_POST['wine_desc'].'","'.$_POST['wine_abv'].'","'.$_POST['wine_ibu'].'","'.$_POST['winery_id'].'","'.$_POST['winery_name'].'","'.$_POST['winery_city'].'","'.$_POST['winery_url'].'","'.$_POST['wine_status'].'","'.$_POST['wine_label_url'].'","'.$_POST['winery_label_url'].'","'.$_POST['wine_glass_price'].'","'.$_POST['wine_growler_price'].'","'.$_POST['wine_special'].'") ON DUPLICATE KEY UPDATE wine_name = "'.$_POST['wine_name'].'" ,wine_style = "'.$_POST['wine_type'].'" ,wine_desc = "'.$_POST['wine_desc'].'" ,wine_abv = "'.$_POST['wine_abv'].'" ,wine_ibu = "'.$_POST['wine_ibu'].'",winery_id = "'.$_POST['winery_id'].'",winery_name = "'.$_POST['winery_name'].'",winery_city = "'.$_POST['winery_city'].'",winery_url = "'.$_POST['winery_url'].'",wine_label_url = "'.$_POST['wine_label_url'].'",winery_label_url = "'.$_POST['winery_label_url'].'",wine_status = "'.$_POST['wine_status'].'",wine_glass_price = "'.$_POST['wine_glass_price'].'",wine_growler_price = "'.$_POST['wine_growler_price'].'",wine_special = "'.$_POST['wine_special'].'"';

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";
mysql_close($conn);
}

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }

$sql = 'SELECT * FROM wine WHERE id ="'.$_POST['id'].'"';

mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$res = json_encode(mysql_fetch_assoc($retval));
echo $res;

/*while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "EMP ID :{$row['special_1']}  <br> ".
         "EMP NAME : {$row['special_1']} <br> ".
         "EMP SALARY : {$row['special_1']} <br> ".
         "--------------------------------<br>";
} 
echo "Fetched data successfully\n"; */
mysql_close($conn);    
    
 
?>