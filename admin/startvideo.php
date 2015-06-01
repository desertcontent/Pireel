 <?php
// shell_exec('omxplayer -r -o local /home/pi/Iam.mp4');
  $output = shell_exec('omxplayer -o hdmi  --win "'.$_POST['coords'].'" /home/pi/'.$_POST['vidname'].'');
  $output2 ='omxplayer -r -o hdmi --win '.$_POST['coords'].' /home/pi/'.$_POST['vidname'].'';
 echo "<pre>$output</pre>"; 
 // echo "<pre>$output2</pre>"; 
     
?>
