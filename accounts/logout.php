<?php
session_start();

// Logout user
echo "Logging out...";

// Destroy the session.
session_unset();
session_destroy();

// Redirect to login page
header("location: ../index.php");
exit;
?>