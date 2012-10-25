<?php require_once('_context/section-context.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-type" />

	<link href="../CSS/layout.php" rel="stylesheet" type="text/css" />
	<link href="../CSS/style.php" rel="stylesheet" type="text/css" />

	<title><?=$_SESSION['owner']['full_name']?> - <?=$_section_title?></title>
</head>

<body>
	<a id="top" name="top"></a>

	<div id="outer-wrapper">
		<!-- skip links for text browsers -->
		<span id="skiplinks" style="display: none;"><a href="#main">skip to main </a> | <a href="#sidebar">skip to sidebar</a></span>

		<!-- Header -->
		<div id="header-wrapper">
			<a href="/">
				<img class="logo" alt="<?=$_SESSION['owner']['full_name']?>" height="28" src="/static/images/logo.gif" width="166" />
			</a>
			<?php include('../rotator/_includes/rotator.php'); ?>
		</div>

		<div id="content-wrapper">
			<!-- individual page content below here -->