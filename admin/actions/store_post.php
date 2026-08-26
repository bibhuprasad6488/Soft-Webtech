<?php
session_start(); // Start session
include '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../add_post');
    exit;
}

$title       = trim($_POST['title'] ?? '');
$slug = strtolower($title);
// Replace non-alphanumeric characters with hyphens
$slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
// Remove hyphens from beginning and end
$slug = trim($slug, '-');
$short_desc  = trim($_POST['short_desc'] ?? '');
$description = $_POST['long_desc'] ?? '';
$meta_title  = trim($_POST['meta_title'] ?? '');
$meta_desc   = trim($_POST['meta_desc'] ?? '');
$meta_key    = trim($_POST['meta_key'] ?? '');

if (
    empty($title) ||
    empty($short_desc) ||
    empty($description)
) {
    die('Required fields are missing.');
}

$blog_img = '';

if (isset($_FILES['blog_img']) && $_FILES['blog_img']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = '../uploads/blog/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp'
    ];

    $mimeType = mime_content_type($_FILES['blog_img']['tmp_name']);

    if (!isset($allowedTypes[$mimeType])) {
        die('Invalid image type.');
    }

    $extension = $allowedTypes[$mimeType];

    $fileName = uniqid('blog_', true) . '.' . $extension;

    $uploadPath = $uploadDir . $fileName;

    if (!move_uploaded_file($_FILES['blog_img']['tmp_name'], $uploadPath)) {
        die('Failed to upload image.');
    }

    $blog_img = 'uploads/blog/' . $fileName;
}

$sql = "INSERT INTO blogs
        (
            title,
            slug,
            short_desc,
            long_desc,
            blog_img,
            meta_title,
            meta_desc,
            meta_key,
            created_at,
            updated_at
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

$stmt = $conn->prepare($sql);


if (!$stmt) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Query preparation failed: ' . $conn->error;

    $conn->close();

    header('Location: ../add_post');
    exit;
}

$stmt->bind_param(
    "ssssssss",
    $title,
    $slug,
    $short_desc,
    $description,
    $blog_img,
    $meta_title,
    $meta_desc,
    $meta_key
);

if ($stmt->execute()) {

    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Post added successfully!';

    $stmt->close();
    $conn->close();

    header('Location: ../blogs');
    exit;

} else {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Database insert failed: ' . $stmt->error;

    $stmt->close();
    $conn->close();

    header('Location: ../add_post');
    exit;
}