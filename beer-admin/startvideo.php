 <?php
// shell_exec('omxplayer -r -o local /home/pi/Iam.mp4');
  $output = shell_exec('omxplayer -r -o hdmi /home/pi/'.$_POST["vidname"].'');
 echo "<pre>$output</pre>"; 
     
?>
