<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "wicks_project";

//create connection

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection error" . $conn->connect_error);
  } 
  else {
  //connection successful
		}

    


?>