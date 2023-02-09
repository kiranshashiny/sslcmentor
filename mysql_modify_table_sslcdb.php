<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "sslcdb" ) or die (mysql_error() );

	// Create a Mysql table in the database.


	# does not work !!  mysql_query ( "DROP TABLE chemistry" ) or die (mysql_error ());

	#mysql_query ( "ALTER TABLE chemistry DROP date" ) or die (mysql_error ());

	#mysql_query ( "ALTER TABLE chemistry ADD question VARCHAR(60)" ) or die (mysql_error ());
	#mysql_query ( "ALTER TABLE physics ADD path_diagram VARCHAR(30)" ) or die (mysql_error ());


	echo "Solutioning Table ALTERED ";

?>
