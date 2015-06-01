 <?php
// shell_exec('omxplayer -r -o local /home/pi/Iam.mp4');
  $output = shell_exec('sudo reboot');
 echo "<pre>$output</pre>"; 
     
?>
