<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Archapp";


///Create connection



try {

    $conn = new mysqli( $servername, $username, $password,$dbname);
    // set the PDO error mode to exception
  //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn -> set_charset("utf8");

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	echo "<br />";
    }


?>