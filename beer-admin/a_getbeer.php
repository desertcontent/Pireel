 <?php
 
        
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
   
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
 
$sql = 'SELECT * FROM beer WHERE id = "'.$_POST["beerid_req"].'"';
if($_POST["beerid_req"] == 'random') {$sql = 'SELECT * FROM beer WHERE beer_status = "ACTIVE" ORDER BY RAND() LIMIT 1'; }
mysql_select_db('datafog_beer');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

 $res = json_encode(mysql_fetch_assoc($retval));
 echo $res;
 

?>