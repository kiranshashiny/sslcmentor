<?php
$veiwing = $_GET['s']; // get there current menu
$menu = 'A<InvisTag1><a href="?s=1">+</a></invisTag1><br>
B<InvisTag2><a href="?s=2">+</a></invisTag2><br>
C<InvisTag3><a href="?s=3">+</a></invisTag3><br>
D<InvisTag4><a href="?s=4">+</a></invisTag4><br>';


$Subs = array(); // create an array. Filling values below.
$Subs[1] = '<InvisTag1><a href="?s=0">-</a><br>
-- <a href="?s=1&p=0">Intro</a><br>
-- <a href="?s=1&p=1">Page 2</a><br>
-- <a href="?s=1&p=2">Page 3</a><br>
-- <a href="?s=1&p=3">Page 4</a></invisTag1>';
$Subs[2] = '<InvisTag4><a href="?s=0">-</a><br>
-- <a href="?s=2&p=0">Intro</a><br>
-- <a href="?s=2&p=1">Page 2</a><br>
-- <a href="?s=2&p=2">Page 3</a><br>
-- <a href="?s=2&p=3">Page 4</a></invisTag2>';
$Subs[3] = '<InvisTag4><a href="?s=0">-</a><br>
-- <a href="?s=3&p=0">Intro</a><br>
-- <a href="?s=3&p=1">Page 2</a><br>
-- <a href="?s=3&p=2">Page 3</a><br>
-- <a href="?s=3&p=3">Page 4</a></invisTag3>';
$Subs[4] = '<InvisTag4><a href="?s=0">-</a><br>
-- <a href="?s=4&p=0">Intro</a><br>
-- <a href="?s=4&p=1">Page 2</a><br>
-- <a href="?s=4&p=2">Page 3</a><br>
-- <a href="?s=4&p=3">Page 4</a></invisTag4>';

$menu = preg_replace("/<InvisTag$veiwing>.*<\/InvisTag$veiwing>/", $Subs[$veiwing], $menu);
// replace old menu with new one.

echo $menu;
?> 



