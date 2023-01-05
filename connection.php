<?php


//create connection
$servername = "localhost";
$username  = "root";
$dbname = "Cars";
$password = "";

// Create connection
$conn  = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "The was a connection error";
} else {
}
