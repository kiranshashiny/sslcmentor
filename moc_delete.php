<?php





$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "flash" ) or die (mysql_error() );

			mysql_query ("DELETE from moc_perf");



	echo "<b> Moc Data Deleted Successfully. </b>"; 


?>
