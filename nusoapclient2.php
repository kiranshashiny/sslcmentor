<?php
/*
 *	$Id: wsdlclient3.php,v 1.4 2007/11/06 14:48:49 snichol Exp $
 *
 *	WSDL client sample.
 *
 *	Service: WSDL
 *	Payload: rpc/encoded
 *	Transport: http
 *	Authentication: none
 */

$server_name=$_POST['name_val'];

echo "Server name is $server_name";


require_once('lib/nusoap.php');
$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';


$client = new nusoap_client('http://ie10ltxphk5zl1s:9999/nusoapserver.php?wsdl&debug=1', 'wsdl',
						$proxyhost, $proxyport, $proxyusername, $proxypassword);
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}


$server_info = array('firstname' => 'az18u045.honeywell.com', 'age' => 22, 'gender' => 'male');
$server_info = array('firstname' => $server_name, 'age' => 22, 'gender' => 'male');
$person = array('firstname' => $server_name, 'age' => 22, 'gender' => 'male');



$result = $client->call('getOSName', array('person' => $server_info));


// Check for a fault
if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		// Display the result
		echo '<h2>Result</h2><pre>';
		print_r($result);

		printf ( "OS Version= $result[os_version]<br>" );
		printf ( "Server Name= $result[greeting]<br>" );
		printf ( "SBG = $result[sbg]<br>" );
		printf ( "LID = $result[lid]<br>" );
		printf ( "OS Version = $result[os_version]<br>" );
		echo '</pre>';
	}
}


#echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
#echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
#echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';


?>
