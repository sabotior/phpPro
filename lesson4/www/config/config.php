<?php
define("MYSQL_SERVER","127.0.0.1:3307");
define("MYSQL_USER","root");
define("MYSQL_PASSWORD","");
define("MYSQL_DB","shop");

define("DIR_BIG","uploads/");
define("DIR_SMALL","uploads/mini/");
@mkdir(DIR_BIG, 0777);
@mkdir(DIR_SMALL, 0777);
$cols = 3;
$k = 1;
$message = '';
