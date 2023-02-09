<?php

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$database= $_GET['db'];
$header_info =$_GET['title'];
$subj        =$_GET['subj'];
$chapter     =$_GET['chapter'];

$database="maths_exercise";
$chapter='mult_test';
$header_info ="SSLC Mentor";
$title = "SSLC Mentor";
#$subj="Physics";


$replace_str ="<BR>";


			#  START OF CODE

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "sslcdb" ) or die (mysql_error() );

	$result = mysql_query ( "select id, 
question,
answer 

from $database where chapter='$chapter' order by rand() limit 10 ") or die (mysql_error());


		printf("  <html>\n ");
		printf("  <title> $header_info </title>\n ");
		printf("  <head>\n ");

		printf(" <style type=\"text/css\">

			hr {color:sienna}
			p {margin-left:20px}
			body {font-family:\"Calibri\",Georgia, Serif}
			</style>

		");


		printf("  <h2>$subj</h2>\n ");

		printf("  <script type=\"text/javascript\">\n");

		$a_count=0;
		printf ("\n" );
		printf ("\t var  arr       = new Array;\n ");

		while ( $row = mysql_fetch_array ( $result ) ) {

				printf("\t arr[$a_count]        = new Object ();\n");
				printf("\t arr[$a_count].str    = \"".$row["question"]."\";\n" );

				
				$row["answer"] =  ereg_replace ( "\n", $replace_str,   $row["answer"]);

				// Careful ! do not touch below. this is sensitive to toggling.
				printf("\t arr[$a_count].ans    = \"".$row["answer"]."\";\n" );

				$a_count++;

				printf ("\n");

		}


				printf ("var flag ='unhidden'; \n" );
			
				printf ("function showButton()\n" );

				printf ("{\n" );

				printf ("\t var elem = 1;  \n" );
				printf ("\t if ( flag == 'hidden' ) { \n");
		
				printf ("\t   for ( i=0; i < $a_count; i++ ){ \n");

				printf ("\t    elem = \"disppara\"+i; \n");

				printf ("\t    var textbox = document.getElementById (elem); \n");
						
				printf ("\t    textbox.value= arr[i].ans; \n");

				printf ("\t    flag = \"unhide\"; \n");
				
				printf ("\t   } \n");

				printf ("\t } else { \n");

				printf ("\t   for ( i=0; i < $a_count; i++ ){ \n");

				printf ("\t    elem = \"disppara\"+i; \n");

				printf ("\t    var textbox = document.getElementById (elem); \n");
						
				printf ("\t    textbox.value= \"\"; \n");

				printf ("\t    flag = \"hidden\"; \n");

				printf ("\t   }\n");

				printf ("\t }\n");
				printf ("}   \n");

				printf ("\n\n");

		



		

		printf ("\n\n\n");

		printf("\t</script>\n ");
		printf("\t</head> \n");




		printf("\t<body bgcolor=\"Silver\"  >\n");
		printf ("\n\n");


		mysql_data_seek ( $result, 0 );
		
		printf("\t<form name=\"vote\" id=\"vote\"> <BR>\n");
		printf ("<input type=\"button\" value=\"Hide/Unhide Answers\" onclick=\"showButton()\" /> \n");

    printf ( "<table> \n" );


		$a_count = 0; 
		while ( $row = mysql_fetch_array ( $result ) ) {

			$question_num = "question".$a_count;
			$ans_num      = "disppara".$a_count;
			$temp_count   = $a_count + 1;
	
			if ( ! ( $a_count % 2)  ) {
				printf  ( "<TR> \n");
			}



					printf ( "\t<TD>\n" );

					printf("\t<p><fieldset> \n");
					printf("\t<p id=$question_num>  <b> Q$temp_count: &nbsp  ".$row["question"] ."&nbsp &nbsp =" );


					$row["answer"] =  ereg_replace ( "\n", $replace_str,   $row["answer"]);

				  //printf("\t<p id=$ans_num>   Ans:      ".$row["answer"].";\n" );

				  printf("\t <input type=\"text\" id=$ans_num width=\"10\" value=". $row["answer"] .">"  );

					printf("\t<p></fieldset> \n");
					printf ( "\t</TD>\n");


			if (  ( $a_count % 2 ) ) {
				printf ( "</TR>\n");
			}


			printf("\n");
			
			$a_count++;

		}
    printf ( "</table> \n" );

			printf("\n");

			printf("<BR>\n");

			printf("\t</form> \n ");

			printf("</body>\n ");
			printf("</html>\n ");

?>
