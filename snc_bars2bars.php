<?php

include 'php-ofc-library/open-flash-chart.php';


function dateDiff($dformat, $endDate, $beginDate)
{

				#printf ( "start date [$beginDate]" );
				#printf ( "actualfdate [$endDate]" );
				$date_parts1=explode($dformat, $beginDate);
				$date_parts2=explode($dformat, $endDate);
				$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
				$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
				return $end_date - $start_date;
}

$title = new title( date("D M d Y") );
$title = new title( "ISR Solutioning Operational Report" );
$title->set_style( "{font-size: 20px; font-family: Times New Roman; font-weight: bold; color: #A2ACBA; text-align: center;}" );
// add the title to the chart

$isr_labels = array ();



	$data = array();

	$data2 = array();


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "solution" ) or die (mysql_error() );


	$result = mysql_query ("select isr_num from isr_base where actual_analyze_start like \"%2010%\"  " ) or die ( mysql_error());


		while ( $row = mysql_fetch_array ( $result )) {
			array_push ( $isr_labels, $row["isr_num"] );
			// printf ($row[ "isr_num"] );
		}



	foreach ( $isr_labels  as $value ) {

		$result = mysql_query ("select actual_finish_date, prop_p_end, analyze_p_start from isr_base where isr_num='$value'" ) or die ( mysql_error());

		$row = mysql_fetch_array ( $result );

		// printf (" value $value,  \n");

		// printf (" allocated days   ");
		
		array_push ( $data,  dateDiff("/", $row["prop_p_end"], $row["analyze_p_start"] ) );

		//printf ( dateDiff("/", $row["prop_p_end"], $row["analyze_p_start"] ) );

		//printf ("\n\n");

		//printf ("actual days \n");
		//printf ( "actual_finish   ".$row["actual_finish_date"]."\n" );
		//printf ( "starting on     ".$row["analyze_p_start"]."\n" );

		array_push ( $data2, dateDiff("/", $row["actual_finish_date"], $row["analyze_p_start"] ) );
		// printf ( dateDiff("/", $row["actual_finish_date"], $row["analyze_p_start"] ) );
		
		//printf ("\n\n");


	}



$bar = new bar_glass();
$bar->colour( '#BF3B69');
$bar->key('Allocated Days', 12);
$bar->set_values( $data );



$bar2 = new bar_glass();
$bar2->colour( '#5E0722' );
$bar2->key('Completed In', 12);
$bar2->set_values( $data2 );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->add_element( $bar2 );




##########   X  LABELS  ##########
$x_labels = new x_axis_labels();
$x_labels->set_labels($isr_labels);
$x_labels->set_vertical();

$x = new x_axis();
#$x->set_steps(1);
#$x->set_range(1,12);
$x->set_labels($x_labels);


$chart->set_x_axis($x);


##########  Y LABELS    #########

$y = new y_axis();
//$y->set_steps(10);  wont work - so use the format below..
$y->set_range(0,100, 10);
$chart->set_y_axis($y);



echo $chart->toString();

?>
