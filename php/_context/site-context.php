<?php
/******************************************************************************
	site-context.php

	To set some options that are specific to where this web is installed

	Copyright 2008 Dominic Sayers
	This script may be used and modified freely for business or personal use
	This script may not be resold in any form
	This script may only be redistributed in its original form
	
	v0.2
******************************************************************************/

session_start();

//	File locations
if (!is_array($_SESSION['path'])) {
	if (isset($_SERVER['DOMAIN_PATH'])) {
		$root = $_SERVER['DOMAIN_PATH'];
	} elseif (isset($_ENV['DOMAIN_PATH'])) {
		$root = $_ENV['DOMAIN_PATH'];
	} else {
		$root = dirname(__FILE__) . "/.."; // site-context.php is in a first-level folder
	}
	
	$_SESSION['path']['root']				= $root;
	$_SESSION['path']['dynamic_content']	= $root . "/dynamic";
}

//	Owner constants
if (!is_array($_SESSION['owner'])) {
	$_SESSION['owner']['full_name']				= "InSite Arts";
	$_SESSION['owner']['familiar']				= "InSite Arts";
	$_SESSION['owner']['nickname']				= "insitearts";
	$_SESSION['owner']['pronoun']['subject']	= "we";
	$_SESSION['owner']['pronoun']['object']		= "us";
	$_SESSION['owner']['pronoun']['possessive']	= "our";
	$_SESSION['owner']['email']					= "info@insitearts.com";
}
?>