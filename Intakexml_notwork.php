<?php

# read the file name to begin with ....
	if ( $argc == "1" ){
		printf ("Please enter the name of the file to parse.\n");
		exit(0);

	} else {

			$filename = $argv[1]; 
			printf (" I am parsing $filename \n");
	}

if (file_exists($filename))
  {
		$feed = file_get_contents ( "busreq.xml");
	  $xml = simplexml_load_file($filename);
  }


	$namespaces_declared = $xml->getDocNamespaces();

	var_dump ($namespaces_declared);

  #$my = $xml->children('xmlns:my="http://schemas.microsoft.com/office/infopath/2003/myXSD/2007-09-26T16:38:00  ');
  #echo "my fields is ".$my->myFields;


	echo " Namespaces USED \n";

	$namespaces_used = $xml->getNamespaces(true);
	var_dump ( $namespaces_used );

	# Get the child node only for this namespace.
	$new = $xml->children ('"http://schemas.microsoft.com/office/infopath/2003/myXSD/2007-09-26T16:38:00/' );


	print_r($new);

	foreach ( $new as $second_gen ){
		echo ' myfields is '.$second_gen['myFields'];

	}
	printf (" am I here \n");


	#$myfields = $new->xpath ('myFields/HeaderGroup');
	#print_r ( $myfields );


?>
