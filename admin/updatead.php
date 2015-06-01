<?php
     
   $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
 
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }  



if(isset($_POST['ad-id']) && $_POST['ad-id'] !='') {

 $sql = 'INSERT INTO ads VALUES ("'.$_POST['ad-id'].'","'.$_POST['ad-title'].'","'.mysql_real_escape_string($_POST['splash-editor']).'") ON DUPLICATE KEY UPDATE ad_title = "'.$_POST['ad-title'].'" ,ad_content = "'.mysql_real_escape_string($_POST['splash-editor']).'"';

        
 mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";
mysql_close($conn);
}


} 



$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }


 
 
 if(isset($_POST['ad-id']) && $_POST['ad-id'] != ''){$sql = 'SELECT * FROM ads WHERE id = '.$_POST['ad-id'];}else{ $sql = 'SELECT * FROM ads WHERE id = 0';}
 if(isset($_POST['adlist']) && $_POST['adlist'] == 'all'){$sql = 'SELECT * FROM ads ORDER BY id ASC';}
  if(isset($_POST['adlist']) && $_POST['adlist'] == 'loadsingle'){$sql = 'SELECT * FROM ads WHERE id = '.$_POST['loadid'];}
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
$rows = array();
 
while($r = mysql_fetch_assoc($retval)) {
    $rows[] = $r;

}
 
 
 $res = json_encode($rows);
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