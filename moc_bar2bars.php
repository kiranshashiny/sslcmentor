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


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	$temp = array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" );

	foreach ( $temp as &$value ) {

		$result = mysql_query ( "select monitored_servers from moc_perf where month='$value'" )  or die ( mysql_error());
		$row = mysql_fetch_array ( $result ) ;
		array_push ( $data, (int) $row['monitored_servers']);

	}
	

#$data = array(5,9,8,7,6,5,4,3,2,1,1,1);
$bar = new bar_glass();
$bar->colour( '#BF3B69');
$bar->key('Alloted Time ', 12);
$bar->set_values( $data );


	$data2 = array();

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	foreach ( $temp as &$value ) {
		$result = mysql_query ( "select managenow_tickets from moc_perf where month='$value'" )  or die ( mysql_error());
		$row = mysql_fetch_array ( $result ) ;
		array_push ( $data2, (int) $row['managenow_tickets']);

	}




#$data2 = array(4,1,1,10,9,8,7,6,5,4,3,2);
$bar2 = new bar_glass();
$bar2->colour( '#5E0722' );
$bar2->key('Actual time', 12);
$bar2->set_values( $data2 );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->add_element( $bar2 );


##########   X  LABELS  ####
$x_labels = new x_axis_labels();
$x_labels->set_labels($month_labels);

$x = new x_axis();
               #$x->set_steps(1);
#$x->set_range(1,12);
$x->set_labels($x_labels);


$chart->set_x_axis($x);

$y = new y_axis();
//$x->set_steps(50);
$y->set_range(0,3000,100);
$chart->set_y_axis($y);




echo $chart->toString();

?>
