<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	//  id int auto_increment   is another way to state uniqueness.
	//  here I have made the month to be unique - no duplicates are allowed.

	mysql_query ( "CREATE TABLE moc_perf ( month VARCHAR(30),
			PRIMARY KEY(month),
			monitored_servers INT,
			managenow_tickets INT,
			sev1_tickets INT,
			sev2_tickets INT,
			sev3_tickets INT,
			total INT  ) " )

		or die (mysql_error ());

	echo "Table Created";


?>
