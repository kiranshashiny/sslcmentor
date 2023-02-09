<?php

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

/* if this is being sent to Joyent.

  change the user to "rohanmayyo",
	password to "rohan"
  change the mysql_select_db ("  " ) to 'rohanmayyo_sslcdb'

*/


$database= $_GET['db'];
#$header_info =$_GET['title'];
$header_info ="SSLC Mentor";
$subj        =$_GET['subj'];
$chapter     =$_GET['chapter'];
#$print_all   =$_GET['print_all'];
$print_all   ="false";

#$chapter     ="India and the World";
#$subj="Civics";
#$database="civics";



			#  START OF CODE

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "sslcdb" ) or die (mysql_error() );


	if ( $print_all == "true") {
	$sql_string = "select id, 
				question,
				answer_idx,
				answer1,
				answer2,
				answer3,
				answer4 

from $database where chapter='$chapter' order by rand()";
} else {

	$sql_string = "select id, 
				question,
				answer_idx,
				answer1,
				answer2,
				answer3,
				answer4 

from $database where chapter='$chapter' order by rand() Limit 10 ";
}

	$result = mysql_query ("$sql_string") or die (mysql_error());


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


		


		print ("function showans() \n");
		printf (" {  \n");

		printf ("var xax = [" );

	  	for ( $x = 1; $x <= $a_count ; $x++ ){

	  		printf (" document.forms.vote.appr".$x."c ," );

	  	}
	  	printf (" document.forms.vote.apprlastc ]\n\n" );
		
		

	  	printf (" var sum, grp, x, y;  \n");

		
	  	printf ("\tfor (y = 0; y < xax.length; y++){  \n");
	
  
    		printf ("\t  grp = xax[y];  \n");
				printf ("\tblk_num = y+1;  \n");
				printf ("\tidx = arr[y].ans; \n" );
	  		//printf ("\talert(\"Correct answer for \" +blk_num+ \" is \"+idx);\n");


				printf ( "\txax[y][idx].checked = true; \n");
		    printf ("\t }\n" );
				

			printf ("};\n");

		printf ("\n\n");

		


		printf ("function popitup3()\n");
		printf (" {  \n");

				printf(" newwindow2=window.open('','name','height=400,width=250');\n");
				printf(" var tmp = newwindow2.document;\n");
				printf(" tmp.write('<html><head><title>popup</title>');\n");
				printf(" tmp.write('<link rel=\"stylesheet\" href=\"js.css\">');\n");
				printf(" tmp.write('</head><body><b><center> Results </center> </b>');\n");
				printf(" tmp.write('<br>');\n");
				printf (" var xax = [" );

				for ( $x = 1; $x <= $a_count ; $x++ ){

					printf (" document.forms.vote.appr".$x."c ," );

				}
				printf (" document.forms.vote.apprlastc ]\n\n" );

		    printf (" var sum, grp, x, y;  \n");

        printf (" sum = 0;  \n");
        printf (" correct_count = 0;  \n");
				printf(" tmp.write('<fieldset>');\n");
		
		    printf ("\tfor (y = 0; y < xax.length - 1; y++){  \n");
				printf ("\tblk_num = y+1;  \n");

				printf ("\t  grp = xax[y];  \n");
				printf ("\t  check_flag = false;  \n");
				
				
				printf ("\t   for ( x = 0; x< 4; x++ ) {  \n");
				printf ("\t     if (grp[x].checked ){  \n");
				printf ("\t       check_flag = true;  \n");

				printf ("\t       if ( x == arr[y].ans ) {  \n");
				printf ("\t          tmp.write (' Correct Answer for Question ' + blk_num + '\\n' );  \n");
				printf ("\t          correct_count++; \n");
				printf ("\t       } else {  \n");
				printf ("\t          tmp.write (' Incorrect Answer for Question ' + blk_num  + '\\n');  \n");
				printf ("\t       }  \n");
		    printf ("\t     };  \n");
		    printf ("\t   };  \n");
        printf ("\t   if ( check_flag == false ) { \n" );
				printf ("\t      tmp.write (' Question ' + blk_num + ' Unanswered <BR>');  \n");
				printf ("\t   } \n");
		    printf ("\t };  \n");
				printf(" tmp.write('</fieldset>');\n");


				printf ("\t  tmp.write ( '<center> <b> '+ correct_count + ' Correct Answers <BR> </b></center>' ); \n");

				printf(" tmp.write('<p><a href=\"javascript:self.close()\">Close</a> the Window.</p>');\n");
				printf(" tmp.write('</body></html>');\n");
				printf(" tmp.close();\n");
		printf (" }  \n");

			

		printf ("function myfunc()   \n");
		printf (" {  \n");
		
		printf (" var xax = [" );

		for ( $x = 1; $x <= $a_count ; $x++ ){

			printf (" document.forms.vote.appr".$x."c ," );

		}
			printf (" document.forms.vote.apprlastc ]\n\n" );
		// printf (" document.forms.vote.appr1c, document.forms.vote.appr2c, document.forms.vote.appr3c, document.forms.vote.appr4c]; \n");

		    printf (" var sum, grp, x, y;  \n");

				//printf (" alert (\"hello world\"); \n");
		
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

				printf ("\t       if ( x == arr[y].ans ) {  \n");
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




		printf("\t<body bgcolor=\"Silver\" >\n ");
		printf ("\n\n");


		mysql_data_seek ( $result, 0 );
		
		printf("\t<form name=\"vote\" id=\"vote\" action=\"none\"> <BR>\n");

			printf("\t<input type=\"button\" id=\"startx\" name=\"startx\" value=\"EVALUATE ANSWERS\" onclick=\"javascript:popitup3()\" /> \n ");



			//printf("\t<input type=\"button\" id=\"startx\" name=\"startx\" value=\"CHECK ANSWERS\" onclick=\"javascript:myfunc()\" /> \n ");


			printf("\t<input type=\"button\" id=\"starty\" name=\"starty\" value=\"SHOW CORRECT ANSWERS\" onclick=\"javascript:showans()\" /> \n ");
			printf("\t<input type=\"button\" id=\"print_page\" name=\"print_page\" value=\"PRINT\" onclick=\"parent.frames[0].focus();parent.frames[0].print()\" /> \n ");

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
			printf("\t</form> \n ");

			printf("</body>\n ");
			printf("</html>\n ");

?>
