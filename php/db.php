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
 * Fetches all products from the database by category.
 *
 * @param mysqli $conn The database connection object.
 * @param int $categoryId The category ID.
 * @return array An array of product records.
 */
function fetchProductsByCategory($conn, $categoryId)
{
    $sql = "SELECT * FROM products WHERE CategoryID = '$categoryId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function fetchAllProductsSale($conn)
{
    $sql = "SELECT * FROM products WHERE SalePrice != 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
        echo '<p>' . $result . '</p>';
    } else {
        return [];
    }
}

function fetchLatestSaleProducts($conn)
{
    $sql = "SELECT * FROM products WHERE `SalePrice` != 0 ORDER BY `SalePrice` ASC LIMIT 4";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function fetchBrowseProducts($conn)
{
    $sql = "SELECT * FROM products ORDER BY `SalePrice` ASC LIMIT 8";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function fetchProduct($conn, $productId)
{
    $sql = "SELECT * FROM products WHERE ProductID = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
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

/**
 * Fetches new users created within the last 7 days.
 *
 * @param mysqli $conn The database connection object.
 * @return array An array of associative arrays representing the fetched users.
 */
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

/**
 * Adds an item to the cart.
 *
 * @param mysqli $conn The database connection object.
 * @param int $uid The user ID.
 * @param int $pid The product ID.
 * @param int $quantity The quantity of the item.
 * @return bool Returns true if the item was added successfully, false otherwise.
 */
function addItemToCart($conn, $uid, $pid, $quantity)
{
    $sql = "INSERT INTO cart (UID, PID, Quantity) VALUES ('$uid', '$pid', '$quantity')";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * Fetches the cart items for a given user ID.
 *
 * @param mysqli $conn The database connection object.
 * @param int $uid The user ID.
 * @return array The cart items as an associative array, or an empty array if no items found.
 */
function fetchCartItems($conn, $uid)
{
    $sql = "SELECT * FROM cart WHERE UID = '$uid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

?>