<?php
session_start();

//if the seesion vars arent set set them 

if (!isset($_SESSION['username'])) {

	if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
		$_SESSION['id'] = $_COOKIE['id'];
		$_SESSION['username'] = $_COOKIE['username'];
	}
}
