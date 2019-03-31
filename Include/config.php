<?php
$dbhost="localhost"; //hostname
$dbuser="root";  //mysql acc/ username
$dbpass="";  //mysql scc/ password
$dbname="bykfinder"; //mysql database name
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");

?>
