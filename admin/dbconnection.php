<?php

$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='blog';

$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) OR die("unable to connect to the database");

?>