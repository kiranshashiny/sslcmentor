<?php

printf ("<html> ");
printf ("<head> ");


$row = 0;
$handle = fopen("test_billing.csv", "r");


while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		if ( $row == 0 ) {
			# get the billed date.
			$date_billed = $data[1];
			printf(" date_billed = $date_billed  <BR> \n" );
		}

		if ( $row == 7 ) {
			# Collect the Col Names and then create a Table.


			$count = count ( $data );

			printf ("<form name =\"billing\"  method=\"POST\"  action=\"billing.php\" >");

			for ( $i=0; $i < $count ; $i++ ) {
							printf (" $data[$i] : ");

							printf (" <input type=\"radio\"  name=\"$data[$i]\" value=\"int\" checked> INT ");
							printf (" <input type=\"radio\"  name=\"$data[$i]\" value=\"varchar(30)\"> VARCHAR ");
							printf (" <input type=\"radio\"  name=\"$data[$i]\" value=\"date\"> DATE " );
							printf ("<BR> ");

			}
			printf (" <input type=\"hidden\"  name=\"bill_date\" value=$date_billed> " );
			printf (" <input type=\"submit\"  name=\"Submit\" value=\"Press here\"> " );

			printf ("</form>" );
			printf ("<BR>" );




		}
		if ( $row < 5 ) {
			$row++;
			
			continue;
		}

		if ( $row >20 ) {  break; }
		$row++;
}
fclose($handle);

printf ("</head> ");
printf ("</html> ");

?>
