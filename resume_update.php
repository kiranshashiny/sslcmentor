<?php

$c_name = $_POST['c_name'];
$id = $_POST['resume_id'];

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";

			echo "<html>";
			echo "<head>";

			echo " <script language=\"javascript\" type=\"text/javascript\" src=\"datetimepicker.js\">  </script>";
				
			echo "</head>";

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
	
			if ( $id != "" ) {	

				$result = mysql_query ( "select * from resume where id=\"$id\"" )  or die ( mysql_error());

			}

			if ( $c_name != "" ) {

				$result = mysql_query ( "select * from resume where candidate_name=\"$c_name\"" )  or die ( mysql_error());

			}


			$row = mysql_fetch_array ( $result ) ;

			echo "Id : ".$row['id'] ."<BR>" ;
			echo "Name : ".$row['candidate_name'] ."<BR>" ;
			echo "Title: ".$row['resume_title'] ."<BR>" ;
			echo "Category: ".$row['category'] ."<BR>" ;

			echo "<br>";
			echo '<hr>';


			echo '<form name="update" action="resume_update2.php" method="POST" >';


			# I am hiding this, since there is no need to display .
			# this will be used when I send the form across to the php so thta I
			# know which id to update to.

			echo '<input type="hidden" name="id_hidden"  value='.$row['id'].' />';

			echo 'First Interviewer :      <input type="text" name="f_i_name"  value='.$row['pr_intrvwr'].' >  &nbsp; &nbsp;  &nbsp; &nbsp;';

			printf ("Date : <input id='f_i_date' type=\"text\" size=\"25\" name='f_i_date'>  
					<a href=\"javascript:NewCal('f_i_date','mmddyyyy')\"> 
          <img src=\"images/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Pick a date\"></a> ");


			echo '<br>';
			echo '<br>';

			echo " Interview Outcome &nbsp &nbsp &nbsp";
			echo '<select name="f_i_status"> ';
			echo '<option value="Accept">Accept</option>';
			echo '<option value="Reject">Reject </option>';
			echo '<option value="Hold">Hold</option>';
			echo '<option value="Blacklist">Blacklist</option>';
			echo '</select>';

			echo "<BR>";

			echo "Comments <br>";

			echo "<textarea  rows=\"10\"  cols=\"80\" name=\"f_i_comments\"  >".$row['pr_comments']." </textarea>";

			echo "<br>";
			echo "<br>";
			echo 'Email to :  <input type="text" name="email_to" size="30" > ';
			echo "<br>";

			echo "<input type=\"submit\" name=\"submit\" value=\"Save\">";
			echo "<hr>";

			echo 'Second Interviewer :      <input type="text" name="s_i_name" >  &nbsp; &nbsp;  &nbsp; &nbsp;';

			printf ("Date : <input id='s_i_date' type=\"text\" size=\"25\" name='s_i_date'>  
					<a href=\"javascript:NewCal('s_i_date','mmddyyyy')\"> 
          <img src=\"images/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Pick a date\"></a> ");



			echo "<BR>";
			echo " Interview Outcome &nbsp &nbsp &nbsp";
			echo '<select name="s_i_status"> ';
			echo '<option value="Accept">Accept</option>';
			echo '<option value="Reject">Reject </option>';
			echo '<option value="Hold">Hold</option>';
			echo '<option value="Blacklist">Blacklist</option>';
			echo '</select>';

			echo '<br>';

			echo "Comments <br>";

			echo "<textarea  rows=\"10\"  cols=\"80\" name=\"s_i_comments\" > </textarea>";

			echo "<br>";

			echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">";

			echo "<hr>";
			



			echo 'HR Interview :      <input type="text" name="hr_name" >  &nbsp; &nbsp;  &nbsp; &nbsp;';
			echo 'Date :      <input type="text" name="date" >';
			echo '<br>';

			echo "Comments <br>";

			echo "<textarea  rows=\"10\"  cols=\"80\" > </textarea>";

			echo "<br>";

			echo "<input type=\"submit\" name=\"submit\" value=\"Submit\">";

			echo "<hr>";


			echo 'Offer Made Date :      <input type="text" name="date" >';
			echo '<br>';
			echo 'Offer Accepted Date :      <input type="text" name="date" >';
			echo '<br>';
			echo '(Tentative) Start Date :      <input type="text" name="date" >';
			echo '<br>';

echo "</html>";


?>
