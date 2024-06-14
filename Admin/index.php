<?php
session_start();

ob_start();

if (!isset($_SESSION['Role']) || $_SESSION['Role'] != 1) {
    header('Location: ../');
    exit('You are not allowed to access this page.');
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

<body style="
display: grid;
grid-template-columns: 265px 3fr;
">
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="side-bar h-screen flex flex-column gap-5 justify-content-center align-items center fixed">
        <a href="../" class="nav-header w-fit flex justify-content-center align-items-center gap-3">
            <img src="../img/brand-logo-white.png" alt="Pixel Plaza Logo" class="brand-logo
            margin-bottom-10" width="32px">
            <h3 class="color-white font-bold">Pixel Plaza</h3>
        </a>
        <div class="nav-body flex flex-column gap-5 justify-content-center align-items-center color-white">
            <h6 class="self-start">Admin Dashboard</h6>
            <a class="link-container w-100 flex flex-start gap-5" href="./">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                </svg>
                <p>Dashboard</p>
            </a>
            <a class="link-container w-100 flex flex-start gap-5" href="./?page=manage-products">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z" />
                </svg>
                <p>Manage Products</p>
            </a>
            <a class="link-container w-100 flex flex-start gap-5" href="./?page=manage-users">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                </svg>
                <p>Manage Users</p>
            </a>
            <a class="link-container w-100 flex flex-start gap-5" href="./?page=manage-orders">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z" />
                </svg>
                <p>Manage Orders</p>
            </a>
        </div>
    </div>
    <div class="section-2">
        <header class="top flex justify-end align-items-center bg-white-500">
            <p>Hello, <i><?php echo $_SESSION['FirstName'] ?></i></p>
        </header>
        <section class="panel">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 'manage-products') {
                    include 'manage-products.php';
                } elseif ($page == 'manage-users') {
                    include 'manage-users.php';
                } elseif ($page == 'manage-orders') {
                    include 'manage-orders.php';
                }
            } else {
                include 'dashboard.php';
            }
            ?>
        </section>
    </div>
</body>
<?php ob_end_flush(); ?>
</html>