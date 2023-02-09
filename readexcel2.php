<?php

echo "<table>\n";

$row = 0;
$handle = fopen("test_billing.csv", "r");


while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		if ( $row == 0 ) {
			# get the billed date.
			$date_billed = $data[1];
			printf(" date_billed = $date_billed\n" );
		}	

		if ( $row == 7 ) {
			# collect the col names and then create a table.
			printf ("the first one is $data[0]\n");
			printf ("the second one is $data[1]\n");

			printf (" <input type=\"radio\"  name=\"$data[0]\" value=\"int\">");
			printf (" <input type=\"radio\"  name=\"$data[0]\" value=\"varchar\"> ");
			printf (" <input type=\"radio\"  name=\"$data[0]\" value=\"date\"> " );

		}
		if ( $row < 5 ) {
			$row++;
			continue;
		}

		if ( $row >20 ) {  break; }
}
fclose($handle);

echo "</tbody>\n</table>";

?>
