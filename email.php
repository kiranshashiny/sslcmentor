<?php

	$to = "shashi.kiran@honeywell.com";

	$subject = "PHP is great";
	$body = "body";
	$headers = "From: shashi.kiran@honeywell.com\n";

	echo "to      = $to\n";
	echo "subject = $subject\n";
	echo "body    = $body\n";
	echo "headers = $headers\n";
	
	if ( mail ($to, $subject, $body, $headers ) ) {

		echo "Mail sent to $to";

	} else {
		echo "there was a problem sending email";

	}

?>
