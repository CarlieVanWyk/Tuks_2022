<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" version="1.0">
	<!-- fop -xml example.xml -xsl example.xsl -pdf result.pdf  -->
	<xsl:output method="xml" indent="yes" />
	
	<xsl:template match="/">
		<fo:root>
			<fo:layout-master-set>
				<fo:simple-page-master master-name="cover" page-height="80mm" page-width="210mm">
					<fo:region-body/>
					<fo:region-before/>
					<fo:region-after/>
					<fo:region-start/>
					<fo:region-end/>
				</fo:simple-page-master>

				<fo:simple-page-master master-name="content" page-height="80mm" page-width="210mm">
					<fo:region-body margin="10mm"/>
					<fo:region-before extent="10mm" background-color="#A1DBF0"   />
					<fo:region-after extent="10mm" background-color="#75F075" />
					<fo:region-start extent="10mm" background-color="#A1DBF0" />
					<fo:region-end extent="10mm" background-color="#75F075"  />
				</fo:simple-page-master>
			</fo:layout-master-set>

			<fo:page-sequence master-reference="cover">
				<fo:flow flow-name="xsl-region-body">
					<fo:block>
						
					</fo:block>
				</fo:flow>
			</fo:page-sequence>

			<fo:page-sequence master-reference="content">
				<fo:flow flow-name="xsl-region-body">
					<fo:block>
						
					</fo:block>
				</fo:flow>
			</fo:page-sequence>
			
		</fo:root>
	</xsl:template>
</xsl:stylesheet>
