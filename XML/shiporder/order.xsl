<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="shiporder">
    <html>
        <head>
            <title>Shiporder</title>
        </head>
        <body>
            <h3 style="text-align: center">Ship Order Information</h3>
            <table border="1">
                <tr>
                    <th style="text-align:center">Order Person</th>
                    <th style="text-align:center">Shipto Name</th>
                    <th style="text-align:center">Shipto Address</th>
                    <th style="text-align:center">Shipto City</th>
                    <th style="text-align:center">Shipto Country</th>
                    <th style="text-align:center">Item title</th>
                    <th style="text-align:center">Item note</th>
                    <th style="text-align:center">Item quantity</th>
                    <th style="text-align:center">Item price</th>
                </tr>
                <xsl:for-each select="shiporder">
                    <tr>
                        <td><xsl:value-of select="orderperson"/></td>
                        <td><xsl:value-of select="name"/></td>
                        <td><xsl:value-of select="address"/></td>
                        <td><xsl:value-of select="city"/></td>
                        <td><xsl:value-of select="country"/></td>
                        <td><xsl:value-of select="orderperson"/></td>
                        <td><xsl:value-of select="title"/></td>
                        <td><xsl:value-of select="note"/></td>
                        <td><xsl:value-of select="quantity"/></td>
                        <td><xsl:value-of select="price"/></td>
                    </tr>
            </xsl:for-each>
                    
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>