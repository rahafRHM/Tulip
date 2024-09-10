-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 01:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `id` int(100) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isAdminReply` tinyint(1) NOT NULL DEFAULT 0,
  `adminReply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `id`, `message`, `time`, `isAdminReply`, `adminReply`) VALUES
(12, 2, 'hi bbnmnmnmnmnmnm', '2024-07-15 15:32:05', 1, 'dfjkhfjjdjdjdjdjjdjd'),
(13, 4, 'eeeeeeeeeeeeeee', '2024-07-14 16:11:18', 1, 'hggggkghsklhklsfklsjflksjfkl'),
(14, 2, 's,fml,smf.s', '2024-07-15 15:28:21', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `orderID` int(11) NOT NULL,
  `productID` int(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`orderID`, `productID`, `quantity`) VALUES
(39, 41, 3),
(40, 41, 1),
(41, 41, 6),
(42, 45, 1),
(42, 48, 1),
(43, 44, 3),
(43, 49, 4),
(44, 41, 2),
(44, 47, 3),
(45, 52, 1),
(49, 41, 1),
(50, 47, 4),
(51, 50, 1),
(52, 52, 1),
(53, 52, 1),
(54, 41, 2),
(55, 41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `totalprice` decimal(7,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `admin_Notify` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `id`, `totalprice`, `date_added`, `status`, `admin_Notify`) VALUES
(35, 2, 16.00, '2024-07-19 16:35:57', '', 0),
(36, 2, 14.25, '2024-07-19 16:53:03', '', 0),
(37, 2, 32.00, '2024-07-19 19:36:43', '', 0),
(38, 2, 4.20, '2024-07-19 21:35:09', '', 0),
(39, 2, 50.00, '2024-09-06 19:16:09', 'قيد التجهيز', 0),
(40, 2, 18.00, '2024-09-06 19:33:18', 'preparing', 0),
(41, 2, 98.00, '2024-09-06 21:17:12', 'Delivered', 1),
(42, 2, 13.60, '2024-09-07 20:47:40', 'Delivered', 1),
(43, 2, 32.30, '2024-09-08 20:01:05', 'preparing', 0),
(44, 2, 42.70, '2024-09-09 17:58:22', 'Delivered', 1),
(45, 2, 13.00, '2024-09-10 18:15:40', 'Delivering', 1),
(49, 5, 14.00, '2024-09-10 20:16:42', 'preparing', 0),
(50, 5, 13.60, '2024-09-10 20:22:25', 'Delivered', 1),
(51, 5, 14.00, '2024-09-10 20:29:32', 'Delivering', 1),
(52, 5, 13.00, '2024-09-10 21:17:53', 'preparing', 0),
(53, 5, 13.00, '2024-09-10 23:20:08', 'preparing', 0),
(54, 5, 26.00, '2024-09-10 23:32:31', 'preparing', 0),
(55, 5, 26.00, '2024-09-10 23:36:28', 'preparing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `productID` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`productID`, `title`, `description`, `Section`, `price`, `rrp`, `quantity`, `img_path`, `img_name`, `date_added`) VALUES
(41, 'Biodal 50,000 IU Optional, Vitamin D Supplement', 'Supports overall health Helps you meet your nutritional needs and support your daily health and wellness Vitamin D plays a very important role in calcium absorption and metabolism, boosts immunity, and bone health. Activates calcium absorption from the di', 'FoodSupplements', 12.00, 16.00, 10, 'https://www.al-dawaa.com/media/catalog/product/cache/0302114a80b52e12b22f44533fbf1d4b/1/0/103016.jpg', '', '2024-07-19 16:30:04'),
(42, 'Optimal Flexible Digital Thermometer', 'Complies with international safety and hygiene standards Flexible probe for easy insertion into mouth or rectum Made of safe, non-toxic materials Helps read your baby\'s temperature accurately and quickly Easy to clean', 'MD', 4.50, 0.00, 6, 'https://ozeyhome.com/wp-content/uploads/2023/11/Optimal-Digital-Flexible-Thermometer-Blue.jpg-1.png', '', '2024-07-19 16:33:19'),
(43, 'Nana Maxi Regular, 10 Pads', 'Nana 10 Maxi Pads Regular', 'WS', 1.05, 0.00, 10, 'https://cdn3.dumyah.com/image/cache/data/2021/09/16321482111291740596-520x520.jpg', '', '2024-07-19 16:35:28'),
(44, 'Baby Joy Diapers Size 3, 48 Count', 'The new Baby Joy features a silky feel and diamond cover that quickly absorbs urine and locks it inside for faster, drier protection. Baby Joy\'s fast-drying keeps your baby happy, comfortable and dry all day long. Diamond Pad Baby Joy diapers feature a di', 'BSD', 6.10, 0.00, 10, 'https://cdn.dumyah.com/image/cache/data/2022/09/16620259771345746888-800x800.jpg', '', '2024-07-19 16:37:52'),
(45, 'WaterWipes Unscented Wet Wipes, 60 Count', 'Made with 99.9% water and a drop of fruit extract. Suitable for newborns and even premature babies. Effective yet ultra-mild, pure and gentle. A convenient alternative to cotton wool and water and ideal for cleansing baby\'s delicate skin. Not a cure for n', 'BSD', 4.20, 0.00, 6, 'https://cdn.dumyah.com/image/cache/data/2024/03/17107597851498860435-800x800.jpg', '', '2024-07-19 16:39:03'),
(46, 'Aptamil Growing Up Milk Powder No. 3, 900g', 'Aptamil Junior 3 is a scientifically advanced nutritious milk for toddlers. Suitable from 1 to 3 years. Inspired by 40 years of research in early life sciences. Enriched with Pronetra for stronger immunity and optimal development. Active Progress Nutritio', 'BSF', 14.25, 0.00, 5, 'https://cdn4.dumyah.com/image/cache/data/2023/05/16831086841029636266-800x800.png', '', '2024-07-19 16:41:03'),
(47, 'Wheat and date pieces, 250 grams from Saha', 'Fortified with iron Rich in calcium and phosphorus Contains easily digestible carbohydrates Supplemented with 13 vitamins', 'BSF', 2.90, 0.00, 7, 'https://cdn.dumyah.com/image/cache/data/2022/10/166496717278521343-800x800.jpg', '', '2024-07-19 16:42:16'),
(48, 'Chicco Metal Cutlery for Girls, 18+ Months', 'Chicco 18 months metal cutlery is designed to teach babies to eat like adults. It is small, lightweight and easy to use thanks to its comfortable, non-slip handle. The fork has a rounded tooth head for maximum safety when in the hands of the little one', 'BST', 7.40, 0.00, 6, 'https://cdn4.dumyah.com/image/cache/data/2022/07/16583934181399249942-800x800.jpg', '', '2024-07-19 16:44:47'),
(49, 'Bingo Bath Thermometer, Baby Confort', 'Bath thermometer will read red when the water is too hot Accurate and easy to use Floats in the bath', 'BST', 3.00, 0.00, 4, 'https://cdn4.dumyah.com/image/cache/data/2024/01/170514434576504696-800x800.png', '', '2024-07-19 16:45:58'),
(50, 'Sundown Vitamin B12 1000 mcg 60 Tablets ', ' Support nervous system and energy metabolism health with Sundown Vitamin B12 1000 mcg tablets. (2) This important B vitamin aids in the normal development and regeneration of red blood cells and contributes to the health of your heart and circulatory sys', 'FoodSupplements', 12.00, 0.00, 10, '../uploadImages/vi122.jpg', 'vi122.jpg', '2024-09-10 17:32:41'),
(52, 'Sundown Essential Iron 65 mg 120 Tablets', 'Sundown Essential Iron is a convenient way to get the Iron your body needs for overall health. (2) Each serving of this one-per-day Iron supplement contains 65 mg of Iron as Ferrous Sulfate. Iron supports red blood cell production, plays a key role in ene', 'FoodSupplements', 11.00, 0.00, 10, '../uploadImages/iron2.png', 'iron2.png', '2024-09-10 17:36:23'),
(53, 'Sundown Odorless Fish Oil, 1290mg, Omega 3 ', 'SUPPORTS HEART AND CARDIOVASCULAR SYSTEM HEALTH (2): Taking Sundown Odorless Fish Oil Mini Softgels may support healthy circulation; helps maintain healthy triglyceride levels already within a normal range; and may reduce the risk of coronary heart diseas', 'FoodSupplements', 9.00, 0.00, 7, '../uploadImages/fishoil.png', 'fishoil.png', '2024-09-10 17:41:07'),
(54, 'Veet Hair Removal Cream With Alo Vera for Sensitive Skin, 100 Ml', 'Perfect for your Skin      Veet Hair Removal Cream leaves your skin smooth and soft, while the Shea butter and Lily scent formula protects and moisturizes it for up to 24 hours.  Lasts Twice as Long as Shaving      The cream weakens the hair, so one side ', 'WS', 3.65, 0.00, 20, '../uploadImages/veet1.jpg', 'veet1.jpg', '2024-09-10 17:49:26'),
(55, 'Fam Classic with Wings Super, 30 Pads', '2.40', 'WS', 2.40, 0.00, 15, '../uploadImages/fam.jpg', 'fam.jpg', '2024-09-10 17:51:26'),
(56, 'Freshdays Long Women Pads, 18 Pads', '    Provides everyday freshness on the days when you don’t have your period     Comfortable soft touch cover results extra soft feel     Perfect fit design adapts with your body movement', 'WS', 10.00, 0.00, 8, '../uploadImages/fresh.jpg', 'fresh.jpg', '2024-09-10 17:53:21'),
(57, 'Iris Sun Protection, 75 Ml', 'It contains many features that make it the first choice for obtaining maximum protection from the sun\'s rays Maximum protection degree + 50 SPF Contains antioxidants Works to protect the skin from pigmentation and wrinkles caused by harmful sunlight', 'suncare', 12.00, 0.00, 7, '../uploadImages/iris.jpg', 'iris.jpg', '2024-09-10 17:58:15'),
(58, 'Beesline Brown Tan Dry Feel Oil For The Body, 150ml', 'An innovative formula with a light, transparent & non-greasy texture in an easy spray dispenser form, it: Is quickly absorbed & non-sticky, ideal for immediate brown tanning. Protects the skin from sun damage. Regenerates, smoothens & moisturizes the skin', 'suncare', 18.00, 0.00, 10, '../uploadImages/bees.jpg', 'bees.jpg', '2024-09-10 18:00:12'),
(59, 'Eucerin Even Pigment Perfector Sun Fluid Spf 50+ Tinted Medium', '    Eucerin Sunscreen Pigmentation Control SPF 50+ Sunscreen for Face to Prevent Sun Spots with Color Pigments     Eucerin Sunscreen Pigmentation Control SPF 50+ is a daily facial sunscreen for all skin types that helps prevent sun-induced hyperpigmentati', 'suncare', 21.85, 0.00, 10, '../uploadImages/erin.jpg', 'erin.jpg', '2024-09-10 18:03:19'),
(60, 'Cetaphil Sun SPF50+ Liposomol Lotion 50 ml', 'Liposomal sunscreen lotion for normal to dry skin/for sensitive skin Very high protection with SPF 50+ against UVB, UVA & IR.', 'suncare', 19.50, 0.00, 10, '../uploadImages/ceta.jpg', 'ceta.jpg', '2024-09-10 18:04:08'),
(61, 'Beesline Moisturizing Body Lotion Honey & Olive Oil ,400 Ml', 'A moisturizing body lotion for dry, chapped & sensitive skin, it:      Nourishes & rejuvenates the skin     Provides an intense hydration feeling that lasts all day long     Makes the skin look healthy & feel silky smooth  Direction of Use: Apply to dry b', 'body', 10.00, 0.00, 8, '../uploadImages/beesb.jpg', 'beesb.jpg', '2024-09-10 18:06:05'),
(62, 'Bio Balance - Body Whitening Cream 60 ml', '     Use active ingredients only in the right amounts in the right combinations, and do not tire the skin.     Contain antioxidants – the skin\'s shield against aging.     Moisturize the skin wonderfully and strengthen the skin\'s natural barriers.     Cont', 'body', 11.00, 0.00, 8, '../uploadImages/bio.jpg', 'bio.jpg', '2024-09-10 18:07:11'),
(63, 'Vaseline Intensive Care Aloe Soothe Body Lotion 400ml', ' Vaseline Intensive Care Aloe soothe body lotion is clinically proven to moisturise and restore very dry skin in 5 days, This body gel is fast-restoring moisture for when your skin\'s dry and rough, This body moisturiser is fragrance free and appropriate f', 'body', 2.85, 0.00, 10, '../uploadImages/vas.jpg', 'vas.jpg', '2024-09-10 18:07:58'),
(64, 'GarnierGarnier Pure Active 3 In 1 Wash Scrub Mask 150Ml', 'Garnier Pure 3 in 1 Wash, Scrub & Mask simplifies your skin care routine by delivering 3 benefits in one product to help deeply purify, eliminate impurities, and mattify the surface of your skin. Enriched with clay and mineral zinc, Pure 3 in 1 Wash, Scru', 'face', 8.00, 0.00, 7, '../uploadImages/gar.jpg', 'gar.jpg', '2024-09-10 18:10:32'),
(65, 'CeraVe Moisturizing Cream For Dry Skin 340grams', ' Suitable for dry and very dry skin on the face and body • MVE Technology: This patented delivery system continually releases moisturizing ingredients for 24-hour hydration • Ceramides: Help restore and maintain the skin’s natural barrier • Hyaluronic aci', 'face', 15.60, 0.00, 8, '../uploadImages/cera.jpg', 'cera.jpg', '2024-09-10 18:11:53'),
(66, 'Beesline Whitening Face Mask With Vitamin C And Wild Rose, 25 Ml', '    A product that revitalizes the skin, opens it and unifies its color     A product that gives a radiant, youthful look with a healthy glow     Leaves your skin incredibly soft and smooth     Vitamin C and E maintain skin moisture and suppleness and eli', 'face', 3.50, 0.00, 6, '../uploadImages/beesf.jpg', 'beesf.jpg', '2024-09-10 18:13:21'),
(67, 'FootNess Foot Scrub WITH TEA TREE EXTRACT & PUMICE 75 ml', 'Ingredients: Aqua, Glycerin, Pentylene Glycol, Silica, Pumice, Glyceryl Oleate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Ethylhexylglycerin, Panthenol, Lactic Acid, Sodium Lactate, Melaleuca Alternifolia (Tea Tree) Leaf Extract, Creatine, Parfum, Sod', 'HFN', 7.00, 0.00, 8, '../uploadImages/foot.jpg', 'foot.jpg', '2024-09-10 18:16:48'),
(68, 'Bio Balance - Cracked Heel Cream 60 ml', '     Use active ingredients only in the right amounts in the right combinations, and do not tire the skin.     Contain antioxidants – the skin\'s shield against aging.     Moisturize the skin wonderfully and strengthen the skin\'s natural barriers.     Cont', 'HFN', 4.00, 0.00, 10, '../uploadImages/footc.jpg', 'footc.jpg', '2024-09-10 18:17:46'),
(69, 'Titania Calcium for nails', 'Nail strengthening gel made in Germany. Strengthens the nail structure.', 'HFN', 6.00, 0.00, 8, '../uploadImages/nail.jpg', 'nail.jpg', '2024-09-10 18:18:27'),
(70, 'Bio Balance - Hand & Nail Cream 60 ml', 'This product has Non-Greasy & Quickly Absorbed Formula with Whitening Effect with Vitamin C. ', 'HFN', 4.50, 0.00, 10, '../uploadImages/hand.jpg', 'hand.jpg', '2024-09-10 18:20:04'),
(71, 'Bio Balance - Under Eye Brightening Cream 15 ml', 'Use active ingredients only in the right amounts in the right combinations, and do not tire the skin. Contain antioxidants – the skin\'s shield against aging. Moisturize the skin wonderfully and strengthen the skin\'s natural barriers. Contain complementary', 'eyes_Lips', 9.50, 0.00, 10, '../uploadImages/eyes.jpg', 'eyes.jpg', '2024-09-10 18:22:07'),
(72, 'Beesline Whitening Eye Contour Cream , 30ml', '     Lightens the eye contour area.      Lifts & smoothens wrinkles, reduces puffiness & fatigue signs.      Comforts, soothes & calms the eye contour area.      Protects the skin against UV damag.      Use twice; first thing in the morning and before bed', 'eyes_Lips', 18.00, 0.00, 6, '../uploadImages/eyes2.jpg', 'eyes2.jpg', '2024-09-10 18:22:56'),
(73, 'Cetaphil Protective Lip Balm SPF 50- 8 ml', '    Protective lip balm with SPF 50+     Moisturizes, adds softness and protects against dryness or chapping of the lips caused by dry weather or constant exposure to sunlight     The perfect choice for soft lips all the time', 'eyes_Lips', 4.95, 0.00, 8, '../uploadImages/vetae.png', 'vetae.png', '2024-09-10 18:23:51'),
(74, 'Beesline Lip Care Flavour Free, 40 Ml', '    Categories: lips     Suitable skin type: Dry     Structure: butter     Recommended Use : Moisturizing     Size : 40ml     Type: Moisturizers     Brand: Beesline', 'eyes_Lips', 3.00, 0.00, 8, '../uploadImages/bees3.jpg', 'bees3.jpg', '2024-09-10 18:24:39'),
(75, 'Herbatinit FF2 Crimson Red, 150ml', '    Free from ammonia, resorcinol, parabens, fragrance and alcohol     Contains ppd so always be skin safe     Easy to use and gentle on your hair     Conditioning lasting colour with natural results     Provides natural gloss and shine', 'hairT', 12.00, 0.00, 8, '../uploadImages/color1.jpg', 'color1.jpg', '2024-09-10 18:28:42'),
(76, 'Garnier Color Naturals Number 4.62', '    Nourished hair means better color with Garnier Color Naturals.     The dye is enriched with olive oil, avocado oil and shea, and deeply nourishes your hair during and after dyeing for up to 8 weeks.     For a natural, lustrous color', 'hairT', 5.45, 0.00, 10, '../uploadImages/garn.jpeg', 'garn.jpeg', '2024-09-10 18:30:00'),
(77, 'Fanola Oro Puro Hair Coloring Cream, Violet no. 5.2', 'Healthy hair means healthy color. That\'s the truth that drives the Oro Puro permanent hair color line from Fanola. The formula is completely ammonia free, and uses keratin proteins to help strengthen the hair and repair damage. Each color is illuminated a', 'hairT', 6.75, 0.00, 10, '../uploadImages/color2.jpg', 'color2.jpg', '2024-09-10 18:30:51'),
(78, 'Trisa Professional Hairbrush XL Styling, round brush', 'Easy Comb Hair Brush –  Grooming your hair is made perfect with the Trisa SE Brushing Large Rubber Cushion. It is stylish and compact which helps to maintain the silkiness of your hair.', 'hairB', 8.00, 0.00, 7, '../uploadImages/tris.jpg', 'tris.jpg', '2024-09-10 18:32:15'),
(79, 'Optimal Plastic Hair Brush Comb', '    fits easily into a purse or a bag, allowing you to have beautiful, soft, healthy and tangle-free hair', 'hairB', 1.00, 0.00, 6, '../uploadImages/br.jpg', 'br.jpg', '2024-09-10 18:32:55'),
(80, 'Optimal Wooden Hair Brush Big', '    GREAT FOR STRAIGHTENING & SMOOTHING HAIR - Enjoy soft and smooth hairstyles and make a confident impression with our paddle brush for hair      holds your hair altogether helping you quickly and effectively comb your hair.      This travel-friendly ha', 'hairB', 6.10, 0.00, 8, '../uploadImages/br2.jpg', 'br2.jpg', '2024-09-10 18:33:34'),
(81, 'Trisa professional brushing large', 'Easy Comb Hair Brush –  Grooming your hair is made perfect with the Trisa SE Brushing Large Rubber Cushion. It is stylish and compact which helps to maintain the silkiness of your hair.', 'hairB', 6.00, 0.00, 8, '../uploadImages/br3.jpg', 'br3.jpg', '2024-09-10 18:34:14'),
(82, 'Bio Balance - Lavender Shampoo 330ml', 'Bio Balance Sulfate-Free Organic Lavender Shampoo restores strength of hair and starts repairing damage from day one. Great for women who dream of longer hair growth', 'hairS', 8.30, 0.00, 8, '../uploadImages/sha.jpg', 'sha.jpg', '2024-09-10 19:06:40'),
(83, 'Wow Skin Science Apple Cider Vinegar Shampoo , 300ml', '    Apple cider vinegar encourages healthy hair growth helps hair retain more moisture helping to prevent split ends.      Apple cider vinegar has antibacterial & antifungal properties that helps to remove dandruff, itchy & dry scalp.      Helps bring sil', 'hairS', 6.00, 0.00, 8, '../uploadImages/wow.jpg', 'wow.jpg', '2024-09-10 19:07:18'),
(84, 'Gersy hair and body shampoo 2 liters / Night wish', '    Gives your skin a smooth feel, and freshens your hair. Choose from a collection of flavors.Rich composition of nutrients for your body and skin     Cleaning and protecting hair and skin     Rich composition of nutrients for your body and skin     Suit', 'hairS', 3.65, 0.00, 7, '../uploadImages/ger.jpg', 'ger.jpg', '2024-09-10 19:08:00'),
(85, 'Vatika Hot Oil Treatment Cream, Black Seed, 500 Gram', '    A mask for all hair types with black cumin seed extract has a gentle effect on the skin and hair,      normalizes the work of the sebaceous glands, and restores the hair structure.      Prevents inflammatory processes, regenerates inflamed areas of th', 'hairC', 2.00, 0.00, 5, '../uploadImages/vat.png', 'vat.png', '2024-09-10 19:10:26'),
(86, 'Wow Skin Science Apple Cider Vinegar Hair Mask, 200ml', 'Use this mask once a week to help add volume and smoothen rough hair. Give your hair clarifying and balancing care with WOW Skin Science Apple Cider Vinegar Hair Mask. This hair mask has a blend of natural ingredients that aids in enhancing your hair text', 'hairC', 8.00, 0.00, 8, '../uploadImages/wow2.jpg', 'wow2.jpg', '2024-09-10 19:11:44'),
(87, 'Olaplex Bonding Oil Number.7 - 30 ml', '     Reduces fluffy hair and eliminates \'Flyaways\'     Restores & strengthens     Creates a high gloss     UV and heat resistant up to 230 ° C     Accelerates the hair dryer time     Vegan & animal proof free', 'hairC', 27.00, 0.00, 8, '../uploadImages/oil4.jpg', 'oil4.jpg', '2024-09-10 19:12:31'),
(88, 'Iris Revitalizing Hair Oil 225ml', 'Natural Ingredients of olive, sweet almond, avocado, coconut and castor oil are ideal for hair; it provides a protective layer to combat the damaging affect of sun, wind and cold weather, Keeps the hair manageable, smooth and healthy.  Apply and message t', 'hairC', 9.00, 0.00, 9, '../uploadImages/iriso.jpg', 'iriso.jpg', '2024-09-10 19:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `productID` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `productID`, `username`, `email`, `password`, `phone_number`, `location`, `created_AT`, `role`) VALUES
(1, 0, 'Rahaf', 'Rahaf@Riad.com', '$2y$10$0lEiUEsFO87i1T7/TR.F3eF2QLpV3XAYs0ofjZ6ysbeo77DZvPQDa', '0781212122', 'dsdsds-dsdsd-sdsds', '2024-07-02 21:05:43', 'admin'),
(2, 0, 'apple', 'apple@juice.com', '$2y$10$dczMiWbJekDrMd62L5ds8.9TP2ebV.yU0bAYWe.0bDz6Csk6b9kZi', '0123567782', 'dsdsds-dsdsd-ggg', '2024-07-11 18:35:17', 'user'),
(3, 0, 'orange', 'orange@juice.com', '$2y$10$agcx/EerPDR0vzXwIXxdZOcO2GpQusa49vsJb0EU3WMAsFOBAyNYO', '123456782', 'llll-jkjk-kkk', '2024-07-13 19:13:42', 'user'),
(4, 0, 'orangee', 'orangee@juice.com', '$2y$10$0Y/glmbm05fQhrZcLKC28OhwYslAUI1tEJ06O8k9eRdUV4IFMuNpi', '123456782', 'llll-jkjk-kkk', '2024-07-14 18:29:56', 'user'),
(5, 0, 'RahafRiad', 'rahafriad@Tulip.com', '$2y$10$44FPLHTnnmoKE7Ggdy67kOV.MzJZN0kVfe6Y.DALQ8peXyws0HCha', '0771212122', 'jordan-amman', '2024-09-10 21:12:57', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `MU foreign` (`id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productForeign` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `Foreign1` (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `MU foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD CONSTRAINT `orderForeign` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productForeign` FOREIGN KEY (`productID`) REFERENCES `shoppingcart` (`productID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Foreign1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
