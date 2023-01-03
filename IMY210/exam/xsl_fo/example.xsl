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
					<!-- Complete this declareation by adding the margin, extent and background-color where nessessary -->
				</fo:simple-page-master>
			</fo:layout-master-set>

			<fo:page-sequence master-reference="cover">
				<fo:flow flow-name="xsl-region-body">
					<fo:block display-align="center">
						<fo:external-graphic src="url(images/logo.jpg)"/>
					</fo:block>
				</fo:flow>
				<!--For the cover page create a single flow and reference the flow to your body region declared in the simple-page-master-->
				<!-- Inside your flow create a block In this block align the content to center, and add the logo image-->
				<!--You can alter the height of the images to how you see fit-->
			</fo:page-sequence>

			
			<xsl:for-each select="animals/animal">
				<fo:page-sequence master-reference="content">
					<fo:static-content  flow-name="xsl-region-before">
						<fo:block color="white" padding="3mm" font-weight="bold">
							Animal Fact Guide
						</fo:block>
					</fo:static-content>
					
					<fo:static-content  flow-name="xsl-region-after">
						<fo:block color="white" text-align="right" padding="3mm" font-weight="bold">
							<fo:page-number />
						</fo:block>
					</fo:static-content>

					<fo:flow flow-name="xsl-region-body">
						<fo:table>
							<fo:table-body>
								<fo:table-row>
									<fo:table-cell width="40mm">
										<fo:block>
											<fo:external-graphic border="2px solid black" src="{@src}">
												<xsl:attribute name="src">
													url(images/<xsl:value-of select="@image"/>)
												</xsl:attribute>
											</fo:external-graphic>
										</fo:block>
									</fo:table-cell>
									<fo:table-cell>
										<fo:block>
											<fo:block font-weight="bold">
												<xsl:value-of select="name"/>
											</fo:block>
											<fo:block font-weight="bold" color="#3293EE">
												<xsl:value-of select="sciName"/>
											</fo:block>
											<fo:block background-color="#A1DBF0" margin-right="10mm" padding="3mm">
												<xsl:value-of select="abstract"/>
												<fo:block font-size="small">
													Read more:
													<xsl:value-of select="abstract/@more"/>
												</fo:block>
											</fo:block>
											<fo:block>
												Tags:
												<xsl:for-each select="tags/tag">
														<xsl:value-of select="."/> /
												</xsl:for-each>
											</fo:block>
										</fo:block>
									</fo:table-cell>
								</fo:table-row>
							</fo:table-body>
						</fo:table>
					</fo:flow>

					<!-- <fo:flow flow-name="xsl-region-body">
						<fo:block>
							<xsl:for-each select="animals/animal">
									<xsl:value-of select="name"/>
									<xsl:value-of select="sciName"/>
									<xsl:value-of select="abstract"/>
									<xsl:for-each select="animals/animal/tags/tag">
										<xsl:value-of select="tag"/> 
									</xsl:for-each>
							</xsl:for-each>
						</fo:block>
					</fo:flow> -->




					<!--
					For the content page create: 
					two static-content - for the repeated header and footer for each page, reference the static-content to your before and after region 
					a flow - for the main content, reference the flow to your body region
					-->

					<!--
					Static-content header
						add a block/margin on the left side of the text
						add a block of text that prints the output as in the result
					-->
					<!--
					Static-content footer
						add a block/margin on the left side of the text
						add a block of text that prints the page number
					-->
					
					<!--
					Flow
						Create a for each loop to loop through all animals 
						Display all the information about the animal in a similar fashion as on the example
						Add a border around the image
						Remember to separate each tag with a / symbol 
					-->
				</fo:page-sequence>
			</xsl:for-each>
		</fo:root>
	</xsl:template>
</xsl:stylesheet>
