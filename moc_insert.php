<?php

	$month = $_GET['months'];

	
	printf (" $month <BR>" );

	$monitored_servers = $_GET['mon_servers'];
	
  #printf ( "monitored servers count  $monitored_servers<BR>");

	$managenow_tickets = $_GET['managenow_tkts'];
	#print ( "managenow tickets count is $managenow_tickets<BR>");
	

	$sev1_tickets = $_GET['sev1'];
	$sev2_tickets = $_GET['sev2'];
	$sev3_tickets = $_GET['sev3'];

	#printf (" sev1 = $sev1_tickets,   sev2= $sev2_tickets,  sev3= $sev3_tickets<BR>");


	if ( $monitored_servers == "" ) {
			#printf ("monitored servers  is empty <BR>");
			$monitored_servers="0";
	}


	if ( $managenow_tickets == "" ) {
			#printf ("managenow_tickets servers  is empty <BR>");
			$managenow_tickets="0";
	}

	if ( $sev1_tickets == "" ) {
			#printf ("sev1 is empty <BR>");
			$sev1_tickets="0";
	}

	if ( $sev2_tickets == "" ) {
			#printf ("sev2 is empty <BR>");
			$sev2_tickets="0";
	}
	if ( $sev3_tickets == "" ) {
			#printf ("sev3 is empty <BR>");
			$sev3_tickets="0";
	}
	


	$user     ="root";
	$password ="root";
	$host     ="localhost";
	$dbhost = 'localhost';

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "flash" ) or die (mysql_error() );

			mysql_query ("UPDATE moc_perf SET monitored_servers='$monitored_servers',
managenow_tickets='$managenow_tickets',
 sev1_tickets='$sev1_tickets' WHERE month='$month' ") or die  ( mysql_error());


	echo "<b> Network Monitoring Report Inserted Successfully. </b>"; 

?>
