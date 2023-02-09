<?php


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	#mysql_select_db ( "medical" ) or die (mysql_error() );

# Note if you are using the variables -then use the quotes around.

#    '$name', '$age'
# without the quotes - it wont work  i.e $name, $age !!!!! NO WORK


	# mysql_query ( "INSERT INTO example (name, age) VALUES ('Shashi', '23'); ") or die  ( mysql_error()) ;


	echo " Data Inserted"; 


?>
