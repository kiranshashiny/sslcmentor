<?php

class customException extends Exception
{
  public function errorMessage()
  {
    $errorMsg = "<h2>Invalid User and Password [".$this->getMessage()."]<h2>";

    return $errorMsg;

  }
}

$user     = $_POST['name_val']; 
$password = $_POST['pwd_val']; 

echo "Your name is $user, password is $password.<br>";

mysql_connect ("localhost", "root", "root");

mysql_select_db ("sslcdb" ) or die (mysql_error() ) ;


?>
