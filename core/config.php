<?php

define ("WEBSITE_TITLE", 'Pro Manager');

//database name
/*define ("DB_NAME", 'epiz_27260723_eshop');
define ("DB_USER", 'epiz_27260723');
define ("DB_PASS", 'PDQmZLS2gE');
define ("DB_TYPE", 'mysql');
define ("DB_HOST", 'sql200.epizy.com');*/

//database name
define ("DB_NAME", 'eshop_db');
define ("DB_USER", 'root');
define ("DB_PASS", '');
define ("DB_TYPE", 'mysql');
define ("DB_HOST", '127.0.0.1');



define('DEBUG', false);

if(DEBUG){
	ini_set('display_errors', 1);
}else{
	ini_set('display_errors', 1);
}