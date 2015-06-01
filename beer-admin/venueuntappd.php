 <?php
 //set POST variables
//$url = $_POST['url'];
//$_POST['search']='Mickeys';
 
$url = "https://api.untappd.com/v4/venue/info/4667?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A";
 
//$url = "https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q=Coors";
 
$json = file_get_contents($url);

//var_dump(json_decode($json));
 $venue =json_decode($json); 
 

  $venname= $venue->response->venue->venue_name;
  //echo '<h1>'.$venname.'</h1>'; 
  
  // Checkins
//echo '<h2>PHOTOS:</h2>';
 // echo '<p style="width:1920px;"">';
/* foreach ($venue->response->venue->media->items as $items) {
    $photos_md= $items->photo->photo_img_lg;

	// echo '<img src="'.$photos_md.'" style="max-width:480px;display:inline;"/>';   
  } */
 
 // echo '</p>';
  
   
  
  
  
   echo '<div style="max-width:1920px;">';
   echo '<div style="max-width:850px;float:left;padding:15px;display:inline-block;margin-left:75px;border:solid 2px #fff;">';
     echo '<h2 class="textshadow" style="color:#fff;">TOP BEERS:</h2>';
// Top Beers
  foreach ($venue->response->venue->top_beers->items as $items) {
	$topbeer_img= $items->beer->beer_label;
	$topbeer_name= $items->beer->beer_name;
	$topbeer_desc= $items->beer->beer_description;
	$topbeer_style= $items->beer->beer_style;
	$topbeer_abv= $items->beer->beer_abv;
	$topbeer_img= $items->beer->beer_label;
	 echo '<div>';
	 echo '<p class="textshadow" style="color:#fff;"><img src="'.$topbeer_img.'" style="width:125px;float:left;margin:10px;"/></p>';   
	echo '<h2 class="textshadow" style="color:#fff;">'.$topbeer_name.'</h2>';
	echo '<h3 class="textshadow" style="color:#fff;">'.$topbeer_style.'</h3>';
	echo '<h4 class="textshadow" style="color:#fff;">ABV: '.$topbeer_abv.'</h4>';
	echo '<p class="textshadow" style="color:#fff;">'.$topbeer_desc.'</p>';
    
	echo '</div>';   
  }
 echo '</div>';  
  
// Checkins

echo '<div style="width:850px;float:left;padding:0px;display:inline-block;border:solid 2px #fff;">';
echo '<h2  class="textshadow" style="color:#fff;">CHECKINS:</h2>';
 foreach ($venue->response->venue->checkins->items as $items) {
    $checkins_datetime= $items->created_at;
    $checkins_rating= $items->rating_score;
	$checkins_fn= $items->user->first_name;
	$checkins_ln= $items->user->last_name;
	$checkins_avatar= $items->user->user_avatar;
	$checkins_beer= $items->beer->beer_name;
	$checkins_beer_label= $items->beer->beer_label;
	$checkins_brewery= $items->brewery->brewery_name;
		//echo '<h4>ABV: '.$topbeer_abv.'</h4>';
	//echo '<p>'.$topbeer_desc.'</p>';
     echo '<div style="width:650px;overflow:hidden;padding:5px;margin:5px;"><h3 class="textshadow" style="color:#fff;font-weight:bold;">'.$checkins_datetime.' '.$checkins_rating.'<br /><img src="'.$checkins_avatar.'" style="width:50px;float:left;text-align:middle;margin-right:10px;"/><img src="'.$checkins_beer_label.'" style="width:75px;float:right;text-align:bottom;"/> ';
     echo ' '.$checkins_fn.' '.$checkins_ln.' ';
	 echo 'is drinking a <br />'.$checkins_beer.'<br /> by '.$checkins_brewery.' ';
	 echo '</h3></div>';   
  }
echo '</div>';   
   
 
?>