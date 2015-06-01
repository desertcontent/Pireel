<?php
$host="localhost"; // Host name
$username="advegas_ph01"; // Mysql username
$password="Ph44556362"; // Mysql password
$db_name="advegas_ph01"; // Database name
$tbl_name="beer"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
//echo $_POST;
if(isset($_POST['submit']))
{ 
$search = urlencode($_POST['search']);

$request='https://api.untappd.com/v4/search/beer/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A&q='.$search.'';

 
//Now lets get the response of Google maps using PHP file_get_contents and then assign the response to $jsondata variable

 $jsondata = file_get_contents($request);

 $json = json_decode($jsondata, true);
// print_r($json);

//var_dump($jsondata);


echo '<p><img src="'.$json['response']['beers']['items'][0]['beer']['beer_label'].'"/>'; 
echo '<br /><b>'.$json['response']['beers']['items'][0]['beer']['beer_name'].'</b>'; 
echo ' <br />ID:';
echo $json['response']['beers']['items'][0]['beer']['bid']; 
 
echo '<br />ABV: ';
echo $json['response']['beers']['items'][0]['beer']['beer_abv'];
echo '<br />Style: ';
echo $json['response']['beers']['items'][0]['beer']['beer_style'];
echo '<br />Description: <br />';
echo $json['response']['beers']['items'][0]['beer']['beer_description']; 
echo '<br /><br /><img src="'.$json['response']['beers']['items'][0]['brewery']['brewery_label'].'"/><br />'; 


echo '<br /><b>'.$json['response']['beers']['items'][0]['brewery']['brewery_name'].'</b> - ';
echo $json['response']['beers']['items'][0]['brewery']['location']['brewery_city'].', '; 
echo $json['response']['beers']['items'][0]['brewery']['location']['brewery_state']; 
echo '<br />ID: ';
echo $json['response']['beers']['items'][0]['brewery']['brewery_id']; 
echo '<br />'.$json['response']['beers']['items'][0]['brewery']['contact']['url']; 
echo '<br />Lat/Long: ';
echo $json['response']['beers']['items'][0]['brewery']['location']['lat'].', ';  
echo $json['response']['beers']['items'][0]['brewery']['location']['lng'];    
echo '</p>';  


  
  
   
   
   $bid = $json['response']['beers']['items'][0]['beer']['bid'];
   
   $query = "SELECT * FROM beer WHERE id='$bid' ";
  $result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) )
{
    print 'beer id is already in table';
}
else
{
          
     print 'beer ready to be added';?>
     <a href="update.php?id=<? echo $rows['id']; ?>">Update</a>
<?php
 

}




//$bid=$json['response']['beers']['items'][0]['beer']['bid'];

// $request2='https://api.untappd.com/v4/beer/info/'.$bid.'/?client_id=C40794B80F126BF02665235734EDE64B345F02BE&client_secret=0E9E64739DB498A434D439ED16175F27EF4F904A';

//Now lets get the response of Google maps using PHP file_get_contents and then assign the response to $jsondata variable

 //$jsondata2 = file_get_contents($request2);

 // $json2 = json_decode($jsondata2, true);
/*echo '<img src="'.$json2['response']['beer']['media']['items'][0]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][1]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][2]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][3]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][4]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][5]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][6]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][7]['photo']['photo_img_md'].'"/>'; 
echo '<img src="'.$json2['response']['beer']['media']['items'][8]['photo']['photo_img_md'].'"/>'; */

 
// var_dump(json_decode($jsondata,true));

 
echo "<pre>";

 //print   ArrayFunctions::toString($json2); 
echo "</pre>";


}
?> 


<?php


$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">
<tr>
<td colspan="4"><strong>Current Beer List </strong> </td>
</tr>

<tr>
<td align="center"><strong>ID</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Style</strong></td>
<td align="center"><strong>Description</strong></td>
<td align="center"><strong>ABV</strong></td>
<td align="center"><strong>IBU</strong></td>
<td align="center"><strong>Brewery ID</strong></td>
<td align="center"><strong>Brewery</strong></td>
<td align="center"><strong>Location</strong></td>
<td align="center"><strong>URL</strong></td>

</tr>

<?php
while($rows=mysql_fetch_array($result)){
?>

<tr>
<td><input name="name" type="text" id="name" value="<? echo $rows['id']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['beer_name']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['beer_style']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['beer_desc']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['beer_abv']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['beer_ibu']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['brewery_id']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['brewery_name']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['brewery_city']; ?>"></td>
<td><input name="name" type="text" id="name" value="<? echo $rows['brewery_url']; ?>"></td>


// link to update.php and send value of id
<td align="center"><a href="update.php?id=<? echo $rows['id']; ?>">update</a></td>
</tr>

<?php
}
?>

</table>
</td>
</tr>
</table>

<?php
mysql_close();
?>

 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="search"><br>
   <input type="submit" name="submit" value="Search Brews"><br>
</form>


<?php
 class ArrayFunctions {
  public static function toString($array){
    $result = array();
    $depth = 0;
    foreach($array as $k => $v) {
            $show_val = ( is_array($v) ? "" : $v );
 
            // show the indents
            $result []= str_repeat("  ", $depth);
            if($depth == 0) {
                // this is a root node. no parents
                $result []= "O ";
            } elseif(is_array($v)) {
                // this is a normal node. parents and children
                $result []= "+ ";
            } else {
                // this is a leaf node. no children
                $result []= "- ";
            }
 
            // show the actual node
            if ($show_val == "") {
                $result []= "<strong>{$k}</strong>:
";
            }
            else {
                $result []= $k . " (".$show_val.")"."
";
            }
 
            if(is_array($v)) {
                // this is what makes it recursive, rerun for childs
                $temp = self::toTree($v, ($depth+1));
                foreach($temp as $t) {
                    $result []= $t;
                }
            }
        }
        return implode($result);
    }
 
    private static function showtype($show_val) {
        // convert bools to text and quote 'text bools'!
        if (is_string($show_val) &&
           ($show_val == "true" || $show_val == "false")) {
            return "\"{$show_val}\"";
        }
        elseif (is_bool($show_val) && $show_val === true) {
            return "true";
        }
        elseif (is_bool($show_val) && $show_val === false) {
            return "false";
        }
        elseif (is_null($show_val)) {
            return "null";
        }
        else {
            return $show_val;
        }
    }
 
    private static function toTree($pieces, $depth = 0) {
        foreach($pieces as $k => $v) {
            // skip the baseval thingy. Not a real node.
            //if($k == "__base_val") continue;
            // determine the real value of this node.
            $show_val = ( is_array($v) ? "" : $v );
 
            $show_val = self::showtype($show_val);
 
            // show the indents
            $result []= str_repeat("  ", $depth);
            if($depth == 0) {
                // this is a root node. no parents
                $result []= "O ";
            } elseif(is_array($v)) {
                // this is a normal node. parents and children
                $result []= "+ ";
            } else {
                // this is a leaf node. no children
                $result []= "- ";
            }
 
            // show the actual node
            if ($show_val == "") {
                $result []= "<strong>{$k}</strong>:
";
            }
            else {
                $result []= $k . ": <i>{$show_val}</i>
";
            }
 
            if(is_array($v)) {
                // this is what makes it recursive, rerun for childs
                $temp = self::toTree($v, ($depth+1));
                if (is_array($temp)) {
                    foreach($temp as $t) {
                        $result []= $t;
                    }
                }
                else {
                    $result []= $t;
                }
            }
        }
        return $result;
    }
} 
?>