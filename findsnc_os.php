<?php

$total_recs = 1500;

$row =0;

$search_str = array ("\\" , " ", "/", "-" );

$filename  = "NETIQ_Unix.csv";
$tablename = "netiq_unix";

$query_str = "CREATE TABLE $tablename (\nid INT NOT NULL AUTO_INCREMENT,\nPRIMARY KEY(id),  \n"; 

$title_str = array();

$handle = fopen( $filename, "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		$billing_date = "01_Jan_2010";

#		if ( $row == 0 ) {
#
#				$billing_date = $data[1];				
#				$billing_date = str_replace ( $search_str, "_", $billing_date );
#				printf ("billing date is $billing_date\n" );
#
#		}




		if ( $row == 0 ) {

			foreach ( $data as $token ) {
			
				$token   = str_replace ( $search_str, "_", $token );

				$token   = strtoupper  ( $token ) ;

     		$query_str = $query_str.$token." VARCHAR(255), \n";
					
				array_push ( $title_str, $token );

			}

			$query_str = $query_str. "BILL_DATE VARCHAR(255) )  \n";

			printf (" $query_str <br>");

			$con = mysql_connect("localhost", "root", "root") or die(mysql_error());
			
			mysql_select_db("netiq", $con) or die(mysql_error());
			
			mysql_query ( $query_str ,$con ) or die ( mysql_error () );

			#mysql_query ( "CREATE TABLE $billing_date (
  		#   id INT NOT NULL AUTO_INCREMENT, 
  		#   PRIMARY KEY(id),
  		#    name VARCHAR(30), 
			#    age INT
			# )")
			# or die(mysql_error());  

echo "Table Created!\n\n\n";

				}
			if ( $row > 8 ) {
				break;

			}
			$row++;
}
fclose($handle);






###########  Code to Insert records to database #################


$row = 0;
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

mysql_close( $con );

?>
