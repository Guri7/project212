<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: index.html");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: index.html");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	header("Location: index.html");
}
?>