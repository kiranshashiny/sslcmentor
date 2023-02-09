<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "sslcdb" ) or die (mysql_error() );

	// Create a Mysql table in the database.


	mysql_query ( "DROP TABLE physics" ) or die (mysql_error ());



	echo "Solutioning Table ALTERED ";

?>
