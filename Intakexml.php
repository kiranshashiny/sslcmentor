<?php

# read the file name to begin with ....


#	if ( $argc == "1" ){
#		printf ("Please enter the name of the file to parse.\n");
#		exit(0);
#
#	} else {
#
#			$filename = $argv[1]; 
#			printf (" I am parsing $filename \n");
#	}

$filename = "busreq_removed.txt";

if (file_exists($filename))
  {
		$feed = file_get_contents ( "busreq.xml");
	  $xml = simplexml_load_file($filename);
  }



	$names = $xml->xpath ('/myFields');  # works - puts out the entire document.
	$names = $xml->xpath ('/myFields/HeaderGroup');
	#print_r ( $names );
	<img src="honeywell.img">
	foreach ( $names as $child ) {

		printf (" ISR Number <input type=\"text\" name=\"isrnumber\" value=$child->HeaderISRNumber > ");
		printf (" $child->HeaderISRName <BR>");
	}


?>
