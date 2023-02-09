<?php
$dom = new DomDocument();

print "--- Namespace in context node defined ---\n";

$dom->load("busreq.xml");
$xpath = new Domxpath($dom);

//this works as expected
$result = $xpath->query("/my:myFields");
foreach ($result as $title) {
    print $title->nodeName. "\n";   
}

print "--- Namespace not in context node defined ---\n";

$dom->loadXML("<root>
    <dc:subject xmlns:dc='http://purl.org/dc/elements/1.1/'/>
    <dc:subject xmlns:dc='http://purl.org/dc/elements/1.1/'/>
   </root>");
$xpath = new Domxpath($dom);
//here we have to register the foo namespace with a different prefix
$xpath->registerNamespace("dublincore","http://purl.org/dc/elements/1.1/");
$result = $xpath->query("//dublincore:subject");
foreach ($result as $node) {
    print $node->nodeName ."\n";   
}

?>
