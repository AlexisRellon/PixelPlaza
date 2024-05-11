<?php
/* 122602 */


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";


 /* 
$servername = "sql209.infinityfree.com";
$username = "if0_36527012";
$password = "QYRAQ3ZpnK1U";
$dbname = "";
 */

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>