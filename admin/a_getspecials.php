 <?php
 
         
     $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_demo1');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
	if(!$result = $db->query('SELECT * FROM specials')){
    die('There was an error running the query [' . $db->error . ']');
	}


	//$out = array();
	//while ($row = $result->fetch_assoc()) {
    //$out[] = $row;
	//}
	
	
	$out = $result->fetch_assoc();
    echo json_encode($out);
 $result->free();
	
	$db->close();
        

?>