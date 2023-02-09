<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "scouting" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE cmi ( id INT NOT NULL AUTO_INCREMENT,

			PRIMARY KEY(id),
			servername VARCHAR ( 30),
			serverip VARCHAR ( 30),
			serveralias VARCHAR ( 30) ,
			model_no VARCHAR ( 30), 
			serial_no VARCHAR ( 30))" ) 

		or die (mysql_error ());

	echo "Table Created";


?>
