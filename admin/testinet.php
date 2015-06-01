 <?php
    $connected = @fsockopen("www.google.com",  80); //website and port
    if ($connected){
        echo "on";
        fclose($connected);
    }else{
        echo "off"; //action in connection failure
    }
?>
