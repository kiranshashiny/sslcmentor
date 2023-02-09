<?php

$xml_han = new SimpleXMLElement( "busreq.xml", null, true );

print RecursiveXML( $xml_han );
function RecursiveXML( SimpleXMLElement $han, $preffix = "")
{
    if( count( $han->children() ) < 1 )
    {
				printf (" is it here ");
        return $preffix . "&lt;" . $han->getName() . "&gt;&nbsp;" . $han . "&nbsp;&lt;/" . $han->getName() . "&gt;<br />";
    }
   
    $ret = $preffix . "&lt;" . $han->getName() .  "&gt;<br />";
    foreach( $han->children() as $key => $child )
    {
        $ret .= RecursiveXML($child , $preffix . "|--&nbsp;&nbsp;&nbsp;" );
    }
    return $ret;
}

?> 
