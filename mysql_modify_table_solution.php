<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "solution" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "ALTER TABLE isr_base ADD keywords VARCHAR(200)" ) or die (mysql_error ());

/*	mysql_query ( "ALTER TABLE isr_base ADD snd_req_approval VARCHAR(30)" ) or die (mysql_error ());
	mysql_query ( "ALTER TABLE isr_base ADD snd_sol_approval VARCHAR(30)" ) or die (mysql_error ());
	mysql_query ( "ALTER TABLE isr_base ADD snd_tech_review VARCHAR(30)" ) or die (mysql_error ());


	mysql_query ( "ALTER TABLE isr_base ADD rcv_req_approval VARCHAR(30)" ) or die (mysql_error ());
	mysql_query ( "ALTER TABLE isr_base ADD rcv_sol_approval VARCHAR(30)" ) or die (mysql_error ());
	mysql_query ( "ALTER TABLE isr_base ADD rcv_tech_review VARCHAR(30)" ) or die (mysql_error ());

*/


	echo "Solutioning Table ALTERED ";

?>
