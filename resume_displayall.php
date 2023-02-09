<?php


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

$target_path ="images/";

			echo "<b> Displaying All Resumes. </b> <br> ";
			

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			$result = mysql_query ( "select * from resume" )  or die ( mysql_error());

			$found_flag = false;
			while ( $row = mysql_fetch_array ( $result )  ) {
					$found_flag = true;

					echo "ID : ".$row['id']."<BR>";
					echo "Name : ".$row['candidate_name']."<BR>";
					echo "File: ".$row['resume_title']."<BR>";
					echo   "<A HREF=$target_path".$row['resume_title']."> ".$row['resume_title']." </A> <br>";
					echo "<br>";
					echo "********   ********* <BR>";
			}



?>
