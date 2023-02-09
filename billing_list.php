<?php

echo "<table border=\"1\">\n";

$row = 0;
$handle = fopen("tab_delimited.txt", "r");

# create a library - once. - store it in $array_str[]; 
#  and then render.

# each time the user asks 

while (($data = fgetcsv($handle, 1000, '\\t')) !== FALSE) {
    if ($row == 0) {
        // this is the first line of the csv file
        // it usually contains titles of columns
        $num = count($data);
        echo "<thead>\n<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<th>" . $data[$c] . "</th>";
        }
        echo "</tr>\n</thead>\n\n<tbody>";
    } else {
        // this handles the rest of the lines of the csv file
        $num = count($data);
        echo "<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<td>" . $data[$c] . "</td>";
        }
        echo "</tr>\n";
    }
}
fclose($handle);

echo "</tbody>\n</table>";

?>
