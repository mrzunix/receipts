<?php

// Database Host
$dbhost = "localhost";
// Database Name
$database = "rec";
// Database Username
$dbuser = "root";
// Database Password
$dbpassword = "password";


// Backup Files Locations === Make sure that directory has write  permessions
$store = "backups/";
$date = "_" . date("Y-m-d-H-i") .".gz";
$full = "Full_" . date("Y-m-d-H-i") .".tar";

//Backup File Name
$backup_file =  "$store$database$date" ;

// Basic Backup Command

$basicbackup = "/usr/bin/mysqldump -h $dbhost -u $dbuser --password=$dbpassword $database | /bin/gzip   > $backup_file";


