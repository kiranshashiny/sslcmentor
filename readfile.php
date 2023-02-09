<?php


$row =0;

$title_str = array();

$handle = fopen("somefile", "r");

while ( !feof($handle)) {
  $data = fgets($handle, 4096);
	printf ("$data");

}

fclose ( $handle );

?>

