<?php
// Environment detection (Local vs. Live)
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Local environment
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "softwebtechs";
} else {
    // Live environment
    $servername = "sql304.infinityfree.com"; // e.g., "localhost" or your hosting IP
    $username = "if0_38233831";
    $password = "wV00d9wGzQvN";
    $dbname = "if0_38233831_yt_app";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4
// $conn->set_charset("utf8mb4");
// echo "Connected successfully<br>";
