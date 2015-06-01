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
if($_POST["beer_select"] == ''){$_POST['beer_select'] = '1=1';} 
$beerview = ' beer_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';
if($_POST["beer_view"] == 'ACTIVE'){$beerview='beer_status="ACTIVE"';}
if($_POST["beer_view"] == 'INACTIVE'){$beerview='beer_status="INACTIVE"';}
if($_POST["beer_view"] == 'BOTTLE'){$beerview='beer_status in ("BOTTLE-IN","BOTTLE-OUT")';}
if($_POST["beer_view"] == 'DRAFT'){$beerview='beer_status in ("ACTIVE","INACTIVE")';}
if($_POST["beer_view"] == 'ALL'){$beerview='beer_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';}

if($_POST["beer_sort"] == ''){$_POST['beer_sort'] = 'beer_name';} 
$sql = 'SELECT * FROM beer WHERE '.$beerview.' ORDER BY '.$_POST["beer_sort"].'';
 
mysql_select_db('advegas_ph02');
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