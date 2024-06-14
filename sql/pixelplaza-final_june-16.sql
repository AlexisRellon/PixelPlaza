-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 01:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixelplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_table`
--

CREATE TABLE `address_table` (
  `AddressID` int(11) NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  `Country` text NOT NULL,
  `Zipcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_table`
--

INSERT INTO `address_table` (`AddressID`, `Address`, `City`, `State`, `Country`, `Zipcode`) VALUES
(1, 'B27 L10 Retiro St. Montefaro Village West', 'Imus', 'Cavite', 'Philippines', '4103'),
(2, '1023 Someone st. Nowhere Village', 'Trece Martires', 'Cavite', 'Philippines', '4109'),
(7, '', '', '', '', ''),
(8, '', '', '', '', ''),
(9, '', '', '', '', ''),
(10, '', '', '', '', ''),
(11, '123 Somewhere st.', 'Dasmarinas', 'Cavite', 'Philippines', '4107');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandID`, `Name`, `Description`) VALUES
(1, 'Akko', NULL),
(2, 'Rakk', NULL),
(3, 'Red Dragon', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Keyboards', NULL),
(2, 'Mouse', NULL),
(3, 'Headsets', NULL),
(4, 'Switch', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `SalePrice` decimal(10,2) DEFAULT 0.00,
  `Stock` int(11) NOT NULL,
  `ImageURL` text DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `SalePrice`, `Stock`, `ImageURL`, `CategoryID`, `BrandID`) VALUES
(3, 'Rakk Huni', 'Specifications:\r\n• Brand: Rakk \r\n• Model: Huni\r\n• Color White / Black\r\n• 5 AUX\r\n• STEREO SOUND\r\n• 4M RGB COLORS', 695.00, 556.00, 50, '../img/headsets/Rakk_Huni_1.webp', 3, 2),
(4, 'Rakk Kusog Pro', 'Specification:\r\n•	Brand: Rakk\r\n•	Model: Kusog Pro \r\n•	Color: Black\r\n•	Features\r\n•	7.1 Virtual Surround Sound\r\n•	50mm Audio Drivers\r\n•	Noise Cancellation Microphone\r\n•	Sound Controller - Mute and Volume Control\r\n•	Removable Ear Foam\r\n•	Software Audio Finetuner\r\n•	Braided Cables 2.1m\r\n•	RGB Lighting\r\n•	Headphones\r\n•	Audio Driver: 50 MM\r\n•	Maximum power: 30W\r\n•	Rated power: 5V\r\n•	Impedance: 16ohms ± 15 %\r\n•	Sensitivity: 95 ± 3qb\r\n•	Microphone sensitivity: -42 ± 2qbz\r\n•	Microphone\r\n•	Microphone size: ⌀4.0x1.5mm\r\n•	Microphone direction: comprehensive\r\n•	Microphone sensitivity: -38dB +/ -4dB\r\n•	Microphone frequency: 100Hz to 10kHz\r\n•	Metering Condition: 2V/2.2K', 995.00, 796.00, 55, '../img/headsets/RAKK KUSOG_1.webp', 3, 2),
(5, 'RAKK LIMAYA/ LIMAYA Plus Trimode RGB Gaming Wireless Headset', 'RAKK LIMAYA/ LIMAYA Plus Trimode RGB Gaming Wireless Headset| Black\r\n\r\nProduct Specifications Limaya Plus:\r\n\r\n\r\n•	Speakers 50mm \r\n•	Speaker Impedance 20 Ω \r\n•	Connectivity 2.4ghz, Bluetooth, 3.5 Aux \r\n•	Compatibility 2.4g USB-C Smartphone, Tablet, Laptop, \r\n•	Compatibility 2.4g USB-A PC, PS4, XBox, \r\n•	Latency &lt;25ms (2.4G mode) \r\n•	Replaceable Foam Yes \r\n•	Microphone Yes &amp; Removable \r\n•	Microphone Type Omnidirectional \r\n•	Materials ABS \r\n•	Lighting RGB Mode only \r\n•	Battery 1000 mAh LiPo \r\n•	Charging Time 3.5 Hours ± \r\n•	Battery Life 25 Hours ± \r\n•	Range 10 Meters ± \r\n•	Charging Voltage DC5V=1A \r\n•	Weight (Product) 310g ± \r\n•	Software N/A \r\n•	Chipset Realtek \r\n•	Package Size L183*W95*H212MM \r\n•	Bluetooth \r\n•	Lighting on: 25H± \r\n•	Lighting off: 32H~35H± \r\n•	2.4g \r\n•	Lighting on: 30H± \r\n•	Lighting off: 35H±', 1895.00, 1516.00, 25, '../img/headsets/Rakk_Limaya_1.webp', 3, 2),
(6, 'RAKK SONIDO 7.1 Virtual Surround RGB Gaming Headset USB Black', 'RAKK SONIDO 7.1 Virtual Surround RGB Gaming Headset USB Black| EasyFix Warranty\r\n\r\nProduct Specifications:\r\n\r\n•	Brand: Rakk\r\n•	Model: Sonido\r\n•	Color: Black\r\n•	Connectivity: USB \r\n•	Driver Diameter: 50mm \r\n•	Impedance: 32Ω \r\n•	Sensitivity: 102±3dB \r\n•	Frequency: 20HZ-20KHZ \r\n•	Mic Diameter: 6.0x5.0mm \r\n•	Mic Sensitivity: -42±3dB \r\n•	Mic Impedance: 2.2K Ω±15% \r\n•	Directivity : Omni-directivity \r\n•	LED Operating Voltage: DC5V±5% \r\n•	Working Current: &lt;200mA \r\n•	Cable Length: 1.8m ±0.15m\r\n\r\nFeatures:\r\n•	RGB Lighting \r\n•	7.1 Virtual Surround \r\n•	Controller', 995.00, 796.00, 23, '../img/headsets/Rakk_Sonido_3.webp', 3, 2),
(7, 'RAKK KLARE Gaming Headset USB Black', 'RAKK KLARE Gaming Headset USB Black| EasyFix Warranty\r\n\r\nProduct Specifications:\r\n\r\n•	Brand: Rakk\r\n•	Model: KLARE\r\n•	Color: Black\r\n•	Connectivity 2x3.5 Aux/Mic, USB (lighting) \r\n•	Driver Diameter: 40mm \r\n•	Impedance: 20Ω \r\n•	Sensitivity: 102±3dB \r\n•	Frequency: 20HZ-20KHZ \r\n•	Mic Diameter: 6.0x2.5mm \r\n•	Mic Sensitivity: -42±3dB \r\n•	Mic Impedance: 2.2K Ω±15% \r\n•	Directivity: Omni-directivity \r\n•	LED Operating Voltage: DC5V±5% \r\n•	Working Current: &lt;200mA \r\n•	Cable Length: 1.8 m ±0.15m \r\n•	Headset Interface: USB+3.5mmTRRS\r\n\r\nFeatures:\r\n•	Lighting \r\n•	Replaceable Foam \r\n•	Folding mic', 995.00, 796.00, 52, '../img/headsets/Rakk_Flare_1.webp', 3, 2),
(8, 'Redragon K686 PRO Blue Himmel Wireless Gasket Gaming Keyboard', 'GASKET Design\r\n\r\nThe body structure differs from traditional screw fixing by using precision-locked covers with gaskets to assist with noise reduction and flexibility. It provides even feedback while the vertical cushioning reduces rigid noise, delivering a crisp, clean and softer typing feel.\r\n\r\n \r\n\r\n3-Mode Connection\r\n\r\nGeared with Redragon advanced tri-mode connection technology, USB-C wired, BT 3.0/5.0 &amp; 2.4Ghz wireless modes which make the user experience upgraded to another level in all fields.\r\n\r\n \r\n\r\nUPGRADED HOT-SWAP\r\n\r\nThe brand new upgrade with nearly all switches(3/5 pins) compatible, the free-mod hot-swappable socket is available now. The exclusive next-level socket makes the switch mounting easier and more stable than ever.\r\n\r\n \r\n\r\nNoise Dampening X 3\r\n\r\nEquipped with a 3.5mm PO sound-absorbing pad and 2 dampening foams, along with the silicone gasket. Significantly reduce the sound resonance between the metals and reduce the hollow noise. Creating a clear and creamy switch traveling sound ONLY.\r\n\r\n \r\n\r\nNoise Dampening X 3\r\n\r\nEquipped with a 3.5mm PO sound-absorbing pad and 2 dampening foams, along with the silicone gasket. Significantly reduce the sound resonance between the metals and reduce the hollow noise. Creating a clear and creamy switch traveling sound ONLY.\r\n\r\n \r\n\r\nTactical 98 Keys\r\n\r\nThe innovative design keeps the original 100% layout’s function while shrinking the size 20% smaller to provide more compactness.\r\n\r\n \r\n\r\nONE-Knob Control\r\n\r\nArmed with a convenient easy access control knob, the keyboard backlight brightness and media (volume, play/pause, switch) are all in control with no hassle. Plus functionary with no extra keys or space to waste.\r\n\r\n \r\n\r\nPro Software Supported\r\n\r\nExpand your options using the available software to design your own new modes and effects found on redragonshop. Macros with different keybindings or shortcuts for more efficient work and gaming.', 3239.99, 2591.89, 10, '../img/keyboards/RedragonK686PRO98Keys_1.webp', 1, 3),
(9, 'Redragon K686 PRO SE 98 Keys Wireless Gasket RGB Gaming Keyboard', 'Redragon Anime Girl OUT\r\n\r\nHere comes the adorable and reliable ally of Redragon, personalized character Eisa reporting! 5 sides Dye-Sub PBT keycaps covered with themed patterns and elements offer unparalleled touch and vibe.\r\n\r\n \r\n\r\nGASKET Design\r\n\r\nThe body structure differs from traditional screw fixing by using precision-locked covers with gaskets to assist with noise reduction and flexibility. It provides even feedback while the vertical cushioning reduces rigid noise, delivering a crisp, clean and softer typing feel.\r\n\r\n \r\n\r\n3-Mode Connection\r\n\r\nGeared with Redragon advanced tri-mode connection technology, USB-C wired, BT 3.0/5.0 &amp; 2.4Ghz wireless modes which make the user experience upgraded to another level in all fields.\r\n\r\n \r\n\r\nHi-Fi Custom Switch\r\n\r\nWith thick-lubed custom linear switches combo with a gasket form factor, Eisa features faster, creamy and elastic typing feedback. The brand new upgraded socket is nearly all switches(3/5 pins) compatible.\r\n\r\n \r\n\r\nNoise Dampening X 3\r\n\r\nEquipped with a 3.5mm PO sound-absorbing pad and 2 dampening foams, along with the silicone gasket. Significantly reduce the sound resonance between the metals and reduce the hollow noise. Creating a clear and creamy switch traveling sound ONLY.\r\n\r\n \r\n\r\nTactical 98 Keys\r\n\r\nThe innovative design keeps the original 100% layout’s function while shrinking the size 20% smaller to provide more compactness.\r\n\r\n \r\n\r\nONE-Knob Control\r\n\r\nArmed with a convenient easy access control knob, the keyboard backlight brightness and media (volume, play/pause, switch) are all in control with no hassle. Plus functionary with no extra keys or space to waste.\r\n\r\n \r\n\r\nPro Software Supported\r\n\r\nExpand your options using the available software to design your own new modes and effects found on redragonshop. Macros with different keybindings or shortcuts for more efficient work and gaming.', 4399.00, 3518.60, 32, '../img/keyboards/RedragonK686PRO98Keys_2.webp', 1, 3),
(10, 'Redragon FAYE K685 PRO 104 Keys Wireless Gasket RGB Gaming Keyboard', 'GASKET Design\r\n\r\nThe body structure differs from traditional screw fixing by using precision-locked covers with gaskets to assist with noise reduction and flexibility. It provides even feedback while the vertical cushioning reduces rigid noise, delivering a crisp, clean and softer typing feel.\r\n\r\n \r\n\r\n3-Mode Connection\r\n\r\nGeared with Redragon advanced tri-mode connection technology, USB-C wired, BT 3.0/5.0 &amp; 2.4Ghz wireless modes which make the user experience upgraded to another level in all fields.\r\n\r\n \r\n\r\nNoise Dampening X 3\r\n\r\nEquipped with a 3.5mm PO sound-absorbing pad and 2 dampening foams, along with the silicone gasket. Significantly reduce the sound resonance between the metals and reduce the hollow noise. Creating a clear and creamy switch traveling sound ONLY.\r\n\r\n \r\n\r\nFull-Size 104 Keys\r\n\r\nWith the original 100% standard layout, return to the most classic and rooted time of mechanical keyboard, suits everyone in any way.\r\n\r\n \r\n\r\nStock Red Switch\r\n\r\nPre-lubed linear red switches combo with a gasket form factor, Faye features faster, quiet and linear typing feedback. The brand new upgraded socket is nearly all switches(3/5 pins) compatible.\r\n\r\n \r\n\r\nMixed Blue &amp; White Keycaps\r\n\r\nDesigned with white main color keycaps and 8 blue keycaps decored, delivering a fresh, vibrant and stunning eye-catching look. Come along with an extra 8 decor keycaps pack in white color.\r\n\r\n \r\n\r\nPro Software Supported\r\n\r\nExpand your options using the available software to design your own new modes and effects found on redragonshop. Macros with different keybindings or shortcuts for more efficient work and gaming.', 3240.00, 2591.89, 25, '../img/keyboards/RedragonK685PRO104Keys_2.webp', 1, 3),
(11, 'Redragon K617 FIZZ 60_ Wired RGB Gaming Keyboard, 61 Keys Compact Mechanical Keyboard w White &amp; Pink Mixed-Colored Keycaps, Linear Red Switch, Pro Driver Support', '60% Wired &amp; 2 Colors Keycaps: Redragon 60% keyboard in wired mode with fresh 2 colors mixed keycaps layout. Ultra-compact 61 keys with novel keycap color frees up precious desk space with vibrant elements.\r\n\r\nHot-Swappable Red Switches: Most quiet mechanical switch, linear and soft key travel makes every click easy to register. Hot-swappable with other Redragon switches. Made to last with switches rated for 50 million keypresses.\r\n\r\nVibrant RGB: Up to 20 presets backlighting modes are free to choose by the keyboard itself. Brightness and flowing speed is also adjustable on board. Select your own preferred modes for any playing.\r\n\r\nPro Software Customizable: Expand your options using the available software to design your own new modes and effects found on redragonshop. Macros with different keybindings or shortcuts for more efficient work and gaming.\r\n\r\nDedicated for FPS Gamer: Place the keyboard proper straight on your desktop and no more crooked way for mouse space saving, your mouse will never hit the keyboard any more. Enjoy waving the mouse without any worries and go get that Team Kills.', 1350.00, 1080.00, 34, '../img/keyboards/Fizz_Keybaord_1.webp', 1, 3),
(12, 'Redragon K670 RGB Backlit Gaming Keyboard', 'Upgraded Hot-Swap\r\n\r\nThe brand new upgrade with nearly all switches(3/5 pins) compatible, the free-mod hot-swappable socket is available now. The exclusive next-level socket makes the switch mounting easier and more stable than ever.\r\n\r\nQuiet+ Red Switchess\r\n\r\nQuiet basic linear mechanical switches, soft key travel makes every click easy to register. These switches require less force to press down and the keys feel smoother and easier to use. No tactile &quot;bump&quot; but responsive.\r\n\r\nOriginal Aluminum Board\r\n\r\nK670 features the tank-solid aluminum metal board material covered with the classic brushed surface process. Keep the keyboard steady and elegant on the desk, for a premium typing experience.\r\n\r\nVibrant Groovy RGB\r\n\r\nUp to 18 presets backlighting modes are free to choose by the keyboard itself. Brightness and flowing speed is also adjustable on board. Select your own preferred modes for any playing.\r\n\r\nPro Software Supported\r\n\r\nExpand your options using the available software to design your own new modes and effects found on redragonshop. Macros with different keybindings or shortcuts for more efficient work and gaming.', 2390.00, 1910.00, 25, '../img/keyboards/RedragonARGOK670_2.webp', 1, 3),
(13, 'Redragon PREDATOR M612 PRO RGB Gaming Mouse', 'Pentakill, 5 DPI Levels\r\n\r\nGeared with 5 redefinable DPI levels (default as: 500/1000/2000/3000/8000), easy to switch between different game needs. Dedicated demand of DPI options between 500-8000 is also available to be processed by software.\r\n\r\n3 Modes Connect Tech\r\n\r\nCables truly will affect your detailed battle reaction, M612 PRO geared with BT and 2.4Ghz receiver offers you the purest and preciser mouse moving experience and hype your KDA rise again.\r\n\r\nAny Button is Reassignable\r\n\r\n7 programmable buttons are all editable with customizable tactical keybinds in whatever game or work you are engaging. 1 rapid fire + 2 side macro buttons offer you a better gaming and working experience.\r\n\r\nComfort Grip with Details\r\n\r\nThe skin-friendly frosted coating is the main comfort grip of the mouse surface, which offers you the most enjoyable fingerprint-free tactility. The left side equipped with rubber texture strengthened the friction and made the mouse easier to control.\r\n\r\n7 Decent Backlit Modes\r\n\r\nTurn the backlit on and make some kills in your gaming battlefield. The hyped dynamic RGB backlit vibe will never let you down when decorating your gaming space.\r\n\r\nFatigue Killer with Ergonomic Design\r\n\r\nSolid frame with a streamlined and general claw-grip design offers each gamer a satisfying and comfortable gaming experience with less fatigue even though after hours of use.', 850.00, 680.00, 35, '../img/mouse/RedragonM612PRO_1.webp', 2, 3),
(14, 'Redragon M711 Cobra White Gaming Mouse with 16.8 Million RGB Color Backlit', '5 DPI OPTIONS &amp; CUSTOMIZED FUNCTION – 5 adjustable DPI levels (500, 1000, 2000, 3000, 5000) meet your multiple needs, either for daily work or gaming. DPI can be adjusted freely by ±100 from 100 to 10000, taking advantage of on-the-fly DPI switching to instantly match mouse speed to gameplay demands. Besides, the Mouse Point Speed setting in the software also allows you to mildly change the movement speed of the mouse to achieve the best fit mode for yourself.\r\n\r\n\r\n7 PROGRAMMABLE BUTTONS &amp; 16.8-MILLION LIGHTING “BREATHING” RGB LED –7 (7 out of 9) programmable buttons enable superior productivity and efficiency to meet all your gaming needs. 5 memory profiles each with a dedicated light color for quick identification and 16-Million Color backlight &#039;breathing&#039; RGB LED gives out ambient light and set you in a unique gaming atmosphere.\r\n\r\nA PROFESSIONAL PROGRAMMING SOFTWARE –Adopted the latest professional gaming chip AVAGO to capture fast and accurate movement for precise control; 5 adjustable DPI settings-500/1000/2000/3000/5000, quickly adjustable for different gaming scenarios; 5000 FPS, 100IPS Maximum Tracking Speed, 20G acceleration.\r\n\r\n\r\nCOMFORT &amp; PRECISION AT YOUR HANDS – The M711 Cobra gaming mouse is an essential computer accessory for die-hard gamers with its aggressive design for hands! You will be amazed by the unmatched comfort, lethal accuracy and killer precision of our durable, desktop and laptop pro gaming mouse! You can enjoy a wonderful clicking experience without disturbing others. It is an optimal choice in the office, library, dormitory or wherever you like.\r\n\r\n\r\nTHE CHOICE OF DIE-HARD GAMERS –Whether you are targeting, aiming, slashing or attacking, a professional gaming mouse is your best weapon! The mouse will be your ideal partner. Perfectly compatible with Windows 2000/ME/XP/03/VISTA/7/8/10 system for programmable using and Mac OS for normal using.', 875.00, 700.00, 36, '../img/mouse/M711_1.webp', 2, 3),
(15, 'Redragon M810 Pro Wireless Gaming Mouse, 10000 DPI WiredWireless Gamer Mouse w Rapid Fire Key, 8 Macro Buttons, 45-Hour Durable Power Capacity and RGB Backlit for PCMacLaptop', 'Wireless for Boundless Winning:  Cables truly will affect your detailed battle reaction, Redragon M810 pro wireless gaming mouse with 2.4Ghz nano receiver offers you the purest mouse moving experience and hype your KDA rise again.\r\n\r\nAdjustable DPI to 10000: Geared with 5 on-board DPI levels (500/1000/2000/3000/10000) which allow your mouse movements to be registered to each pinpoint location. 5 DPI levels are free to DIY with software, for gamers to switch swiftly in game.\r\n\r\nEasy Keybinding with Macro:   All 8 programmable buttons are all editable with customizable tactical keybinds in whatever game or work you are engaging. 1 rapid fire + 2 side macro buttons offer you a better gaming and working experience.\r\n\r\nUltra Long-lasting Core: Equipped with the PAW3104 Optical Pixart sensor, the mouse consumption is further optimized with 1000Hz Polling Rate in each mode. 700 mAh rechargeable battery keeps the mouse working up to 35 hours at maximum (eco-mode).\r\n\r\nAdjustable True Color:  With Redragon Pro driver, DIY endless style like dynamic streaming, breathing, waving. The game closely linked with various lighting modes makes your room full of competitive vibe.', 4375.00, 3500.00, 51, '../img/mouse/RedragonM810Pro_1.webp', 2, 3),
(16, 'Redragon M916 PRO 1K 3-Mode Wireless Gaming Mouse', '3 Modes Connect Tech\r\n\r\nCables truly will affect your detailed battle reaction, M916 geared with BT and 2.4Ghz nano receiver offers you the purest and preciser mouse moving experience and hype your KDA rise again.\r\n\r\nPentakill, 5 DPI Levels\r\n\r\nGeared with 5 redefinable DPI levels (default as: 1000/2000/4000/8000/26000), easy to switch between different game needs. Dedicated demand of DPI options between 100-26000 is also available to be processed by software.\r\n\r\n49 Gram Lightweight\r\n\r\nComing in hot is the LIGHTEST Redragon mouse, selected ultra-light materials and well-crafted form to offer the fastest, cleanest, and fully controlled mouse using. You are controlling the mouse with no hassle and no extra effort.\r\n\r\nTake The Advanced Shot\r\n\r\n5 programmable buttons are all editable with customizable tactical keybinds in whatever game or work you are engaging. Default 2 side buttons will get you all covered, hit your hotkeys/keybinds faster than ever with M916.\r\n\r\nComfort &amp; Natural Grip\r\n\r\nFollowing the natural structure of the human hand, the M916 is perfectly shaped for long-lasting use. It makes you easily to handle am to pm gaming parties or overtime &amp; overdue work with less fatigue.\r\n\r\nUncompromised Driver Support\r\n\r\nAll buttons with hotkeys, media, DPI settings are all customizable with Redragon dedicated software. Pre-aim your opponents and get overwhelming to the victory in your exactly wanted way.', 2495.00, 1996.00, 12, '../img/mouse/RedragonM916PRO3_1.webp', 2, 3),
(17, 'Redragon M987-K Lightweight 55g Honeycomb Gaming Mouse RGB Backlit Wired 6 Buttons Programmable with 12400 DPI', 'Ultralight weight Redragon M987 Gaming Mouse with 12400 DPI High-Precision Sensor, 6 MMO Programmable Buttons and RGB Backlighting\r\nThe Redragon M987 wired gaming mouse is designed for eSports Gaming Pros who demand the very best performance. The mouse offers an ultra-lightweight Honeycomb Shell construction for increased comfort and improved performance\r\nFeatures:\r\n* Ultra lightweight 55 gram (without cable)\r\n* RGB Backlit with multiple lighting modes and effects\r\n* 6 optimized MMO programmable buttons (Total 7 Buttons)\r\n* Anti-skid Scroll Wheel\r\n* 12400 DPI via software (500/1000/2000/3000/6200/12400 DPI user adjustable)\r\n* 1000Hz polling rate (125/250/500/1000Hz user adjustable)\r\n* 30g acceleration\r\n* Ergonomic, ambidextrous shape: Optimized for right handed gaming with 2 extra buttons for added convenience\r\n* Durable smooth TEFLON feet pads\r\n* 6-foot ultra-light weave USB cable\r\n* Gold plated USB connector\r\n* System Requirements PC with USB port Windows 10, Windows 8, Windows 7, Windows Vista and Windows XP', 740.00, 592.00, 19, '../img/mouse/M987-K_1.webp', 2, 3),
(18, 'Akko CS Jelly Black Switch', '50gf actuation force with extension spring makes it the heaviest Akko CS switches.\r\n\r\nComparing with the classic CS switches, the new CS switches are equipped with dustproof stem for enhanced stability.\r\n\r\n45pcs.', 795.00, 636.00, 17, '../img/switch/Akko_Black_Switch_1.webp', 4, 1),
(19, 'Akko CS Jelly Blue Switch', 'With dual tactile bump (both when pressing and releasing);\r\n\r\nA “toy” designed for the custom mechanical keyboard community.\r\n\r\nComparing with the classic CS switches, the new CS switches are equipped with dustproof stem for enhanced stability.', 575.00, 460.00, 20, '../img/switch/Akko_Blue_Switch_1.webp', 4, 1),
(20, 'Akko CS Radiant Red Switch', '45 pcs per pack;\r\n\r\n3 pin and fits keycaps with standard MX structure;\r\n\r\nShipping price is not included for the listed price and will display at checkout.', 795.00, 636.00, 39, '../img/switch/Radiant_Red_1.webp', 4, 1),
(21, 'Akko CS silver switch', 'With short pre-travel of 1mm, this is one of the fastest Akko CS switches and is ideal for gaming;\r\n\r\nCS silver switches are equipped with dustproof stem for enhanced stability;\r\n\r\nMaterial Break-down:\r\n\r\nStem = POM;\r\n\r\nContact Leaf = Copper Alloy;\r\n\r\nBottom = PA;\r\n\r\nTop Housing = Polycarbonate.', 699.00, 559.20, 15, '../img/switch/Akko_Silver Switch_2.webp', 4, 1),
(22, 'Akko V3 Creamy Yellow Switch', 'Akko v3 Generation Switches;\r\n\r\n45 pcs a box.', 520.00, 416.00, 27, '../img/switch/Akko_Yellow_Switch_1.webp', 4, 1),
(23, 'MU01 Joy of Life', 'Akko x Joy of Life special limited edition collaboration.\r\nWalnut Wooden Case, 68-key Gasket Structure Keyboard\r\nProgrammable RGB Backlit with Akko Cloud Driver\r\nMulti-Modes: bluetooth 5.0, multi-host 2.4Ghz (with a receiver), and wired Type-C\r\nAkko V3 Piano Pro Switch (Linear Switch)', 7500.00, 0.00, 5, '../img/keyboards/MU01_1.webp', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL COMMENT 'User unique ID',
  `Password` varchar(255) NOT NULL COMMENT 'Hashed Password',
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Phone` text DEFAULT NULL,
  `AddressID` int(11) NOT NULL,
  `UserTypeID` int(11) DEFAULT 2 COMMENT '1: Admin user, 2: Customer',
  `attempts` int(11) NOT NULL DEFAULT 0 COMMENT 'Number of Login Attempts',
  `UserStatusID` int(11) DEFAULT 1 COMMENT '1: Pending, 2: Verified, 3: Blocked',
  `CreatedAt` date NOT NULL COMMENT 'Date of account creation',
  `OnlineStatus` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - False: Offline\r\n1 - True: Online',
  `Locked` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - Not locked\r\n1 - Account Locked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Password`, `Email`, `FirstName`, `LastName`, `Phone`, `AddressID`, `UserTypeID`, `attempts`, `UserStatusID`, `CreatedAt`, `OnlineStatus`, `Locked`) VALUES
(1, '$2y$12$VqmSJ3PyXYg.gD5ChECVieNp2pzIqiHTOXbOMWWgLmfmbBhKeczGa', 'alexis26rellon@gmail.com', 'Alexis John', 'Rellon', '09473993939', 1, 1, 1, 2, '2024-06-13', 1, 0),
(2, '$2y$12$IazBT/DkiCUkgGZ3GBNYveLrJA7ZyhmmiJX3tI6SH4EtCRqKkwaD6', 'brentdimagiba@gmail.com', 'Brent Harvey', 'Rull', NULL, 2, 1, 0, 1, '2024-06-13', 0, 0),
(3, '$2y$12$IoYjc9Wi4Su1Ptvp.gUPY.Ki3.qHMv9IG9/EOFjzAbf6x2rekuno2', 'admin@pixelplaza.com', 'Super', 'Admin', NULL, 10, 2, 1, 1, '2024-06-14', 1, 0),
(4, '$2y$12$8Zmyp8Rt8cIR5mxXdDIhJeRqT1958F84UjTQx1QTr8pFAZlJyOwT.', 'mic@gmail.com', 'Mic', 'Mic', '0509288956', 11, 2, 1, 2, '2024-06-15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `UserStatusID` int(11) NOT NULL,
  `StatusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`UserStatusID`, `StatusName`) VALUES
(1, 'Pending'),
(2, 'Verified'),
(3, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `UserTypeID` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`UserTypeID`, `TypeName`) VALUES
(1, 'Admin'),
(2, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_table`
--
ALTER TABLE `address_table`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`OrderItemID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `BrandID` (`BrandID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserTypeID` (`UserTypeID`),
  ADD KEY `UserStatusID` (`UserStatusID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`UserStatusID`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_table`
--
ALTER TABLE `address_table`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User unique ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `UserStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertypes` (`UserTypeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`UserStatusID`) REFERENCES `userstatus` (`UserStatusID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`AddressID`) REFERENCES `address_table` (`AddressID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
