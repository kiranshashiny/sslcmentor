<?php

$db = "netiq";
$tablename = "netiq_unix";

	$handle = fopen("somefile", "r");

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );
	
	mysql_select_db ( "netiq" ) or die (mysql_error() );


	printf(  "HostName, SBG, Major, Minor\n");
	while ( !feof($handle)) {

	  if ( ($q = fgets($handle, 4096) ) != FALSE) {
		$q = trim ( $q );
	
		#echo "Searching for [$q] \n";
		$query_str =  "select host_name ,major, minor, sbg from netiq_unix where host_name=\"$q\" ";

		#printf (" query str $query_str\n ");
		$result = mysql_query ( $query_str ) ;
		

		$row = mysql_fetch_array ( $result );
		if ( $row['host_name'] != NULL ) {

			if ( $row['sbg'] != NULL || 
						$row['major'] != NULL  ||
						$row['minor'] != NULL ) {
						
				#printf(  "Host [".$row['host_name']."] SBG [".$row['sbg']."] OS [".$row['major']. "] Minor [".$row['minor']."]\n");
				printf(  strtoupper( $row['host_name']).",".strtoupper($row['sbg']).",".strtoupper($row['major']). ",".strtoupper( $row['minor'])."\n");
				}
			}
		}
		
	}

	fclose ( $handle );


?>
