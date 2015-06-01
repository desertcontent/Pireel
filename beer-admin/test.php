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
 
$sql = 'SELECT * FROM ads where astatus = "ON" order by aorder ASC';

mysql_select_db('datafog_beer');
$result = mysql_query( $sql, $conn );
if(! $result )
{
  die('Could not get data: ' . mysql_error());
}
$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;

}
 

 $res = json_encode($rows);
 echo $res;
 

/*
 
$num_rows = mysql_num_rows($result);
//echo $num_rows;
$lastid='start';
$last='BEGIN';


$r = 0;
while ($row = mysql_fetch_array($result)) {
    if (++$r == 1) {
        // first row
        //echo 'FIRST'.$row['id'].'--' .$row['astatus'].'--' .$row['aorder'].'--' .$row['ad_title'].'<br />';
        $last=  $row['id'].'--' .$row['astatus'].'--' .$row['ad_title'];
        $lastid=$row['id'];
        $firstid=$row['id'];
		$lastsec=$row['atiming'];
    } elseif($r <  $num_rows) {
        // not first row
        //echo 'B----'.$last.'NEXT--->'.$row['id'].'<br /> ';
        echo 'if(slide=='.$lastid.'){loadad('.$lastid.');temp='.$row['id'].';secs='.$lastsec.';}'. PHP_EOL;

		$last=  $row['id'].'--' .$row['astatus'].'--' .$row['ad_title'];
		$lastid=$row['id'];
		$lastsec=$row['atiming'];
		//echo "if(slide=='ad1'){loadad(1);temp='ad2';secs=2;}". PHP_EOL;
    }
    elseif($r == $num_rows){
    echo 'if(slide=='.$lastid.'){loadad('.$lastid.');temp='.$row['id'].';secs='.$lastsec.';}'. PHP_EOL;
    echo 'if(slide=='.$row['id'].'){loadad('.$row['id'].');temp='.$firstid.';secs='.$row['atiming'].';}'. PHP_EOL;
    }
} */

//while ($row = mysql_fetch_array($result)) {
//echo $last.'NEXT--->'.$row['id'].'<br /> ';
//$last=  $row['id'].'--' .$row['astatus'].'--' .$row['aorder'].'--' .$row['ad_title'];
//} 

 
mysql_close($conn); 
   

?>