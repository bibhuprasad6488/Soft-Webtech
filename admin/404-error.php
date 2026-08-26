<?php include 'db/conn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Sign In | Admin</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<style>
    .custom-bg {
        background: linear-gradient(to right, #e2e8f0, #e5e7eb);
        color: #fff;
    }

    .custom-btn:hover {
        background-color: #f3e8ff !important;
        transition: background-color 0.3s ease-in-out;
    }

    @media (prefers-color-scheme: dark) {
        .custom-bg {
            background: linear-gradient(to right, #1f2937, #111827);
            color: white !important;
        }

        .custom-btn {
            background-color: #374151 !important;
            color: white !important;
        }

        .custom-btn:hover {
            background-color: #4b5563 !important;
        }
    }

    .fw-bold,
    p {
        color: #fff;
    }
</style>
<body>
    <main class="d-flex w-100 custom-bg">
        <div class="container  d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class=" text-dark">
                        <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
                            <div class="text-center">
                                <h1 class="display-1 fw-bold">404</h1>
                                <p class="fs-2 fw-medium mt-4">Oops! Page not found</p>
                                <p class="mt-4 mb-5">The page you're looking for doesn't exist or has been moved.</p>
                                <a href="javascript:;" onclick="window.history.back()" class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
                                    Go Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>