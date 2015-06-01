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
 
$sql = 'SELECT * FROM beer WHERE id = '.$_POST["beerid_req"];

mysql_select_db('advegas_ph01');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

 $res = json_encode(mysql_fetch_assoc($retval));
 echo $res;
 

?>