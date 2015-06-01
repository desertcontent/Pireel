<?php
     
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
    //$image = file_get_contents(urlencode($_POST['beer_label_url']));
   // file_put_contents("beerimages/img".$_POST['id'].".jpg", $image);
    file_put_contents("/var/www/demo1/beerimages/".$_POST['id'].".jpg", file_get_contents("".$_POST['beer_label_url'].""));  
    file_put_contents("/var/www/demo1/breweryimages/".$_POST['id'].".jpg", file_get_contents("".$_POST['brewery_label_url'].""));  
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
$_POST['beer_desc'] =mysql_real_escape_string($_POST['beer_desc']);    
//$sql = 'UPDATE beer SET id = "'.$_POST['i'].'" ,beer_name = "'.$_POST['beer_name'].'" ,beer_style = "'.$_POST['beer_type'].'" ,beer_desc = "'.$_POST['beer_desc'].'" ,beer_abv = "'.$_POST['beer_abv'].'" ,beer_ibu = "'.$_POST['beer_ibu'].'",brewery_id = "'.$_POST['brewery_id'].'",brewery_name = "'.$_POST['brewery_name'].'",brewery_city = "'.$_POST['brewery_city'].'",brewery_url = "'.$_POST['brewery_url'].'" WHERE id = '.$_POST['id'].'';

$sql = 'INSERT INTO beer VALUES ("'.$_POST['id'].'","'.$_POST['beer_name'].'","'.$_POST['beer_type'].'","'.$_POST['beer_desc'].'","'.$_POST['beer_abv'].'","'.$_POST['beer_ibu'].'","'.$_POST['brewery_id'].'","'.$_POST['brewery_name'].'","'.$_POST['brewery_city'].'","'.$_POST['brewery_url'].'","'.$_POST['beer_status'].'","'.$_POST['beer_label_url'].'","'.$_POST['brewery_label_url'].'","'.$_POST['beer_glass_price'].'","'.$_POST['beer_growler_price'].'","'.$_POST['beer_special'].'") ON DUPLICATE KEY UPDATE beer_name = "'.$_POST['beer_name'].'" ,beer_style = "'.$_POST['beer_type'].'" ,beer_desc = "'.$_POST['beer_desc'].'" ,beer_abv = "'.$_POST['beer_abv'].'" ,beer_ibu = "'.$_POST['beer_ibu'].'",brewery_id = "'.$_POST['brewery_id'].'",brewery_name = "'.$_POST['brewery_name'].'",brewery_city = "'.$_POST['brewery_city'].'",brewery_url = "'.$_POST['brewery_url'].'",beer_label_url = "'.$_POST['beer_label_url'].'",brewery_label_url = "'.$_POST['brewery_label_url'].'",beer_status = "'.$_POST['beer_status'].'",beer_glass_price = "'.$_POST['beer_glass_price'].'",beer_growler_price = "'.$_POST['beer_growler_price'].'",beer_special = "'.$_POST['beer_special'].'"';

        
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

$sql = 'SELECT * FROM beer WHERE id ='.$_POST['id'];

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