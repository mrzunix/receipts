<?php
require('./include/config.php');
if(!mysql_connect("$dbhost", "$dbuser", "$dbpassword"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("$database"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>
