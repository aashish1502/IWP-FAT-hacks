<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <body>
                <h3 style="text-align: center">Book Information</h3>
                <table border="1">
                    <tr bgcolor="#EE9480" style="color: black">
                        <th style="text-align:center">Title</th>
                        <th style="text-align:center">Author</th>
                        <th style="text-align:center">Price</th>
                        <th style="text-align:center">ISBN</th>
                        <th style="text-align:center">Category</th>
                    </tr>
                    <xsl:for-each select="book">
                        <tr>
                            <td>
                                <xsl:value-of select="title"/>
                            </td>
                            <td>
                                <xsl:value-of select="author"/>
                            </td>
                            <td>
                                <xsl:value-of select="price"/>
                            </td>
                            <td>
                                <xsl:value-of select="ISBN"/>
                            </td>
                            <td>
                                <xsl:value-of select="category"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>