<?PHP
	$filename = "tab_delim.txt";

	$fd = fopen ($filename, "r");
	$contents = fread ($fd,filesize ($filename));
	
	fclose ($fd);
	$delimiter = "\n";

	$hostcol   = 0;
	$gtotalcol = 16;

	$splitcontents = explode($delimiter, $contents);
	$counter = 0;

	
	foreach ( $splitcontents as $line )
	{

		trim ( $line );

		if ( $line  == ""  ) { printf ("Line is empty \n");  break; }

		$cols = explode ( "\t", $line );

		foreach ( $cols as $eachcol )
		{
			echo "[ $eachcol ]  \n";
		}
		#echo " 1 = $cols[$hostcol] \n";
		#echo " 18 = $cols[18] \n";

		$myarray [$counter]["name"]    = $cols[$hostcol];
		$myarray [$counter]["g_total"] = $cols[$gtotalcol];

		$myarray [ $cols[$hostcol] ] ["name"]    = $cols[$hostcol];

		$counter = $counter+1;
		echo " --------------------------------------------\n";
		
	}

	for ( $row = 0; $row < $counter; $row++ ) {

		printf (  "Name = ".$myarray[$row]["name"]."\n" );
		printf (  "gtotal = ".$myarray[$row]["g_total"]. "\n" );

	}

	$stdin = fopen ( "php://stdin", "r" );
	$search_str = fgets ( $stdin );
	printf (" you entered >>$search_str<< \n");

  printf ( $myarray[$search_str]["g_total"] );
	
	

?>
