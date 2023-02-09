<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "resume" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	#mysql_query ( "ALTER TABLE resume DROP date" ) or die (mysql_error ());
	mysql_query ( "ALTER TABLE resume DROP status" ) or die (mysql_error ());

	mysql_query ( "ALTER TABLE resume ADD pr_status VARCHAR(30)" ) or die (mysql_error ());

	echo "Resume Table ALTERED ";


?>
