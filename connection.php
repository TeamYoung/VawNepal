<?php


$db_host = "localhost";

$db_username = "root";
$db_pass = "toor";

$db_name = "vawnepal_db";

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");
?>