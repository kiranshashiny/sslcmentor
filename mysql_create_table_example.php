<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "sample" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE users ( id INT NOT NULL AUTO_INCREMENT,

			PRIMARY KEY(id),
			username VARCHAR ( 255),
			emailaddress VARCHAR ( 255)) " )

		or die (mysql_error ());

	echo "Table Created";


?>
