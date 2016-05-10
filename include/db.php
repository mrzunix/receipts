<?php
require('config.php');
@ $db = mysql_connect("$dbhost", "$dbuser", "$dbpassword");
    mysql_select_db("$database");
mysql_query("SET NAMES 'utf8'");
?>
