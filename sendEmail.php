<?php

if(isset($_POST['submit'])) {
  // Recipient email address
  require_once 'dbh.php';
  require_once 'functions.php';
  $to = $_POST['email'];
  
  // Subject of the email
  $subject = 'Password Reset';

  // Message body
  $message = 'Hello, this is your temporary password. Please login with this and reset your account: Abc__ef!g';

  // Additional headers
  $headers = 'From: your_email@gmail.com' . "\r\n" .
      'Reply-To: your_email@gmail.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  // SMTP server settings for Gmail
  $smtpServer = 'smtp.gmail.com';
  $smtpUsername = 'ubhousemates@gmail.com';
  $smtpPassword = 'abc__ef!g';
  $smtpPort = 587; // or 465 for SSL/TLS

  // Enable SMTP authentication and TLS encryption
  $smtpAuth = true;
  $smtpEncryption = 'tls';

  // Configure PHP to use Gmail SMTP server
  ini_set('SMTP', $smtpServer);
  ini_set('smtp_port', $smtpPort);
  ini_set('username', $smtpUsername);
  ini_set('password', $smtpPassword);
  ini_set('auth', $smtpAuth);
  ini_set('tls', $smtpEncryption);

  // Send the email
  if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully
    $newP = 'Abc__ef!g'
    updatePassword($conn, $email, $username, $newP)
    echo 'Email sent successfully.';
  } else {
    // Failed to send email
    echo 'Failed to send email.';
  }
}
?>
