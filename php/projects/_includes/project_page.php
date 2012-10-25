<?php
require_once('../../_context/site-context.php');
require_once("../_includes/project_XML_handling.php");	

$_section_title = "Projects";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-type" />

	<link href="../../CSS/layout.php" rel="stylesheet" type="text/css" />
	<link href="../../CSS/style.php" rel="stylesheet" type="text/css" />

<title><?php
// Now, just to get the project name in the title, we have to jump through some
// XML hoops.
$project_id = substr(strrchr(dirname($_SERVER['PHP_SELF']),'/'),1);
$xsl_filter = "id = '$project_id'";

// Here is the XSL with our filter inserted by PHP 
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="text" encoding="UTF-8" indent="no" omit-xml-declaration="yes" cdata-section-elements="summary" />
	<xsl:template match="/">
		<xsl:for-each select="projects/project[$xsl_filter]">{$_SESSION['owner']['full_name']} - $_section_title - <xsl:value-of select="name"/></xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

echo transform_project_data_XSL($xsl);
?></title>
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
			<?php include('../../rotator/_includes/rotator.php'); ?>
		</div>

		<div id="content-wrapper">
			<!-- individual page content below here -->
			<div id="main-wrapper">
				<div class="post">
<?php
$xsl_filter = "id = '$project_id'";

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="projects/project[$xsl_filter]">
			<h3>
				<xsl:value-of select="name"/>

				<xsl:if test="period">
					(<xsl:value-of select="period"/>)
				</xsl:if>
			</h3>

			<xsl:if test="client">
				<p>Client: 
					<a><xsl:attribute name="href">/clients/<xsl:value-of select="clientid"/></xsl:attribute>
						<xsl:value-of select="client"/>
					</a>
				</p>
			</xsl:if>

			<xsl:if test="artists">
				<p>Artists: 
					<xsl:for-each select="artists/artist">
						<xsl:if test="position() &gt; 1">, </xsl:if>
						<a><xsl:attribute name="href">/artists/<xsl:value-of select="node()"/></xsl:attribute>
							<xsl:value-of select="node()"/>
						</a>
					</xsl:for-each>
				</p>
			</xsl:if>
			
			<xsl:if test="related">
				<p class="post">
					<xsl:for-each select="related/project">
						<img height="9" src="../../static/images/icon_arrow_sm.gif" width="18" />
						<a><xsl:attribute name="href">/projects/<xsl:value-of select="id" /></xsl:attribute>
							<xsl:value-of select="name"/>
						</a>
						<br />
					</xsl:for-each>
				</p>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

echo transform_project_data_XSL($xsl);

@include("casestudy.html");
?>
					<p><a href="#top"><img src="/static/images/icon_arrow_up.gif" width="18" height="9" />back to top</a></p> 
				</div>
			</div>
			
			<div id="sidebar-wrapper">
				<?php include("../../_includes/menu_project.php"); ?>
			</div>

<?php include("../../_includes/page_bottom.php"); ?>
