<?php

		$xml = simplexml_load_file("UnixServers.xml" );

		echo $xml->getName(). " <br/>";

		foreach ( $xml->children() as $child )
		{
			echo $child->getName() . ": ". $child. "<br/>";

		}


?>
