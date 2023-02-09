<?php


	echo " in the add data function" ;


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "medical" ) or die (mysql_error() );

	mysql_query ( "INSERT INTO example (name, age) VALUES ('Timmy', '23'); ") or die  ( mysql_error()) ;


	echo " Data Inserted"; 


?>
