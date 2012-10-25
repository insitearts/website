<?php
/*
	This code below goes between <title> and </title> tags in artist_page.php. The reason
	its also kept here is because Expression Web keeps mangling the code if I publish
	that file on its own.
*/
// Now, just to get the artist name in the title, we have to jump through some
// XML hoops.
$artist_id = substr(strrchr(dirname($_SERVER['PHP_SELF']),'/'),1);
$xsl_filter = "name = '$artist_name'";

// Here is the XSL with our filter inserted by PHP 
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="text" encoding="UTF-8" indent="no" omit-xml-declaration="yes" cdata-section-elements="summary" />
	<xsl:template match="/">
		<xsl:for-each select="artists/artist[$xsl_filter]">{$_SESSION['owner']['full_name']} - $_section_title - <xsl:value-of select="name"/></xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

echo transform_artist_data($xsl);
?>