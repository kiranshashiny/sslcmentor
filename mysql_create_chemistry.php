<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "sslcdb" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE chemistry ( id INT NOT NULL AUTO_INCREMENT,

			PRIMARY KEY(id),
			question VARCHAR (50),
			answer_idx int ,
			answer1 VARCHAR(30),
			answer2 VARCHAR(30),
			answer3 VARCHAR(30),
			path_diagram VARCHAR(30)

			)" ) 

		or die (mysql_error ());

	echo "Table Created";

?>
