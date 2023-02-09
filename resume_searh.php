<?php

$user_req = $_POST['category'];

echo "<b> Printing all resumes in $user_req </b> <br>";


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			$result = mysql_query ( "select * from resume where category=\"$user_req\"" )  or die ( mysql_error());
			$row = mysql_fetch_array ( $result ) ;

			echo "ID : ".$row['id'] ."<BR>" ;
			echo "Name : ".$row['name'] ."<BR>" ;
			echo "Title: ".$row['resume_title'] ."<BR>" ;

			$title = $row['resume_title'];


			echo "<A HREF=$target_path".$title."> ".$row['resume_title']." </A> <br>";
			echo "********   ********* <BR>";
			echo "<br>";


			while ( $row = mysql_fetch_array ( $result )  ) {
					echo "Name : ".$row['id']."<BR>";
					echo "Name : ".$row['name']."<BR>";
					echo "Title: ".$row['resume_title']."<BR>";
					echo "<A HREF=$target_path".$title."> ".$row['resume_title']." </A> <br>";
					echo "<br>";
					echo "********   ********* <BR>";
			}



?>
