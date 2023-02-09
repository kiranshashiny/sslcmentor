<?php
$visitor_ip = $HTTP_COOKIE_VARS["user_ip"];
$counter = "counter.txt";
$counter_file_line = file($counter);

echo "the visitor ip is [$visitor_ip] <br> ";


//This only records the number of times a new visitor has seen this page.
// If I refresh the same page over and over - the # dont CHANGE.

if(!$visitor_ip)
{
  setcookie("user_ip", $REMOTE_ADDR, time()+360000);
  $counter_file_line[0]++;
  echo "am I here ... $counter_file_line[0] <br>";


  $cf = fopen($counter, "w+");
  fputs($cf, "$counter_file_line[0]");
  fclose($cf);
}
elseif($visitor_ip != $REMOTE_ADDR)
{
  echo "am I in the other part ..";
  $counter_file_line[0]++;
  $cf = fopen($counter, "w+");
  fputs($cf, "$counter_file_line[0]");
  fclose($cf);
}
?>
