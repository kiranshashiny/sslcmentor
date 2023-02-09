<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "resume" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE resume ( id INT NOT NULL AUTO_INCREMENT,

			PRIMARY KEY(id),
			candidate_name VARCHAR ( 30),
			recruiter_name VARCHAR ( 30),
			category       VARCHAR ( 30) ,
			resume_location   VARCHAR ( 30), 
			date_rcvd      VARCHAR ( 30) ,
			internal       VARCHAR ( 30),
			date           VARCHAR ( 30), 
			pr_intrvwr     VARCHAR ( 30)) " )

		or die (mysql_error ());

	echo "Resume Table Created";


?>
