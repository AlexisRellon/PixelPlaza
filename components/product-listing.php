<?php

require_once '../php/db.php';

// Fetch product details from the database or any other data source
$products = fetchAllProducts($conn);

?>

<style>
    .sale-price {
        color: var(--color-primary);
        font-weight: 700;
    }
</style>

<div class="products-card grid grid-cols-3 gap-5">
    <?php foreach ($products as $product): ?>
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

                <?php if ($salePrice > 0): ?>
                    <div class="price-wrapper">
                        <del class="price text-base"><?php echo $price; ?></del>
                        <p class="sale-price text-base"><?php echo $salePrice; ?></p>
                    </div>
                <?php else: ?>
                    <div class="price-wrapper">
                        <p class="price text-base"><?php echo $price; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </a>
    <?php endforeach; ?>
</div>
