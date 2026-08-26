<?php
session_start();
include '../db/conn.php';

// echo sys_get_temp_dir();

// Full path to "uploads/" directory
$uploadDir = realpath(__DIR__ . '/../uploads') . '/'; // Ensure trailing slash
$relativeDir = 'uploads/'; // Path stored in DB (relative for URL use)

// Create uploads directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Enable error reporting temporarily for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check input
if (!isset($_FILES['video']) || !isset($_POST['title'])) {
    echo "⛔ Missing title or video file.";
    exit;
}

$title = $conn->real_escape_string($_POST['title']);
$file = $_FILES['video'];
$fileName = basename($file['name']);
$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$allowed = ['mp4', 'mov', 'avi', 'mkv'];

// Validate extension
if (!in_array($ext, $allowed)) {
    echo "Only video files (mp4, mov, avi, mkv) are allowed.";
    exit;
}

// Check size limit (3GB)
if ($file['size'] > 3 * 1024 * 1024 * 1024) {
    echo "File too large. Max 3GB allowed.";
    exit;
}

// Validate temp file
if (!is_uploaded_file($file['tmp_name'])) {
    echo "⛔ Temporary file is invalid or missing.";
    exit;
}

// Unique name
$uniqueName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $fileName);
$targetPath = $uploadDir . $uniqueName;
$relativePath = $relativeDir . $uniqueName;

// Move the file
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    // Save into DB
    $stmt = $conn->prepare("INSERT INTO videos (title, file_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $relativePath);
    if ($stmt->execute()) {
        echo "✅ Video uploaded and record saved successfully!";
    } else {
        echo "⚠️ Upload succeeded but DB save failed: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "❌ Failed to move uploaded file. Check folder permissions or PHP config.";
    error_log("UPLOAD ERROR: " . print_r($file, true)); // Log file for deeper diagnostics
}

$conn->close();
