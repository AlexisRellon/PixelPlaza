<?php

echo <<<HTML
<footer class="container-fluid bg-black-500 flex flex-column gap-15 footer">
        <div class="footer-header color-white flex justify-space-between align-items-center gap-10">
            <div class="flex justify-space-between">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.57 491.49" width="4rem">
                    <path class="fill-white
                    " d="M440,35V317.6c0,2.65-1.05,5.2-2.93,7.07l-92.41,92.4c-1.88,1.88-4.42,2.93-7.07,2.93H205c-8.28,0-15-6.72-15-15v-70c0-8.28,6.72-15,15-15h120c8.28,0,15-6.72,15-15V135c0-8.28-6.72-15-15-15H155c-8.28,0-15,6.72-15,15V405c0,8.28-6.72,15-15,15H55c-8.28,0-15-6.72-15-15V35c0-8.28,6.72-15,15-15H425c8.28,0,15,6.72,15,15Z" />
                    <rect class="fill-white
                    " x="210" y="190" width="60" height="60" />
                </svg>
            </div>
            <div class="flex gap-10 align-end">
                <div class="policy-links font-extrabold m-1 flex gap-10">
                    <a href="#" class="link">Shipping Policy</a>
                    <a href="#" class="link">Return Policy</a>
                    <a href="#" class="link">Replacement Policy</a>
                    <a href="#" class="link">Warranty</a>
                </div>
            </div>
        </div>
        <div class="footer-body color-white flex justify-space-between align-items-center">
            <div class="site-map flex">
                <div class="company flex flex-column gap-3">
                    <h6 class="font-bold">Company</h6>
                    <a href="#" class="link">About Us</a>
                    <a href="#" class="link">Contact Us</a>
                    <a href="#" class="link">Careers</a>
                    <a href="#" class="link">Press</a>
                </div>
                <div class="products flex flex-column gap-3">
                    <h6 class="font-bold">Products</h6>
                    <a href="../collections/all.php" class="link">all</a>
                    <a href="../collections/keyboards.php" class="link">Keyboards</a>
                    <a href="../collections/mouse.php" class="link">Mouse</a>
                    <a href="../collections/headsets.php" class="link">Headsets</a>
                    <a href="../collections/switch.php" class="link">Switch</a>
                </div>
                <div class="online-store flex flex-column gap-3">
                    <h6 class="font-bold">Online Stores</h6>
                    <a href="#" class="link">Amazon</a>
                    <a href="#" class="link">eBay</a>
                    <a href="#" class="link">Best Buy</a>
                    <a href="#" class="link">Walmart</a>
                    <a href="#" class="link">Target</a>
                </div>
                <div class="support flex flex-column gap-3">
                    <h6 class="font-bold">Support</h6>
                    <a href="mailto:moovemberdev@gmail.com" class="link">support@pixelplaza.com</a>
                    <a href="tel:" class="link">+1 800-123-4567</a>
                </div>
            </div>
        </div>
        <div class="footer-footer color-white flex justify-space-between ">
            <div class="social-media flex gap-10">
                <a href="#" class="link">Facebook</a>
                <a href="#" class="link">Twitter</a>
                <a href="#" class="link">Instagram</a>
                <a href="#" class="link">Youtube</a>
            </div>
            <div class="copy-right">
                <p>&copy; 2024 Pixel Plaza. All rights reserved.</p>
            </div>
        </div>
    </footer>
HTML;
