<?php

include 'php-ofc-library/open-flash-chart.php';

$title = new title( date("D M d Y") );
$title = new title( "Voice Standardization By Equipment" );
$title->set_style( "{font-size: 20px; font-family: Times New Roman; font-weight: bold; color: #A2ACBA; text-align: center;}" );
// add the title to the chart


	$bar_stack = new bar_stack();
	$bar_stack->set_colours ( array ( '#348017', '#CCFF00', '#FF0000', '00FF00' ) );
	$bar_stack->set_keys ( array (
					new bar_stack_key ( '#348017', 'Standard & Supported', 13),
					new bar_stack_key ( '#CCFF00', 'Non Standard & Supported', 13),
					new bar_stack_key ( '#FF0000', 'Unsupported',  13),
					new bar_stack_key ( '#00FF00', 'Incomplete',  13),

	));

	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "snc" ) or die (mysql_error() );

	$compl_array  = array ("Standard & Supported" , "Non Standard & Supported", "Unsupported", "Incomplete" );

	//$compl_array  = array ("Standard & Supported" , "Non Standard & Supported" );

	
	$temp         = array ("Key Telephone System", "PBX-IP" , "PBX-Legacy TDM", "Voicemail System" );

	
		foreach ( $temp as &$value ) {
				 //printf ("Working on <<<<<<<<<<< $value >>>>>>>>>>>\n");
				$stack_temp = array();
				foreach ( $compl_array as &$c_status ) {
								// DBG printf ("Working on >>>>>>  $c_status\n");


								$result = mysql_query ( "select count(*) from snc_voice where Equipment_Type_New='$value' and Compliance_Status='$c_status'"  )  or die ( mysql_error());

								$count  = mysql_result ( $result, 0 , 0 );
								// DBG printf (" the count is $count\n\n\n");

								array_push ( $stack_temp, (int) $count);


				}
				$bar_stack->append_stack ( $stack_temp );
		}
	



$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar_stack );


##########   X  LABELS  ####
$x_labels = new x_axis_labels();
$x_labels->set_labels($temp);

$x = new x_axis();
$x->set_labels($x_labels);
$chart->set_x_axis($x);



$y = new y_axis();
$y->set_range(0,250,10);
$chart->set_y_axis($y);


echo $chart->toString();

?>
