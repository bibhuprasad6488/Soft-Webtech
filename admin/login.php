<?php
include 'db/conn.php';  // Ensure this file sets $conn correctly
session_start();  // Start session at the beginning

header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    // Check if database connection is established
    if (!$conn) {
        // http_response_code(500);
        echo json_encode(["status" => false, "message" => "Database connection failed"]);
        exit();
    }

    $sql = "SELECT id, email, password, admin_name FROM admins WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // http_response_code(500);
        echo json_encode(["status" => false, "message" => "SQL prepare failed"]);
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {

            // Get User IP Address
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $last_login = date("Y-m-d H:i:s"); // Current timestamp

            // Update last login time & IP in database
            $update_sql = "UPDATE admins SET last_login_ip = ?, last_login_at = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql); // Use $conn, not $mysqli

            if ($update_stmt) {
                $update_stmt->bind_param("ssi", $ip_address, $last_login, $row['id']);
                $update_stmt->execute();
            }

            // ✅ Set session variables after successful login
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email']; // Changed from `username` to `email`
            $_SESSION['admin_name'] = $row['email']; // Changed from `username` to `email`

            // ✅ Return JSON response
            // http_response_code(200);
            echo json_encode(["status" => true, "message" => "Login successful"]);
            exit();
        } else {
            // http_response_code(401); // Unauthorized
            echo json_encode(["status" => false, "message" => "Invalid password"]);
            exit();
        }
    } else {
        // http_response_code(404); // Not found
        echo json_encode(["status" => false, "message" => "User not found"]);
        exit();
    }
}

// Close the connection at the end
$conn->close();
