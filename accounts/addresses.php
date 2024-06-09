<?php
session_start();

if (isset($_SESSION['Email'])) {
    $firstName = $_SESSION['FirstName'];
    $lastName = $_SESSION['LastName'];
    $email = $_SESSION['Email'];
    $uid = $_SESSION['UID'];
    $role = $_SESSION['Role'];
    $country = $_SESSION['Country'];

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
            <div class="menus flex flex-column gap-5">
                <a href="profile.php" class="menu">Dashboard</a>
                <?php
                if (isset($_SESSION['Role']) && $role == 1) {
                    echo '<a href="admin.php" class="menu">Admin Panel</a>';
                }
                ?>
                <a href="orders.php" class="menu">Orders</a>
                <a href="addresses.php" class="menu active">Addresses</a>
                <a href="password.php" class="menu">Change Password</a>
                <a href="logout.php" class="menu logout">Logout</a>
            </div>
            <div class="display flex flex-column">
                <!-- Change Contents for every page under ../accounts -->

                <div class="address-wrapper">
                    <h5>Your Address</h5>
                    <br>
                    <form class="address-form" action="" method="post">
                        <label>Name</label>
                        <div class="grouped-input">
                            <input type="text" name="FirstName" value="<?php echo $firstName ?>" disabled required>
                            <input type="text" name="LastName" value="<?php echo $lastName ?>" disabled disabled required>
                        </div>
                        <label for="Email">Email</label>
                        <input type="email" name="Email" value="<?php echo $email ?>" disabled disabled required>
                        <label for="Phone">Phone</label>
                        <input type="tel" name="Phone" placeholder="Phone" pattern="[0-9]{11}" disabled required>
                        <label for="Address">Address</label>
                        <input type="text" name="Address" placeholder="Address" disabled required>
                        <label for="City">City</label>
                        <input type="text" name="City" placeholder="City" disabled required>
                        <label for="State">State</label>
                        <input type="text" name="State" placeholder="State" disabled required>
                        <label for="ZipCode">Zip Code</label>
                        <input type="text" name="ZipCode" placeholder="Zip Code" disabled required>
                        <label for="Country">Country</label>
                        <select name="Country" disabled required>
                            <option value="">-- Select Country --</option>
                            <option <?php echo ($country == 'Australia') ? 'selected' : ''; ?> value="Australia">Australia</option>
                            <option <?php echo ($country == 'Afghanistan') ? 'selected' : ''; ?> value="Afghanistan">Afghanistan</option>
                            <option <?php echo ($country == 'Albania') ? 'selected' : ''; ?> value="Albania">Albania</option>
                            <option <?php echo ($country == 'Algeria') ? 'selected' : ''; ?> value="Algeria">Algeria</option>
                            <option <?php echo ($country == 'Andorra') ? 'selected' : ''; ?> value="Andorra">Andorra</option>
                            <option <?php echo ($country == 'Angola') ? 'selected' : ''; ?> value="Angola">Angola</option>
                            <option <?php echo ($country == 'Antigua and Barbuda') ? 'selected' : ''; ?> value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option <?php echo ($country == 'Argentina') ? 'selected' : ''; ?> value="Argentina">Argentina</option>
                            <option <?php echo ($country == 'Armenia') ? 'selected' : ''; ?> value="Armenia">Armenia</option>
                            <option <?php echo ($country == 'Aruba') ? 'selected' : ''; ?> value="Aruba">Aruba</option>
                            <option <?php echo ($country == 'Australia') ? 'selected' : ''; ?> value="Australia">Australia</option>
                            <option <?php echo ($country == 'Austria') ? 'selected' : ''; ?> value="Austria">Austria</option>
                            <option <?php echo ($country == 'Azerbaijan') ? 'selected' : ''; ?> value="Azerbaijan">Azerbaijan</option>
                            <option <?php echo ($country == 'Bahamas') ? 'selected' : ''; ?> value="Bahamas">Bahamas</option>
                            <option <?php echo ($country == 'Bahrain') ? 'selected' : ''; ?> value="Bahrain">Bahrain</option>
                            <option <?php echo ($country == 'Bangladesh') ? 'selected' : ''; ?> value="Bangladesh">Bangladesh</option>
                            <option <?php echo ($country == 'Barbados') ? 'selected' : ''; ?> value="Barbados">Barbados</option>
                            <option <?php echo ($country == 'Belarus') ? 'selected' : ''; ?> value="Belarus">Belarus</option>
                            <option <?php echo ($country == 'Belgium') ? 'selected' : ''; ?> value="Belgium">Belgium</option>
                            <option <?php echo ($country == 'Belize') ? 'selected' : ''; ?> value="Belize">Belize</option>
                            <option <?php echo ($country == 'Benin') ? 'selected' : ''; ?> value="Benin">Benin</option>
                            <option <?php echo ($country == 'Bermuda') ? 'selected' : ''; ?> value="Bermuda">Bermuda</option>
                            <option <?php echo ($country == 'Bhutan') ? 'selected' : ''; ?> value="Bhutan">Bhutan</option>
                            <option <?php echo ($country == 'Bolivia') ? 'selected' : ''; ?> value="Bolivia">Bolivia</option>
                            <option <?php echo ($country == 'Bosnia and Herzegovina') ? 'selected' : ''; ?> value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option <?php echo ($country == 'Botswana') ? 'selected' : ''; ?> value="Botswana">Botswana</option>
                            <option <?php echo ($country == 'Brazil') ? 'selected' : ''; ?> value="Brazil">Brazil</option>
                            <option <?php echo ($country == 'Brunei') ? 'selected' : ''; ?> value="Brunei">Brunei</option>
                            <option <?php echo ($country == 'Bulgaria') ? 'selected' : ''; ?> value="Bulgaria">Bulgaria</option>
                            <option <?php echo ($country == 'Burkina Faso') ? 'selected' : ''; ?> value="Burkina Faso">Burkina Faso</option>
                            <option <?php echo ($country == 'Burundi') ? 'selected' : ''; ?> value="Burundi">Burundi</option>
                            <option <?php echo ($country == 'Cabo Verde') ? 'selected' : ''; ?> value="Cabo Verde">Cabo Verde</option>
                            <option <?php echo ($country == 'Cambodia') ? 'selected' : ''; ?> value="Cambodia">Cambodia</option>
                            <option <?php echo ($country == 'Cameroon') ? 'selected' : ''; ?> value="Cameroon">Cameroon</option>
                            <option <?php echo ($country == 'Canada') ? 'selected' : ''; ?> value="Canada">Canada</option>
                            <option <?php echo ($country == 'Central African Republic') ? 'selected' : ''; ?> value="Central African Republic">Central African Republic</option>
                            <option <?php echo ($country == 'Chad') ? 'selected' : ''; ?> value="Chad">Chad</option>
                            <option <?php echo ($country == 'Chile') ? 'selected' : ''; ?> value="Chile">Chile</option>
                            <option <?php echo ($country == 'China') ? 'selected' : ''; ?> value="China">China</option>
                            <option <?php echo ($country == 'Colombia') ? 'selected' : ''; ?> value="Colombia">Colombia</option>
                            <option <?php echo ($country == 'Comoros') ? 'selected' : ''; ?> value="Comoros">Comoros</option>
                            <option <?php echo ($country == 'Congo') ? 'selected' : ''; ?> value="Congo">Congo</option>
                            <option <?php echo ($country == 'Costa Rica') ? 'selected' : ''; ?> value="Costa Rica">Costa Rica</option>
                            <option <?php echo ($country == 'Croatia') ? 'selected' : ''; ?> value="Croatia">Croatia</option>
                            <option <?php echo ($country == 'Cuba') ? 'selected' : ''; ?> value="Cuba">Cuba</option>
                            <option <?php echo ($country == 'Curacao') ? 'selected' : ''; ?> value="Curacao">Curacao</option>
                            <option <?php echo ($country == 'Cyprus') ? 'selected' : ''; ?> value="Cyprus">Cyprus</option>
                            <option <?php echo ($country == 'Czech Republic') ? 'selected' : ''; ?> value="Czech Republic">Czech Republic</option>
                            <option <?php echo ($country == 'Denmark') ? 'selected' : ''; ?> value="Denmark">Denmark</option>
                            <option <?php echo ($country == 'Djibouti') ? 'selected' : ''; ?> value="Djibouti">Djibouti</option>
                            <option <?php echo ($country == 'Dominica') ? 'selected' : ''; ?> value="Dominica">Dominica</option>
                            <option <?php echo ($country == 'Dominican Republic') ? 'selected' : ''; ?> value="Dominican Republic">Dominican Republic</option>
                            <option <?php echo ($country == 'East Timor') ? 'selected' : ''; ?> value="East Timor">East Timor</option>
                            <option <?php echo ($country == 'Ecuador') ? 'selected' : ''; ?> value="Ecuador">Ecuador</option>
                            <option <?php echo ($country == 'Egypt') ? 'selected' : ''; ?> value="Egypt">Egypt</option>
                            <option <?php echo ($country == 'El Salvador') ? 'selected' : ''; ?> value="El Salvador">El Salvador</option>
                            <option <?php echo ($country == 'Equatorial Guinea') ? 'selected' : ''; ?> value="Equatorial Guinea">Equatorial Guinea</option>
                            <option <?php echo ($country == 'Eritrea') ? 'selected' : ''; ?> value="Eritrea">Eritrea</option>
                            <option <?php echo ($country == 'Estonia') ? 'selected' : ''; ?> value="Estonia">Estonia</option>
                            <option <?php echo ($country == 'Ethiopia') ? 'selected' : ''; ?> value="Ethiopia">Ethiopia</option>
                            <option <?php echo ($country == 'Fiji') ? 'selected' : ''; ?> value="Fiji">Fiji</option>
                            <option <?php echo ($country == 'Finland') ? 'selected' : ''; ?> value="Finland">Finland</option>
                            <option <?php echo ($country == 'France') ? 'selected' : ''; ?> value="France">France</option>
                            <option <?php echo ($country == 'Gabon') ? 'selected' : ''; ?> value="Gabon">Gabon</option>
                            <option <?php echo ($country == 'Gambia') ? 'selected' : ''; ?> value="Gambia">Gambia</option>
                            <option <?php echo ($country == 'Georgia') ? 'selected' : ''; ?> value="Georgia">Georgia</option>
                            <option <?php echo ($country == 'Germany') ? 'selected' : ''; ?> value="Germany">Germany</option>
                            <option <?php echo ($country == 'Ghana') ? 'selected' : ''; ?> value="Ghana">Ghana</option>
                            <option <?php echo ($country == 'Greece') ? 'selected' : ''; ?> value="Greece">Greece</option>
                            <option <?php echo ($country == 'Grenada') ? 'selected' : ''; ?> value="Grenada">Grenada</option>
                            <option <?php echo ($country == 'Guatemala') ? 'selected' : ''; ?> value="Guatemala">Guatemala</option>
                            <option <?php echo ($country == 'Guinea') ? 'selected' : ''; ?> value="Guinea">Guinea</option>
                            <option <?php echo ($country == 'Guinea-Bissau') ? 'selected' : ''; ?> value="Guinea-Bissau">Guinea-Bissau</option>
                            <option <?php echo ($country == 'Guyana') ? 'selected' : ''; ?> value="Guyana">Guyana</option>
                            <option <?php echo ($country == 'Haiti') ? 'selected' : ''; ?> value="Haiti">Haiti</option>
                            <option <?php echo ($country == 'Honduras') ? 'selected' : ''; ?> value="Honduras">Honduras</option>
                            <option <?php echo ($country == 'Hungary') ? 'selected' : ''; ?> value="Hungary">Hungary</option>
                            <option <?php echo ($country == 'Iceland') ? 'selected' : ''; ?> value="Iceland">Iceland</option>
                            <option <?php echo ($country == 'India') ? 'selected' : ''; ?> value="India">India</option>
                            <option <?php echo ($country == 'Indonesia') ? 'selected' : ''; ?> value="Indonesia">Indonesia</option>
                            <option <?php echo ($country == 'Iran') ? 'selected' : ''; ?> value="Iran">Iran</option>
                            <option <?php echo ($country == 'Iraq') ? 'selected' : ''; ?> value="Iraq">Iraq</option>
                            <option <?php echo ($country == 'Ireland') ? 'selected' : ''; ?> value="Ireland">Ireland</option>
                            <option <?php echo ($country == 'Israel') ? 'selected' : ''; ?> value="Israel">Israel</option>
                            <option <?php echo ($country == 'Italy') ? 'selected' : ''; ?> value="Italy">Italy</option>
                            <option <?php echo ($country == 'Jamaica') ? 'selected' : ''; ?> value="Jamaica">Jamaica</option>
                            <option <?php echo ($country == 'Japan') ? 'selected' : ''; ?> value="Japan">Japan</option>
                            <option <?php echo ($country == 'Jordan') ? 'selected' : ''; ?> value="Jordan">Jordan</option>
                            <option <?php echo ($country == 'Kazakhstan') ? 'selected' : ''; ?> value="Kazakhstan">Kazakhstan</option>
                            <option <?php echo ($country == 'Kenya') ? 'selected' : ''; ?> value="Kenya">Kenya</option>
                            <option <?php echo ($country == 'Kiribati') ? 'selected' : ''; ?> value="Kiribati">Kiribati</option>
                            <option <?php echo ($country == 'Kuwait') ? 'selected' : ''; ?> value="Kuwait">Kuwait</option>
                            <option <?php echo ($country == 'Kyrgyzstan') ? 'selected' : ''; ?> value="Kyrgyzstan">Kyrgyzstan</option>
                            <option <?php echo ($country == 'Laos') ? 'selected' : ''; ?> value="Laos">Laos</option>
                            <option <?php echo ($country == 'Latvia') ? 'selected' : ''; ?> value="Latvia">Latvia</option>
                            <option <?php echo ($country == 'Lebanon') ? 'selected' : ''; ?> value="Lebanon">Lebanon</option>
                            <option <?php echo ($country == 'Lesotho') ? 'selected' : ''; ?> value="Lesotho">Lesotho</option>
                            <option <?php echo ($country == 'Liberia') ? 'selected' : ''; ?> value="Liberia">Liberia</option>
                            <option <?php echo ($country == 'Libya') ? 'selected' : ''; ?> value="Libya">Libya</option>
                            <option <?php echo ($country == 'Liechtenstein') ? 'selected' : ''; ?> value="Liechtenstein">Liechtenstein</option>
                            <option <?php echo ($country == 'Lithuania') ? 'selected' : ''; ?> value="Lithuania">Lithuania</option>
                            <option <?php echo ($country == 'Luxembourg') ? 'selected' : ''; ?> value="Luxembourg">Luxembourg</option>
                            <option <?php echo ($country == 'Madagascar') ? 'selected' : ''; ?> value="Madagascar">Madagascar</option>
                            <option <?php echo ($country == 'Malawi') ? 'selected' : ''; ?> value="Malawi">Malawi</option>
                            <option <?php echo ($country == 'Malaysia') ? 'selected' : ''; ?> value="Malaysia">Malaysia</option>
                            <option <?php echo ($country == 'Maldives') ? 'selected' : ''; ?> value="Maldives">Maldives</option>
                            <option <?php echo ($country == 'Mali') ? 'selected' : ''; ?> value="Mali">Mali</option>
                            <option <?php echo ($country == 'Malta') ? 'selected' : ''; ?> value="Malta">Malta</option>
                            <option <?php echo ($country == 'Marshall Islands') ? 'selected' : ''; ?> value="Marshall Islands">Marshall Islands</option>
                            <option <?php echo ($country == 'Mauritania') ? 'selected' : ''; ?> value="Mauritania">Mauritania</option>
                            <option <?php echo ($country == 'Mauritius') ? 'selected' : ''; ?> value="Mauritius">Mauritius</option>
                            <option <?php echo ($country == 'Mexico') ? 'selected' : ''; ?> value="Mexico">Mexico</option>
                            <option <?php echo ($country == 'Micronesia') ? 'selected' : ''; ?> value="Micronesia">Micronesia</option>
                            <option <?php echo ($country == 'Moldova') ? 'selected' : ''; ?> value="Moldova">Moldova</option>
                            <option <?php echo ($country == 'Monaco') ? 'selected' : ''; ?> value="Monaco">Monaco</option>
                            <option <?php echo ($country == 'Mongolia') ? 'selected' : ''; ?> value="Mongolia">Mongolia</option>
                            <option <?php echo ($country == 'Montenegro') ? 'selected' : ''; ?> value="Montenegro">Montenegro</option>
                            <option <?php echo ($country == 'Morocco') ? 'selected' : ''; ?> value="Morocco">Morocco</option>
                            <option <?php echo ($country == 'Mozambique') ? 'selected' : ''; ?> value="Mozambique">Mozambique</option>
                            <option <?php echo ($country == 'Myanmar') ? 'selected' : ''; ?> value="Myanmar">Myanmar</option>
                            <option <?php echo ($country == 'Namibia') ? 'selected' : ''; ?> value="Namibia">Namibia</option>
                            <option <?php echo ($country == 'Nauru') ? 'selected' : ''; ?> value="Nauru">Nauru</option>
                            <option <?php echo ($country == 'Nepal') ? 'selected' : ''; ?> value="Nepal">Nepal</option>
                            <option <?php echo ($country == 'Netherlands') ? 'selected' : ''; ?> value="Netherlands">Netherlands</option>
                            <option <?php echo ($country == 'New Zealand') ? 'selected' : ''; ?> value="New Zealand">New Zealand</option>
                            <option <?php echo ($country == 'Nicaragua') ? 'selected' : ''; ?> value="Nicaragua">Nicaragua</option>
                            <option <?php echo ($country == 'Niger') ? 'selected' : ''; ?> value="Niger">Niger</option>
                            <option <?php echo ($country == 'Nigeria') ? 'selected' : ''; ?> value="Nigeria">Nigeria</option>
                            <option <?php echo ($country == 'North Korea') ? 'selected' : ''; ?> value="North Korea">North Korea</option>
                            <option <?php echo ($country == 'North Macedonia') ? 'selected' : ''; ?> value="North Macedonia">North Macedonia</option>
                            <option <?php echo ($country == 'Norway') ? 'selected' : ''; ?> value="Norway">Norway</option>
                            <option <?php echo ($country == 'Oman') ? 'selected' : ''; ?> value="Oman">Oman</option>
                            <option <?php echo ($country == 'Pakistan') ? 'selected' : ''; ?> value="Pakistan">Pakistan</option>
                            <option <?php echo ($country == 'Palau') ? 'selected' : ''; ?> value="Palau">Palau</option>
                            <option <?php echo ($country == 'Palestine') ? 'selected' : ''; ?> value="Palestine">Palestine</option>
                            <option <?php echo ($country == 'Panama') ? 'selected' : ''; ?> value="Panama">Panama</option>
                            <option <?php echo ($country == 'Papua New Guinea') ? 'selected' : ''; ?> value="Papua New Guinea">Papua New Guinea</option>
                            <option <?php echo ($country == 'Paraguay') ? 'selected' : ''; ?> value="Paraguay">Paraguay</option>
                            <option <?php echo ($country == 'Peru') ? 'selected' : ''; ?> value="Peru">Peru</option>
                            <option <?php echo ($country == 'Philippines') ? 'selected' : ''; ?> value="Philippines">Philippines</option>
                            <option <?php echo ($country == 'Poland') ? 'selected' : ''; ?> value="Poland">Poland</option>
                            <option <?php echo ($country == 'Portugal') ? 'selected' : ''; ?> value="Portugal">Portugal</option>
                            <option <?php echo ($country == 'Qatar') ? 'selected' : ''; ?> value="Qatar">Qatar</option>
                            <option <?php echo ($country == 'Romania') ? 'selected' : ''; ?> value="Romania">Romania</option>
                            <option <?php echo ($country == 'Russia') ? 'selected' : ''; ?> value="Russia">Russia</option>
                            <option <?php echo ($country == 'Rwanda') ? 'selected' : ''; ?> value="Rwanda">Rwanda</option>
                            <option <?php echo ($country == 'Saint Kitts and Nevis') ? 'selected' : ''; ?> value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option <?php echo ($country == 'Saint Lucia') ? 'selected' : ''; ?> value="Saint Lucia">Saint Lucia</option>
                            <option <?php echo ($country == 'Saint Vincent and the Grenadines') ? 'selected' : ''; ?> value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option <?php echo ($country == 'Samoa') ? 'selected' : ''; ?> value="Samoa">Samoa</option>
                            <option <?php echo ($country == 'San Marino') ? 'selected' : ''; ?> value="San Marino">San Marino</option>
                            <option <?php echo ($country == 'Sao Tome and Principe') ? 'selected' : ''; ?> value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option <?php echo ($country == 'Saudi Arabia') ? 'selected' : ''; ?> value="Saudi Arabia">Saudi Arabia</option>
                            <option <?php echo ($country == 'Senegal') ? 'selected' : ''; ?> value="Senegal">Senegal</option>
                            <option <?php echo ($country == 'Serbia') ? 'selected' : ''; ?> value="Serbia">Serbia</option>
                            <option <?php echo ($country == 'Seychelles') ? 'selected' : ''; ?> value="Seychelles">Seychelles</option>
                            <option <?php echo ($country == 'Sierra Leone') ? 'selected' : ''; ?> value="Sierra Leone">Sierra Leone</option>
                            <option <?php echo ($country == 'Singapore') ? 'selected' : ''; ?> value="Singapore">Singapore</option>
                            <option <?php echo ($country == 'Slovakia') ? 'selected' : ''; ?> value="Slovakia">Slovakia</option>
                            <option <?php echo ($country == 'Slovenia') ? 'selected' : ''; ?> value="Slovenia">Slovenia</option>
                            <option <?php echo ($country == 'Solomon Islands') ? 'selected' : ''; ?> value="Solomon Islands">Solomon Islands</option>
                            <option <?php echo ($country == 'Somalia') ? 'selected' : ''; ?> value="Somalia">Somalia</option>
                            <option <?php echo ($country == 'South Africa') ? 'selected' : ''; ?> value="South Africa">South Africa</option>
                            <option <?php echo ($country == 'South Korea') ? 'selected' : ''; ?> value="South Korea">South Korea</option>
                            <option <?php echo ($country == 'South Sudan') ? 'selected' : ''; ?> value="South Sudan">South Sudan</option>
                            <option <?php echo ($country == 'Spain') ? 'selected' : ''; ?> value="Spain">Spain</option>
                            <option <?php echo ($country == 'Sri Lanka') ? 'selected' : ''; ?> value="Sri Lanka">Sri Lanka</option>
                            <option <?php echo ($country == 'Sudan') ? 'selected' : ''; ?> value="Sudan">Sudan</option>
                            <option <?php echo ($country == 'Suriname') ? 'selected' : ''; ?> value="Suriname">Suriname</option>
                            <option <?php echo ($country == 'Swaziland') ? 'selected' : ''; ?> value="Swaziland">Swaziland</option>
                            <option <?php echo ($country == 'Sweden') ? 'selected' : ''; ?> value="Sweden">Sweden</option>
                            <option <?php echo ($country == 'Switzerland') ? 'selected' : ''; ?> value="Switzerland">Switzerland</option>
                            <option <?php echo ($country == 'Syria') ? 'selected' : ''; ?> value="Syria">Syria</option>
                            <option <?php echo ($country == 'Taiwan') ? 'selected' : ''; ?> value="Taiwan">Taiwan</option>
                            <option <?php echo ($country == 'Tajikistan') ? 'selected' : ''; ?> value="Tajikistan">Tajikistan</option>
                            <option <?php echo ($country == 'Tanzania') ? 'selected' : ''; ?> value="Tanzania">Tanzania</option>
                            <option <?php echo ($country == 'Thailand') ? 'selected' : ''; ?> value="Thailand">Thailand</option>
                            <option <?php echo ($country == 'Togo') ? 'selected' : ''; ?> value="Togo">Togo</option>
                            <option <?php echo ($country == 'Tonga') ? 'selected' : ''; ?> value="Tonga">Tonga</option>
                            <option <?php echo ($country == 'Trinidad and Tobago') ? 'selected' : ''; ?> value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option <?php echo ($country == 'Tunisia') ? 'selected' : ''; ?> value="Tunisia">Tunisia</option>
                            <option <?php echo ($country == 'Turkey') ? 'selected' : ''; ?> value="Turkey">Turkey</option>
                            <option <?php echo ($country == 'Turkmenistan') ? 'selected' : ''; ?> value="Turkmenistan">Turkmenistan</option>
                            <option <?php echo ($country == 'Tuvalu') ? 'selected' : ''; ?> value="Tuvalu">Tuvalu</option>
                            <option <?php echo ($country == 'Uganda') ? 'selected' : ''; ?> value="Uganda">Uganda</option>
                            <option <?php echo ($country == 'Ukraine') ? 'selected' : ''; ?> value="Ukraine">Ukraine</option>
                            <option <?php echo ($country == 'United Arab Emirates') ? 'selected' : ''; ?> value="United Arab Emirates">United Arab Emirates</option>
                            <option <?php echo ($country == 'United Kingdom') ? 'selected' : ''; ?> value="United Kingdom">United Kingdom</option>
                            <option <?php echo ($country == 'United States') ? 'selected' : ''; ?> value="United States">United States</option>
                            <option <?php echo ($country == 'Uruguay') ? 'selected' : ''; ?> value="Uruguay">Uruguay</option>
                            <option <?php echo ($country == 'Uzbekistan') ? 'selected' : ''; ?> value="Uzbekistan">Uzbekistan</option>
                            <option <?php echo ($country == 'Vanuatu') ? 'selected' : ''; ?> value="Vanuatu">Vanuatu</option>
                            <option <?php echo ($country == 'Vatican City') ? 'selected' : ''; ?> value="Vatican City">Vatican City</option>
                            <option <?php echo ($country == 'Venezuela') ? 'selected' : ''; ?> value="Venezuela">Venezuela</option>
                            <option <?php echo ($country == 'Vietnam') ? 'selected' : ''; ?> value="Vietnam">Vietnam</option>
                            <option <?php echo ($country == 'Yemen') ? 'selected' : ''; ?> value="Yemen">Yemen</option>
                            <option <?php echo ($country == 'Zambia') ? 'selected' : ''; ?> value="Zambia">Zambia</option>
                            <option <?php echo ($country == 'Zimbabwe') ? 'selected' : ''; ?> value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <span></span>

                        <div class="button-wrapper flex justify-space-between">
                            <button type="button" class="btn" id="edit">Edit</button>
                            <button type="submit" class="btn" id="save" disabled>Save</button>
                        </div>

                        <script>
                            document.getElementById('edit').addEventListener('click', function() {
                                document.querySelectorAll('.address-form input').forEach(function(input) {
                                    input.removeAttribute('disabled');
                                });
                                document.querySelector('.address-form select').removeAttribute('disabled');
                                document.getElementById('save').removeAttribute('disabled');
                                document.getElementById('edit').setAttribute('disabled', 'disabled');
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
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

</body>

</html>