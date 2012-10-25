<?php require_once('_context/site-context.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-type" />

	<link href="CSS/layout.php" rel="stylesheet" type="text/css" />
	<link href="CSS/style.php" rel="stylesheet" type="text/css" />

	<title><?=$_SESSION['owner']['full_name']?></title>

	<meta content="<?=$_SESSION['owner']['full_name']?>" name="author" />
	<meta content="copyright © 2008 <?=$_SESSION['owner']['full_name']?>" name="copyright" />
	<meta content="InSite Arts Ltd is an independent specialist visual art consultancy with specialism in public art commissioning, based in London and the Midlands, working with clients across the UK" name="description" />
	<meta content="InSite Arts Ltd is an independent specialist visual art consultancy with specialism in public art commissioning, based in London and the Midlands, working with clients across the UK" name="keywords" />
	<meta content="all" name="robots" />
</head>

<body>
	<a id="top" name="top"></a>

	<div id="outer-wrapper">
		<!-- skip links for text browsers -->
		<span id="skiplinks" style="display: none;"><a href="#main">skip to main </a> | <a href="#sidebar">skip to sidebar</a></span>

		<!-- Header -->
		<div id="header-wrapper">
			<a href="/">
				<img class="logo" alt="<?=$_SESSION['owner']['full_name']?>" height="28" src="static/images/logo.gif" width="166" />
			</a>
			<?php include('rotator/_includes/rotator.php'); ?>
		</div>

		<div id="content-wrapper">
			<!-- individual page content below here -->
			<div id="main-wrapper">
				<div class="post">
					<h3>Welcome </h3>
					<h4>InSite Arts is an organisation run by Sam Wilkinson and 
					Sarah Collicott. InSite Arts works in partnership with its 
					clients to generate and deliver innovative and relevant public 
					art and arts initiatives. InSite Arts works with public and 
					private sector organisations and specialises in large scale 
					regeneration and mixed use schemes. Working with some of the 
					UK’s most significant development companies has put InSite Arts 
					in a unique position within the field of public art. InSite Arts 
					has the skills to work in complex and time sensitive development 
					environments to deliver high quality work exploring a diversity 
					of arts practice within the public realm. </h4>
					<h4>InSite Arts is committed is to supporting both the clients 
					and artists it works with to enable the best possible 
					opportunities for partnership. Our goal is to generate 
					opportunities for artists to create the unexpected within the 
					public realm. Artists and commissioners, with InSite Arts’ 
					assistance, can join together to offer to people in public 
					places new experiences and ways of interpreting what they see 
					around them. </h4>
				</div>
			</div>

<div id="sidebar-wrapper">
	<?php include("_includes/menu.php"); ?>
</div>

<?php include("_includes/page_bottom.php"); ?>
