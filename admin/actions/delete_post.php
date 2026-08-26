<?php
session_start();
include '../db/conn.php';

// --- Video Delete ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
    $postId = intval($_POST['post_id']);

    if ($postId > 0) {
        // Get file path before delete
        $getQuery = $conn->prepare("SELECT blog_img FROM blogs WHERE id = ?");
        $getQuery->bind_param("i", $postId);
        $getQuery->execute();
        $getQuery->bind_result($filePath);
        $getQuery->fetch();
        $getQuery->close();

        // Delete DB record
        $deleteQuery = "DELETE FROM blogs WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $postId);

        if ($deleteStmt->execute()) {
            // Also delete file if it exists
            $absolutePath = realpath(__DIR__ . '/../' . $filePath);
            if ($absolutePath && file_exists($absolutePath)) {
                unlink($absolutePath);
            }

            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Post deleted successfully!";
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Video deletion failed!";
        }

        $deleteStmt->close();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Invalid video ID!";
    }

    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'blogs.php'));
    exit();
}
