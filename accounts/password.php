<?php
session_start();

if (isset($_SESSION['Email'])) {
    $firstName = $_SESSION['FirstName'];
    $lastName = $_SESSION['LastName'];
    $email = $_SESSION['Email'];
    $uid = $_SESSION['UID'];
    $role = $_SESSION['Role'];

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

    <section class="container-fluid accounts flex flex-column flex-wrap justify-center color-black">
        <div class="header-text">
            <h2 class="font-bold">Account</h2>
        </div>
        <div class="dashboard grid gap-5">
            
            <?php include '../components/accounts-sidepanel.php' ?>

            <div class="display flex flex-column">
                <!-- Change Contents for every page under ../accounts -->

                <div class="password-wrapper">
                    <h5>Change Password</h5>
                    <p>Use this form to change your password. Make sure to use a strong password to keep your account secure.</p>
                    <br>
                    <form action="" method="post">
                        <div class="form-group flex flex-column gap-5">
                            <input type="password" name="current-password" id="current-password" class="input" placeholder="Current Password" onfocus="showCheckbox('current-password')" required>
                            <div class="chkbox-container">
                                <input type="checkbox" onclick="showPassword('current-password')" checked>
                                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path>
                                </svg>
                                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path>
                                </svg>
                                <span>Show Password</span>
                            </div>

                            <input type="password" name="new-password" id="new-password" class="input" autocomplete="off" placeholder="New Password" required>
                            <div class="chkbox-container">
                                <input type="checkbox" onclick="showPassword('new-password')" checked>
                                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path>
                                </svg>
                                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path>
                                </svg>
                                <span>Show Password</span>
                            </div>

                            <p>Password must meet the following requirements:</p>
                            <ul class="password-requirements" id="password-criteria">
                                <li id="criteria-1">Password must be 8-15 characters long</li>
                                <li id="criteria-2">Must contain at least one number</li>
                                <li id="criteria-3">Must contain at least one uppercase letter</li>
                                <li id="criteria-4">Must contain at least one lowercase letter</li>
                                <li id="criteria-5">Must contain at least one special character</li>
                                <li id="criteria-6">Password must not contain spaces</li>
                            </ul>
                            <br>

                            <!-- Script: Listener for password criteria -->
                            <script>
                                var password = document.getElementById('new-password');
                                var criteria1 = document.getElementById('criteria-1');
                                var criteria2 = document.getElementById('criteria-2');
                                var criteria3 = document.getElementById('criteria-3');
                                var criteria4 = document.getElementById('criteria-4');
                                var criteria5 = document.getElementById('criteria-5');
                                var criteria6 = document.getElementById('criteria-6');

                                password.addEventListener('input', function() {
                                    var passwordValue = password.value;
                                    var criteriaMet = 0;

                                    if (password == null) {
                                        criteria1.style.color = 'var(--color-black-500)';
                                        criteria2.style.color = 'var(--color-black-500)';
                                        criteria3.style.color = 'var(--color-black-500)';
                                        criteria4.style.color = 'var(--color-black-500)';
                                        criteria5.style.color = 'var(--color-black-500)';
                                        criteria6.style.color = 'var(--color-black-500)';
                                    }

                                    if (passwordValue.length >= 8 && passwordValue.length <= 15) {
                                        criteria1.style.color = 'var(--color-success)';
                                        criteriaMet++;
                                    } else {
                                        criteria1.style.color = 'var(--color-danger)';
                                    }

                                    if (passwordValue.match(/[0-9]/)) {
                                        criteria2.style.color = 'var(--color-success)';
                                        criteriaMet++;
                                    } else {
                                        criteria2.style.color = 'var(--color-danger)';
                                    }

                                    if (passwordValue.match(/[A-Z]/)) {
                                        criteria3.style.color = 'var(--color-success)';
                                        criteriaMet++;
                                    } else {
                                        criteria3.style.color = 'var(--color-danger)';
                                    }

                                    if (passwordValue.match(/[a-z]/)) {
                                        criteria4.style.color = 'var(--color-success)';
                                        criteriaMet++;
                                    } else {
                                        criteria4.style.color = 'var(--color-danger)';
                                    }

                                    if (passwordValue.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
                                        criteria5.style.color = 'var(--color-success)';
                                        criteriaMet++;
                                    } else {
                                        criteria5.style.color = 'var(--color-danger)';
                                    }

                                    if (!passwordValue.match(/\s/)) {
                                        criteria6.style.color = 'var(--color-success)';
                                    } else {
                                        criteria6.style.color = 'var(--color-danger)';
                                    }
                                });
                            </script>

                            <input type="password" name="confirm-password" id="confirm-password" class="input" autocomplete="off" placeholder="Confirm Password" required>
                            <div class="chkbox-container">
                                <input type="checkbox" onclick="showPassword('confirm-password')" checked>
                                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path>
                                </svg>
                                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path>
                                </svg>
                                <span>Show Password</span>
                            </div>

                            <button type="submit" class="btn">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include '../components/footer.php'; ?>
    
    <script>
        function showPassword(id) {
            var password = document.getElementById(id);

            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
    </script>

    <?php
    require_once '../php/db.php';
    require_once '../php/filter-data.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentPassword = filterData($_POST['current-password']);
        $newPassword = filterData($_POST['new-password']);
        $confirmPassword = filterData($_POST['confirm-password']);

        $sql = "SELECT * FROM users WHERE UserID = '$uid'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row['Password'];

            if (password_verify($currentPassword, $password)) {
                if ($newPassword == $confirmPassword) {
                    // Check if the new password meets all the criteria
                    $criteriaMet = 0;

                    if (strlen($newPassword) >= 8 && strlen($newPassword) <= 15) {
                        $criteriaMet++;
                    }

                    if (preg_match('/[0-9]/', $newPassword)) {
                        $criteriaMet++;
                    }

                    if (preg_match('/[A-Z]/', $newPassword)) {
                        $criteriaMet++;
                    }

                    if (preg_match('/[a-z]/', $newPassword)) {
                        $criteriaMet++;
                    }

                    if (preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $newPassword)) {
                        $criteriaMet++;
                    }

                    if (!preg_match('/\s/', $newPassword)) {
                        $criteriaMet++;
                    }

                    if ($criteriaMet == 6) {
                        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT, $options);

                        $sql = "UPDATE users SET Password = '$hashedPassword' WHERE UserID = '$uid'";
                        $result = $conn->query($sql);

                        if ($result) {
                            echo <<<HTML
                            <div class="alert alert-success" role="alert">
                                <p>Password changed successfully.</p>
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            </div>
                            HTML;
                        } else {
                            echo <<<HTML
                            <div class="alert alert-danger" role="alert">
                                <p>Failed to change password.</p>
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            </div>
                            HTML;
                        }
                    } else {
                        echo <<<HTML
                        <div class="alert alert-warning" role="alert">
                            <p>Password does not meet the criteria.</p>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        </div>
                        HTML;
                    }
                } else {
                    echo <<<HTML
                    <div class="alert alert-danger" role="alert">
                        <p>Passwords do not match.</p>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    HTML;
                }
            } else {
                echo <<<HTML
                <div class="alert alert-danger" role="alert">
                    <p>Incorrect current password.</p>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                HTML;
            }
        }
    }

    $conn->close();
    ?>
</body>

</html>