<?php
 
 
     $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_beer');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
	 	 		
		
	if(!$result = $db->query('SELECT id FROM beer WHERE beer_special = "ON" ORDER BY beer_name LIMIT '.$_POST['beercount'])){
    die('There was an error running the query [' . $db->error . ']');
	}
	
	$out = array();
	while ($row = $result->fetch_assoc()) {
    $out[] = $row;
}

	echo json_encode($out);
	
	$result->free();
	
	$db->close();
     
 
?>