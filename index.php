<html>
<?php
/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: admin/beerlist.html');
exit;
?><body><h1>It works!</h1>
<p>This is the default web page for this server.</p>
<p>The web server software is running but no content has been added, yet.</p>
</body></html>
