<?php
// Replace this with your email
$to = "supercjv@gmail.com";

// Sanitize and collect form data
$name = htmlspecialchars(trim($_POST['Name']));
$email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars(trim($_POST['Subject']));
$comment = htmlspecialchars(trim($_POST['Comment']));

// Email subject and message
$email_subject = "New Contact Form Submission: $subject";
$email_body = "You have received a new message from your website contact form.\n\n" .
              "Name: $name\n" .
              "Email: $email\n" .
              "Subject: $subject\n" .
              "Comment:\n$comment";

// Email headers
$headers = "From: noreply@yourdomain.com\r\n";
$headers .= "Reply-To: $email\r\n";

// Send the email
$success = mail($to, $email_subject, $email_body, $headers);

// Feedback to the user
if ($success) {
    echo "<h1>Thank you!</h1><p>Your message has been sent successfully.</p>";
} else {
    echo "<h1>Oops!</h1><p>Something went wrong, and we couldn't send your message.</p>";
}
?>
