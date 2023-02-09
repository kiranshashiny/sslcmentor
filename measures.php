
<?php

$nums = array ( 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800,850, 900, 950 );




$cost = rand(1,101);

for ( $iteration = 0; $iteration < 5; $iteration++ )  {

	while ( $cost % 10 != 0   && $cost != 0) {
	   $cost = rand ( 1,101 );
	}
	
	
	echo "If a Fruit costs $cost Rupees, what does it cost if you bought <br> ";

	$cost = rand(0,100);
	
	for ( $cnt = 0; $cnt < 3; $cnt++ ) {
	    $idx = rand ( 0,18 );
	
	    echo " $nums[$idx]  grams. <br>";
	}
	echo "<hr>";
}	

?>
