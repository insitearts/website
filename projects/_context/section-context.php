<?php
require_once('../_context/site-context.php'); 

//	Show which projects?
if (isset($_GET['status'])) $status=$_GET['status']; else $status="Current";

switch (strtolower($status)) {
	case "casestudies":
		$header = "Case studies";
		$xsl_filter = "casestudy='Yes'";
		break;
	case "completed":
		$header = "Completed projects";
		$xsl_filter = "status='Completed'";
		break;
	default:
		$header = "Current projects";
		$xsl_filter = "status='Current'";
}

$_section_title = $header;
?>