<?php

session_start();

include '../db/conn.php';
// | Only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Invalid request method.';

    header('Location: ../create-user');
    exit;
}

$userName = trim($_POST['user_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$newPassword = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

// | Validate Name
if ($userName === '') {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Name is required.';

    header('Location: ../create-user');
    exit;
}

// | Validate Email
if ($email === '') {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Email is required.';

    header('Location: ../create-user');
    exit;
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Please enter a valid email address.';

    header('Location: ../create-user');
    exit;
}

// | Validate Password
if ($newPassword === '') {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Password is required.';

    header('Location: ../create-user');
    exit;
}


if (strlen($newPassword) < 8) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Password must be at least 8 characters.';

    header('Location: ../create-user');
    exit;
}


if ($newPassword !== $confirmPassword) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Passwords do not match.';

    header('Location: ../create-user');
    exit;
}

// | Check Email Already Used
$emailCheckSql = "SELECT id
                  FROM admins
                  WHERE email = ?
                  LIMIT 1";

$emailStmt = $conn->prepare($emailCheckSql);

if (!$emailStmt) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] =
        'Email validation failed.';

    header('Location: ../create-user');
    exit;
}

$emailStmt->bind_param("s", $email);
$emailStmt->execute();
$emailResult = $emailStmt->get_result();

if ($emailResult->num_rows > 0) {
    $emailStmt->close();
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'This email address is already in use.';

    header('Location: ../create-user');
    exit;
}

$emailStmt->close();


$hashedPassword = password_hash(
    $newPassword,
    PASSWORD_DEFAULT
);


$insertSql = "INSERT INTO admins
              (admin_name, email, password, created_at, updated_at)
              VALUES (?, ?, ?, NOW(), NOW())";

$insertStmt = $conn->prepare($insertSql);

if (!$insertStmt) {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'User creation failed.';
    header('Location: ../create-user');
    exit;
}

$insertStmt->bind_param(
    "sss",
    $userName,
    $email,
    $hashedPassword
);


if ($insertStmt->execute()) {

    $_SESSION['status'] = 'success';

    $_SESSION['message'] = 'User created successfully!';

    $insertStmt->close();
    $conn->close();

    // header('Location: ../users');
    header('Location: ../create-user');

    exit;
} else {

    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Failed to create user.';
    $insertStmt->close();
    $conn->close();

    header('Location: ../create-user');

    exit;
}
