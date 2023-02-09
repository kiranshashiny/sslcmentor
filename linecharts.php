<?php

include 'php-ofc-library/open-flash-chart.php';

$data = array();

for( $i=0; $i<6.2; $i+=0.2 )
{
  $data[] = (sin($i) * 1.9) + 4;
}

$title = new title( date("D M d Y") );

// ------- LINE 2 -----
$d = new solid_dot();
$d->size(3)->halo_size(1)->colour('#3D5C56');

$line = new line();
$line->set_default_dot_style($d);
$line->set_values( $data );
$line->set_width( 2 );
$line->set_colour( '#3D5C56' );


$y = new y_axis();
$y->set_range( 0, 8, 4 );


$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $line );
$chart->set_y_axis( $y );

echo $chart->toPrettyString();

?>
