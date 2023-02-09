<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "solution" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE isr_base ( id INT NOT NULL AUTO_INCREMENT,

			PRIMARY KEY(id),
			serial_no VARCHAR ( 30))" ) 

		or die (mysql_error ());

	echo "Table Created";

?>
