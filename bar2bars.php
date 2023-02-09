<?php

include 'php-ofc-library/open-flash-chart.php';

$title = new title( date("D M d Y") );
$title->set_style( "{font-size: 30px; font-family: Times New Roman; font-weight: bold; color: #A2ACBA; text-align: center;}" );

$data = array(5,9,8,7,6,5,4,3,2,1,1,1);
$bar = new bar_glass();
$bar->colour( '#BF3B69');
$bar->key('Last year', 12);
$bar->set_values( $data );

$data2 = array(4,1,1,10,9,8,7,6,5,4,3,2);
$bar2 = new bar_glass();
$bar2->colour( '#5E0722' );
$bar2->key('This year', 12);
$bar2->set_values( $data2 );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $bar );
$chart->add_element( $bar2 );


$x = new x_axis();
#$x->set_steps(1);
$x->set_range(1,12);
$chart->set_x_axis($x);



echo $chart->toString();

?>
