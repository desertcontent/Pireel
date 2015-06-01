<?php
     
  $db = new mysqli('localhost','datafog_beer', 'Df44556362', 'datafog_beer');
    
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
	}

if(isset($_POST['ad-id']) && $_POST['ad-id'] !='') {

 $sql = 'INSERT INTO ads VALUES ("'.$_POST['ad-id'].'","'.$_POST['ad-title'].'","'.mysql_real_escape_string($_POST['splash-editor']).'","'.$_POST['ad-status'].'","'.$_POST['ad-timing'].'","'.$_POST['ad-order'].'","'.$_POST['ad-type'].'") ON DUPLICATE KEY UPDATE ad_title = "'.$_POST['ad-title'].'" ,ad_content = "'.mysql_real_escape_string($_POST['splash-editor']).'", astatus = "'.$_POST['ad-status'].'",atiming = '.$_POST['ad-timing'].',aorder = "'.$_POST['ad-order'].'", atype = "'.$_POST['ad-type'].'"';

 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
	}       
	
	//$result->free();
	
	

} 

    
 
 if(isset($_POST['ad-id']) && $_POST['ad-id'] != ''){$sql = 'SELECT * FROM ads WHERE id = '.$_POST['ad-id'];}else{ $sql = 'SELECT * FROM ads WHERE id = 0';}
 if(isset($_POST['adlist']) && $_POST['adlist'] == 'all'){$sql = 'SELECT * FROM ads ORDER BY aorder ASC';}
  if(isset($_POST['adlist']) && $_POST['adlist'] == 'loadsingle'){$sql = 'SELECT * FROM ads WHERE id = '.$_POST['loadid'];}

if(!$result = $db->query($sql)){
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