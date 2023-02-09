<?php

# shashi - i changed the argument to include the title

include 'php-ofc-library/open-flash-chart.php';

$title = new title( 'Server OS and Infrastructure Apps' );

$pie = new pie();
$pie->set_alpha(0.6);
$pie->set_start_angle( 35 );
$pie->add_animation( new pie_fade() );
$pie->set_tooltip( '#val# of #total#<br>#percent# of 100%' );

$pie->set_colours( array('#00FF00','#FFFF00', 'FF0000',  '00FFFF' ) );
# Collect 4 arrays and then put that into this below.


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "snc" ) or die (mysql_error() );

	$compl_array  = array ("Standard & Supported" , "Non Standard & Supported", "Unsupported", "Version Unknown" );

	
				$stack_temp = array();
				foreach ( $compl_array as &$c_status ) {
								// DBG printf ("Working on >>>>>>  $c_status\n");


								$result = mysql_query ( "select count(*) from snc_combined where Vendor_Support='$c_status'"  )  or die ( mysql_error());

								$count  = mysql_result ( $result, 0 , 0 );
								 #printf (" the count for $c_status is  $count\n\n\n");

								
								$x = new pie_value ( (int) $count, "$c_status($count)");
								
								#array_push ( $stack_temp, (int) $count);
								array_push ( $stack_temp,  $x);


				}


$temp  = array ();
$x = new pie_value ( 3, "mysql(3)");
array_push ( $temp, $x );
array_push ( $temp, 3 );
array_push ( $temp, 4 );
$x = new pie_value ( 3, "shashi(3)");
array_push ( $temp, $x  );

#$temp = array (  3, 4, new pie_value( 6.5, "shshi(35)")  );

$pie->set_values( $stack_temp );




#$pie->set_values( array( new pie_value(3, "mySQL (3)") ,3,4,new pie_value(6.5, "Oracle (6.5)")) );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $pie );


$chart->x_axis = null;

echo $chart->toPrettyString();
?>
