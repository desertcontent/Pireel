 <?php
 
        
    $dbhost = 'localhost:3036';
    $dbuser = 'advegas_ph01';
    $dbpass = 'Ph44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
   
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
 
$sql = 'SELECT * FROM beer WHERE beer_status = "'.$_POST["beer_status"].'" ORDER BY beer_name';

mysql_select_db('advegas_ph01');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$rows = array();
while($r = mysql_fetch_assoc($retval)) {
    $rows[] = $r;

}
 

 $res = json_encode($rows);
 echo $res;
 

?>