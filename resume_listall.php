<?php

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

$target_path ="images/";

			echo "<b> Resumes. </b> <br> ";

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
		

			$result = mysql_query ( "select * from resume" )  or die ( mysql_error());

	
			$row = mysql_fetch_array ( $result ) ;
			if ( $row == NULL ) { echo "No Resumes in the Database, Please insert Resumes before they can be displayed"; return; }

			
			printf ("<script src=\"sorttable.js\"> </script>" );

			printf ("<table class=\"sortable\" border=\"1\">");

			printf ( "<TR> ");
			printf ( "<TH>  Number </TH>");
			printf ( "<TH>  Candidate Name    </TH>");
			printf ( "<TH > Resume</TH>");
			printf ( "<TH > Category</TH>");
			printf ( "</TR> ");



			  printf ( "<TR>" );

				printf ( "<TD>". $row['id']."</TD>");

  			printf ( "<TD>".$row['candidate_name']."</TD> ");

				$title = $row['resume_title'];
  			printf ( "<TD>  <A HREF=$target_path".$title."> ".$row['resume_title']." </A></TD>");
				
				if ( $row['category'] == '' ) {
  				printf ( "<TD> Shashi </TD> ");
				} else {
  				printf ( "<TD>".$row['category']."</TD> ");
				}
  
  			printf ("</TR>");




			while ( $row = mysql_fetch_array ( $result )  ) {
				
			  printf ( "<TR>" );

				printf ( "<TD>". $row['id']."</TD>");

  			printf ( "<TD>".$row['candidate_name']."</TD> ");

				$title = $row['resume_title'];
  			printf ( "<TD>  <A HREF=$target_path".$title."> ".$row['resume_title']." </A></TD>");
				if ( $row['category'] == '' ) {
  				printf ( "<TD> &nbsp; </TD> ");
				} else {
  				printf ( "<TD>".$row['category']."</TD> ");
				}
  
  			printf ("</TR>");

			}

			printf ("</TABLE>");


?>
