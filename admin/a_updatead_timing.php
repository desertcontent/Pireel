<?php
     
  $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_demo1');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}

if(isset($_POST['ad-id']) && $_POST['ad-id'] !='') {
  $sql='UPDATE ads SET atiming ="'.$_POST["ad-timing"].'" WHERE id = '.$_POST["ad-id"];
  echo $sql;

 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
	}       
	
	 

} 
//$result->free();
$db->close();

?>