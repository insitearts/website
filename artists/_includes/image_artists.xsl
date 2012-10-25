<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" encoding="UTF-8" indent="yes" omit-xml-declaration="yes" cdata-section-elements="summary" />

	<xsl:template match="/">
		<xsl:for-each select="images/image">
			<p>
				<a><xsl:attribute name="href">/artists/<xsl:value-of select="artist"/></xsl:attribute>
					<xsl:value-of select="artist"/>
				</a>
			</p>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
