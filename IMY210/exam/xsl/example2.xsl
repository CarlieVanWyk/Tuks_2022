<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html"/>
    <xsl:template match="/">
        <body style="background-image: url(images/background_main.jpg); font-family: Arial, Helvetica, sans-serif">
            <div style="display: flex; justify-content: center; margin: 10px">
                <img src="images/diablo3-logo.png" width="350"/>
            </div>
            <div style="background-image: url(images/background.jpg); background-attachment: fixed; border: solid red 1px; border-radius: 10px; margin: 30px; padding: 20px;">
                <div style="display: flex; justify-content: space-evenly">
                    <img src="images/url.png" width="100"/>
                    <div style=" text-align: center;">
                        <h1 style=" text-transform: uppercase; color: #E7AC60">
                            <xsl:value-of select="character/class/basic/name"/>
                        </h1>
                        <p style="color: #D9CAB0"> 
                            Last updated on <xsl:value-of select="character/class/basic/update"/> 
                            by <xsl:value-of select="character/class/basic/creator"/>
                        </p>
                        <p style="color: #D9CAB0">
                            Tags:   <xsl:for-each select="character/class/basic/tags">
                                        <!-- <xsl:if test="character/class/basic/tags/tag/@status = 'outdated'">
                                            do nothing 
                                        </xsl:if>
                                        <xsl:else>
                                            <xsl:value-of select="tag"/>
                                        </xsl:else> -->
                                        <xsl:value-of select="tag"/>
                                    </xsl:for-each> 
                        </p>
                        <p style="color: #D9CAB0"><b> Level required for this build: 70 Average item level: 40</b></p>

                        <!-- to get the 70 from the above line 
                            
                                <xsl:for-each select="//requirements/level">
                                    <xsl:sort data-type="number" order="ascending"/>
                                    <xsl:if test="position() = last()">
                                        <xsl:value-of select="."/>
                                    </xsl:if>
                                </xsl:for-each>

                            to get the average

                                <xsl:value-of select="ceiling(sum(//items/item/requirements/level)) div count(//items/item/requirements/level))"
                        -->

                        <a style="margin: 20px">
                            <xsl:attribute name="href">
                                http://<xsl:value-of select="character/@source"/>
                            </xsl:attribute>
                            <img src="images/face.png" width="70"/>
                        </a>
                    </div>
                    <img src="images/url.png" width="100"/>
                </div>
                
                <div style=" color: #E7AC60">
                    <h2 style="text-align: center"> Paragon Priorities</h2>
                    <!-- <hr/> -->
                    <div style="color: #D9CAB0; display: flex; justify-content: space-around">
                        <div style="border: solid #E7AC60 1px; border-radius: 10px; padding: 10px; background-color: rgba(255, 255, 255, 0.1)">
                            <p>
                                <xsl:if test="character/class/paragon/@set = 'Core'">
                                    <xsl:value-of select="character/class/paragon/@set"/> 
                                </xsl:if>
                            </p>
                            <ol>
                                <xsl:for-each select="character/class/paragon[@set = 'Core']/priority">
                                    <xsl:sort select="character/class/paragon[@set = 'Core']/priority/@weight"/> 
                                    <li><xsl:value-of select="."/></li>
                                </xsl:for-each>
                            </ol>
                        </div>
                        <div style="border: solid #E7AC60 1px; border-radius: 10px; padding: 10px; background-color: rgba(255, 255, 255, 0.1)">
                            <p>
                                <xsl:if test="character/class/paragon/@set = 'Offense'">   
                                    Offense
                                </xsl:if>
                            </p>
                            <ol>
                                <xsl:for-each select="character/class/paragon[@set = 'Offense']/priority">
                                        <xsl:sort select="character/class/paragon[@set = 'Offense']/priority/@weight"/>
                                        <li><xsl:value-of select="."/></li>
                                </xsl:for-each>
                            </ol>
                        </div>
                        <div style="border: solid #E7AC60 1px; border-radius: 10px; padding: 10px; background-color: rgba(255, 255, 255, 0.1)">
                            <p>
                                <xsl:if test="character/class/paragon/@set = 'Defense'">
                                    Defense 
                                </xsl:if>
                            </p>
                            <ol>
                                <xsl:for-each select="character/class/paragon[@set = 'Defense']/priority">
                                        <xsl:sort select="character/class/paragon[@set = 'Defense']/priority/@weight"/>
                                        <li><xsl:value-of select="."/></li>
                                </xsl:for-each>
                            </ol>
                        </div>
                        <div style="border: solid #E7AC60 1px; border-radius: 10px; padding: 10px; background-color: rgba(255, 255, 255, 0.1)">
                            <p>
                                <xsl:if test="character/class/paragon/@set = 'Utility'">
                                    Utility 
                                </xsl:if>
                            </p>
                            <ol>
                                <xsl:for-each select="character/class/paragon[@set = 'Utility']/priority">
                                        <xsl:sort select="character/class/paragon[@set = 'Utility']/priority/@weight"/>
                                        <li><xsl:value-of select="."/></li>
                                </xsl:for-each>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 style=" color: #E7AC60; text-align: center">Skills</h2>
                    <!-- <hr/> -->
                    <div style="color: #D9CAB0">
                        <p style="text-align: center; font-size: larger">Active Skills</p>
                        <div style="display: grid; grid-template-rows: 1fr 1fr; grid-template-columns: 1fr 1fr 1fr;">
                            <xsl:apply-templates select="character/class/skills/skill[@type = 'active'][not(position() mod 2)]">
                                <xsl:sort select="name"/>
                            </xsl:apply-templates>
                            <xsl:apply-templates select="character/class/skills/skill[@type = 'active'][position() mod 2 = 1]">
                                <xsl:sort select="name"/>
                            </xsl:apply-templates>
                        </div>
                        <p style="text-align: center; font-size: larger">Passive Skills</p>
                        <div style="display: grid; grid-template-rows: 1fr; grid-template-columns: 1fr 1fr 1fr 1fr;">
                            <xsl:apply-templates select="character/class/skills/skill[@type = 'passive']">
                                <xsl:sort select="requirements/level" order="descending"/>
                            </xsl:apply-templates>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 style=" color: #E7AC60; text-align: center">Gear</h2>
                    <!-- <hr/> -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <xsl:apply-templates select="character/class/items/item[not(position() = 10)]">
                            <xsl:sort select="set"/>
                        </xsl:apply-templates>
                    </div>
                </div>

                <div>
                    <h2 style=" color: #E7AC60; text-align: center">Kanai&#39;s Cube </h2>
                    <!-- <hr/> -->
                    <div style=" color: #D9CAB0; display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <xsl:apply-templates select="character/class/cubes/item">
                            <xsl:sort select="name"/>
                        </xsl:apply-templates>
                    </div>
                </div>
            </div>
            
            <footer style="color: #E7AC60; text-align: center">Created by: Carlie van wyk, u21672823, 11-05-2022</footer>
        </body>
         
    </xsl:template>




    <xsl:template match="skill">
        <xsl:if test="@type = 'active'">
            <div style="color: #D9CAB0; border: solid #D9CAB0 1px; border-radius: 10px; padding: 5%; margin: 10px; background-color: rgba(255, 255, 255, 0.1)">
                <div style="display: flex;">
                    <img style="margin-right: 20px">
                        <xsl:attribute name="src">
                            images/skills/<xsl:value-of select="@image"/>
                        </xsl:attribute>
                    </img>
                    <div>
                        <p><b>
                            <xsl:value-of select="name"/>
                        </b></p>
                    </div>
                </div>
                <ul>
                    <li>Level: <xsl:value-of select="requirements/level"/></li>
                    <xsl:if test="requirements/equipment and requirements/equipment != ''">
                        <li>Equipment: <xsl:value-of select="requirements/equipment"/></li>
                    </xsl:if>
                    <xsl:for-each select=".">
                        <li>Cost: <xsl:value-of select="cost"/></li>
                    </xsl:for-each>
                    <li>Type: <xsl:value-of select="type"/></li>
                </ul>
                <p>
                    Description: <xsl:value-of select="description"/>
                </p>
                <br/>
                <p>
                    <div>
                        <img>
                            <xsl:attribute name="src">
                                images/skills/<xsl:value-of select="rune/@image"/>
                            </xsl:attribute>
                        </img>
                        <xsl:value-of select="rune/name"/>
                    </div>
                    <ul><li>Level: <xsl:value-of select="rune/level"/><br/></li></ul>
                    
                    Description: <xsl:value-of select="rune/description"/><br/>
                </p>
            </div>
        </xsl:if>

        <xsl:if test="@type = 'passive'">
            <div style="color: #D9CAB0; border: solid #D9CAB0 1px; border-radius: 10px; padding: 5%; margin: 10px; background-color: rgba(255, 255, 255, 0.1)">
               <p><b>
                    <xsl:value-of select="name"/>
                </b></p>
                <p>
                    Level: <xsl:value-of select="requirements/level"/>
                </p>
                <p>
                    <xsl:value-of select="description"/>
                </p>
                <div style="text-align: center">
                    <img>
                        <xsl:attribute name="src">
                            images/skills/<xsl:value-of select="@image"/>
                        </xsl:attribute>
                    </img>
                </div>
            </div>
        </xsl:if>
	</xsl:template>






    <xsl:template match="item">
        <div style=" color: #D9CAB0; border: solid #D9CAB0 1px; border-radius: 10px; padding: 5%; margin: 10px; ; background-color: rgba(255, 255, 255, 0.1)">
            <div style="display: flex; justify-content: space-evenly">
                <img>
                    <xsl:attribute name="style">
                        background-color:<xsl:value-of select="rarity"/>;border-radius: 10px; padding: 10px;
                    </xsl:attribute>
                    <xsl:attribute name="src">
                        images/gear/<xsl:value-of select="@image"/>
                    </xsl:attribute>
                </img>
                
                <div>
                    <p>
                        <xsl:attribute name="style">
                            color:<xsl:value-of select="rarity"/>; font-size: larger
                        </xsl:attribute>
                        <xsl:value-of select="name"/> (<xsl:value-of select="set/@type"/>)
                    </p>

                    <p>
                        <xsl:attribute name="style">
                            color:<xsl:value-of select="rarity"/>
                        </xsl:attribute>
                        <xsl:value-of select="rarity/@set"/> <xsl:value-of select="set"/> 
                    </p>
                </div>
            </div>
            

            <p>
                Level requirement: <xsl:value-of select="requirements/level"/>
            </p>

            <p>
                <xsl:if test="stats/defense">
                    <b>Armor </b><xsl:value-of select="stats/defense/armor"/>
                </xsl:if>
                <xsl:if test="stats/attack">
                    <b>DPS </b><xsl:value-of select="stats/attack/dps"/>
                    <b>DMG </b><xsl:value-of select="stats/attack/damage"/>
                    <b>APS </b><xsl:value-of select="stats/attack/aps"/>
                </xsl:if>
            </p>

            <xsl:if test="stats/primary">
                <div style=" text-align: center">
                    <p><b>Primary</b></p>
                    <p>
                        <xsl:for-each select="stats/primary/stat">
                            &#8226;
                            <xsl:value-of select="."/>
                            <br/>
                        </xsl:for-each>
                    </p>
                </div>
            </xsl:if> 
            <xsl:if test="stats/secondary">
                <div style="text-align: center">
                    <p><b>Secondary</b></p>
                    <p>
                        <xsl:for-each select="stats/secondary/stat">
                            &#8226;
                            <xsl:value-of select="."/>
                            <br/>
                        </xsl:for-each>
                    </p>
                </div>
            </xsl:if> 
        </div>
    </xsl:template>
</xsl:stylesheet>