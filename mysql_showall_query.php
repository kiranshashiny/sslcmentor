<?php

	echo "Displaying all the users who can login <br>";
	
	$link = mysql_connect("localhost", "root", "root" ) or die (mysql_error() );
	if ( $link == false ) {
		echo "Cannot Connect to the database";
		return;
	}

	mysql_select_db ( "medical" ) or die (mysql_error() );


	$result = mysql_query ( "select * from login" )  or die ( mysql_error());
	

	$row = mysql_fetch_array ( $result ) ;

	echo "Name : ".$row['name'] . "    ";
	echo "Passwd: ".$row['password'];

	echo "<br>";


	while ( $row = mysql_fetch_array ( $result )  ) {
					echo "Name : ".$row['name'];
					echo "Password: ".$row['password'];
					echo "<br>";
	}


	echo " Printed all data";


?>
