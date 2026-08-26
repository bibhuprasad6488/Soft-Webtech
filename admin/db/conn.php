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
    $servername = "localhost"; // e.g., "localhost" or your hosting IP
    $username = "softwebtechs_main";
    $password = "QX4M;AbQPtZuhCu$";
    $dbname = "softwebtechs_main";
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
