<?php
 
    $special1 = $_POST['3special1'];
    $special2 = $_POST['3special2'];
    $special3 = $_POST['3special3'];
    $special4 = $_POST['3special4'];
    $special5 = $_POST['3special5'];
    $special6 = $_POST['3special6'];
    $special1h = $_POST['3special1h'];
    $special2h = $_POST['3special2h'];
    $special3h = $_POST['3special3h'];
    $special4h = $_POST['3special4h'];
    $special5h = $_POST['3special5h'];
    $special6h = $_POST['3special6h'];
    $special1s = $_POST['3special1s'];
    $special2s = $_POST['3special2s'];
    $special3s = $_POST['3special3s'];
    $special4s = $_POST['3special4s'];
    $special5s = $_POST['3special5s'];
    $special6s = $_POST['3special6s'];
    $special1d = $_POST['3special1d'];
    $special2d = $_POST['3special2d'];
    $special3d = $_POST['3special3d'];
    $special4d = $_POST['3special4d'];
    $special5d = $_POST['3special5d'];
    $special6d = $_POST['3special6d'];
    $marqueetext = $_POST['marqueetext'];
 
    
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
    $spec1 = $_POST['3special1'];
    $spec2 = $_POST['3special2'];
    $spec3 = $_POST['3special3'];
    $spec4 = $_POST['3special4'];
    $spec5 = $_POST['3special5'];
    $spec6 = $_POST['3special6'];
    
    $spec1h = $_POST['3special1h'];
    $spec2h = $_POST['3special2h'];
    $spec3h = $_POST['3special3h'];
    $spec4h = $_POST['3special4h'];
    $spec5h = $_POST['3special5h'];
    $spec6h = $_POST['3special6h'];

    $spec1s = $_POST['3special1s'];
    $spec2s = $_POST['3special2s'];
    $spec3s = $_POST['3special3s'];
    $spec4s = $_POST['3special4s'];
    $spec5s = $_POST['3special5s'];
    $spec6s = $_POST['3special6s'];
    
    $spec1d = $_POST['3special1d'];
    $spec2d = $_POST['3special2d'];
    $spec3d = $_POST['3special3d'];
    $spec4d = $_POST['3special4d'];
    $spec5d = $_POST['3special5d'];
    $spec6d = $_POST['3special6d'];
    
    $marqueetext = $_POST['3marqueetext'];


      
 
$sql = 'UPDATE specials3 SET special_1 = "'.$spec1.'" ,special_2 = "'.$spec2.'" ,special_3 = "'.$spec3.'",special_4 = "'.$spec4.'",special_5 = "'.$spec5.'",special_6 = "'.$spec6.'" ,special_1h = "'.$spec1h.'" ,special_2h = "'.$spec2h.'" ,special_3h = "'.$spec3h.'",special_4h = "'.$spec4h.'",special_5h = "'.$spec5h.'",special_6h = "'.$spec6h.'",special_1s = "'.$spec1s.'" ,special_2s = "'.$spec2s.'" ,special_3s = "'.$spec3s.'",special_4s = "'.$spec4s.'",special_5s = "'.$spec5s.'",special_6s = "'.$spec6s.'",special_1d = "'.$spec1d.'" ,special_2d = "'.$spec2d.'" ,special_3d = "'.$spec3d.'",special_4d = "'.$spec4d.'",special_5d = "'.$spec5d.'",special_6d = "'.$spec6d.'",marquee_text = "'.$marqueetext.'" WHERE id = 1';

        
mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}else{
//echo "Updated data successfully\n";
mysql_close($conn);
}

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
  if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }

$sql = 'SELECT * FROM specials3';

mysql_select_db('datafog_demo1');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$res = json_encode(mysql_fetch_assoc($retval));
echo $res;

/*while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "EMP ID :{$row['special_1']}  <br> ".
         "EMP NAME : {$row['special_1']} <br> ".
         "EMP SALARY : {$row['special_1']} <br> ".
         "--------------------------------<br>";
} 
echo "Fetched data successfully\n"; */
mysql_close($conn);    
       
    $update  = '<html><body>';
    $update .= '<div id="specials"><h2 class="header"><img src="/images/Pour-House-Grill-logo-brown.png" style="height:75px;margin-right:25px; "/>Today\'s Specials</h2>';

    $update .= '<h2 class="title">'.$_POST[special1].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special1h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special1s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special1d].'</p>';
    
    $update .= '<h2 class="title">'.$_POST[special2].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special2h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special2s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special2d].'</p>';

	$update .= '<h2 class="title">'.$_POST[special3].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special3h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special3s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special3d].'</p>';

	$update .= '<h2 class="title">'.$_POST[special4].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special4h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special4s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special4d].'</p>';
    
    $update .= '<h2 class="title">'.$_POST[special5].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special5h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special5s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special5d].'</p>';
    
    $update .= '<h2 class="title">'.$_POST[special6].'</h2>';
    $update .= '<h3 class="heading">'.$_POST[special6h].'</h3>';
    $update .= '<h4 class="subheading">'.$_POST[special6s].'</h4>';
    $update .= '<p  class="details">'.$_POST[special6d].'</p>';

	$update .= '<p  class="marqueetext">'.$_POST[marqueetext].'</p>';

     
 
    $update .= '</div></body></html>';
    $note_name = 'test.txt';
     file_put_contents('specials.html', $update);
    //$firstName = 'vvvvvvvvvvvvvvvv';
    // echo("First Name: " . $firstName . " Last Name: " . $lastName);
    
     $out = file_get_contents('specials.html');
     //  echo("First Name: " . $firstName . " Last Name: " . $lastName);
     //echo "File Output:".$update;
?>