<?php
//if the user is logged in ,delete the session and log them out
session_start();
if (isset($_SESSION['id'])) {
	//delete the session vars by clearing the &_SESSION varchars
	$_SESSION =  array();


	//deleete the session cokie by setting its expiration an hour ago
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() - 3600);
	}


	//destroy the session
	session_destroy();
}

//delete the username and user id cookies by setting their expiration hour ago

setcookie('id', '', time() - 3600);
setcookie('id', '', time() - 3600);

//redirect to home page

$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);
