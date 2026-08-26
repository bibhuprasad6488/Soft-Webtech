<?php
session_start(); // Start session
include '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and assign form data
    $pageTitle = trim($_POST['title']);
    $pageSlug = trim($_POST['slug']);
    $desc = trim($_POST['content']);
    $metaTitle = trim($_POST['meta_title']);
    $metaDescription = trim($_POST['meta_description']);
    $metaKeyWords = trim($_POST['meta_keywords']);
    $googleCode = trim($_POST['google_ads']);
    $ogTitle = trim($_POST['og_title']);
    $ogD = trim($_POST['og_description']);

    $dateToStore = date('Y-m-d H:i:s');

    $sixDigitRandom = rand(100000, 999999);

    $uploadfile = NULL; // Default NULL to prevent undefined variable error

    // Check if the title already exists in the database
    $checkQuery = "SELECT id FROM cms_pages WHERE title = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $pageTitle);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "This title already exists!";
        $checkStmt->close();
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? '../manage-pages'));
        exit();
    }
    $checkStmt->close();

    // Handle file upload
    if (!empty($_FILES['og_image']['name'])) {
        $fileExtension = pathinfo($_FILES['og_image']['name'], PATHINFO_EXTENSION);
        $uploadfile = $sixDigitRandom . '_og_image.' . $fileExtension;
        $upload_dir = '../uploads/';

        if (!move_uploaded_file($_FILES['og_image']['tmp_name'], $upload_dir . $uploadfile)) {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Image upload failed!";
            header("Location: " . ($_SERVER['HTTP_REFERER'] ?? '../manage-pages'));
            exit();
        }
    }

    // Prepare INSERT query
    $sql = "INSERT INTO cms_pages (title, slug, content, meta_title, meta_description, meta_keywords, google_ads, og_title, og_description, og_image, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssssssss", $pageTitle, $pageSlug, $desc, $metaTitle, $metaDescription, $metaKeyWords, $googleCode, $ogTitle, $ogD, $uploadfile, $dateToStore, $dateToStore);

        if ($stmt->execute()) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Page added successfully!";
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Database insert failed!";
        }

        $stmt->close();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Query preparation failed!";
    }

    $conn->close();
    header("Location: ../manage-pages");
    exit();
}
