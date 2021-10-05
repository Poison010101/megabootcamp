<?php
session_start();
if(!isset($_SESSION['name']) and !isset($_SESSION['role']))
{
    header("Location: index.php");
}
?>