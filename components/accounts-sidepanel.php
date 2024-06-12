<?php

echo <<<HTML
<div class="menus flex flex-column gap-5">
    
                <a href="profile.php" class="menU">Dashboard</a>
HTML;

if (isset($_SESSION['Role']) && $role == 1) {
    echo '
                <a href="../Admin/" class="menu">Admin Panel</a>
    ';
}

echo <<<HTML
            <a href="orders.php" class="menu">Orders</a>
                <a href="addresses.php" class="menu">Addresses</a>
                <a href="password.php" class="menu">Change Password</a>
                <a href="logout.php" class="menu logout">Logout</a>

            </div>
HTML;

?>