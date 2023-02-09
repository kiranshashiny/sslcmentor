<?php

$user     ="root";
$password ="root";
$dbhost = 'localhost';

$sort_field =$_POST['sort_field'];
$resume_status =$_POST['resume_status'];



function dateDiff($dformat, $endDate, $beginDate)
{

				#printf ( "start date [$beginDate]" );
				#printf ( "actualfdate [$endDate]" );
				$date_parts1=explode($dformat, $beginDate);
				$date_parts2=explode($dformat, $endDate);
				$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
				$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
				return $end_date - $start_date;
}



			#  START OF CODE

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );

			$result = mysql_query ( "select id, 
candidate_name,
recruiter_name,
recruiter_name, 
category,
date_rcvd,
pr_intrvwr,
resume_title,
pr_status,
sec_intrvw,
sec_intrvw_date,
pr_intrvw_date,
c_phone,
r_phone

from resume order by $sort_field") or die (mysql_error());

			
printf ("<B> Sorted Resumes</B> <BR>" );


printf ("<script src=\"sorttable.js\"> </script>" );

printf ( "<form name=\"list_sol\" method=\"POST\"> " );


			printf ("<table class=\"sortable\" border=\"1\">");

			printf ( "<TR> ");
			printf ( "<TH WIDTH=\"3\">  Number </TH>");
			printf ( "<TH WIDTH=\"10\">  Candidate Name    </TH>");
			printf ( "<TH WIDTH=\"10\">  Recruiter Name    </TH>");
			printf ( "<TH> Category </TH>");
		  printf (" <TH> Date Rcvd  </TH>" );
      printf (" <TH> Internal  </TH>" );
      printf (" <TH> Date  </TH>" );
 			printf (" <TH> Primary Intrviewer  </TH>" );
 			printf (" <TH> Primary Interviewer Date  </TH>" );
 			printf (" <TH> Resume Title  </TH>" );
 			printf (" <TH> Status  </TH>" );
 			printf (" <TH> Sec Interviewer  </TH>" );
 			printf (" <TH> Sec Interviewer Date  </TH>" );
 			printf (" <TH> Candidate phone  </TH>" );
 			printf (" <TH> Recruiter phone  </TH>" );

			printf ( "</TR> ");



			$count = 1;
			while ( $row = mysql_fetch_array ( $result ) ) {

							if ( $row == NULL ) { echo "No more ISRs in the database\n"; return; }

								$color = "#99CCF0";
						     
							  printf ( "<TR >" );

								printf ( "<TD>" );
								printf ( $row["id"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["candidate_name"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["recruiter_name"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["category"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["date_rcvd"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["internal"]."<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( $row["date"]."<BR>" );
								printf ( "</TD>" );


								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "<TD>" );
								printf ( "<BR>" );
								printf ( "</TD>" );

								printf ( "</TR>" );

			}

			printf ( "</table>" );


			printf ("<BR>" );




printf ( "</form>" );


?>
