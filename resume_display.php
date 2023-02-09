<?php

$user_req = $_POST['category'];




$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			if ( $user_req === "All" ) {
				echo "<b> Listing all resumes </b> <br>";

				$sql_str = "select * from resume";

			} else {
				
				echo "<b> Listing resumes for $user_req  </b> <br>";
				$sql_str = "select * from resume where category=\"$user_req\"" ;
			}


			$result = mysql_query ( $sql_str )  or die ( mysql_error());













			$found_flag = false;
			while ( $row = mysql_fetch_array ( $result )  ) {
					$found_flag = true;

					echo "ID : ".$row['id']."<BR>";
					echo "Name : ".$row['candidate_name']."<BR>";
					
					echo "<A HREF=$target_path".$title."> ".$row['resume_title']." </A> <br>";
					echo "<br>";
					echo "********   ********* <BR>";
			}

			if ( ! $found_flag  ) {
				printf ( "No resumes were found !!! <BR>" );

			}



?>
