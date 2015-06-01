 <?php
   $url = 'http://api.locu.com/v1_0/venue/0c382e2f0e8e81e2dc1e/?api_key=420ef1edfa34acaec6e60e894adb313dd05a02e6';
 
//open connection
$json = file_get_contents($url);
$data = json_decode($json, true);

// JQM Page
echo '<div data-role="page" id="foodmenu-insertpage" data-theme="b"  >'; 
echo '<div id="hhmenu" style="max-width:50%;">';
echo '<div id="hhmenucontent" data-role="content" style="padding:50px;margin:100px;margin-top:25px;-moz-border-radius:20px;
	-webkit-border-radius:20px;
	-khtml-border-radius:20px;
	border-radius:20px;">';

echo '<ul style="margin-top:0px;"  >';
 // Loop Through Each Section
$l=0;
$sections = $data['objects'][0]['menus'][1]['sections'];
foreach($sections as $section) {

$item=$data['objects'][0]['menus'][1]['sections'][$l]['subsections'][0]['contents'];
 

// Start List Divider with Header Retrieved from above loop
// echo '<li style="padding-left:25px;color:#fff;">';

// echo '<h1 style="margin-left:70px;font-size:120%;padding-top:0px;text-shadow: none;" id="Happy Hour Menu">Happy Hour Menu</h1>';

 
 $enc = mb_detect_encoding($section['section_name']);
 $section['section_name'] = trim(mb_convert_encoding($section['section_name'], "ASCII", $enc),'?');
 
 
  
 
// $listimg = '<img style="max-height:60px;height:60px;padding:10px;padding-top:10px;" src="';
   /*if($section['section_name'] == "Sandwich Board"){$listimg = '<img style="max-height:60px;height:60px;padding:0px;padding-top:0px;" src="';}
   if($section['section_name'] == "Small Eats and Sides"){$listimg .= "/images/Sides.png";}
   if($section['section_name'] == "Sandwich Board"){$listimg .= "/images/cheesesteak.png";}
   if($section['section_name'] == "Greens"){$listimg .=  "/images/Salads.png";}
   if($section['section_name'] == "Pour House Burgers"){$listimg .= "/images/Burgers.png";}
   if($section['section_name'] == "Chicken Wings"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "Grilled Chicken Breast Sandwiches"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "BBQ"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "Beverages"){$listimg .= "/images/Beverages.png";}
    if($section['section_name'] == "Hot Dogs and Sausages"){$listimg .= "/images/Sandwiches.png";}*/
  // $listimg .= "/images/Appetizers.png"; 
  // $listimg .=  '"/>'; 
  // echo $listimg;
  //echo  '<div style="margin-left:45px;">'.$header.'</div>';
 
 
   
 

$itemname='';
$itemdesc='';
$itemprice='';
$itemoption='';
$itemoptionprice='';
$noli='';
//  Loop Through Food Items
foreach($item as $key=>$value) {
 
//  Loop Through Food Item Attributes 
	foreach($value as $key1=>$value1) {
		if($key1 =="price"){$itemprice=$value1;}
		if($key1 =="name"){$itemname=$value1;}
		if($key1 =="description"){$itemdesc=$value1;}
		if($key1 == "option_groups" && $value1[0]['options'][0]['name'] != "" ){$itemoption=$value1[0]['options'][0]['name'];$itemoptionprice=$value1[0]['options'][0]['price'];}
		}
 
// Echo Built Food Item
// only echo food items based on item name
if($itemname != ''){ 
echo '<li style="margin-top:15px;list-style:none;">';
// insert image if available
//if($itemname=="Philly Cheese Steak"){echo '<img style="max-width:120px;float:right;"src="images/cheesesteak.png" />';} 

// echo text html
echo '<h3 style="font-size:35px;">';

echo ''.$itemname.'</h3>';

echo '<p style="white-space:normal; ">'.$itemdesc.'</p>';
echo '<p  style="float:right;" class="price">'.$itemprice.'</p>';
echo '<p style="padding-top:5px;font-weight:bold;white-space:normal;overflow:normal;">'.$itemoption.' '.$itemoptionprice.'</p>';
echo '</li>';
$itemname='';
$itemdesc='';
$itemprice='';
$itemoption='';
$itemoptionprice='';
}

}


 
// Items Counter for main loop
  $l++;
// Close Item  
 echo '</li>';

 
 }
 // echo $section['section_name'];
 //print_r($data);
 //print_r($resp);
 echo '</ul></div></div></div>';
 

?>