<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="clients/client">
			<div id="sidebar_item">
				<a>
					<xsl:attribute name="href">/clients/<xsl:value-of select="id"/></xsl:attribute>
					<img src="/static/images/icon_arrow_sm.gif" width="18" height="9" />
				</a>
	
				<a>
					<xsl:attribute name="href">/clients/<xsl:value-of select="id"/></xsl:attribute>
					<xsl:value-of select="name" />
				</a>
			</div>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
