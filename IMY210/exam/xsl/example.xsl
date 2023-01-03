<?xml version="1.0"?>

<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

        <xsl:template match="/">
        <html>
		<body>
			<p>
				<b>
					Available Books
				</b>
			</p>
		<xsl:apply-templates select="(//book[not (@status='out')])"/>
            <p>
            	<i>Total books available:
               		<xsl:value-of select="count(//book[not(@status='out')])"/> 
               </i>
               <br/>
               <i>Total books taken out:
                    <xsl:value-of select="count(//book[(@status='out')])"/> 
               </i>
           </p>
        </body>
	    </html>

        </xsl:template>

	    <xsl:template match="book">
            <xsl:choose>

            <xsl:when test="../@name='merensky'">
            Book
            <xsl:value-of select="@isbn"></xsl:value-of>
            can be found in Merensky
            </xsl:when>

            <xsl:when test="../@name ='klinikala' and not(@status)">
            , Klinikala
            </xsl:when>

            <xsl:when test="../@name ='music' and not(@status)">
            , Music
			</xsl:when>
                

            </xsl:choose>
            <br/>
        </xsl:template>
 

    
</xsl:stylesheet>

