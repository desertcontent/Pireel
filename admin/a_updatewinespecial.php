<?php
     
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
if($_POST['wine_special'] == 'ON'){$newstatus='OFF';}
if($_POST['wine_special'] == 'OFF'){$newstatus='ON';}

$sql = 'UPDATE wine SET wine_special = "OFF" WHERE 1=1';

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";

}

$sql = 'UPDATE wine SET wine_special = "'.$newstatus.'" WHERE id = "'.$_POST['wine_id'].'"';

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error().'SQL:'.$sql);
}else{
 //echo "Updated data successfully\n";

}
 
 mysql_close($conn);

 echo $_POST['wine_id'];

    
 
?>