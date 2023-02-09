<?php

echo "this is the first line in teh script";

$link =  mysql_connect ("localhost", "rohanmayyo", "rohan");

if ( ! $link ) 
{

	die ("Could not connect".mysql_error() );

}
echo 'connected successfully';

mysql_close ( $link );


?>
