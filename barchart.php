<?php

# shashi - i changed the argument to include the title

include 'php-ofc-library/open-flash-chart.php';

$title = new title( 'Databases, Oracle/SQL/mySQL/Siebel' );

$bar = new bar_filled();

$tmp =  array ( 1, 2, 4, 5, 3, 4, 3, 6.5 );

$bar->set_values ( $tmp );


$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->set_bg_colour( '#FFFFFF' );


echo $chart->toPrettyString();
?>
