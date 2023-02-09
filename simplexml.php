<?php

	#if ( file_exists( ........

	$xml = simplexml_load_file("az18u008.xml" );


	$xml->getName();


	foreach ($xml->children () as $child )
  {

			echo "Child Node : ". $child->getName(). "\n";
			echo "Child Value: ". $child->getValue(). "\n";

	}

?>
