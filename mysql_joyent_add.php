<?php


$isr_num = $_POST['isr_num'];

$analyze_p_start = $_POST['analyze_planned_start'];
$analyze_p_end   = $_POST['analyze_planned_end'];

$sol_p_start = $_POST['solution_planned_start'];
$sol_p_end   = $_POST['solution_planned_end'];

$prop_p_start = $_POST['proposal_planned_start'];
$prop_p_end   = $_POST['proposal_planned_end'];
$pl_name      = $_POST['pl_name'];
$category      = $_POST['category'];
$sol_engr      = $_POST['sol_engr'];

$snd_req_approval      = $_POST['snd_req_approval'];
$snd_sol_approval      = $_POST['snd_sol_approval'];
$snd_tech_review       = $_POST['snd_tech_review'];

$rcv_req_approval      = $_POST['rcv_req_approval'];
$rcv_sol_approval      = $_POST['rcv_sol_approval'];
$rcv_tech_review       = $_POST['rcv_tech_review'];
$new_date       = $_POST['demo1'];

#echo "New date is $new_date";


$date_fmt   = $_POST['mytzo'];


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';

			mysql_connect ($dbhost, $user, $password) or die (mysql_error() );

			mysql_select_db ( "solution" ) or die (mysql_error() );

			mysql_query ( "INSERT INTO isr_base ( isr_num, 
analyze_p_start, 
analyze_p_end, 
sol_p_start, 
sol_p_end, 
prop_p_start, 
prop_p_end,
category,
state,
pl_name

 ) VALUES (

'$isr_num', 
'$analyze_p_start', 
'$analyze_p_end', 
'$sol_p_start',  
'$sol_p_end' ,
'$prop_p_start',  
'$prop_p_end',
'$category',
'Analyze',
'$pl_name'

 ) ") or die  ( mysql_error());


	echo "<b> Solution Data Inserted Successfully. </b>"; 


?>
