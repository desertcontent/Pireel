<?php
     
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
if($_POST['beer_status'] == 'INACTIVE'){$newstatus='ACTIVE';}
if($_POST['beer_status'] == 'ACTIVE'){$newstatus='INACTIVE';}
if($_POST['beer_status'] == 'BOTTLE-IN'){$newstatus='BOTTLE-OUT';}
if($_POST['beer_status'] == 'BOTTLE-OUT'){$newstatus='BOTTLE-IN';}
$sql = 'UPDATE beer SET beer_status = "'.$newstatus.'" WHERE id = '.$_POST['beer_id'];

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";

}
 
 mysql_close($conn);

 echo $_POST['beer_id'];

    
 
?>