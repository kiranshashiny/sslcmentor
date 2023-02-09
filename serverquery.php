<?php

$user_req = $_POST['category'];


$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost = 'localhost';
$target_path = "images/";



	echo "No Arguments Supplied";
	echo "This lists the data from Application Server & Websphere portal";
	echo "Please entere the name of the server and re-run again";`


	echo "Data from the APPLICATION Extract file"
	cat APPLICATIONExtract.txt | grep -i -w $1 |awk -F"\t"  ' { print "SBG:",$5, "FQDN ", $13, "\n", "Full App Name:", $15, "\n", "Application ", $16, "\nPrimary Contact ", $26, "\nLID Code: ", $18 }'



echo "-----------------------------------------------------------------------"




echo "Data from the SERVER Extract File: "

	cat SERVERExtract.txt | grep -i -w $1 |awk -F"\t"  '{ print   "SBG:", $5, "\nAlias :" , $20, "\n# of CPU: ", $24, "\nGBs ofRAM:", $25,  "\nHW Serial Num ", $27, "\nHW Asset Tag ", $28, "\nModel ", $30, "-", $31, "\nIP Address: ", $32 , "\nFQDN        :",  $33 , "\nServer Purpose :", $34 , "\nOS Name :" , $36, "\nOS Version :", $37, "\nLID Code ", $18, "\nPrimary Contact Name ", $40 ,"\nPrimary Contact Phone", $41,"\nResponsible SA ", $49 }'

echo "-----------------------------------------------------------------------"



	echo "Data from the IBM Websphere Portal: "

	cat HonToTAM.csv | grep -i -w $1 |awk -F","  '{ print   "Server Name :", $3, "\nSerial Num  :", $2, "\nAsset Tag   :", $1}'

	else

			echo "Deleted the resumes";

			$command ="del images\*.doc";
			$output = shell_exec ( $command." 2>&1" );
			print "<pre>  $output </pre>\n";



?>
