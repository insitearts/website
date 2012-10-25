<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="UTF-8" indent="yes" />

	<xsl:template match="menu">	
		<xsl:apply-templates />
	</xsl:template>

	<xsl:template match="item">
		<div id="sidebar_item">
			<a>
				<xsl:attribute name="href"><xsl:value-of select="link" /></xsl:attribute>
				<img src="/static/images/icon_arrow_sm.gif" width="18" height="9" />
			</a>

			<a>
				<xsl:attribute name="href"><xsl:value-of select="link" /></xsl:attribute>
				<xsl:value-of select="text" />
			</a>
		</div>
	</xsl:template>
</xsl:stylesheet>
