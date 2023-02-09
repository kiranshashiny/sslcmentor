<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "billing" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE physics ( id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(id),
			question VARCHAR ( 30), 
			answer_idx INT,
			date      DATE,
			answer1   VARCHAR ( 50),
			answer2   VARCHAR ( 50),
			answer3   VARCHAR ( 50)  ) " )

		or die (mysql_error ());

	echo "Table Created";


?>
