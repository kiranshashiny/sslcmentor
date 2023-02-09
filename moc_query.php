<?php


#	$isrname = $_GET["isrname"];

#	echo  "Searching for $isrname <br> ";

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	$result = mysql_query ( "select * from moc_perf" )  or die ( mysql_error());
	$row = mysql_fetch_array ( $result ) ;

	printf ( "Month   Mon_Servers  MngNw Sev1 Sev2 Sev3\n");
	printf ( "".$row['month']." ".$row['monitored_servers']." ".$row['managenow_tickets'].
			"\n");


	while ( $row = mysql_fetch_array ( $result )  ) {
		printf ( "".$row['month']." ".$row['monitored_servers']."\n");
	
	}

	echo " Printed all data";

?>
