<?php
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('hellowsdl2', 'urn:hellowsdl2');



// Register the data structures used by the service
$server->wsdl->addComplexType(
    'Person',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'),
        'age' => array('name' => 'age', 'type' => 'xsd:int'),
        'gender' => array('name' => 'gender', 'type' => 'xsd:string')
    )
);
############  Billing Input Params ###################
$server->wsdl->addComplexType(
    'Server',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'servername' => array('name' => 'servername', 'type' => 'xsd:string')
    )
);
$server->wsdl->addComplexType(
    'SweepstakesGreeting',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'greeting' => array('name' => 'greeting', 'type' => 'xsd:string'),
        'winner' => array('name' => 'winner', 'type' => 'xsd:boolean'),
        'os_name' => array('name' => 'os_name', 'type' => 'xsd:string'),
        'lid' => array('name' => 'lid', 'type' => 'xsd:string'),
        'sbg' => array('name' => 'sbg', 'type' => 'xsd:string'),
        'os_version' => array('name' => 'os_version', 'type' => 'xsd:string'),
        'stock_price' => array('name' => 'stock_price', 'type' => 'xsd:int')
    )
);
#######################                       ####################
#######################  BILLING RETURN DATA  ####################
#######################                       ####################
$server->wsdl->addComplexType(
    'BillingReturn',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'servername' => array('name' => 'servername', 'type' => 'xsd:string'),
        'os_name' => array('name' => 'os_name', 'type' => 'xsd:string'),
        'lid' => array('name' => 'lid', 'type' => 'xsd:string'),
        'sbg' => array('name' => 'sbg', 'type' => 'xsd:string'),
        'os_version' => array('name' => 'os_version', 'type' => 'xsd:string')
        
    )
);
// Register the method to expose
$server->register('getOSName',                    // method name
    array('person' => 'tns:Person'),          // input parameters
    array('return' => 'tns:SweepstakesGreeting'),    // output parameters
    'urn:hellowsdl2',                         // namespace
    'urn:hellowsdl2#getOSName',                   // soapaction
    'rpc',                                    // style
    'encoded',                                // use
    'Respond with server details'        // documentation
);



$server->register('getBillingData',                    // method name
    array('person' => 'tns:Person'),          // input parameters
    array('return' => 'tns:BillingReturn'),    // output parameters
    'urn:hellowsdl2',                         // namespace
    'urn:hellowsdl2#getBillingData',          // soapaction
    'rpc',                                    // style
    'encoded',                                // use
    'Respond with billing details'        // documentation
);

function getOSName($person) {

    mysql_connect('localhost','root','root') or die (mysql_error() );
    mysql_select_db('snc') or die ( mysql_error() );

		$server_name =  $person['firstname'];


    #$query = 'SELECT OS_Name FROM snc_combined where FQHN like "%";
    #$query = "SELECT OS_Name FROM snc_combined where FQHN=\"az18u044.honeywell.com\"";
    $query = "SELECT * FROM snc_combined where FQHN=\"$server_name\"";

    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
		
    
		####
    $servername = $person['firstname'] ;

		$os_name = $row['OS_Name'];
		$lid = $row['LID'];
		$sbg = $row['SBG'];
		$os_version = $row['OS_Version'];
 
    $winner = $person['firstname'] == 'Willi';
    $winner = "sashi";

		$stock_price = 36;


    return array(
                'greeting' => $servername,
                'winner' => $winner,
                'os_name' => $os_name,
                'lid' => $lid,
                'sbg' => $sbg,
                'os_version' => $os_version
								
                );
}


##############################################################################
#
#
#   Get Billing Data.
#
#
##############################################################################
function getBillingData($person) {

		echo " In the server code ";

    mysql_connect('localhost','root','root') or die (mysql_error() );
    mysql_select_db('snc') or die ( mysql_error() );

		$server_name =  $person['firstname'];
		echo "the servername is $server_name\n";


    $query = "SELECT * FROM snc_combined where FQHN=\"$server_name\"";

    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
		
    
		####
    $servername = $row['FQHN'];
		

		$os_name = $row['OS_Name'];
		$lid = $row['LID'];
		$sbg = $row['SBG'];
		$os_version = $row['OS_Version'];
 

    return array(
                'servername' => $servername,
                'os_name' => $os_name,
                'lid' => $lid,
                'sbg' => $sbg,
                'os_version' => $os_version
								
                );
}

##############################################################################


// Define the method as a PHP function
function hello($person) {
    $greeting = 'Hello, ' . $person['firstname'] .
                '. It isssss nice to meet a ' . $person['age'] .
                ' year old ' . $person['gender'] . '.';
    
    $winner = $person['firstname'] == 'Willi';

		$stock_price = 36;


    return array(
                'greeting' => $greeting,
                'winner' => $winner,
								'stock_price' => $stock_price
                );
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
