<?php
	include("../_includes/page_top.php");
	require_once("_includes/artist_XML_handling.php");
	require_once("_includes/image_XML_handling.php");
	require_once("../projects/_includes/project_XML_handling.php");
?>

<div id="main-wrapper">
	<div class="post">
		<h3>Artists from artist data</h3>
<?php echo transform_artist_data("artists"); ?>

		<h3>Artists from image data</h3>
<?php echo transform_image_data("image_artists"); ?>

		<h3>Artists from project data</h3>
<?php echo transform_project_data("project_artists"); ?>

		<p><a href="#top"><img src="/static/images/icon_arrow_up.gif" width="18" height="9" />back to top</a></p> 
	</div>
</div>

<div id="sidebar-wrapper">
<?php
	include("../_includes/menu.php"); 
	
	echo "<h2 class=\"title\">Artists</h2>";
	echo transform_artist_data("artists_menu");
?>
</div>

<?php include("../_includes/page_bottom.php"); ?>
