<?php

/**
 * This file contains the database connection and functions to fetch data from the database.
 */

$options = [
    'cost' => 12
];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixelplaza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * Fetches all users from the database.
 *
 * @param mysqli $conn The database connection object.
 * @return array An array of user records.
 */
function fetchAllUsers($conn)
{
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

/**
 * Fetches all products from the database.
 *
 * @param mysqli $conn The database connection object.
 * @return array An array of product records.
 */
function fetchAllProducts($conn)
{
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

/**
 * Fetches all orders from the database.
 *
 * @param mysqli $conn The database connection object.
 * @return array An array of order records.
 */
function fetchAllOrders($conn)
{
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

/**
 * Fetches the total sales from the database.
 *
 * @param mysqli $conn The database connection object.
 * @return array The total sales amount.
 */
function fetchTotalSales($conn)
{
    $sql = "SELECT SUM(TotalAmount) as TotalSales FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return [];
    }
}

function fetchNewUsers($conn)
{
    $sql = "SELECT * FROM users WHERE CreatedAt >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY CreatedAt DESC LIMIT 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

?>