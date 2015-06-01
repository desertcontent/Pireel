 <?php
 //set POST variables
//$url = $_POST['url'];
 $url = 'http://api.locu.com/v1_0/venue/0c382e2f0e8e81e2dc1e/?api_key=420ef1edfa34acaec6e60e894adb313dd05a02e6';
//unset($_POST['url']);
//$fields_string = "";
//url-ify the data for the POST
//foreach($_POST as $key=>$value) {
	//$fields_string .= $key.'='.$value.'&';
//}
//$fields_string = rtrim($fields_string,'&');
//open connection
$json = file_get_contents($url);
$data = json_decode($json, true);
echo '<div data-role="page" id="foodmenu-insertpage" data-theme="b"  >'; 
echo '<div id="lamenu" style="max-width:500px;">';
echo '<div id="lamenucontent" data-role="content">';
echo '<ul id="menu-listview" data-role="listview" data-theme="b" data-inset="true" >';
$l=0;
$sections = $data['objects'][0]['menus'][0]['sections'];
foreach($sections as $section) {
 if($section['section_name'] != 'asdfasd') { 
echo '<li data-role="listdivider" data-them="a">';
echo '<h2>'.$section['section_name'].'</h2>';
 //print_r($section);
 //echo '<li><p>'.$data['objects'][0]['menus'][0]['sections'][$l]['subsections'][0]['text'].'</p></li>';
 
$item=$data['objects'][0]['menus'][0]['sections'][$l]['subsections'][0]['contents'];
$fooditem = '';

foreach($item as $key=>$value) {
   // echo '<br />'.$value['type'].'<br />'.str_repeat("&nbsp;", 10).$value['text'];
 //print_r($value);
 //echo '<li data-theme="b">';
$itemname='';
$itemdesc='';
$itemprice='';
$itemoption='';
$itemoptionprice='';
foreach($value as $key1=>$value1) {
 //echo '<br />'.$key1.'<br />'.str_repeat("&nbsp;", 10).$value1;
// $fooditem .= $key1.'<br />'.str_repeat("&nbsp;", 10).$value1;
 
 if($key1 =="price"){$itemprice=$value1;}
 if($key1 =="name"){$itemname=$value1;}
 if($key1 =="description"){$itemdesc=$value1;}
 if($key1 == "option_groups" && $value1[0]['options'][0]['name'] != "" ){$itemoption=$value1[0]['options'][0]['name'];$itemoptionprice=$value1[0]['options'][0]['price'];}
 

// if($key1 =="type"){$crap.=$value['text'];echo '<br /><p><cite>'.$value['text'].'</cite></p>';}

 

}
//echo $section['section_name'];
 echo '<li data-theme="a">';
if($itemname=="Philly Cheese Steak"){echo '<img style="max-width:120px;float:right;"src="images/cheesesteak.png" />';} 
echo '<h3>'.$itemname.'</h3>';
echo '<p style="white-space:normal;max-width:300px;">'.$itemdesc.'</p>';
echo '<p  style="float:right;">'.$itemprice.'</p>';
echo '<p style="float:left;padding-top:5px;font-weight:bold;">'.$itemoption.' '.$itemoptionprice.'</p>';
 
echo '</li>';
}
//echo $section['section_name'];

 }

  $l++;
 
 }
 
 //print_r($data);
 //print_r($resp);
 echo '</ul></div></div></div>';
 

?>