<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "snc" ) or die (mysql_error() );

	$compl_array  = array ("Standard & Supported" , "Non Standard & Supported", "Unsupported", "Version Unknown" );

	
				$stack_temp = array();
				foreach ( $compl_array as &$c_status ) {
								// DBG printf ("Working on >>>>>>  $c_status\n");


								$result = mysql_query ( "select count(*) from snc_combined where Vendor_Support='$c_status'"  )  or die ( mysql_error());

								$count  = mysql_result ( $result, 0 , 0 );
								 printf (" the count for $c_status is  $count\n\n\n");

								array_push ( $stack_temp, (int) $count);


				}
				#$bar_stack->append_stack ( $stack_temp );
	

?>
