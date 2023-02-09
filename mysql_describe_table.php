<?php


  ###############  UOP Copy  ###########

	echo "<br> Processing UOP Data <br> <br>";

	$conn = odbc_connect ('UOP', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "view table UOPActiveServers;";

	#$rs = odbc_exec ($conn, $sql );
	$rs = odbc_execute ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}

	print "$rs\n";


	$flag = 0;
	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;

	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server $hostname was not found in the UOP list <br>\n";
	}

	odbc_close ($conn);

	#echo "Completed Processing UOP data. <br> \n\n";


?>
