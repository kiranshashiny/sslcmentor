<?php

# shashi - i changed the argument to include the title

include 'php-ofc-library/open-flash-chart.php';

$title = new title( 'Databases, Oracle/SQL/mySQL/Siebel' );

$pie = new pie();
$pie->set_alpha(0.6);
$pie->set_start_angle( 35 );
$pie->add_animation( new pie_fade() );
$pie->set_tooltip( '#val# of #total#<br>#percent# of 100%' );
$pie->set_colours( array('#1C9E05','#FF368D') );
$pie->set_values( array( new pie_value(3, "mySQL (3)") ,3,4,new pie_value(6.5, "Oracle (6.5)")) );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $pie );


$chart->x_axis = null;

echo $chart->toPrettyString();
?>
