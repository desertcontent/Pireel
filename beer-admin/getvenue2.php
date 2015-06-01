 <?php
   $url = 'http://api.locu.com/v1_0/venue/0c382e2f0e8e81e2dc1e/?api_key=420ef1edfa34acaec6e60e894adb313dd05a02e6';
 
//open connection
$json = file_get_contents($url);
$data = json_decode($json, true);

// JQM Page
echo '<div data-role="page" id="foodmenu-insertpage" data-theme="b"  >'; 
echo '<div id="lamenu" style="max-width:500px;">';
echo '<div id="lamenucontent" data-role="content" style="padding-top:15px;overflow-x:hidden;">';

echo '<ul id="menu-listview" data-role="listview" data-theme="a" data-inset="true" style="margin-top:15px; " data-filter="true" data-filter-placeholder="Search Menu or Scroll to Browse Our Selections" >';
 // Loop Through Each Section
$l=0;
$sections = $data['objects'][0]['menus'][0]['sections'];
foreach($sections as $section) {

$item=$data['objects'][0]['menus'][0]['sections'][$l]['subsections'][0]['contents'];
 
// Retreive Section Text Blocks (SECTION_TEXT)
 $header='';
 foreach($item as $key=>$value) {
    if($value['type'] == 'SECTION_TEXT'){
   $header.='<p style="white-space:normal; padding:5px;margin-left:20px;">'.$value['text'].'</p>';;
   }
   } 
// Start List Divider with Header Retrieved from above loop
 echo '<li data-role="listdivider" data-theme="f" data-mini="false" style="padding-left: 0px;background-color:#000;color:#fff;min-height:35px;">';

 echo '<h1 style="margin-left:50px;;font-size:120%;padding-top:0px;text-shadow: none;" id="'.$section['section_name'].'">'.$section['section_name'].'</h1>';

 
 $enc = mb_detect_encoding($section['section_name']);
 $section['section_name'] = trim(mb_convert_encoding($section['section_name'], "ASCII", $enc),'?');
 
 
  
 
 $listimg = '<img style="max-height:35px;height:35px;padding:10px;padding-top:10px;" src="';
 if($section['section_name'] == "Sandwich Board"){$listimg = '<img style="max-height:30px;height:30px;padding:0px;padding-top:0px;" src="';}
   
   
   
   if($section['section_name'] == "Small Eats and Sides"){$listimg .= "/images/Sides.png";}
   if($section['section_name'] == "Sandwich Board"){$listimg .= "/images/cheesesteak.png";}
   if($section['section_name'] == "Greens"){$listimg .=  "/images/Salads.png";}
   if($section['section_name'] == "Pour House Burgers"){$listimg .= "/images/Burgers.png";}
   if($section['section_name'] == "Chicken Wings"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "Grilled Chicken Breast Sandwiches"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "BBQ"){$listimg .= "/images/Ribs_Chicken.png";}
   if($section['section_name'] == "Beverages"){$listimg .= "/images/Beverages.png";}
    if($section['section_name'] == "Hot Dogs and Sausages"){$listimg .= "/images/Sandwiches.png";}
   $listimg .=  '"/>'; 
   echo $listimg;
  echo  '<div style="margin-left:45px;">'.$header.'</div>';
 
 
   
 

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
echo '<li data-theme="a">';
// insert image if available
//if($itemname=="Philly Cheese Steak"){echo '<img style="max-width:120px;float:right;"src="images/cheesesteak.png" />';} 

// echo text html

echo '<h3>';
// Small Eats and Sides
if ($itemname == 'Spinach Con Queso Dip'){echo '<i class="icon-soup" style="margin-right:5px;"></i>';}
if ($itemname == 'Quesadilla'){echo '<img src="/list_icons/pie.png" class="" style="margin-right:5px;height:20px;" />';}

if ($itemname == 'Pour House Garlic Fries'){echo '<i class="icon-fries" style="margin-right:5px;"></i>';}
if ($itemname == 'Sweet Potato Fries'){echo '<i class="icon-fries" style="margin-right:5px;"></i>';}
if ($itemname == 'Half and Half Fries'){echo '<i class="icon-fries" style="margin-right:5px;"></i>';}
if ($itemname == 'Ale Battered Onion Rings'){echo '<i class="icon-onion" style="margin-right:5px;"></i>';}
if ($itemname == 'Pulled Pork Poppers'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Pulled Pork Sliders'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Pulled Pork Quesadilla'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
// Greens
if ($itemname == 'Wedge Salad'){echo '<img src="/list_icons/Salads.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Caesar Salad'){echo '<img src="/list_icons/Salads.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Cobb Salad'){echo '<img src="/list_icons/Salads.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'House Side Salad'){echo '<img src="/list_icons/Salads.png" class="" style="margin-right:5px;height:25px;" />';}
// Burgers
if ($itemname == 'Pour House Hamburger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Pour House Cheeseburger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Blue Burger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Bacon Cheeseburger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Pepper Jack Burger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Mongo Burger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}
if ($itemname == 'Pour House BBQ Burger'){echo '<i class="icon-hamburger" style="margin-right:5px;"></i>';}

// Chicken Wings
if ($itemname == '6 of One Half Dozen of the Other'){echo '<i class="icon-chicken" style="margin-right:5px;"></i>';}
if ($itemname == 'Bakers Dozen'){echo '<i class="icon-chicken" style="margin-right:5px;"></i>';}

// Chicken Breast Sandwiches
if ($itemname == 'Grilled Chicken Sandwich'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i>';}
if ($itemname == 'Buffalo Chicken Sandwich'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i>';}
if ($itemname == 'Indonesian Chicken Sandwich'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i>';}
if ($itemname == 'BBQ Chicken Breast Sandwich'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i>';}

// Sandwiches
if ($itemname == 'Philly Cheese Steak'){echo '<i class="icon-steak" style="margin-right:5px;"></i>';}
if ($itemname == 'Smoked Chicken Club Sandwich'){echo '<i class="icon-toast" style="margin-right:5px;"></i>';}
if ($itemname == 'BLT'){echo '<i class="icon-bacon" style="margin-right:5px;"></i>';}
if ($itemname == 'Grilled Cheese Extraordinaire'){echo '<i class="icon-toast" style="margin-right:5px;"></i>';}
if ($itemname == 'Pulled Pork Sandwich'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Smoked Pastrami Ruben'){echo '<i class="icon-toast" style="margin-right:5px;"></i>';}


// Hot Dogs and Sausages
if ($itemname == 'Snappy Natural Casing German Dog'){echo '<i class="icon-hotdog" style="margin-right:5px;"></i>';}
if ($itemname == 'Ale Soaked Bratwurst'){echo '<i class="icon-pepperoni" style="margin-right:5px;"></i>';}

// BBQ 
if ($itemname == 'St Louis Cut Pork Spare Ribs'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Agave Smoked 1/2 Chicken'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i>';}
if ($itemname == 'Pulled Pork Plate'){echo '<img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'BBQ Combo Plate'){echo '<i class="icon-chickenalt" style="margin-right:5px;"></i><img src="/list_icons/pork.png" class="" style="margin-right:5px;height:25px;" />';}

// Beverages
if ($itemname == 'Craft and Import Beers'){echo '<i class="icon-beeralt" style="margin-right:5px;"></i>';}
if ($itemname == 'Domestic Beers'){echo '<i class="icon-beer" style="margin-right:5px;"></i>';}
if ($itemname == 'Bottled Beer'){echo '<img src="/list_icons/bottle.png" class="" style="margin-right:5px;height:25px;" />';}
if ($itemname == 'Soft Drinks and Iced Tea'){echo '<i class="icon-cocktail" style="margin-right:5px;"></i>';}
if ($itemname == 'Glass of Wine'){echo '<i class="icon-wineglass" style="margin-right:5px;"></i>';}
if ($itemname == 'Beer Flight'){echo '<i class="icon-tallglass" style="margin-right:5px;"></i>';}
if ($itemname == 'Growler\'s Filled'){echo '<img src="/list_icons/growler.png" class="" style="margin-right:5px;height:25px;" />';}
echo ''.$itemname.'</h3>';
echo '<p style="white-space:normal; ">'.$itemdesc.'</p>';
echo '<p  style="float:right;">'.$itemprice.'</p>';
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