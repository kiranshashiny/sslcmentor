<?
if( ! defined ("BZ_calendar") ) include "lib/BZ_calendar.inc";
if ( $time=='' ) $time = time();
if ( !isset ($c1 )) $c1 = $time ;
if ( !isset ($c2 )) $c2 = $time ;
if (!isset ( $beg ) ) $beg = date("Y-m-d", $time);
if (!isset ( $end ) ) $end = date("Y-m-d", $time);
if ( $cal == 1 && $c2 < $c1 ) $c2 = $c1 ;
if ( $cal == 2 && $c2 < $c1 ) $c1 = $c2 ;
$cal1= new BZ_calendar( 1 , $beg , $end ) ;
$cal2 = new BZ_calendar( 2 , $beg , $end ) ;

$cal1->draw("test.php" , $c1 ,$c2 );

$cal2->draw("test.php" , $c1 ,$c2 );
?>