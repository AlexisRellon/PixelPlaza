<?php
session_start();

require_once '../php/db.php'; // Ensure this file correctly sets up $conn

// Fetch the product details
$productId = intval($_GET['productID'] ?? 0); // Use intval to prevent SQL injection and set default value to 0 if not provided

$sql = "SELECT * FROM products WHERE ProductID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    $product = [];
}

// Apply the product details to the template
$brandName = '';
if ($product['BrandID'] == 1) {
    $brandName = 'Akko';
} else if ($product['BrandID'] == 2) {
    $brandName = 'Rakk';
} else if ($product['BrandID'] == 3) {
    $brandName = 'Red Dragon';
}

$productName = $product['Name'];
$price = $product['Price'];
$salePrice = $product['SalePrice'];
$description = $product['Description'];
$imageURL = $product['ImageURL'];

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

<style>
    .view-product {
        display: grid;
        grid-template-columns: 1fr 1fr;

        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
    }

    .add-cart {
        padding: 10px 20px;
        background-color: var(--color-primary);
        color: var(--color-white);
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;

        &:hover {
            background-color: var(--color-secondary);
        }
    }
</style>

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
        <!-- Display the item selected -->
        <div class="view-product">
            <div class="product-img">
                 <!-- DEBUG: error echo print_r($product) . ' get:' . $_GET['productID'] . ' id: ' . $product['ProductID']  -->
                <img src="<?php echo $imageURL; ?>" alt="">
            </div>
            <div class="product-details">
                <div class="product-info">
                    <h1 class="product-name font-bold"><?php echo $productName ?></h1>
                    <p class="product-brand">Brand: <?php echo $brandName ?></p>
                    <?php if ($salePrice): ?>
                        <div class="price-wrapper">
                            <p class="product-price">Price: <del>₱ <?php echo $price ?></del></p>
                            <p class="product-sale-price">Sale Price: ₱ <?php echo $salePrice ?></p>
                        </div>
                    <?php else: ?>
                        <div class="price-wrapper">
                            <p class="product-price">Price: ₱ <?php echo $price ?></p>
                        </div>
                    <?php endif; ?>
                    <p class="product-description"><?php echo $description ?></p>
                </div>
                <a href="../cart/cart.php?productID=<?php echo $productId ?>" class="add-cart">ADD TO CART</a>
            </div>
        </div>
    </section>

    <?php include '../components/footer.php'; ?>

</body>

</html>
<?php $conn->close(); ?>