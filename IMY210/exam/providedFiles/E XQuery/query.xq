(:Carlie van wyk u21672823:)

for $oneDoc in doc("query-xml-one.xml")/students/student order by $oneDoc/@id
return 
<student id="{$oneDoc/@id}">  

<module department="CS">
{for $code2 in doc("query-xml-two.xml")/modules/module   
let $code1 := doc("query-xml-one.xml")/students/student[@id = $oneDoc/@id]/module[@department = "CS"]
where $code1/@code = $code2/@code
return $code2/name}
</module>

<module department="IS">
{for $code2 in doc("query-xml-two.xml")/modules/module   
let $code1 := doc("query-xml-one.xml")/students/student[@id = $oneDoc/@id]/module[@department = "IS"]
where $code1/@code = $code2/@code
return $code2/name}
</module>

<module department="VA">
{for $code2 in doc("query-xml-two.xml")/modules/module   
let $code1 := doc("query-xml-one.xml")/students/student[@id = $oneDoc/@id]/module[@department = "VA"]
where $code1/@code = $code2/@code
return $code2/name}
</module>



</student>
