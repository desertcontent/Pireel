<?php
 
    $special1 = $_POST['special1'];
    $special2 = $_POST['special2'];
    $special3 = $_POST['special3'];
    $special4 = $_POST['special4'];
    $special1h = $_POST['special1h'];
    $special2h = $_POST['special2h'];
    $special3h = $_POST['special3h'];
    $special4h = $_POST['special4h'];
    $special1s = $_POST['special1s'];
    $special2s = $_POST['special2s'];
    $special3s = $_POST['special3s'];
    $special4s = $_POST['special4s'];
    $special1d = $_POST['special1d'];
    $special2d = $_POST['special2d'];
    $special3d = $_POST['special3d'];
    $special4d = $_POST['special4d'];
    $marqueetext = $_POST['marqueetext'];
 
    
    $dbhost = 'localhost:3036';
    $dbuser = 'datafog_beer';
    $dbpass = 'Df44556362';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    
    
    if(! $conn )
    {
	    die('Could not connect: ' . mysql_error());
	    }
   
    $spec1 = $_POST['special1'];
    $spec2 = $_POST['special2'];
    $spec3 = $_POST['special3'];
    $spec4 = $_POST['special4'];
    
    $spec1h = $_POST['special1h'];
    $spec2h = $_POST['special2h'];
    $spec3h = $_POST['special3h'];
    $spec4h = $_POST['special4h'];

    $spec1s = $_POST['special1s'];
    $spec2s = $_POST['special2s'];
    $spec3s = $_POST['special3s'];
    $spec4s = $_POST['special4s'];
    
    $spec1d = $_POST['special1d'];
    $spec2d = $_POST['special2d'];
    $spec3d = $_POST['special3d'];
    $spec4d = $_POST['special4d'];
    
    $marqueetext = $_POST['marqueetext'];


      
 
$sql = 'UPDATE specials SET special_1 = "'.$spec1.'" ,special_2 = "'.$spec2.'" ,special_3 = "'.$spec3.'",special_4 = "'.$spec4.'" ,special_1h = "'.$spec1h.'" ,special_2h = "'.$spec2h.'" ,special_3h = "'.$spec3h.'",special_4h = "'.$spec4h.'",special_1s = "'.$spec1s.'" ,special_2s = "'.$spec2s.'" ,special_3s = "'.$spec3s.'",special_4s = "'.$spec4s.'",special_1d = "'.$spec1d.'" ,special_2d = "'.$spec2d.'" ,special_3d = "'.$spec3d.'",special_4d = "'.$spec4d.'",marquee_text = "'.$marqueetext.'" WHERE id = 1';

        
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

$sql = 'SELECT * FROM specials';

mysql_select_db('advegas_ph02');
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