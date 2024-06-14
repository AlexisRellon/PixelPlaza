<?php
require_once './php/db.php';

// Fetch 4 sale products from the database to display in the dropdown menu of the header. ASCENDING ORDER
$products = fetchLatestSaleProducts($conn);

foreach ($products as $product) {
    $productID = $product['ProductID'];
    $product_name = $product['Name'];
    $price = $product['Price'];
    $sale_price = $product['SalePrice'];
    $imageURL = $product['ImageURL'];

    // trim the url to make it './' + 'path/to/image.jpg'
    $imageURL = '.' . ltrim($imageURL, '.');
?>

<div class="dd-card flex flex-column justify-space-between align-items-center gap-1">
    <img src="<?php echo $imageURL ?>" loading="lazy" alt="">
    <h5><?php echo $product_name; ?></h5>
    <div class="flex gap-1">
        <del>₱<?php echo $price; ?></del>
        <p class="m-0">₱ <?php echo $sale_price; ?></p>
    </div>
    <a href="./collections/product-page.php?productID=<?php echo $productID; ?>" class="add-cart">ADD TO CART</a>
</div>

<?php
}
?>