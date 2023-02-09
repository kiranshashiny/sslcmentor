<? 

	echo "Data from the APPLICATION Extract file";

	$cmd =`cat APPLICATIONExtract.txt | grep -i -w $1 |awk -F"\t"  ' { print "SBG:",$5, "FQDN ", $13, "\n", "Full App Name:", $15, "\n", "Application ", $16, "\nPrimary Contact ", $26, "\nLID Code: ", $18 }'

else

	echo "APPLICATION EXTRACT FILE MISSING!!!"

fi


echo "-----------------------------------------------------------------------"



if [  -f SERVERExtract.txt ] 
then

echo "Data from the SERVER Extract File: "

	cat SERVERExtract.txt | grep -i -w $1 |awk -F"\t"  '{ print   "SBG:", $5, "\nAlias :" , $20, "\n# of CPU: ", $24, "\nGBs ofRAM:", $25,  "\nHW Serial Num ", $27, "\nHW Asset Tag ", $28, "\nModel ", $30, "-", $31, "\nIP Address: ", $32 , "\nFQDN        :",  $33 , "\nServer Purpose :", $34 , "\nOS Name :" , $36, "\nOS Version :", $37, "\nLID Code ", $18, "\nPrimary Contact Name ", $40 ,"\nPrimary Contact Phone", $41,"\nResponsible SA ", $49 }'

else

	echo " SERVER EXTRACT FILE MISSING!! "

fi
echo "-----------------------------------------------------------------------"


if [  -f HonToTAM.csv ] 
then

	echo "Data from the IBM Websphere Portal: "

	cat HonToTAM.csv | grep -i -w $1 |awk -F","  '{ print   "Server Name :", $3, "\nSerial Num  :", $2, "\nAsset Tag   :", $1}'

	else

	echo " IBM Web Sphere Portal Data File is missing.!! "

fi


?>
