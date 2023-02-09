<?php

	$newarr = array ();
	
	foreach ( $_POST as $varname=>$value )
	{
			#printf (" variable = $varname,  and value is $value <BR>\n");

			# substitute the slash with a underscore in the varname.
			$search_str = array ("\\" , " ", "/", "-" );
			$varname   = strtoupper ( str_replace ($search_str, "_", $varname ));
			printf ("variable = $varname,   value = $value <br>" );
			
			if ( strcmp ( $varname, "BILL_DATE" ) === 0 ) {
			  $billing_date   = strtoupper ( str_replace ($search_str, "_", $value ));
			}

			if ( ( strcmp ( $varname , "SUBMIT") != 0 )  && ( strcmp ( $varname, "BILL_DATE")  != 0)  ) {
				$newarr[$varname] = $value;
			}
	}

	printf (" Printing the new array <BR> ");
	printf (" <BR>  the billing date is $billing_date <br>");

	#print_r ( $newarr );

	mysql_connect("localhost", "root", "root") or die(mysql_error());
	

	mysql_select_db("billing") or die(mysql_error());

	#mysql_query ( "drop TABLE $billing_date" ) or die (mysql_error ());

		
	printf ("Printing the elements in database to be created.<BR>");


	printf ( "<pre>");
	$query_str = "CREATE TABLE $billing_date ( \nid INT NOT NULL AUTO_INCREMENT,\n PRIMARY KEY(id),  \n"; 
	foreach ( $newarr  as $key=>$value ) {
		$query_str = $query_str.$key. "  ".$value .",  \n";
	}

	$query_str = $query_str. "BILL_DATE VARCHAR(30) )  \n";
	printf (" query string is $query_str <br>");
	printf ( "</pre>");


	mysql_query ( $query_str ) or die ( mysql_error () );

	#mysql_query ( "CREATE TABLE $billing_date (
  #   id INT NOT NULL AUTO_INCREMENT, 
  #   PRIMARY KEY(id),
  #    name VARCHAR(30), 
  #    age INT
  # )")
  # or die(mysql_error());  

echo "Table Created!";

?>
