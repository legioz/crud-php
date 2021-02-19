<?php

$servername = "db";
$username 	= "user";
$password 	= "123456";
$dbname 	= "db";

try {
	
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

echo "Falha na conexão: " . $e->getMessage();

}
