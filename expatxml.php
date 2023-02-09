<?php


	$usercount = 0;

	$current = "";

	$userdata = array();

	$parser = xml_parser_create();

	function start ( $parser, $element_name, $element_attrs )
	{

		global $usercount;

		global $current;

		$current = $element_name;

		print "Start : the element name in start is  $element_name\n";

		if ( is_array ( $element_attrs ) ) 
		{
		        print "         Attr and values \n";
						while ( list ( $key, $value ) = each ( $element_attrs ) )
						{
							print "          Attribute:  $key,  value = $value\n";

						}
		}

		switch ( $element_name ) 
		{
			case "REPORTDESCRIPTION": 
			{
				break;
			}

			case "REPORTNAME" :
			{
				break;
			}

			default :
					break;
		}
	}


	function stop ( $parser, $element_name )
	{
		global $usercount;

		global $userdata;

		echo "In the stop() function\n";

		switch ( $element_name )
		{
			case "REPORTDESCRIPTION": 
			{
				print " in the report desc case statement\n";
				break;
			}

			case "REPORTNAME" :
				print " in the report name case statement\n";
				break;

			default :
					break;
		}
	}

	function char ( $parser, $data )
	{
		global $current;
		global $userdata;
		global $usercount;



		$data = rtrim ( $data);
		if ( $data == "\n" ) {  return; }
		if ( $data == "" ) {  return; }
			

		if ( $current == "REPORTDESCRIPTION" ) 
		{
			echo "char function () Data for $current is [$data]\n";
			$userdata[$usercount] ["reportdesc"] = $data;

		}

		if ( $current == "REPORTNAME" ) 
		{
			echo "char function () Data for $current is [$data]\n";
			$userdata[$usercount] ["reportname"] = $data;

		}
	}







	xml_set_element_handler ( $parser,  "start", "stop" );

	xml_set_character_data_handler ( $parser,  "char" );


	$fp = fopen ("az18u008.xml", "r");

	while ( $data = fread ( $fp, 4096 ))
	{

		xml_parse ( $parser,  $data, feof ( $fp) )  or  die ( sprintf ("XML Error %s at line %d", xml_error_string ( xml_get_error_code ($parser ) ), xml_get_current_line_number ( $parser ) ) );


	}

	xml_parser_free ( $parser );
	
	print " Userdata ".$userdata[$usercount] ["reportname"]."\n";


?>
