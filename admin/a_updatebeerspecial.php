<?php
     
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
if($_POST['beer_special'] == 'ON'){$newstatus='OFF';}
if($_POST['beer_special'] == 'OFF'){$newstatus='ON';}

$sql = 'UPDATE beer SET beer_special = "OFF" WHERE 1=1';

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";

}

$sql = 'UPDATE beer SET beer_special = "'.$newstatus.'" WHERE id = '.$_POST['beer_id'];

        
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