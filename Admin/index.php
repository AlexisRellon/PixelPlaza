<?php
session_start();

if (!isset($_SESSION['Role']) || $_SESSION['Role'] != 1) {
    header('Location: ../');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Pixel Plaza is a e-commerce platform to buy the best computer peripherals in the market.">
    <meta name="author" content="Pixel Plaza">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="English">

    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/global-style.css">
    <link rel="stylesheet" href="../css/utility.min.css">

    <!-- link to google font material icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="shortcut icon" href="../img/brand-logo-white.png" type="image/x-icon">
    <link rel="icon" href="../img/brand-logo-white.png" type="image/x-icon">

    <script src="../js/script.js"></script>


</head>
<body>
    
</body>
</html>