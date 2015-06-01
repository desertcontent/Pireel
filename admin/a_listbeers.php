 <?php
    
    $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_demo1');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
	if($_POST["beer_select"] == ''){$_POST['beer_select'] = '1=1';} 
	$beerview = ' beer_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';
	if($_POST["beer_view"] == 'ACTIVE'){$beerview='beer_status="ACTIVE"';}
	if($_POST["beer_view"] == 'INACTIVE'){$beerview='beer_status="INACTIVE"';}
	if($_POST["beer_view"] == 'BOTTLE'){$beerview='beer_status in ("BOTTLE-IN","BOTTLE-OUT")';}
	if($_POST["beer_view"] == 'DRAFT'){$beerview='beer_status in ("ACTIVE","INACTIVE")';}
	if($_POST["beer_view"] == 'ALL'){$beerview='beer_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';}

	if($_POST["beer_sort"] == ''){$_POST['beer_sort'] = 'beer_name';} 
	
	 		
		
	if(!$result = $db->query('SELECT * FROM beer WHERE  '.$beerview.'  ORDER BY  '.$_POST["beer_sort"])){
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