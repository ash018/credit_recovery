<?php
	session_start();	
	if(!isset($_SESSION["username"]) && !isset($_SESSION["usertype"]) && !isset($_SESSION["notes"])){	
		header("Location: login.php");
		exit(); 
	}
?>