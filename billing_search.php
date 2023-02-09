<?php

  $search_str = "AZ18NT111";
  #$search_str = $_POST['search_isr'];

	printf (" you entered $search_str \n<BR>" );

	$ourFileName = "tab_delimited.txt";

	$fh = fopen($ourFileName, 'r') or die("Can't open file");

	
	$count = 0;
	while ( !feof ($fh) ) {

		$line_of_text = fgets ( $fh );
		#print "$line_of_text\n";

		$str_array[$count] = split ( "\t", $line_of_text);
		
		#print_r ( $str_array );
		printf ( "Host name = $str_array[$count] [0]"); 
		printf ( "Backup    = $str_array[$count] [5]"); 
		printf ( "HW Maint  = $str_array[$count] [10]\n"); 
		$count++;
		
	
	}

	fclose($fh);

?>
