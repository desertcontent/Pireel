<?php

//echo var_dump($_POST['orders']['1']);

/*foreach($_POST['orders'] as $key => $value) {
	//echo $key.'-'.$value.'<br />';
	 $sql = 'UPDATE ads SET aorder = '.$value.' WHERE id = '.$key.'';
	 echo $sql;
	}*/
 

     
  $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_demo1');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}

 
 foreach($_POST['orders'] as $key => $value) {
  $sql = 'UPDATE ads SET aorder = "'.$value.'" WHERE id = '.$key.'';
  mysqli_query($db,$sql);  
//echo $sql;
  //if ($mysqli->query($sql) === TRUE) {
   // printf("Table myCity successfully created.\n");
   // echo 'OK';
  //

 } 
echo 'ok';     
// $sql = 'SELECT order,id from ads';

/* if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
	} */      
 
 
 /*$out = array();
	while ($row = $result->fetch_assoc()) {
    $out[] = $row;
    echo $row;
}*/

	//echo json_encode($out);  
	
	//$result->free();

	 $db->close();  
 
  
 
?>