<?php

include 'php-ofc-library/open-flash-chart.php';

$title = new title( date("D M d Y") );

$data = array(9,8,7,6,5,4,3,2,1);

$bar = new bar_cylinder();
$bar->set_values( $data );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );

$x_axis = new x_axis();
$x_axis->set_3d( 5 );
$x_axis->colour = '#d0d0d0';
$chart->set_x_axis( $x_axis );

echo $chart->toString();

?>
