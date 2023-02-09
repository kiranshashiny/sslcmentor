<?php
$curr_month = date("m");

echo "Current month is $curr_month <br> ";

$month = array (1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$select = "<select name=\"month\">\n";
foreach ($month as $key => $val) {
    $select .= "\t<option val=\"".$key."\"";
    if ($key == $curr_month) {
        $select .= " selected>".$val."\n";
    } else {
        $select .= ">".$val."\n";
    }
}
$select .= "</select>";

echo "This month is  $select <br>" ;
echo "If it was April (4th month ) then the selected item wil be April<br>";

?>
