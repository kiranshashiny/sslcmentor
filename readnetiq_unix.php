<?php

$total_recs = 1500;
$title_str = array();


$filename  = "NETIQ_Unix.csv";



$con = mysql_connect("localhost", "root", "root") or die(mysql_error());


	$row =0;
	$token = "";
	$query_str = "";
	$tablename = "netiq_unix";


	$query_str = "CREATE TABLE $tablename (\nid INT NOT NULL AUTO_INCREMENT,\nPRIMARY KEY(id),  \n"; 
	$search_str = array ("\\" , " ", "/", "-" );
	$handle = fopen( $filename, "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		$billing_date = "01_Jan_2010";

		if ( $row == 0 ) {

			foreach ( $data as $token ) {
			
				$token   = str_replace ( $search_str, "_", $token );

				$token   = strtoupper  ( $token ) ;

     		$query_str = $query_str.$token." VARCHAR(255), \n";
					
				array_push ( $title_str, $token );

			}

			$query_str = $query_str. "BILL_DATE VARCHAR(255) )  \n";

			printf (" $query_str <br>");

			mysql_select_db("netiq", $con) or die(mysql_error());
			
			mysql_query ( $query_str ,$con ) or die ( mysql_error () );
			echo "Table Created!\n\n\n";
			break;

		} 
	}
	$row++;

	fclose($handle);




###########  Code to Insert records to database #################


$row = 0;
$tablename="netiq_unix";
$billing_date = "01_Jan_2010";
$handle = fopen($filename, "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {


    if ( $row >= 2 ){
        // this handles the rest of the lines of the csv file
        $num = count($data);

				#if ( $row > 25 ) {
				#	break;
				#}
				
				$insert_str = "insert into $tablename ( ";
				foreach ( $title_str as $token ) {
					$insert_str = $insert_str.$token." , ";
				}

				$insert_str = $insert_str."BILL_DATE ) VALUES (  " ;
        for ($c=0; $c < $num; $c++) {
            $insert_str = $insert_str."\"". $data[$c]."\""." ,";
        }
        $insert_str = $insert_str."\"".$billing_date."\") ";
				
				printf ("$insert_str\n\n");
			  mysql_query ( $insert_str, $con ) or die ( mysql_error () );
    }

		if ( $row >$total_recs ) {  break; }
		$row++;
}
fclose($handle);




$row = 0;
$handle = fopen("netiq_windows.csv", "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {


    if ( $row >= 2 ){
        // this handles the rest of the lines of the csv file
        $num = count($data);

				#if ( $row > 25 ) {
				#	break;
				#}
				
				$insert_str = "insert into $tablename ( ";
				foreach ( $title_str as $token ) {
					$insert_str = $insert_str.$token." , ";
				}

				$insert_str = $insert_str."BILL_DATE ) VALUES (  " ;
        for ($c=0; $c < $num; $c++) {
            $insert_str = $insert_str."\"". $data[$c]."\""." ,";
        }
        $insert_str = $insert_str."\"".$billing_date."\") ";
				
				printf ("$insert_str\n\n");
			  mysql_query ( $insert_str, $con ) or die ( mysql_error () );
    }

		#if ( $row >$total_recs ) {  break; }
		$row++;
}
fclose($handle);

mysql_close( $con );

?>
