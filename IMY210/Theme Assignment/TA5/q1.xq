
round(sum(
for $aCDdoc in doc("cd.xml")/CATALOG/CD
  let $priceTotal := $aCDdoc/PRICE
return $priceTotal ))
