<?php
session_start();
include 'db/conn.php';
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://$_SERVER[HTTP_HOST]"
    . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
// echo $base_url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Sign In | Admin</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery (Required for Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
    </style>
</head>

<body class="bg-secondary">
    <main class="d-flex w-100 ">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <!-- <div class="text-center mt-4">
                            <h1 class="h2">Welcome back, Admin</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div> -->

                        <div class="card">
                            <div class="card-title">
                                <div class="text-center mt-2">
                                    <h1 class="h2">Hello, Admin</h1>
                                    <p class="lead">
                                        Sign in to continue
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="img/avatars/auth-user.png" alt="Charles Hall" class="img-fluid "
                                            width="100" height="100" />
                                    </div>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                id="username" placeholder="Enter your email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-lg" type="password" name="password"
                                                    id="password" placeholder="Enter your password" />

                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary password-toggle"
                                                    data-target="password">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            <small>
                                                <a href="javascript:;">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me"
                                                    name="remember-me" checked>
                                                <span class="form-check-label">
                                                    Remember me next time
                                                </span>
                                            </label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="javascript:;" class="btn btn-lg btn-primary" id="loginBtn">Sign in</a>
                                            <!-- <button  class="btn btn-lg btn-primary" id="loginBtn">Sign
                                            in</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginBtn').on('click', function() {
                // Get form values
                var username = $('#username').val().trim();
                var password = $('#password').val().trim();

                // Validation
                if (username === '' || password === '') {
                    alert('Please fill out all fields.');
                    return;
                }

                // AJAX request
                $.ajax({
                    type: 'POST',
                    url: '<?= $base_url ?>/login', // Ensure the correct login script path
                    data: {
                        username: username,
                        password: password
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);

                        // if (response.status === true) { // ✅ Checking for `true`
                        //     toastr.success(response.message);
                        //     if (confirm('✅ Login Successful')) {
                        //         window.location.href = "<?= $base_url ?>/dashboard"; // ✅ Redirect after success
                        //     } else {
                        //         window.location.href = "<?= $base_url ?>/logout"; // ✅ Redirect after success
                        //     }
                        // } else {
                        //     toastr.error(response.message);
                        //     console.log('Error:', response); // Log error
                        //     alert(response.message); // Show error message if login fails
                        //     $('#password').val(''); // Clear password field
                        // }
                        if (response.status === true) {
                            toastr.success(response.message);
                            setTimeout(function() {
                                window.location.href = "<?= $base_url ?>/dashboard";
                            }, 800);

                        } else {

                            toastr.error(response.message);
                            $('#password').val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Request failed:', error);
                    }
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.password-toggle').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const icon = this.querySelector('i');
                if (passwordInput.type === 'password') {

                    passwordInput.type = 'text';

                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');

                } else {

                    passwordInput.type = 'password';

                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');

                }

            });

        });
    </script>
    <script>
        document.addEventListener("contextmenu", function(event) {
            event.preventDefault(); // Disable Right Click
        });

        document.addEventListener("keydown", function(event) {
            if (
                event.key === "F12" ||
                (event.ctrlKey && event.shiftKey && event.key === "I") ||
                (event.ctrlKey && event.shiftKey && event.key === "J") ||
                (event.ctrlKey && event.key === "U")
            ) {
                event.preventDefault(); // Block key press
            }
        });

        // Detect if Developer Tools are open
        (function() {
            const devtools = {
                open: false,
                orientation: null
            };

            const threshold = 160; // Minimum height/width of dev tools window

            const detectDevTools = () => {
                const widthThreshold = window.outerWidth - window.innerWidth > threshold;
                const heightThreshold = window.outerHeight - window.innerHeight > threshold;
                if (widthThreshold || heightThreshold) {
                    devtools.open = true;
                    alert("Developer Tools are blocked!");
                    window.location.reload(); // Optional: Reload page if detected
                }
            };

            window.addEventListener("resize", detectDevTools);
            window.addEventListener("load", detectDevTools);
        })();
        // $(document).ready(function() {
        //     // alert('Login Worked');
        //     console.log('Application Started');

        // });
    </script>
</body>

</html>