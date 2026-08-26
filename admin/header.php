<?php
include 'db/conn.php';
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://$_SERVER[HTTP_HOST]"
    . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$currpage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
session_start();
if (!isset($_SESSION['admin_id'])) {
    // Display an alert using JavaScript
    echo "<script>alert('Login Expired. Please Login Again'); window.location.href='" . $base_url . "';</script>";
    exit();
}
$user_name = $_SESSION['admin_name'];
// echo $user_name;exit;

$pageTitle = $pageTitle ?? 'Admin Panel';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard">
    <meta name="author" content="">
    <meta name="keywords"
        content="">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <!-- <link rel="canonical" href="https://demo-basic.adminkit.io/" /> -->

    <title> <?= htmlspecialchars($pageTitle) ?></title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Add jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Add Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Add Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- ✅ Load DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- ✅ Load DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>


</head>
<style>
    .content {
        padding: 3rem 2rem 1.5rem;
    }

    .hidden {
        display: none;
    }

    .video-card {
        transition: transform 0.3s ease;
        height: 70%;
    }

    .video-card:hover {
        transform: scale(1.05);
    }

    .thumbnail-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        height: 350px;
    }

    .thumbnail-container img {
        width: 100%;
        border-radius: 10px;
        height: 93%;
    }

    .video-duration {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background: rgba(0, 0, 0, 0.8);
        color: #fff;
        font-size: 12px;
        padding: 2px 5px;
        border-radius: 5px;
    }
</style>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php' ?>

        <div class="main">
            <?php include 'navbar.php' ?>

            <main class="content">