<?php


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "medical" ) or die (mysql_error() );

	mysql_query ( "drop table example;") or die  ( mysql_error()) ;

	echo " Table Deleted"; 

?>
