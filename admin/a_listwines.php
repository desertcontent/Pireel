 <?php
    
    $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_demo1');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
	if($_POST["wine_select"] == ''){$_POST['wine_select'] = '1=1';} 
	$wineview = ' wine_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';
	if($_POST["wine_view"] == 'ACTIVE'){$wineview='wine_status="ACTIVE"';}
	if($_POST["wine_view"] == 'INACTIVE'){$wineview='wine_status="INACTIVE"';}
	if($_POST["wine_view"] == 'BOTTLE'){$wineview='wine_status in ("BOTTLE-IN","BOTTLE-OUT")';}
	if($_POST["wine_view"] == 'DRAFT'){$wineview='wine_status in ("ACTIVE","INACTIVE")';}
	if($_POST["wine_view"] == 'ALL'){$wineview='wine_status in ("ACTIVE","INACTIVE","BOTTLE-IN","BOTTLE-OUT")';}

	if($_POST["wine_sort"] == ''){$_POST['wine_sort'] = 'wine_name';} 
	
	 		
		
	if(!$result = $db->query('SELECT * FROM wine WHERE  '.$wineview.'  ORDER BY  '.$_POST["wine_sort"])){
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