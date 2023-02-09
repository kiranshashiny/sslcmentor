<?php


	#$hostname = "AZ18U399";
	#$hostname = "AZ10NT014";
	#$hostname = "AZ18DC013";

	echo " Server Name  Validation <br> ";

	$hostname = $_GET["servername"];
	#$hostname = "AZ10NT014";


  ###############  UOP Copy  ###########

	echo "<br> Processing UOP Data <br> <br>";

	$conn = odbc_connect ('UOP', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT hostname, [Asset Tag],  [Serial Number], [IP Address], [Host Purpose], [OS], [OS Version] FROM UOPActiveServers where hostname like '%$hostname%'";


	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}


	$flag = 0;
	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$hostname     = odbc_result ( $rs, "hostname" );
		$ip_address   = odbc_result ( $rs, "IP Address" );

		echo " **********       Found $server_name in the UOP Database.  ********** \n <br>";
		echo " Hostname : $hostname <br> \n";    
    echo " IP Address   : $ip_address <br>  \n";

	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server $hostname was not found in the UOP list <br>\n";
	}

	odbc_close ($conn);

	#echo "Completed Processing UOP data. <br> \n\n";

  ###############  WIPRO Copy  ###########

	echo "<br> Processing WIPRO Data  <br>\n\n";

	$conn = odbc_connect ('WIPRO', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT [Server Name], Domain FROM WIPRO where [Server Name] like '%$hostname%'";


	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}


	$flag = 0;
	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$server_name     = odbc_result ( $rs, "Server Name" );
		$domain          = odbc_result ( $rs, "Domain" );

		echo " **********       Found $server_name in the WIPRO Database.  **********  <br>\n";
		echo " Hostname : $server_name  <br>\n";    
    echo " Domain   : $domain  <br> \n";

	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server was not found in the WIPRO list <br> \n";
	}

	odbc_close ($conn);

	#echo "Completed Processing WIPRO data. <br> \n\n";


  ###############  AERO Copy  ###########

	echo "<br> Processing AERO Data  <br> \n\n";

	$conn = odbc_connect ('AERO', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT [host name], [Pipeline Year], [DCR Focal], [Site Focal] FROM Aero where [host name] like '%$hostname%'";


	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}



	$flag = 0;
	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$host            = odbc_result ( $rs, "host name" );
		$p_year          = odbc_result ( $rs, "Pipeline Year" );
		$dcr_focal       = odbc_result ( $rs, "DCR Focal" );
		$site_focal       = odbc_result ( $rs, "Site Focal" );

		echo " **********       Found $host  in the AERO Database.  **********  <br> \n";
		echo " Hostname : $host \n";    
    echo " Pipeline Yr : $p_year  \n";
    echo " DCR Focal   : $dcr_focal  \n";
    echo " Site Focal  : $site_focal  \n";

	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server  was not found in the AERO list <br> \n";
	}

	odbc_close ($conn);

	#echo "Completed Processing AERO data. <br> \n\n";


  #############  DCR  Golden Copy  ###########

	echo "<br> Processing DCR data  <br> \n\n";

	$conn = odbc_connect ('DCR', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT host, inv_sbg, serial_number, ibm_tag, server_type, os_platform, decommission_candidate, pipeline_quarter, dcr_candidate FROM DCR where host like '%$hostname%'";
	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}

	#$field_name = odbc_field_name ( $rs , 1 );
	#echo " the first field name in DCR file is  $field_name \n";


	#$count = odbc_num_fields ( $rs );
	#echo "*****  the number of columns is $count  **** \n";


	#for ( $i =1; $i <= $count; $i++ ) {

	#	echo " Column $i    ".odbc_field_name ( $rs, $i) . "\n";

	#}

	

	$flag = 0;
	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$host            = odbc_result ( $rs, "host" );
		$sbg             = odbc_result ( $rs, "inv_sbg" );
		$serial_number   = odbc_result ( $rs, "serial_number" );
		$ibm_tag         = odbc_result ( $rs, "ibm_tag" );
		$server_type     = odbc_result ( $rs, "server_type" );
		$os_platform     = odbc_result ( $rs, "os_platform" );
		$decommission_candidate   = odbc_result ( $rs, "decommission_candidate" );
		$pipeline_quarter   = odbc_result ( $rs, "pipeline_quarter" );

		echo " **********       Found $host  in the DCR Database.  **********  <br> \n";
		echo " Serial Number : $serial_number   <br>\n";
		echo " IBM Tag       : $ibm_tag         <br>\n";
		echo " Server Type   : $server_type     <br>\n";
		echo " OS            : $os_platform     <br>\n";
		echo " Decom Candidate $decommission_candidate<br> \n";
		echo " Pipeline qtr  : $pipeline_quarter   <br>\n";

	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server was not found in the DCR list\n";
	}

	odbc_close ($conn);

	#echo "Completed Processing DCR data.\n\n";








	echo "<br> Processing Server Extract data  <br> \n\n";

	$conn = odbc_connect ('SERVERExtract', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT fqhn, sbg, [LID Code], [IP Address], fqhn,
								[Server Purpose], [OS Name],
								[OS Version]  FROM SERVERExtract where fqhn like '%$hostname%'";

	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}


	$flag =0;
	while ( odbc_fetch_row ($rs ) ) 
	{

		$flag =0;
		$fqhn = odbc_result ( $rs, 'fqhn' );
		$sbg = odbc_result ( $rs, 'sbg' );
		$lid_code = odbc_result ( $rs, 'LID Code' );
		$os_name = odbc_result ( $rs, 'OS Name' );
		$os_ver = odbc_result ( $rs, 'OS Version' );
		$ser_purpose = odbc_result ( $rs, 'Server Purpose' );
		$ip_address  = odbc_result ( $rs, 'IP Address' );



		echo "**********       Found $fqhn in Server Extract.  **********  <br> \n";
		$lid_code = rtrim ( $lid_code );

		echo " FQHN : $fqhn <br> \n";
		echo " Sbg : $sbg <br> \n";
		echo " Lid Code =  $lid_code <br> \n";
		echo " OS Name  =  $os_name <br> \n";
		echo " OS Ver   =  $os_ver  <br> \n";
		echo " Server Purpose  = $ser_purpose  <br> \n";
		echo " IP Address      = $ip_address   <br> \n";

		$flag =1;

	}
	if ( $flag ) {

		echo " ERROR !!!!  Server was not found in SERVER Extract.";
	}

  #echo "     Completed Processing SERVER Extract Data \n\n";

	odbc_close ($conn);

	######################################################################


  echo " <br>  Processing APPLICATION Extract Data  <br> \n\n";


	$conn = odbc_connect ('APPLICATIONExtract', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT fqhn, Description FROM APPLICATIONExtract where fqhn like '%$hostname%'";
	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}

	#$field_name = 	odbc_field_name ( $rs , 1 );
	#echo " the first field name in application extract file is  $field_name \n";
	
	$flag = 0;


	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$fqhn = odbc_result ( $rs, "fqhn" );
		$desc = odbc_result ( $rs, "Description" );

		echo "  Appplication on server $fqhn : $desc  <br> \n \n";
	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server was not found in Application Extract list\n\n";
	}

	odbc_close ($conn);

  #echo " ++++++++++    Completed Processing APPLICATION Extract Data ++++++++++\n\n";

  echo " <br>  Processing Billable Servers Database <br> \n\n";


	$conn = odbc_connect ('BillableDSN', '', '' );
	if ( !$conn ) {
		exit ("Connection Failed: ". $conn ); 
	}

	$sql = "SELECT host_name, LID_CODE FROM  Billable where host_name like '%$hostname%'";
	$rs = odbc_exec ($conn, $sql );
	if ( !$rs ) {  
		exit ("Error in SQL: " ); 
	}

	
	$flag = 0;


	while ( odbc_fetch_row ($rs )) 
	{

		$flag = 1;
		$host_name = odbc_result ( $rs, "host_name" );
		$lid_code  = odbc_result ( $rs, "lid_code" );

		echo "  Server exists in Billable Servers Lid Code $lid_code  <br> \n \n";
	}

	if ( $flag == 0 ) {

		echo " ERROR !!!!  Server was not found in Billable Servers\n\n";
	}

	odbc_close ($conn);

  #echo " ++++++++++    Completed Processing APPLICATION Extract Data ++++++++++\n\n";


?>
