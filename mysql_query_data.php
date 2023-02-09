<?php

	echo " isr number   Validation <br> ";

	$isrname = $_GET["isrname"];

	echo  "Searching for $isrname <br> ";

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "solution" ) or die (mysql_error() );

	$result = mysql_query ( "select isr_num from  isr_base" )  or die ( mysql_error());
	$row = mysql_fetch_array ( $result ) ;

	echo "Name : ".$row['isr_num'];


	while ( $row = mysql_fetch_array ( $result )  ) {
					print "isr_num : ".$row['isr_num']."\n";
	}

	echo " Printed all data";

?>
