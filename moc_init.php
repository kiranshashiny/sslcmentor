<?php





$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "flash" ) or die (mysql_error() );

			mysql_query ("DELETE from moc_perf");

			$temp  = array ( "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug","Sep", "Oct", "Nov", "Dec" );

			foreach ( $temp as &$value ){
				#print "$value\n";

			mysql_query ( "INSERT INTO moc_perf ( 
month ) VALUES ( '$value' ) ") or die  ( mysql_error());
			}


	echo "<b> Network Operations DB  Initialized Successfully. </b>"; 


?>
