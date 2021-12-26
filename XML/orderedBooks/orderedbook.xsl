<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="root">
    <html>
        <head>
            <title>Ordered Book</title>
        </head>
        <body>
            <h3 style="text-align: center">Book Information</h3>
            <table border="1">
                <tr bgcolor="#EE9480" style="color: black">
                    <th style="text-align:center">Number</th>
                    <th style="text-align:center">CustID</th>
                    <th style="text-align:center">Customer</th>
                    <th style="text-align:center">Shipping Address</th>
                    <th style="text-align:center">Title</th>
                    <th style="text-align:center">Author</th>
                </tr>
                <xsl:for-each select="orderedbook">
                    <tr>
                        <td><xsl:value-of select="number"/></td>
                        <td><xsl:value-of select="custID"/></td>
                        <td><xsl:value-of select="customer"/></td>
                        <td><xsl:value-of select="shippingaddress"/></td>
                        <td><xsl:value-of select="title"/></td>
                        <td><xsl:value-of select="author"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>