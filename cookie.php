<?
	setcookie ( "cookie", "shashi");
	setcookie ( "cookie1", "shashi1", time() + 3600 );
	setcookie ( "cookie2", "shashi2", time() + 7200 );

	echo $_COOKIE['cookie'];
	echo $_COOKIE['cookie1'];
	echo $_COOKIE['cookie2'];
	echo "hello world";


?>
