<?php

$f_i_comments = $_POST['f_i_comments'];
$f_i_name = $_POST['f_i_name'];
$f_i_date = $_POST['f_i_date'];
$f_i_status = $_POST['f_i_status'];
$id = $_POST['id_hidden'];

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";


			echo 'This page is yet to be completed <BR> ';
			echo "first interviewer   $f_i_name <BR>";
			echo "first date          $f_i_date <BR>";
			echo "first status        $f_i_status <BR>";
			echo "first comments      $f_i_comments <BR>";
			echo "id $id  <BR>";

			# update this record to the DB.

				
			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );

			mysql_query ( "UPDATE resume SET pr_date=\"$f_i_date\", 

pr_intrvw_date='$f_i_date',
pr_status= '$f_i_status', 
pr_comments='$f_i_comments',
pr_intrvwr='$f_i_name'


 WHERE id='$id'")  or die  ( mysql_error());

			

		printf (" Updated the DB <BR> ");
	

			

/*			if  ( mail ( $first_mailto, $first_comments, $first_comments )) {

				echo ("<p>  Message successfully sent ! <p>"); 

			}else {
				echo ("<p>  Message delivery failed ! <p>"); 

			}
*/


?>
