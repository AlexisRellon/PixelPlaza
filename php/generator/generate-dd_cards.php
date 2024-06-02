<?php
function generateCards_dd($product_name, $price, $sale_price)
{
    return <<<HTML
            <div class="dd-card flex flex-column align-items-center gap-1">
                <img src="../img/assets/No-image-thumbnail.png" loading="lazy" alt="">
                <h5>$product_name</h5>
                <div class="flex gap-1">
                    <del>₱{$price}</del>
                    <p class="m-0">₱ $sale_price</p>
                </div>
                <input type="button" value="ADD TO CART">
            </div>
HTML;
}

for ($i = 0; $i < 4; $i++) {
    echo generateCards_dd('Product Name', 1000, 800);
}
?>