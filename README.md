# Pireel
Raspberry Pi Digital Signage

I have been working on this project off and on for a bit.  What I have done is taken a Raspberry Pi and configured it as an Apache Web Server as a base.  I then created a digital signage player and admin that enables creation of web content as a 'slide' or 'frame'.  The content can also be just a straight image, HD Video or Youtube.  Basically whatever content the Chromium browser can play minus Flash.  The Chromium is the player and is started in full screen kiosk mode.

The player is stand alone and can be accessed remotely via wired ethernet or a WiFi Access Point that is enabled through a USB attached dongle. There is a administration interface that enables control of the content and the timing of each 'slide'. In additon to accessing the administration on mobile devices, it can also deliver captive content to users in addition to digital signage served via literally any attached TV or monitor.

The first application I was testing included an easily managed interface that supplies wine or beer content via two third party apis.  The beverages can be simply searched and added to a display menu simultaniously for both digital signage and mobile devices(via captive wifi). In addition, easily managable menus can be created with the onboard HTML editor that is used for the slides.  Food specials, beer or wine of the day, etc..

A market spun version of the above explaination can be found on my website at http://datafog.com/pireel.html

As far as Javascrip, jQuery, AJAX, JSON and PHP samples a good file to start with is admin/a_admin_portrait.php for the admin and admin/display/a_main_display_landscape.php for the signage display.

This code works fine, but is not overly documented at this point.  I wrote everything from scratch and haven't seem anyone short of maybe Screenly do stand alone vs SaaS.

I have just moved this over to the Raspberry Pi 2 and need to find the time to utilize the increased speed.  Mainly I'm interested it seeing improvements in jQuery animations for slide transitions and other animated widgets.
