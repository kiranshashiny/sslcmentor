<?php

include 'php-ofc-library/open-flash-chart.php';

$title = new title( date("D M d Y") );
$title = new title( "Solutioning Accomplishments" );
$title->set_style( "{font-size: 20px; font-family: Times New Roman; font-weight: bold; color: #A2ACBA; text-align: center;}" );
// add the title to the chart

$month_labels = array ();
$month_labels[] = "Jan";
$month_labels[] = "Feb";
$month_labels[] = "Mar";
$month_labels[] = "Apr";
$month_labels[] = "May";
$month_labels[] = "Jun";
$month_labels[] = "Jul";
$month_labels[] = "Aug";
$month_labels[] = "Sep";
$month_labels[] = "Oct";
$month_labels[] = "Nov";
$month_labels[] = "Dec";


	$data = array();

	$data2 = array();


	$bar_stack = new bar_stack();
	$bar_stack->set_colours ( array ( '#C4D318', '#50284A' ) );

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	$temp = array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" );

	foreach ( $temp as &$value ) {

		$stack_temp = array();


		$result = mysql_query ( "select monitored_servers, managenow_tickets from moc_perf where month='$value'" )  or die ( mysql_error());
		$row = mysql_fetch_array ( $result ) ;
		array_push ( $stack_temp, (int) $row['managenow_tickets']);


		array_push ( $stack_temp, (int) ($row['monitored_servers'] - $row['managenow_tickets'] )  );

		$bar_stack->append_stack ( $stack_temp );
	}
	


$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar_stack );


##########   X  LABELS  ####
$x_labels = new x_axis_labels();
$x_labels->set_labels($month_labels);

$x = new x_axis();

$x->set_labels($x_labels);


$chart->set_x_axis($x);

$y = new y_axis();
$y->set_range(0,3000,100);
$chart->set_y_axis($y);


echo $chart->toString();

?>
