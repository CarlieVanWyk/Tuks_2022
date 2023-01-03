<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" version="1.0">
	<!-- fop -xml example.xml -xsl example.xsl -pdf result.pdf  -->
    <!-- Carlie van wyk u21672823 -->
	<xsl:output method="xml" indent="yes" />
	
	<xsl:template match="/">
		<fo:root>
			<fo:layout-master-set>
				<fo:simple-page-master master-name="content" page-height="148mm" page-width="210mm">
					<fo:region-body margin="10mm"/>
					<fo:region-before extent="10mm" background-color="#FA8072"   />
					<fo:region-after extent="10mm" background-color="#FA8072" />
					<fo:region-start/>
					<fo:region-end/>
				</fo:simple-page-master>
			</fo:layout-master-set>

            <xsl:for-each select="pokedex/pokemon">
                <fo:page-sequence master-reference="content">

                    <fo:static-content  flow-name="xsl-region-before">
						<fo:block color="white" text-align="left" padding="3mm" font-weight="bold" margin-left="2mm">
							My Minidex
						</fo:block>
					</fo:static-content>

                    <fo:static-content  flow-name="xsl-region-after">
						<fo:block color="white" text-align="right" padding="3mm" font-weight="bold" margin-right="2mm">
							Page <fo:page-number />
						</fo:block>
					</fo:static-content>

                    <fo:flow flow-name="xsl-region-body">
                        <fo:table>
							<fo:table-body>
								<fo:table-row>
									<fo:table-cell width="80mm">
										<fo:block>
                                            <fo:block color="green">
												#<xsl:value-of select="pokedex_number"/> <xsl:value-of select="species"/>
											</fo:block>

                                            <fo:block>
                                                <fo:external-graphic src="{@src}">
                                                    <xsl:attribute name="src">
                                                        url(images/normal/front/<xsl:value-of select="image/normal"/>.<xsl:value-of select="image/normal/@type"/>)
                                                    </xsl:attribute>
                                                </fo:external-graphic>
                                                <fo:external-graphic src="{@src}">
                                                    <xsl:attribute name="src">
                                                        url(images/normal/back/<xsl:value-of select="image/normalback"/>.<xsl:value-of select="image/normalback/@type"/>)
                                                    </xsl:attribute>
                                                </fo:external-graphic>
                                            </fo:block>

                                            <fo:block>
                                                <fo:external-graphic src="{@src}">
                                                    <xsl:attribute name="src">
                                                        url(images/shiny/front/<xsl:value-of select="image/rare"/>.<xsl:value-of select="image/rare/@type"/>)
                                                    </xsl:attribute>
                                                </fo:external-graphic>
                                                <fo:external-graphic src="{@src}">
                                                    <xsl:attribute name="src">
                                                        url(images/shiny/back/<xsl:value-of select="image/rareback"/>.<xsl:value-of select="image/rareback/@type"/>)
                                                    </xsl:attribute>
                                                </fo:external-graphic>
                                            </fo:block>
										</fo:block>

                                        <fo:block border="3px solid yellow" margin="2mm" padding="2mm">
                                            <fo:block>
                                                Attack:  <xsl:value-of select="base_stats/atk"/>
                                            </fo:block>
                                            <fo:block>
                                                Defence: <xsl:value-of select="base_stats/def"/>
                                            </fo:block>
                                            <fo:block>
                                                Sp. Attack: <xsl:value-of select="base_stats/satk"/>
                                            </fo:block>
                                            <fo:block>
                                                Sp. Defence: <xsl:value-of select="base_stats/sdef"/>
                                            </fo:block>
                                            <fo:block>
                                                Speed: <xsl:value-of select="base_stats/spd"/>
                                            </fo:block>
                                            <fo:block>
                                                Average stats: <xsl:value-of select="(base_stats/atk + base_stats/def + base_stats/satk + base_stats/sdef + base_stats/spd) div 5"/>
                                            </fo:block>
                                        </fo:block>
									</fo:table-cell>

									<fo:table-cell>
										<fo:block>
											<fo:block border="3px solid pink" margin="2mm" padding="2mm">
                                                <fo:block font-weight="bold">
                                                    Evolution Chain
                                                </fo:block>
                                                <fo:block>
                                                    <fo:external-graphic src="{@src}">
                                                        <xsl:attribute name="src">
                                                            url(images/normal/front/<xsl:value-of select="image/normal"/>.<xsl:value-of select="image/normal/@type"/>)
                                                        </xsl:attribute>
                                                    </fo:external-graphic>

                                                    <fo:external-graphic src="{@src}">
                                                        <xsl:attribute name="src">
                                                            url(images/to.png)
                                                        </xsl:attribute>
                                                        <xsl:attribute name="width">
                                                            10
                                                        </xsl:attribute>
                                                    </fo:external-graphic>

                                                    <fo:external-graphic src="{@src}">
                                                        <xsl:attribute name="src">
                                                            url(images/normal/front/00<xsl:value-of select="image/normal + 1"/>.<xsl:value-of select="image/normal/@type"/>)
                                                        </xsl:attribute>
                                                    </fo:external-graphic>

                                                    <fo:external-graphic src="{@src}">
                                                        <xsl:attribute name="src">
                                                            url(images/to.png)
                                                        </xsl:attribute>
                                                        <xsl:attribute name="width">
                                                            10
                                                        </xsl:attribute>
                                                    </fo:external-graphic>

                                                    <fo:external-graphic src="{@src}">
                                                        <xsl:attribute name="src">
                                                            url(images/normal/front/00<xsl:value-of select="image/normal + 2"/>.<xsl:value-of select="image/normal/@type"/>)
                                                        </xsl:attribute>
                                                    </fo:external-graphic>
                                                </fo:block>
											</fo:block>

                                            <fo:block border="3px solid blue" margin="2mm" padding="2mm">
                                                <fo:inline font-weight="bold">Type: </fo:inline> 
                                                <xsl:for-each select="types/type">
                                                    <xsl:value-of select="."/> |
                                                </xsl:for-each>
                                            </fo:block>
					
                                            <fo:block border="3px solid brown" margin="2mm" padding="2mm">
                                                <fo:block margin-bottom="2mm">
                                                    <fo:inline font-weight="bold">Height: </fo:inline> 
                                                    <xsl:value-of select="size/height/inches"/> inches
                                                    <xsl:value-of select="size/height/meters"/> meters
                                                </fo:block>
                                                <fo:block margin-bottom="2mm">
                                                    <fo:inline font-weight="bold">Weight: </fo:inline> 
                                                    <xsl:value-of select="size/weight/pounds"/> pounds
                                                    <xsl:value-of select="size/weight/kilograms"/> kilograms
                                                </fo:block>
                                                <fo:block>
                                                    <fo:inline font-weight="bold">Size:</fo:inline> 
                                                    <xsl:value-of select="size/size_category"/>
                                                </fo:block>
                                            </fo:block>

                                            <fo:block border="3px solid orange" margin="2mm" padding="2mm">
                                                <fo:inline font-weight="bold">Capture rate: </fo:inline>
                                                <xsl:value-of select="capture_rate"/> | <xsl:value-of select="exp_drop"/>
                                                <fo:inline font-weight="bold"> Exp Drop </fo:inline>
                                            </fo:block>

										</fo:block>
									</fo:table-cell>
								</fo:table-row>
							</fo:table-body>
						</fo:table>
                    </fo:flow>

                </fo:page-sequence>
            </xsl:for-each>
			
		</fo:root>
	</xsl:template>
</xsl:stylesheet>
