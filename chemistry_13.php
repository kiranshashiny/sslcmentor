<?php

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';


			#  START OF CODE

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "sslcdb" ) or die (mysql_error() );


$database = "chemistry_13";

	$result = mysql_query ( "select id, 
question,
answer_idx,
answer1,
answer2,
answer3,
answer4 

from $database order by rand() ") or die (mysql_error());


		printf("  <html>\n ");
		printf("  <head>\n ");
		printf("  <script type=\"text/javascript\">\n");


printf ("\t<style type=\"text/css\" >\n");
printf ("\t\t img {padding: 24pt;}\n");
printf ("\t\t body {background-color: #cccccc\; font-family: Arial,sans-serif;}\n");


printf ("\t</style>\n");


		$a_count=0;
		printf ("\n" );
		printf("\t var  arr       = new Array;\n ");
		while ( $row = mysql_fetch_array ( $result ) ) {


				printf("\t arr[$a_count]        = new Object ();\n");
				printf("\t arr[$a_count].str    = \"".$row["question"]."\";\n" );
				printf("\t arr[$a_count].ans    =  ".$row["answer_idx"].";\n" );
				printf("\t arr[$a_count].answers  =  new Array;       \n" );
				printf("\t arr[$a_count].answers[0] = \"".$row["answer1"]."\"; \n" );
				printf("\t arr[$a_count].answers[1] = \"".$row["answer2"]."\"; \n" );
				printf("\t arr[$a_count].answers[2] = \"".$row["answer3"]."\"; \n" );
				printf("\t arr[$a_count].answers[3] = \"".$row["answer4"]."\"; \n" );

				$a_count++;

				printf ("\n");

		}


		

		printf ("\n\n\n");

		printf (" function myfunc()   \n");
		printf (" {  \n");
		
		printf (" var xax = [" );

		for ( $x = 1; $x <= $a_count ; $x++ ){

			printf (" document.forms.vote.appr".$x."c ," );

		}
			printf (" document.forms.vote.apprlastc ]\n\n" );
		// printf (" document.forms.vote.appr1c, document.forms.vote.appr2c, document.forms.vote.appr3c, document.forms.vote.appr4c]; \n");

		    printf (" var sum, grp, x, y;  \n");

				printf (" alert (\"hello world\"); \n");
		
        printf (" sum = 0;  \n");
        printf (" correct_count = 0;  \n");
		
		    printf ("\tfor (y = 0; y < xax.length; y++){  \n");
				printf ("\tblk_num = y+1;  \n");
				#printf (" alert (\"question \"+ blk_num ); \n");

				printf ("\t  grp = xax[y];  \n");
				printf ("\t  check_flag = false;  \n");
				
				printf ("\t   for ( x = 0; x< 4; x++ ) {  \n");
				printf ("\t     if (grp[x].checked ){  \n");
				printf ("\t       check_flag = true;  \n");

				printf ("\t       if ( arr[x].ans == arr[y].ans ) {  \n");
				printf ("\t          alert ( \" Correct Answer for question\" + blk_num );  \n");
				printf ("\t          correct_count++; \n");
				printf ("\t       } else {  \n");
				printf ("\t          alert ( \" Incorrect Answer for question\" + blk_num);  \n");
				printf ("\t       }  \n");
		    printf ("\t     };  \n");
		    printf ("\t   };  \n");
        printf ("\t   if ( check_flag == false ) { \n" );
				printf ("\t      alert (\" Question \" + blk_num + \" Unanswered\"); \n");
				printf ("\t   } \n");
		    printf ("\t };  \n");
				printf ("\t  alert ( correct_count + \" Correct Answers \" ); \n");
		
		printf (" };  \n");

		printf ("\n\n\n");

		printf("\t</script>\n ");
		printf("\t</head> \n");




		printf("\t<body bgcolor=\"Silver\">\n ");
		printf ("\n\n");

/*		
	$result = mysql_query ( "select id, 
question,
answer_idx,
answer1,
answer2,
answer3,
answer4 

from $database ") or die (mysql_error());
*/

		mysql_data_seek ( $result, 0 );
		
		printf("\t<form name=\"vote\" id=\"vote\" action=\"none\"> <BR>\n");


		$a_count = 1; 
		while ( $row = mysql_fetch_array ( $result ) ) {

			printf("\t<p><fieldset> \n");
			printf("\t<legend > $a_count: ".$row["question"]."</legend> \n ");

			$name = "appr".$a_count."c";

			printf("\t<input type=\"radio\" name=$name value=\"yes\" />".$row["answer1"].  "\n" );
			printf("\t<input type=\"radio\" name=$name value=\"yes\" />".$row["answer2"].  "\n");
			printf("\t<input type=\"radio\" name=$name value=\"yes\" />".$row["answer3"].  "\n");
			printf("\t<input type=\"radio\" name=$name value=\"yes\" />".$row["answer4"].  "\n");
			printf("\t</fieldset></p>  \n");
			printf("\n");
			
			$a_count++;

		}

			printf("\n");
			printf("\n");
			printf("\t<input type=\"button\" id=\"startx\" name=\"startx\" value=\"GO\" onclick=\"javascript:myfunc()\" /> \n ");
			printf("\t</form> \n ");

			printf("</body>\n ");
			printf("</html>\n ");

?>
