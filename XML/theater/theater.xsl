<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="root">
    <html>
        <head>
            <title>Theater</title>
        </head>
        <body>
            <h3 style="text-align: center">Theater Information</h3>
            <table border="1">
                <tr bgcolor="#EE9480" style="color: black">
                    <th style="text-align:center">Theater ID</th>
                    <th style="text-align:center">Theater Name</th>
                    <th style="text-align:center">Stars</th>
                    <th style="text-align:center">isAC</th>
                    <th style="text-align:center">Location</th>
                </tr>
                <xsl:for-each select="root">
                    <tr>
                        <td><xsl:value-of select="Tid"/></td>
                        <td><xsl:value-of select="Theater_Name"/></td>
                        <td><xsl:value-of select="Stars"/></td>
                        <td><xsl:value-of select="isAC"/></td>
                        <td><xsl:value-of select="Location"/></td>
                    </tr>
            </xsl:for-each>
                    
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>