<html>
<head>
<script type="text/javascript">

function loadXMLDoc(dname)
{
if (window.XMLHttpRequest)
  {
  xhttp=new XMLHttpRequest();
  }
else
  {
  xhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xhttp.open("GET",dname,false);
xhttp.send("");
return xhttp.responseXML;
}


xmlDoc=loadXMLDoc("UnixServers.xml");

/*
x=xmlDoc.getElementsByTagName('ReportName');

for (i=0;i<x.length;i++)
{
document.write(x[i].childNodes[0].nodeValue);
document.write("<br />");
}


x=xmlDoc.getElementsByTagName('PlatformName');

for (i=0;i<x.length;i++)
{
document.write(x[i].childNodes[0].nodeValue);
document.write("<br />");
}
*/

// documentElement always represents the root node
x=xmlDoc.documentElement.childNodes;
document.write ("Number of child nodes: " + x.length );
for (i=0;i<x.length;i++)
{
document.write(x[i].nodeName);
document.write(": ");
document.write(x[i].childNodes[0].attributes[1].nodeValue);
document.write("<br />");
}


</script>

<body>

Hello world

</body>
</html>
