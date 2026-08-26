<?php

session_start();

include '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../blogs');
    exit;
}


$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if ($id <= 0) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Invalid post ID.';

    header('Location: ../blogs');
    exit;
}


/*
|--------------------------------------------------------------------------
| Get Form Data
|--------------------------------------------------------------------------
*/

$title       = trim($_POST['title'] ?? '');
$short_desc  = trim($_POST['short_desc'] ?? '');
$description = $_POST['long_desc'] ?? '';
$meta_title  = trim($_POST['meta_title'] ?? '');
$meta_desc   = trim($_POST['meta_desc'] ?? '');
$meta_key    = trim($_POST['meta_key'] ?? '');


/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
*/
if (
    empty($title) ||
    empty($short_desc) ||
    empty($description)
) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Required fields are missing.';

    header('Location: ../edit_post?id=' . $id);
    exit;
}

/*
|--------------------------------------------------------------------------
| Get Existing Blog
|--------------------------------------------------------------------------
*/

$sql = "SELECT * FROM blogs WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {

    $stmt->close();
    $conn->close();

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Post not found.';

    header('Location: ../blogs');
    exit;
}

$oldBlog = $result->fetch_assoc();
$stmt->close();


/*
|--------------------------------------------------------------------------
| Generate Slug
|--------------------------------------------------------------------------
*/

$slug = strtolower($title);
$slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
$slug = trim($slug, '-');
$baseSlug = $slug;
$count = 1;


/*
|--------------------------------------------------------------------------
| Check Slug Exists
|--------------------------------------------------------------------------
*/

while (true) {

    $checkSlug = $conn->prepare(
        "SELECT id FROM blogs WHERE slug = ? AND id != ? LIMIT 1"
    );

    $checkSlug->bind_param("si", $slug, $id);

    $checkSlug->execute();

    $checkSlug->store_result();

    if ($checkSlug->num_rows === 0) {

        $checkSlug->close();

        break;
    }

    $checkSlug->close();

    $count++;

    $slug = $baseSlug . '-' . $count;
}


/*
|--------------------------------------------------------------------------
| Image
|--------------------------------------------------------------------------
*/
$blog_img = $oldBlog['blog_img'];

/*
|--------------------------------------------------------------------------
| Upload New Image
|--------------------------------------------------------------------------
*/
if (
    isset($_FILES['blog_img']) &&
    $_FILES['blog_img']['error'] === UPLOAD_ERR_OK
) {

    $uploadDir = '../uploads/blog/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp'
    ];

    $mimeType = mime_content_type(
        $_FILES['blog_img']['tmp_name']
    );

    if (!isset($allowedTypes[$mimeType])) {

        $_SESSION['status'] = 'error';
        $_SESSION['message'] =
            'Invalid image type. Only JPG, PNG and WEBP are allowed.';

        header('Location: ../edit_post?id=' . $id);
        exit;
    }

    $extension = $allowedTypes[$mimeType];
    $fileName = uniqid('blog_', true) . '.' . $extension;
    $uploadPath = $uploadDir . $fileName;


    if (!move_uploaded_file($_FILES['blog_img']['tmp_name'],$uploadPath)) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Failed to upload image.';
        header('Location: ../edit_post?id=' . $id);
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Old Image
    |--------------------------------------------------------------------------
    */

    if (!empty($oldBlog['blog_img'])) {
        $oldImagePath = '../' . $oldBlog['blog_img'];
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }


    $blog_img = 'uploads/blog/' . $fileName;
}


/*
|--------------------------------------------------------------------------
| Update Blog
|--------------------------------------------------------------------------
*/

$sql = "UPDATE blogs SET
            title = ?,
            slug = ?,
            short_desc = ?,
            long_desc = ?,
            blog_img = ?,
            meta_title = ?,
            meta_desc = ?,
            meta_key = ?,
            updated_at = NOW()
        WHERE id = ?";


$stmt = $conn->prepare($sql);

if (!$stmt) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] =
        'Query preparation failed: ' . $conn->error;

    $conn->close();

    header('Location: ../edit_post?id=' . $id);
    exit;
}


$stmt->bind_param(
    "ssssssssi",
    $title,
    $slug,
    $short_desc,
    $description,
    $blog_img,
    $meta_title,
    $meta_desc,
    $meta_key,
    $id
);


if ($stmt->execute()) {

    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Post updated successfully!';

    $stmt->close();
    $conn->close();

    header('Location: ../blogs?success=1');
    exit;
} else {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] =
        'Database update failed: ' . $stmt->error;

    $stmt->close();
    $conn->close();

    header('Location: ../edit_post?id=' . $id);
    exit;
}
