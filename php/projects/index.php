<?php include("../_includes/page_top.php"); ?>

<div id="main-wrapper">
	<div class="post">
<?php
echo "<h3>$header</h3>";

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="projects/project[$xsl_filter]">
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

			<xsl:if test="client">
				<p>
					Client:
					<xsl:choose>
						<xsl:when test="clientid">
							<a><xsl:attribute name="href">/clients/<xsl:value-of select="clientid"/></xsl:attribute>
								<xsl:value-of select="client"/>
							</a>
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="client"/>
						</xsl:otherwise>
					</xsl:choose>
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

require_once("_includes/project_XML_handling.php");
echo transform_project_data_XSL($xsl);
?>
		<p><a href="#top"><img src="/static/images/icon_arrow_up.gif" width="18" height="9" />back to top</a></p> 
	</div>
</div>

<div id="sidebar-wrapper">
<?php
include("../_includes/menu_project.php"); 

echo "<h2 class=\"title\">$header</h2>";

//	Here is the XSL with our filter inserted by PHP
$xsl = <<<XSL
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="projects/project[$xsl_filter]">
			<div id="sidebar_item">
				<a>
					<xsl:attribute name="href">/projects/<xsl:value-of select="id"/></xsl:attribute>
					<img src="/static/images/icon_arrow_sm.gif" width="18" height="9" />
				</a>
	
				<a>
					<xsl:attribute name="href">/projects/<xsl:value-of select="id"/></xsl:attribute>
					<xsl:value-of select="name" />
				</a>
			</div>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
XSL;

require_once("_includes/project_XML_handling.php");
echo transform_project_data_XSL($xsl);
?>
</div>

<?php include("../_includes/page_bottom.php"); ?>
