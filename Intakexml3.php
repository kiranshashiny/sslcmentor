<?php
//create XMLReader object
$reader = new XMLReader();
//open XML file
$reader->open('busreq.xml');
//loading from string:
//$reader->XML($xmlstring)

//Loop through the XML Document
while ($reader->read()) {
    
    switch ($reader->nodeType) {
        case (XMLREADER_ELEMENT):
        if ($reader->nodeType==XMLREADER_ELEMENT)  {
            print "\n";
            print str_repeat("  ",$reader->depth);
            print $reader->localName ." ";
            if ($reader->namespaceURI) {
                 print "NS: <font color='red'>$reader->namespaceURI</font> ";
            }
            if( $reader->hasAttributes) {
                //advance to first Attribute
                $attr = $reader->moveToFirstAttribute();
                //loop through attributes
                while ($attr) {
                    print $reader->name." => " .$reader->value .";"; 
                    $attr = $reader->moveToNextAttribute();
                }
            }
        }
        break;
        case (XMLREADER_TEXT):
             print " '<font color='green'>$reader->value</font>'";
            break;
        case (XMLREADER_COMMENT):
         print "<font color='blue'>$reader->value</font>";
        break;
        case (XMLREADER_PI):
           print "\n<font color='red'>PI: $reader->name -> $reader->value</font>";
           break;
    }
}

?>
