<?php

		$xmlDoc = new DOMDocument ();

		$xmlDoc ->load ("az18u008.xml");


	$x = $xmlDoc->documentElement;
	foreach ( $x ->childNodes AS  $item )
	{

		// if(  $item->nodeName == "ReportHeader" ) {
		print  "Node Name: ". $item->nodeName.  " = [". $item->nodeValue . "]\n"; 
		// }


	}

?>
