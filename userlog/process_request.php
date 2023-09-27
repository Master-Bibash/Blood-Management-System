<?php
// Start the session (if not already started)
session_start();

// Your processing logic goes here (you can handle the request processing)

// Show an alert message
echo "<script>alert('The request has been processed.');</script>";

// Redirect to userdashboard.php
header("Location: userdashboard.php");
exit(); // Make sure to exit after redirection
?>
