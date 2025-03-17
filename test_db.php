<?php
$conn = new mysqli("localhost", "root", "+9Yj.naqj9!h", "aftech_db");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
echo "DB Connected successfully Vivek!";
?>
