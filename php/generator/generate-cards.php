<?php

function generateTemplate($brand, $name, $price)
{
    echo <<<HTML
<div class="card p-5 flex flex-column justify-start">
    <!-- Hover toolbar -->
    <div class="hover-toolbar flex justify-center align-items-center self-center">
        <button class="button view" data-tooltip="Quick View">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                <path d="M480-312q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Zm0-72q-40 0-68-28t-28-68q0-40 28-68t68-28q40 0 68 28t28 68q0 40-28 68t-68 28Zm0 192q-142.6 0-259.8-78.5Q103-349 48-480q55-131 172.2-209.5Q337.4-768 480-768q142.6 0 259.8 78.5Q857-611 912-480q-55 131-172.2 209.5Q622.6-192 480-192Zm0-288Zm0 216q112 0 207-58t146-158q-51-100-146-158t-207-58q-112 0-207 58T127-480q51 100 146 158t207 58Z" />
                            </svg>
        </button>
        <button class="button cart" data-tooltip="Add to Cart">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                <path d="M444-576v-132H312v-72h132v-132h72v132h132v72H516v132h-72ZM263.79-96Q234-96 213-117.21t-21-51Q192-198 213.21-219t51-21Q294-240 315-218.79t21 51Q336-138 314.79-117t-51 21Zm432 0Q666-96 645-117.21t-21-51Q624-198 645.21-219t51-21Q726-240 747-218.79t21 51Q768-138 746.79-117t-51 21ZM48-792v-72h133l155 360h301l113-264h78L703-476q-9 20-26.5 32T637-432H317l-42 72h493v72H276q-42 0-63-36.5t0-71.5l52-90-131-306H48Z" />
                            </svg>
        </button>
    </div>
    <img src="./img/assets/No-image-thumbnail.png" alt="" loading="lazy" class="product-image">
    <div class="product-details w-100 text-center">
        <p class="brand font-bold text-sm">$brand</p>
        <p class="product font-extrabold text-2xl">$name</p>
        <p class="price text-base">₱ $price</p>
    </div>
</div>
HTML;
}

// Repeat the template 8 times using a for loop
for ($i = 0; $i < 8; $i++) {
    // Replace placeholders with actual data (e.g., brand, name, price)
    $product = [
        'brand' => '{Brand}',
        'name' => '{Product Name}',
        'price' => '{Price}', // Replace with the actual price
    ];

    // Generate and output the template
    echo generateTemplate($product['brand'], $product['name'], $product['price']);
}
