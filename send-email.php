<?php
// Allow cross-origin requests if needed
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Only POST requests are allowed.']);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// echo json_encode(['data'=> $_POST]);
// exit;
$user_name = $_POST['user_name']; // fallback if not set
$user_email = $_POST['user_email']; // fallback if not set
$user_phone = $_POST['user_phone']; // fallback if not set
$service = $_POST['service'] ?? '';
$budget = $_POST['budget'];
$message = $_POST['message'];
$subject = $_POST['subject'] ?? 'New Contact form submission';
$toEmail = $_POST['to_email'] ?? 'support@softwebtechs.com';
$fromEmail = $_POST['from_email'] ?? 'support@softwebtechs.com';


// Validate required fields
if ($user_name === '' || $user_email === '' || $message === '') {

    http_response_code(422);

    echo json_encode([
        'status' => 'error',
        'message' => 'Name, email and message are required.'
    ]);

    exit;
}

// Validate email
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

    http_response_code(422);

    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid email address.'
    ]);

    exit;
}


$emailBody = "
New contact form submission

Name: {$user_name}
Email: {$user_email}
Phone: {$user_phone}
Service: {$service}
Budget: {$budget}
Subject: {$subject}

Message:
{$message}
";

// Send Email using PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'mail.softwebtechs.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@softwebtechs.com';
    $mail->Password = 'q)d&kgq~_SKT{.DW';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('support@softwebtechs.com', 'Soft Webtechs');
    // Visitor's email
    // When you click Reply in your email client,
    // it will reply directly to the visitor.
    $mail->addReplyTo(
        $user_email,
        $user_name
    );
    $mail->addAddress($toEmail, 'Soft Webtechs');

    $mail->isHTML(true);
    $mail->Subject = $subject;

    $mail->Body = '
        <h2>New Contact Form Submission</h2>

        <table cellpadding="8" cellspacing="0" border="0">

            <tr>
                <td><strong>Name:</strong></td>
                <td>' . htmlspecialchars($user_name) . '</td>
            </tr>

            <tr>
                <td><strong>Email:</strong></td>
                <td>' . htmlspecialchars($user_email) . '</td>
            </tr>

            <tr>
                <td><strong>Phone:</strong></td>
                <td>' . htmlspecialchars($user_phone) . '</td>
            </tr>

            <tr>
                <td><strong>Service:</strong></td>
                <td>' . htmlspecialchars($service) . '</td>
            </tr>

            <tr>
                <td><strong>Budget:</strong></td>
                <td>' . htmlspecialchars($budget) . '</td>
            </tr>

            <tr>
                <td><strong>Subject:</strong></td>
                <td>' . htmlspecialchars($subject) . '</td>
            </tr>

        </table>

        <h3>Message</h3>

        <p>' . nl2br(htmlspecialchars($message)) . '</p>
    ';


    // Plain text fallback
    $mail->AltBody =
        "New Contact Form Submission\n\n" .
        "Name: {$user_name}\n" .
        "Email: {$user_email}\n" .
        "Phone: {$user_phone}\n" .
        "Service: {$service}\n" .
        "Budget: {$budget}\n" .
        "Subject: {$subject}\n\n" .
        "Message:\n{$message}";


    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        ]
    ];

    $mail->send();
    echo json_encode([
    'status' => 'success',
    'message' => 'Thank you! Your message has been sent successfully. We will get back to you shortly.'
]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo ?: $e->getMessage()]);
}
