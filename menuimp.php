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
    
$var_value=$_SESSION['varname'];
echo "$var_value";
$var_value=str_replace(" ","",$var_value);
$sql = "CREATE TABLE $var_value (
NAME VARCHAR(30) NOT NULL,
PRICE INT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}    



if ($_SERVER["REQUEST_METHOD"]=="POST") {
	

$name = $_POST["name"];
$price = $_POST["price"];


$sql = "INSERT INTO $var_value (NAME, PRICE)
VALUES ('$name','$price')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
        header('Location: Menu_Inp.html');
$conn->close();
session_destroy();
?>