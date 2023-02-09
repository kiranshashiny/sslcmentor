<?php

#$target_path ="D:\Downloads\\resumes\\";


$target_path ="images/";
$c_name = $_POST['c_name'];
$r_name = $_POST['r_name'];
$date_val = $_POST['date_val'];
$category = $_POST['category'];
$keywords = $_POST['keywords'];



$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';



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
		echo "Size ". (  $_FILES["file"]["size"] / 1024) . " K bytes <br>";
		echo "Temporary Stored in ". $_FILES["file"]["tmp_name"] . "<br>";

		if ( file_exists ($target_path.$_FILES["file"]["name"])) 
		{
		 
			echo "File already exists ". $_FILES["file"]["name"]. "<br>";
			echo "I will not be inserting it again, Try Deleting the resume or Upload a new resume.";

		}
		else 
		{
			#echo "Copying file over to this location ". $target_path. "<br>";


			#echo "target = $target_path , candidate=$c_name,  recruiter=$r_name, date=$date_val,  category=$category <br>";


			move_uploaded_file( $_FILES["file"]["tmp_name"] , $target_path. $_FILES["file"]["name"] );

			#echo "Stored in ".$target_path.$_FILES["file"]["name"]. "<br>";

			# add the stuff to the Database.


			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "resume" ) or die (mysql_error() );
  		#echo "Upload ". $_FILES["file"]["name"]. "<br>";

			mysql_query ( "INSERT INTO resume (candidate_name, recruiter_name, category, resume_location, resume_title, keywords ) VALUES ('$c_name', '$r_name', '$category', '\"$target_path\"' , '$title' , '$keywords' ) ") or die  ( mysql_error());


			echo "<b> Resume Inserted Successfully. </b>"; 


		}

	}

?>
