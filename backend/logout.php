<?php
ob_start();

require_once 'connection.php';
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("location: " . BASE_URL . "login");
exit; // Ensure that no other code is executed after the redirect
?>