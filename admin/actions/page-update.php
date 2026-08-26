<?php
session_start(); // Start session
include '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pageId = isset($_POST['page_id']) ? intval($_POST['page_id']) : 0;
    $pageTitle = trim($_POST['title']);
    $videoTitle = trim($_POST['slug']);
    $desc = trim($_POST['content']);
    $metaTitle = trim($_POST['meta_title']);
    $metaDescription = trim($_POST['meta_description']);
    $metaKeyWords = trim($_POST['meta_keywords']);
    $googleCode = trim($_POST['google_ads']);
    $ogTitle = trim($_POST['og_title']);
    $ogD = trim($_POST['og_description']);

    $dateToStore = date('Y-m-d H:i:s');

    // Check if OG image is uploaded
    $uploadfile = null;
    if (isset($_FILES['og_image']) && $_FILES['og_image']['name'] != '') {
        $sixDigitRandom = rand(100000, 999999);
        $uploadfile = $sixDigitRandom . '_og_image.' . pathinfo($_FILES['og_image']['name'], PATHINFO_EXTENSION);
        $upload_dir = '../uploads/';
        move_uploaded_file($_FILES['og_image']['tmp_name'], $upload_dir . $uploadfile);
    }

    // If updating existing record
    if ($pageId > 0) {
        // Check if title already exists (excluding the current page)
        $checkQuery = "SELECT id FROM cms_pages WHERE title = ? AND id != ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("si", $pageTitle, $pageId);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "This title already exists!";
            $checkStmt->close();
            header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'admin/edit-page?page_id=' . $pageId));
            exit();
        }
        $checkStmt->close();

        // Update Query
        if ($uploadfile) {
            $sql = "UPDATE cms_pages 
                    SET title = ?, slug = ?, content = ?, meta_title = ?, meta_description = ?, meta_keywords = ?, 
                        google_ads = ?, og_title = ?, og_description = ?, og_image = ?, updated_at = ? 
                    WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssi", $pageTitle, $videoTitle, $desc, $metaTitle, $metaDescription, $metaKeyWords, $googleCode, $ogTitle, $ogD, $uploadfile, $dateToStore, $pageId);
        } else {
            $sql = "UPDATE cms_pages 
                    SET title = ?, slug = ?, content = ?, meta_title = ?, meta_description = ?, meta_keywords = ?, 
                        google_ads = ?, og_title = ?, og_description = ?, updated_at = ? 
                    WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssi", $pageTitle, $videoTitle, $desc, $metaTitle, $metaDescription, $metaKeyWords, $googleCode, $ogTitle, $ogD, $dateToStore, $pageId);
        }

        if ($stmt->execute()) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Page updated successfully!";
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Update failed!";
        }

        $stmt->close();
    }

    // Close connection
    $conn->close();

    header("Location: ../manage-pages");
    exit();
}
