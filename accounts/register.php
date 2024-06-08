<?php
session_start();

if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];
    $url = '../accounts/profile.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account</title>

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

    <header class="container-fluid flex justify-space-between align-items-center flex-wrap grow shrink bg-black-500 navigation" id="top">
        <div class="flex gap-20">
            <a href="../index.php" class="logo m-1">
                <svg viewBox="0 0 511.57 491.49">
                    <path class="fill-white" d="M440,35V317.6c0,2.65-1.05,5.2-2.93,7.07l-92.41,92.4c-1.88,1.88-4.42,2.93-7.07,2.93H205c-8.28,0-15-6.72-15-15v-70c0-8.28,6.72-15,15-15h120c8.28,0,15-6.72,15-15V135c0-8.28-6.72-15-15-15H155c-8.28,0-15,6.72-15,15V405c0,8.28-6.72,15-15,15H55c-8.28,0-15-6.72-15-15V35c0-8.28,6.72-15,15-15H425c8.28,0,15,6.72,15,15Z" />
                    <rect class="fill-white" x="210" y="190" width="60" height="60" />
                </svg>
            </a>

            <div class="nav-bar flex align-items-center color-white font-bold">
                <a href="../index.php" class="badge">Home</a>
                <a href="../collections/deals.php" class="badge sale" data-badge="Sale">Sale <span class="material-symbols-outlined" id="dropmenu"></span></a>

                <!-- Dropdown -->
                <div class="dropdown dd-sale p-5 color-black">
                    <div class="header">Pixel Plaza Promotions</div>
                    <div class="body grid grid-cols-5">
                        <a href="../collections/deals.php">Sales</a>
                        <!-- dropdown card template -->
                        <?php include '../php/generator/generate-dd_cards-parent_sourece.php'; ?>
                    </div>
                </div>

                <a href="../collections/all.php" class="badge new" data-badge="New">Products <span class="material-symbols-outlined" id="dropmenu"></span></a>

                <!-- Dropdown -->
                <div class="dropdown dd-products p-5">
                    <a href="../collections/keyboards.php">Keyboards</a>
                    <a href="../collections/mouse.php">Mouse</a>
                    <a href="../collections/headsets.php">Headsets</a>
                    <a href="../collections/switch.php">Switch</a>
                </div>

                <a href="../announcement.php" class="badge">Announcement</a>
            </div>
        </div>

        <div class="flex align-items-center gap-10 color-white shrink-0" style="min-height: 2.5rem;">

            <div class="search-field flex align-items-center gap-5">
                <input type="search" name="search" class="search-bar p-3 bg-white-500 rounded-md color-black shrink" placeholder="Search Products">

                <button class="search-btn" type="submit" title="search">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                        <path d="M781.69-136.92 530.46-388.16q-30 24.77-69 38.77-39 14-80.69 14-102.55 0-173.58-71.01-71.03-71.01-71.03-173.54 0-102.52 71.01-173.6 71.01-71.07 173.54-71.07 102.52 0 173.6 71.03 71.07 71.03 71.07 173.58 0 42.85-14.38 81.85-14.39 39-38.39 67.84l251.23 251.23-42.15 42.16ZM380.77-395.38q77.31 0 130.96-53.66 53.66-53.65 53.66-130.96t-53.66-130.96q-53.65-53.66-130.96-53.66t-130.96 53.66Q196.15-657.31 196.15-580t53.66 130.96q53.65 53.66 130.96 53.66Z" />
                    </svg>
                </button>
            </div>

            <a href="<?php echo $url ?? '../accounts/login.php' ?>" data-tooltip="Account" class="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#e8eaed">
                    <path d="M480-492.31q-57.75 0-98.87-41.12Q340-574.56 340-632.31q0-57.75 41.13-98.87 41.12-41.13 98.87-41.13 57.75 0 98.87 41.13Q620-690.06 620-632.31q0 57.75-41.13 98.88-41.12 41.12-98.87 41.12ZM180-187.69v-88.93q0-29.38 15.96-54.42 15.96-25.04 42.66-38.5 59.3-29.07 119.65-43.61 60.35-14.54 121.73-14.54t121.73 14.54q60.35 14.54 119.65 43.61 26.7 13.46 42.66 38.5Q780-306 780-276.62v88.93H180Zm60-60h480v-28.93q0-12.15-7.04-22.5-7.04-10.34-19.11-16.88-51.7-25.46-105.42-38.58Q534.7-367.69 480-367.69q-54.7 0-108.43 13.11-53.72 13.12-105.42 38.58-12.07 6.54-19.11 16.88-7.04 10.35-7.04 22.5v28.93Zm240-304.62q33 0 56.5-23.5t23.5-56.5q0-33-23.5-56.5t-56.5-23.5q-33 0-56.5 23.5t-23.5 56.5q0 33 23.5 56.5t56.5 23.5Zm0-80Zm0 384.62Z" />
                </svg>
            </a>
            <a href="#" data-tooltip="Cart" class="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed">
                    <path d="M252.31-100Q222-100 201-121q-21-21-21-51.31v-455.38Q180-658 201-679q21-21 51.31-21H330v-10q0-62.15 43.92-106.08Q417.85-860 480-860t106.08 43.92Q630-772.15 630-710v10h77.69Q738-700 759-679q21 21 21 51.31v455.38Q780-142 759-121q-21 21-51.31 21H252.31Zm0-60h455.38q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46v-455.38q0-4.62-3.85-8.46-3.84-3.85-8.46-3.85H630v90q0 12.77-8.62 21.38Q612.77-520 600-520t-21.38-8.62Q570-537.23 570-550v-90H390v90q0 12.77-8.62 21.38Q372.77-520 360-520t-21.38-8.62Q330-537.23 330-550v-90h-77.69q-4.62 0-8.46 3.85-3.85 3.84-3.85 8.46v455.38q0 4.62 3.85 8.46 3.84 3.85 8.46 3.85ZM390-700h180v-10q0-37.61-26.19-63.81Q517.62-800 480-800q-37.62 0-63.81 26.19Q390-747.61 390-710v10ZM240-160v-480 480Z" />
                </svg>
            </a>
        </div>
    </header>

    <section class="signup-field grid grid-cols-1 justify-items-center">
        <main>
            <div class="register-form">
                <h1 class="font-bold">Register</h1>
                <form class="grid gap-5" action="" method="POST" target="_parent">
                    <input type="text" name="first_name" id="" placeholder="First Name" required />
                    <input type="text" name="last_name" id="" placeholder="Last Name" required />
                    <input type="email" name="email" id="" placeholder="Email" required />
                    <input type="password" name="password" id="" placeholder="Password" required />

                    <p>Sign up for our newsletter to receive updates on new products, exclusive deals, and more!</p>

                    <input type="submit" name="submit" class="btn btn-primary" value="Register">
                    <a class="btn btn-secondary" href="./login.php">Login</a>

                </form>
            </div>
        </main>
    </section>

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
                    <a href="#" class="link">Keyboards</a>
                    <a href="#" class="link">Mouse</a>
                    <a href="#" class="link">Headsets</a>
                    <a href="#" class="link">Switch</a>
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

    <?php
    require_once '../php/db.php';
    include '../php/filter-data.php';

    if (isset($_POST['submit'])) {
        $first_name = filterData($_POST['first_name']);
        $last_name = filterData($_POST['last_name']);
        $email = filterData($_POST['email']);
        $password = filterData($_POST['password']);

        // Check if email already exists
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $check_email_result = $conn->query($check_email_query);

        if ($check_email_result->num_rows > 0) {
            echo <<<HTML
                <div class="alert alert-danger">
                    <p>Email already exists</p>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                HTML;
        } else {
            // Hash password
            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $sql = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES ('$first_name', '$last_name', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo <<<HTML
                    <div class="alert alert-success">
                        <p>Account created successfully</p>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    HTML;
            } else {
                return <<<HTML
                    <div class="alert alert-danger">
                        <p>Error: $conn->error</p>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    HTML;
            }
        }
    }

    ?>
</body>

</html>