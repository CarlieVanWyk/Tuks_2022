<list>
{
for $aCDdoc in doc("cd.xml")/CATALOG/CD
  where $aCDdoc/YEAR <= 1987
  order by $aCDdoc/TITLE
return <li>{data($aCDdoc/TITLE)} by {data($aCDdoc/ARTIST)} - {data($aCDdoc/COMPANY)}, {data($aCDdoc/COUNTRY)}</li>
}
</list>