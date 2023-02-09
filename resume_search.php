<?php

$c_name = $_POST['c_name'];
$c_id   = $_POST['c_id'];
$c_keyword = $_POST['c_keyword'];


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


error_reporting( E_ALL );


			if ( $c_name != "" ) {
				$sql_str="select * from resume where candidate_name like '%$c_name%' ";
			}

			if ( $c_id != "" ) {

				$sql_str = "select * from resume where id=$c_id;";
			}

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		
			$result = mysql_query ( $sql_str )  or die ( mysql_error());


			$flag = false;
			while ( $row = mysql_fetch_array ( $result )  ) {
					$flag= true;
					echo "ID : ".$row['id']."<BR>";
					echo "Name : ".$row['candidate_name']."<BR>";
					echo "Resume: ".$row['resume_title']."<BR>";
					echo "<A HREF=$target_path".$title."> ".$row['resume_title']." </A> <br>";
					echo "<br>";
					echo "********   ********* <BR>";
			}
			if ( $flag == false ) {

				echo " <BR> <BR> <h3> NOTE : No resumes found with this name </h3> <BR>";

			} 


?>
