<?php


	$login_name     = $_POST['name_val']; 

	$login_password = $_POST['pwd_val']; 

	#echo "  <h3> You entered $login_name,  Password is $login_password </h3> <br>";

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "medical" ) or die (mysql_error() );

	$result = mysql_query ( "select * from login" )  or die ( mysql_error());

	$row = mysql_fetch_array ( $result ) ;

	#echo "Name : ".$row['name']." Password: ".$row['password']."  User: ".$row['user']  ." <br>";

	
	$found = 0;

	if ( $row['name']  == $login_name  && $row['password'] == $login_password ) {

		$user = $row['user'];

		$page = "medtraining";

		$found = 1;

	}

	if ( ! $found ) {
	
		while ( $row = mysql_fetch_array ( $result )  ) {

					echo "Name : ".$row['name']." Password: ".$row['password']."  User: ".$row['user']  ." <br>";

					if ( $row['name']  ==  $login_name  && $row['password'] == $login_password ) {
						$found =1;
						$user = $row['user'];

					}
		}

	}

	if ( $found ) {

			#echo "found something <br>";

			#echo "User is $user <br>";

			if ( $user == "group" ) {

				$page = "medgroup"; 

			} else if ( $user == "admin")  { 

				$page = "medtraining" ;

			} else if ( $user == "user")  { 

				$page = "meduser" ;
			}

	} else {


		echo "NOT FOUND !!  <br>";
		$page = "medindex";

	}

	#echo "The page to be executed is ". $page ."<br>";

	#echo " The server page is  ".$_SERVER['DOCUMENT_ROOT']."/".$page.".html";

	require  $page.'.html';
	

?>
