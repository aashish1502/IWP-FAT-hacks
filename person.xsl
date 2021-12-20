<?xml version="1.1" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="root">
    <html>
        <head>
            <title>kuch bhi</title>
        </head>
        <body>
            <xsl:for-each select="root/person">
            <xsl:value-of select="FirstName"/>
            <xsl:value-of select="LastName"/>
            <xsl:value-of select="age"/>
            <xsl:value-of select="address"/>
            <xsl:value-of select="phone"/>
            </xsl:for-each>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>