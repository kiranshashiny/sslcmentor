<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE snc_db ( id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(id),
			db_name VARCHAR ( 30), 
			db_count INT  ) " )

		or die (mysql_error ());

	echo "Table Created";


?>
