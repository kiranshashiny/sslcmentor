<?php

$user_req = $_POST['category'];

#echo "<b> Deleting all resumes in $user_req </b> <br>";


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			$result = mysql_query ( "delete from resume" )  or die ( mysql_error());

			echo "Deleted the resumes";

			$command ="del images\*.doc";
			$output = shell_exec ( $command." 2>&1" );
			print "<pre>  $output </pre>\n";



?>
