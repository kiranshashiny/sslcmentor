<?php



//get the q parameter from URL
$q=$_GET["q"];

echo  "<br>In mysql_query_server : Searching for $q <br>";

//lookup all hints from array if length of q>0
if (strlen($q) > 2)
{
	$hint="";
	mysql_connect("localhost", "root", "root" ) or die (mysql_error() );
	
	mysql_select_db ( "snc" ) or die (mysql_error() );

	echo "searching for [$q] <br>";
	
	$result = mysql_query ( "select fqhn, lid, os_name, os_version from snc_combined where fqhn like \"%$q%\"" ) or die ( mysql_error());
	

	$row = mysql_fetch_array ( $result );
	
	echo "serverName : ".$row['fqhn'];
	
	
		while ( $row = mysql_fetch_array ( $result )  ) {
			printf ( "<b> Server Name : </b>".$row['fqhn'] ." <b> LID Code =</b> ". $row['lid']."<b> OS Name</b> ".$row['os_name']." <b> OS Version </b>". $row['os_version'] ."<BR>");


	   	$hint=$hint.$row['fqhn'];
		}
}


//Set output to "no suggestion" if no hint were found
//or to the correct values
if ($hint == "")
{
$response="no suggestion";
}
else
{
$response=$hint;
}
//output the response
echo $response;
?>
