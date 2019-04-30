<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
    

$sql = "CREATE DATABASE foodbyte";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$db_name="foodbyte";

$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE doubts(

NAME VARCHAR(30) NOT NULL,
EMAIL VARCHAR(30) NOT NULL,
QUESTION VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($_SERVER["REQUEST_METHOD"]=="POST") {
	

$email = $_POST["email"];
$ques= $_POST["comments"];
$name = $_POST["name"];

$sql = "INSERT INTO doubts(NAME, EMAIL, QUESTION)
VALUES ('$name','$email','$ques')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>