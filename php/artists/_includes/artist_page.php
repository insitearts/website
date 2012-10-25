<?php
require_once('../../_context/site-context.php');
require_once("../_includes/artist_XML_handling.php");	

$_section_title = "Artists";
$artist_name = htmlspecialchars(substr(strrchr(dirname($_SERVER['PHP_SELF']),'/'),1));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-type" />

	<link href="../../CSS/layout.php" rel="stylesheet" type="text/css" />
	<link href="../../CSS/style.php" rel="stylesheet" type="text/css" />

	<title><?=$_SESSION['owner']['full_name']?> - <?=$_section_title?> - <?=$artist_name?></title>
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
echo "<h3>$artist_name</h3>";

$xsl_filter = "name = '$artist_name'";

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="artists/artist[$xsl_filter]">
			<xsl:for-each select="summary"><xsl:copy-of select="node()"/></xsl:for-each>

			<xsl:if test="related">
				<h4>See also:</h4>
				<p class="post">
					<xsl:for-each select="related/artist">
						<img height="9" src="../../static/images/icon_arrow_sm.gif" width="18" />
						<a><xsl:attribute name="href">/artists/<xsl:value-of select="name" /></xsl:attribute>
							<xsl:value-of select="name"/>
						</a>
						<br />
					</xsl:for-each>
				</p>
			</xsl:if>
			
			<xsl:if test="website">
				<p class="post">
					<a><xsl:attribute name="href"><xsl:value-of select="website" /></xsl:attribute>Website &#187;</a>
				</p>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

echo transform_artist_data_XSL($xsl);

@include("casestudy.html");

//	Now, include this artist's projects (that's why we're here after all)

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="projects/project/artists[artist = '$artist_name']/parent::node()">
			<xsl:if test="position() = 1"><h3>InSite Arts projects</h3></xsl:if>
			<h4>
				<a><xsl:attribute name="href">/projects/<xsl:value-of select="id"/></xsl:attribute>
					<img src="/static/images/icon_arrow_sm.gif" width="18" height="9" />
				</a>

				<a><xsl:attribute name="href">/projects/<xsl:value-of select="id"/></xsl:attribute>
					<xsl:value-of select="name"/>
				</a>
				
				<xsl:if test="period">
					(<xsl:value-of select="period"/>)
				</xsl:if>
			</h4>

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

			<xsl:for-each select="summary"><xsl:copy-of select="node()"/></xsl:for-each>

			<p class="post">
				<a><xsl:attribute name="href">/projects/<xsl:value-of select="id"/></xsl:attribute>
				<xsl:choose>
					<xsl:when test="casestudy = 'Yes'">
						view case study &#187;
					</xsl:when>
					<xsl:otherwise>
						more &#187;
					</xsl:otherwise>
				</xsl:choose>
				</a>
			</p>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

require_once("../../projects/_includes/project_XML_handling.php");
echo transform_project_data_XSL($xsl);

//	Now include any rotator images for this artist

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="images/image[artist = '$artist_name']">
			<xsl:if test="position() = 1"><h3>Images</h3></xsl:if>
			<br />
			<img>
				<xsl:attribute name="src">/rotator/_context/images/<xsl:value-of select="file"/></xsl:attribute>
				<xsl:attribute name="width">334</xsl:attribute>
				<xsl:attribute name="height">180</xsl:attribute>
			</img>
			<br />
			<p>
				<em><xsl:value-of select="name"/></em> - <xsl:value-of select="project"/>
				
				<xsl:if test="client">
					<xsl:if test="client != project">
						(<xsl:value-of select="client"/>)
					</xsl:if>
				</xsl:if>
			</p>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

require_once("../../artists/_includes/image_XML_handling.php");
echo transform_image_data_XSL($xsl);
?>
					<p><a href="#top"><img src="/static/images/icon_arrow_up.gif" width="18" height="9" />back to top</a></p> 
				</div>
			</div>
			
			<div id="sidebar-wrapper">
				<?php
					include("../../_includes/menu.php");

					echo "<h2 class=\"title\">Artists</h2>";
					echo transform_artist_data("artists_menu");
				?>

			</div>

<?php include("../../_includes/page_bottom.php"); ?>
