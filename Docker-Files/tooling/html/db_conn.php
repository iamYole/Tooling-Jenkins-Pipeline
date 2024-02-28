<?php

//connect .env file

require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// enabling environment variable for php


$servername = $_ENV["MYSQL_IP"]; // input servername
$username = $_ENV["webaccess"]; // input username
$password = $_ENV["PassWord.1"]; //input password
$dbname = $_ENV["toolingdb"]; // input dbname


// Create connection
#$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli("tooling_db","webaccess","PassW0rd.1","toolingdb");
// Check connection
if ($conn->connect_error) {
	echo "Connection failed: " . $conn->connect_error . " " . $servername . " " . $username;
	die("Connection failed: " . $conn->connect_error);
}
?>
