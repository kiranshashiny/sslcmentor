<?php

$user     ="root";
$password ="root";
$host     ="localhost";
$dbhost   ='localhost';


$info = array ( );

$ipcontrol_flag = $_POST['ipcontrol'];

if ( $ipcontrol_flag ) {

	
	array_push ( $info, 'IPControl'  );

}

$dce_flag = $_POST['dce'];
if ( $dce_flag ) {

	array_push ( $info, 'dce'  );

}


$dcw_flag        = $_POST['dcw'];   
if ( $dcw_flag ) {

	
	array_push ( $info, 'dcw'  );

}
$ny17_flag       = $_POST['ny17'];   
if ( $ny17_flag ) {

	//printf (" ny17 flag was set \n");
	array_push ( $info, 'ny17'  );

}
$ibm_flag        = $_POST['ibm'];   
if ( $ibm_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'ibm'  );

}
$wipro_flag      = $_POST['wipro'];  
if ( $wipro_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'wipro'  );

}
$xa_d002_flag    = $_POST['xa_d002'];  
if ( $xa_d002_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'xa_d002'  );

}
$xa_d003_flag    = $_POST['xa_d003'];  
if ( $xa_d003_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'xa_d003'  );

}
$xb_d002_flag    = $_POST['xb_d002'];  
if ( $xb_d002_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'xb_d002'  );

}
$xb_d003_flag    = $_POST['xb_d003'];  
if ( $xb_d003_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'xb_d003'  );

}
$xc_d002_flag    = $_POST['xc_d002'];  
if ( $xc_d002_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'xc_d002'  );

}

if ( $oracle_flag      = $_POST['oracle']) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'oracle'  );

}
if ( $sql_flag        = $_POST['sql'] ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'sql'  );

}
$dell_flag       = $_POST['dell'];
if ( $dell_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'dell'  );

}
$sun_flag        = $_POST['sun'];
if ( $sun_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'sun'  );

}
$refresh_flag     = $_POST['refresh'];
if ( $refresh_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'refresh'  );

}
$decommission_flag      = $_POST['decommission'];
if ( $decommission_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'decommission'  );

}
$requote_flag     = $_POST['requote'];
if ( $requote_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'requote'  );

}
$db_flag          = $_POST['db'];
if ( $db_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'db'  );

}
$thirtytwo_bit_flag       = $_POST['thirtytwo_bit'];
if ( $thirtytwo_bit_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'thirtytwo_bit'  );

}
$apac_flag        = $_POST['apac'];
if ( $apac_flag ) {

	//printf (" ibm flag was set \n");
	array_push ( $info, 'apac'  );

}


#  START OF CODE


#foreach ( $info  as  &$value ) {

#	print "$value <BR>";


#}
#unset ($value);


foreach ( $info  as  &$value ) {

	printf (" <b> Searching for $value </b> <BR> ");
	
				mysql_connect ($dbhost, $user, $password) or die (mysql_error() );
	
				mysql_select_db ( "solution" ) or die (mysql_error() );
	
				$result = mysql_query ( "select id, 
	isr_num,
	analyze_p_start, 
	analyze_p_end, 
	sol_p_start, 
	sol_p_end, 
	prop_p_start, 
	prop_p_end, 
	pl_name, 
	actual_finish_date, 
	category, 
	actual_analyze_start, 
	actual_analyze_end, 
	actual_sol_start, 
	actual_sol_end, 
	actual_prop_start, 
	actual_prop_end, 
	actual_finish_date, 
	sol_engr 
	
	from isr_base where keywords like \"%$value%\" ") or die (mysql_error());
	
				
				printf ("<B> Search Results </B> <BR>" );
	
				printf ( "<table border=\"1\">");
	
				printf ( "<TR> ");
				printf ( "<TH WIDTH=\"3\">  Number </TH>");
				printf ( "<TH WIDTH=\"10\">  ISR    </TH>");
				printf ( "<TH>  Analyze Start</TH>");
				printf ( "<TH>  Analyze End</TH>");
	
				printf ( "<TH>  Solution Start</TH>");
				printf ( "<TH>  Solution End</TH>");
	
				printf ( "<TH>  Prop Start</TH>");
				printf ( "<TH>  Prop End</TH>");
	
				printf ( "<TH>  Project Lead</TH>");
				printf ( "<TH>  Sol Engr </TH>");
	
				printf ( "</TR> ");
	
				$count = 1;
	
				while ( $row = mysql_fetch_array ( $result ) ) {
	
								if ( $row == NULL ) { printf ( "No more ISRs in the database\n"); return; }
	
								if ( $row["isr_num"] == "" ) {
									
									continue;
								}
	
								  $color = "#99CC00";
	
								  printf ( "<TR BGCOLOR=.$color>" );
	
									printf ( "<TD>" );
									printf ( $row["id"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["isr_num"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["analyze_p_start"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["analyze_p_end"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["sol_p_start"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["sol_p_end"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["prop_p_start"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["prop_p_end"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["pl_name"]."<BR>" );
									printf ( "</TD>" );
	
									printf ( "<TD>" );
									printf ( $row["sol_engr"]."<BR>" );
									printf ( "</TD>" );
	
				  				printf ( "</TR>" );
	
				}
	
	 			printf ( "</table>" );
	}

?>
