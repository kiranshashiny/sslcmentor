<?php



$target_path ="images/";
$c_name = $_POST['c_name'];
$r_name = $_POST['r_name'];
$date_val = $_POST['date_val'];
$category = $_POST['category'];



$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';


	$command = "ls /cygdrive/d/resumes/*.doc";
	
	$output = shell_exec ( $command." 2>&1 " );
	$words = split ( "[\n\r\t]+", $output );
	#print_r ($words );

	for ( $i =0; $i < sizeof($words)-2; $i++ ) {

		print "\n\n\n";
		$_FILES["file"]["tmp_name"] = $words[$i];
		$_FILES["file"]["error"] = 0; 
		$_FILES["file"]["type"] = "application/msword";

		
		$filename = str_replace ("/cygdrive/d/resumes/", "", $words[$i] );

		$_FILES["file"]["name"] = $filename;

		print "$i,  $filename\n";

		$_FILES["file"]["size"] = filesize ("D:\\resumes\\".$filename ) ; 

		print "tmpname =".$_FILES["file"]["tmp_name"]."\n";
		print "name    =".$_FILES["file"]["name"]."\n";


		






# the location where the data files will be stored.

$_FILES["file"]["name"] = str_replace ( ' ', '_', $_FILES["file"]["name"]);


if ( $_FILES["file"]["error"] > 0)
	{
		echo "error ". $_FILES["file"]["error"]."<br>";


	} else 
	{

		echo "Upload ". $_FILES["file"]["name"]. "<br>";
		$title= $_FILES["file"]["name"];
		echo "Type ". $_FILES["file"]["type"]. "<br>";
		#echo "Size ". (  $_FILES["file"]["size"] / 1024) . "<br>";
		#echo "Temporary Stored in ". $_FILES["file"]["tmp_name"] . "<br>";

		if ( file_exists ($target_path.$_FILES["file"]["name"])) 
		{
		 
			echo "File already exists ". $_FILES["file"]["name"]. "<br>";
			echo "I will not be inserting it again, Try Deleting the resume or Upload a new resume.";

		}
		else 
		{
			#echo "Copying file over to this location ". $target_path. "<br>";


			#echo "target = $target_path , candidate=$c_name,  recruiter=$r_name, date=$date_val,  category=$category <br>";


			if ( move_uploaded_file( $_FILES["file"]["tmp_name"] , $target_path. $_FILES["file"]["name"] ) ) {

				print " Uploading file failed ".$_FILES["file"]["name"]."\n";


			} else {

				print " Uploading file succeeded\n";


			}	

			#echo "Stored in ".$target_path.$_FILES["file"]["name"]. "<br>";

			# add the stuff to the Database.


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
  		#echo "Upload ". $_FILES["file"]["name"]. "<br>";

			mysql_query ( "INSERT INTO resume (candidate_name, recruiter_name, category, resume_location, resume_title ) VALUES ('$c_name', '$r_name', '$category', '\"$target_path\"' , '$title' ) ") or die  ( mysql_error());


			echo "<b> Resume Inserted Successfully. </b>"; 


		}

	}
	}

?>
