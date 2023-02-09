<?php

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "sslcdb" ) or die (mysql_error() );

	// Create a Mysql table in the database.

	mysql_query ( "CREATE TABLE kid_quiz ( id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(id),
			question VARCHAR ( 150), 
			answer_idx INT,
			answer1   VARCHAR ( 50),
			answer2   VARCHAR ( 50),
			answer3   VARCHAR ( 50),
			answer4   VARCHAR ( 50), 
			chapter   VARCHAR ( 50), 
      path_to_diagram VARCHAR ( 50) ) " )

		or die (mysql_error ());

	echo "Table Created";


	// Instructions to import data into the database.



  //$ mysql -uroot -proot sslcdb -e'load data LOCAL infile "chemistry_1.pipedat" in to table chemistry fields terminated by "|" lines terminated by "\n" (question, answer_idx, answer1, answer2, answer3,answer4 )'


  // $  mysql -uroot -proot sslcdb -e'load data LOCAL infile "physics_1.pipedat" into table physics fields terminated by "|" lines terminated by "\n" (question , answer_idx, answer1, answer2, answer3, answer4 )';


?>
