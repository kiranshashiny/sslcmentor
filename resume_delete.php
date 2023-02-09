<?php

$id = $_POST['resume_id'];


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			$result = mysql_query ( "delete from resume where id=$id" ) or die ( mysql_error());

			echo "Deleted the resumes";



?>
