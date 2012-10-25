<?php
	include("../_includes/page_top.php");
	require_once("_includes/client_XML_handling.php");
?>

<div id="main-wrapper">
	<div class="post">
		<h3>Clients</h3>
<?php

echo transform_client_data("clients");
?>
		<p><a href="#top"><img src="/static/images/icon_arrow_up.gif" width="18" height="9" />back to top</a></p> 
	</div>
</div>

<div id="sidebar-wrapper">
<?php
	include("../_includes/menu.php"); 
	
	echo "<h2 class=\"title\">Clients</h2>";
	echo transform_client_data("clients_menu");
?>
</div>

<?php include("../_includes/page_bottom.php"); ?>
