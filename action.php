<?php


$isr_name = $_POST['isr_name']; 
$date_started =  $_POST['date_started']; 
$date_finished =  $_POST['date_finished']; 

$user     ="root";
$password ="root";
$host     ="localhost";
$database     ="rohanmayyo_solution";
$dbhost = 'localhost';


echo "This script is to be called from form.php";

echo "Your name is $name, title is $title";

mysql_connect ($dbhost, $user, $password);
@mysql_select_db ($database) or die ("Unable to select database");
$query = "insert into solution (isr_name, date_started) values ('$isr_name', '$date_started')";
mysql_query ($query );

mysql_close();

?>
