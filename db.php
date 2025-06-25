<?php
$servername = "localhost";
$username = "root";
$password = "E8be8be8b#";
$database = "lecture_repo";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
