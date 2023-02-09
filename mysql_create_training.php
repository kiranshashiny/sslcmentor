<?php

	echo "hello world";

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "medical" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE training ( name VARCHAR ( 30),
		
		location VARCHAR ( 30)) " )

		or die (mysql_error ());

	echo "Table Created";


?>
