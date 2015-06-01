 <?php
 
   $action = $_POST["action"];  
  
  if ($action == "reboot"){ 
  exec("python /var/www/admin/reboot.py");  
  }
  
   if ($action == "rebootport"){ 
  exec("python /var/www/admin/reboot_port.py");  
  }
   
   if ($action == "rebootland"){ 
  exec("python /var/www/admin/reboot_land.py");  
  }
  
  if ($action == "shutdown"){ 
  exec("python /var/www/admin/shutdown.py");  
  }
  
  if ($action == "refresh"){ 
  shell_exec("python /var/www/admin/refresh.py");     
  }
  
  
   
// shell_exec('omxplayer -r -o local /home/pi/Iam.mp4');
 //  shell_exec('sudo reboot');
  //$output = shell_exec('sudo reboot');
 //echo "<pre>$output</pre>"; 
     
?>
