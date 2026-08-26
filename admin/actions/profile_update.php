<?php

session_start();
include '../db/conn.php';
//  Check Login
if (!isset($_SESSION['admin_id'])) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Unauthorized. Please login again.';
    header('Location: ../login');
    exit;
}

// | Only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Invalid request method.';
    header('Location: ../profile');
    exit;
}

$adminId = (int) $_SESSION['admin_id'];
$adminName = trim($_POST['admin_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$currentPassword = $_POST['current_password'] ?? '';
$newPassword = $_POST['new_password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';
// | Validate Admin Name
if ($adminName === '') {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Admin name is required.';
    header('Location: ../profile');
    exit;
}

// | Validate Email
if ($email === '') {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Email is required.';
    header('Location: ../profile');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Please enter a valid email address.';
    header('Location: ../profile');
    exit;
}

// | Get Current Admin
$sql = "SELECT id, email, password
        FROM admins
        WHERE id = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Database query failed.';
    header('Location: ../profile');
    exit;
}

$stmt->bind_param("i", $adminId);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
$stmt->close();

if (!$admin) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Admin account not found.';
    header('Location: ../profile');
    exit;
}

// | Check Email Already Used
$emailCheckSql = "SELECT id
                  FROM admins
                  WHERE email = ?
                  AND id != ?
                  LIMIT 1";

$emailStmt = $conn->prepare($emailCheckSql);

if (!$emailStmt) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Email validation failed.';
    header('Location: ../profile');
    exit;
}

$emailStmt->bind_param("si", $email, $adminId);
$emailStmt->execute();
$emailResult = $emailStmt->get_result();

if ($emailResult->num_rows > 0) {
    $emailStmt->close();
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'This email address is already in use.';
    header('Location: ../profile');
    exit;
}

$emailStmt->close();

$passwordChanged = false;
// | Password Update
if ($currentPassword !== '' || $newPassword !== '' || $confirmPassword !== '') {

    // | Current Password Required
    if ($currentPassword === '') {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Current password is required.';
        header('Location: ../profile');
        exit;
    }

    // | Verify Current Password
    if (!password_verify($currentPassword, $admin['password'])) {

        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Current password is incorrect.';

        header('Location: ../profile');
        exit;
    }

    // | New Password Required
    if ($newPassword === '') {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'New password is required.';
        header('Location: ../profile');
        exit;
    }

    // | Password Length
    if (strlen($newPassword) < 8) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'New password must be at least 8 characters.';
        header('Location: ../profile');
        exit;
    }

    // | Confirm Password
    if ($newPassword !== $confirmPassword) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'New passwords do not match.';
        header('Location: ../profile');
        exit;
    }

    $hashedPassword = password_hash(
        $newPassword,
        PASSWORD_DEFAULT
    );

    $passwordChanged = true;

    $updateSql = "UPDATE admins
                  SET admin_name = ?,
                      email = ?,
                      password = ?,
                      updated_at = NOW()
                  WHERE id = ?";

    $updateStmt = $conn->prepare($updateSql);

    if (!$updateStmt) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Profile update failed.';
        header('Location: ../profile');
        exit;
    }

    $updateStmt->bind_param(
        "sssi",
        $adminName,
        $email,
        $hashedPassword,
        $adminId
    );
} else {

    $updateSql = "UPDATE admins
                  SET admin_name = ?,
                      email = ?,
                      updated_at = NOW()
                  WHERE id = ?";

    $updateStmt = $conn->prepare($updateSql);
    if (!$updateStmt) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Profile update failed.';
        header('Location: ../profile');
        exit;
    }

    $updateStmt->bind_param(
        "ssi",
        $adminName,
        $email,
        $adminId
    );
}

if ($updateStmt->execute()) {

    /*
    |--------------------------------------------------------------------------
    | Password Changed
    |--------------------------------------------------------------------------
    */

    if ($passwordChanged) {
        // Close database resources
        $updateStmt->close();
        $conn->close();

        // Destroy current session
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        // Start new session for logout message
        session_start();

        $_SESSION['status'] = 'success';
        $_SESSION['message'] =
            'Password changed successfully. Please login again.';

        header('Location: ../index');
        exit;
    }

    $_SESSION['admin_name'] = $adminName;
    $_SESSION['admin_email'] = $email;

    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Profile updated successfully!';

    $updateStmt->close();
    $conn->close();
    header('Location: ../profile');
    exit;
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Failed to update profile.';
    $updateStmt->close();
    $conn->close();
    header('Location: ../profile');
    exit;
}
