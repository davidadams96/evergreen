<?php
	/*
	
	Destroy the current login session and then redirect to the login page
	
	*/
	
	session_start();
	session_destroy();
	header("Location: ../index.php");
?>