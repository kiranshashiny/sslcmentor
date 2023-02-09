<?php

# shashi - i changed the argument to include the title

include 'php-ofc-library/open-flash-chart.php';

$title = new title( 'Database, Oracle/SQL/mySQL/Siebel' );

$bar = new bar_filled();
$tmp =  array ( );


	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );

	mysql_select_db ( "flash" ) or die (mysql_error() );

	$result = mysql_query ( "select db_count from snc_db" )  or die ( mysql_error());
	$row = mysql_fetch_array ( $result ) ;
	array_push ( $tmp, (int) $row['db_count']);

	

	while ( $row = mysql_fetch_array ( $result )  ) {
					array_push ( $tmp, (int) $row['db_count']);
	}



$bar->set_values ( $tmp );


$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->set_bg_colour( '#FFFFFF' );

# add the Y elements.
$x = new x_axis();
$x->set_range(1,5);
$chart->set_x_axis($x);



# add the Y elements.
$y = new y_axis();
$y->set_range(1,70);
$y->set_steps (5);
$chart->set_y_axis($y);

echo $chart->toPrettyString();
?>
