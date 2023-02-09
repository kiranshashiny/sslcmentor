<html>
<head>
<body>
	<?php
	include_once 'perl-ofc-library/open_flash_chart_object.php';
	open_flash_chart_object( 500, 250, 'http://'. $_SERVER['SERVER_NAME'] .'/chart-data.php', false );

		echo 'hello world';
	?>
</body>
</head>
</html>

