(: CARLIE VAN WYK 21672823:)

for $aCDdoc in doc("cd.xml")/CATALOG
return 
<HTML>
<TOTAL>
  {sum(
  for $aCDdoc in doc("cd.xml")/CATALOG/CD
    let $cdTotal := 1
  return $cdTotal )}
</TOTAL>,
{
for $aCDdoc in doc("cd.xml")/CATALOG
return 
<ABOVE>
  <COUNT>
    {sum(
    for $aCDdoc in doc("cd.xml")/CATALOG/CD
      where $aCDdoc/PRICE > 9
      let $cdTotal := 1
    return $cdTotal)}
  </COUNT>
  <TITLE>
    {for $aCDdoc in doc("cd.xml")/CATALOG/CD
      where $aCDdoc/PRICE > 9
      order by $aCDdoc/TITLE
      order by $aCDdoc/COUNTRY
    return $aCDdoc/TITLE}
  </TITLE>
</ABOVE>
}

{
for $aCDdoc in doc("cd.xml")/CATALOG
return 
<BELOW>
  <COUNT>
    {sum(
    for $aCDdoc in doc("cd.xml")/CATALOG/CD
      where $aCDdoc/PRICE < 9
      let $cdTotal := 1
    return $cdTotal)}
  </COUNT>
  <TITLE>
    {for $aCDdoc in doc("cd.xml")/CATALOG/CD
      where $aCDdoc/PRICE < 9
      order by $aCDdoc/TITLE
      order by $aCDdoc/COUNTRY
    return $aCDdoc/TITLE}
  </TITLE>
</BELOW>
}
</HTML>






