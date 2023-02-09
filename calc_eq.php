<?php


echo "<h4>  Basic Equations </h4>";

echo "Calculate the value of x, if y = 8 <br>";

class ValObj {

	private $rnd;
	private $y;
	private $res;

	function setY ( $y )     { $this->y = $y; }
	function setRnd ( $Rnd ) { $this->rnd = $Rnd; }

	function getRes (  )     { return $this->y - $this->rnd ; }
}

$count =0;
$y=8;

for ( $i = 0 ; $i< 20; $i++ ) {

	$rnd = rand( -30, 50 );

	$arr[$count] = new ValObj;

	$arr[$count]->setY   ( $y );
        $arr[$count]->setRnd ( $rnd );
        

 
	$res = $arr[$count]->getRes();

	$count = $count + 1;


	if ( $rnd < 0 ) {
	   echo " <pre> x  $rnd = y,   Answer : $res </pre> ";
	} else {
	   echo " <pre> x  + $rnd = y  Answer : $res </pre>  ";
	}
}




?>
