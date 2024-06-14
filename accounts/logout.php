<?php
session_start();

// Logout user
echo "Logging out...";

require_once "../php/db.php";
// Set the user's status to offline
$sql = "UPDATE users SET OnlineStatus = 0 WHERE Email = '" . $_SESSION['Email'] . "'";
$conn->query($sql);

// Destroy the session.
session_unset();
session_destroy();

// Redirect to login page
header("location: ../index.php");
exit;
