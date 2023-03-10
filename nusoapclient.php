<?php
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the client instance
$temp = array ();

$client = new soapclient('http://ie10ltxphk5zl1s:9999/nusoapserver.php?wsdl', array (1,2 ));
// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}



// Call the SOAP method
$person = array('firstname' => 'az18u044.honeywell.com', 'age' => 22, 'gender' => 'male');
#$result = $client->call('hello', array('person' => $person));
$result = $client->call('getOSName', array('person' => $person));
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
				// GOOD PART.............
        echo '<h2>Result</h2><pre>';
        print_r($result);
    echo '</pre>';
    }
}
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>
