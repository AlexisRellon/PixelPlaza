<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>

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
    <a type="button" class="to-top absolute rounded-full fixed" href="#" id="to-top-button">
        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed">
            <path d="m480-541.85-184 184L253.85-400 480-626.15 706.15-400 664-357.85l-184-184Z" />
        </svg>
    </a>

    <script>
        window.addEventListener('scroll', function() {
            var scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight) * 100;

            if (scrollPercentage > 8) {
                document.getElementById('to-top-button').style.display = 'block';
                document.getElementById('to-top-button').style.opacity = '1';
            } else {
                document.getElementById('to-top-button').style.display = 'none';
                document.getElementById('to-top-button').style.opacity = '0';
            }
        });
    </script>

    <?php include '../components/header.php' ?>

    <section class="container-fluid accounts flex flex-column flex-wrap justify-center color-black">
        <!-- Show Product Listing -->
        <?php

        require_once '../php/db.php';

        // Fetch product details from the database or any other data source
        $categoryId = 2;
        $products = fetchProductsByCategory($conn, $categoryId);

        ?>

        <style>
            .sale-price {
                color: var(--color-primary);
                font-weight: 700;
            }
        </style>

        <div class="products-card grid grid-cols-3 gap-5">
            <?php foreach ($products as $product) : ?>
                <?php
                // Apply the product details to the template
                $brandName = '';

                if ($product['BrandID'] == 1) {
                    $brandName = 'Akko';
                } else if ($product['BrandID'] == 2) {
                    $brandName = 'Rakk';
                } else if ($product['BrandID'] == 3) {
                    $brandName = 'Red Dragon';
                }

                $productId = $product['ProductID'];
                $productName = $product['Name'];
                $price = $product['Price'];
                $salePrice = $product['SalePrice'];
                $productImage = $product['ImageURL'];
                ?>

                <a class="card p-5 flex flex-column justify-space-between border border-gray-500 border-rounded-lg" href="../collections/product-page.php?productID=<?php echo $productId; ?>">
                    <img src="<?php echo $productImage ?>" alt="" loading="lazy">
                    <div class="product-details w-100 text-center">
                        <p class="brand font-bold text-sm"><?php echo $brandName; ?></p>
                        <p class="product font-extrabold text-2xl"><?php echo $productName; ?></p>

                        <?php if ($salePrice) : ?>
                            <div class="price-wrapper">
                                <del class="price text-base"><?php echo $price; ?></del>
                                <p class="sale-price text-base"><?php echo $salePrice; ?></p>
                            </div>
                        <?php else : ?>
                            <div class="price-wrapper">
                                <p class="price text-base"><?php echo $price; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </section>

    <?php include '../components/footer.php'; ?>

</body>

</html>