<?php
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['SCRIPT_NAME']) . "";
// echo $base_url;exit;
session_start();
session_destroy();
header("Location: " . $base_url . "");
exit();
