<?php
	// get the q parameter from URL
$q = $_REQUEST["q"];

unlink("../images/banners/".$q.".jpg");

echo "****";
?>