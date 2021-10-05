<?php
//checks if session  is exist
include('inc_sessioncheck.php');

//kill all the sessions
session_destroy();
//redirect to login page
header("Location:index.php");
?>