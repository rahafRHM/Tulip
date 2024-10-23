-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 12:15 AM
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
(55, 41, 2),
(56, 52, 1),
(57, 57, 1),
(58, 76, 1),
(59, 49, 3),
(60, 41, 1),
(61, 41, 1),
(62, 46, 1),
(63, 41, 1),
(64, 43, 1),
(65, 64, 1),
(66, 46, 1),
(67, 52, 1),
(68, 52, 1),
(69, 75, 1),
(70, 65, 1),
(71, 41, 1),
(72, 41, 1),
(73, 41, 1),
(74, 58, 1),
(75, 41, 1),
(76, 41, 1),
(77, 74, 1),
(78, 41, 1),
(79, 41, 1),
(80, 50, 1),
(81, 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `totalprice` decimal(7,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status_en` varchar(100) NOT NULL,
  `status_ar` varchar(255) NOT NULL,
  `admin_Notify` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `id`, `totalprice`, `date_added`, `status_en`, `status_ar`, `admin_Notify`) VALUES
(41, 2, 98.00, '2024-09-06 21:17:12', 'Delivered', 'تم التوصيل', 1),
(42, 2, 13.60, '2024-09-07 20:47:40', 'Delivered', 'تم التوصيل', 1),
(43, 2, 32.30, '2024-09-08 20:01:05', 'preparing', 'قيد التجهيز', 0),
(80, 2, 14.00, '2024-10-23 23:31:01', 'preparing', 'قيد التجهيز', 0),
(81, 2, 4.40, '2024-10-23 23:31:26', 'preparing', 'قيد التجهيز', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `productID` int(100) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
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

INSERT INTO `shoppingcart` (`productID`, `title_en`, `title_ar`, `description_en`, `description_ar`, `Section`, `price`, `rrp`, `quantity`, `img_path`, `img_name`, `date_added`) VALUES
(0, 'Vatika Hot Oil Treatment Cream, Black Seed, 500 Gram', 'كريم فاتيكا لعلاج الشعر بالزيت الساخن، حبة البركة، 500 جرام', 'A mask for all hair types with black cumin seed extract has a gentle effect on the skin and hair,      normalizes the work of the sebaceous glands, and restores the hair structure Prevents inflammatory processes, regenerates inflamed areas of th', 'قناع لجميع أنواع الشعر بخلاصة حبة البركة السوداء له تأثير لطيف على البشرة والشعر، وينظم عمل الغدد الدهنية، ويعيد بنية الشعر، ويمنع العمليات الالتهابية، ويجدد المناطق الملتهبة من الشعر.', 'hairC', 2.00, 0.00, 5, '../uploadImages/vat.png', 'vat.png', '2024-09-10 19:10:26'),
(41, 'Biodal 50,000 IU, Vitamin D Supplement', 'بيودال 50000 وحدة دولية، مكمل فيتامين د', '         Supports overall health Helps you meet your nutritional needs and support your daily health and wellness Vitamin D plays a very important role in calcium absorption and metabolism, boosts immunity, and bone health. Activates calcium absorption fr', 'يدعم الصحة العامة يساعدك على تلبية احتياجاتك الغذائية ودعم صحتك وعافيتك اليومية يلعب فيتامين د دورًا مهمًا للغاية في امتصاص الكالسيوم واستقلابه، ويعزز المناعة وصحة العظام. ينشط امتصاص الكالسيوم من الأمعاء.     ', 'FoodSupplements', 12.00, 16.00, 12, 'https://www.al-dawaa.com/media/catalog/product/cache/0302114a80b52e12b22f44533fbf1d4b/1/0/103016.jpg', '', '2024-07-19 16:30:04'),
(43, 'Nana Maxi Regular, 10 Pads', 'نانا ماكسي عادية، 10 فوط', 'Nana 10 Maxi Pads Regular', 'نانا 10 فوط ماكسي عادية', 'WS', 1.05, 0.00, 10, 'https://cdn3.dumyah.com/image/cache/data/2021/09/16321482111291740596-520x520.jpg', '', '2024-07-19 16:35:28'),
(44, 'Baby Joy Diapers Size 3, 48 Count', 'حفاضات بيبي جوي مقاس 3، 48 قطعة', 'The new Baby Joy features a silky feel and diamond cover that quickly absorbs urine and locks it inside for faster, drier protection. Baby Joy\'s fast-drying keeps your baby happy, comfortable and dry all day long. Diamond Pad Baby Joy diapers feature ', 'تتميز حفاضات بيبي جوي الجديدة بملمس حريري وغطاء ماسي يمتص البول بسرعة ويحبسه بالداخل لحماية أسرع وأكثر جفافًا. تحافظ حفاضات بيبي جوي سريعة الجفاف على سعادة طفلك وراحته وجفافه طوال اليوم. تتميز حفاضات بيبي جوي ذات الوسادة الماسية ببطانة ماسية', 'BSD', 6.10, 0.00, 10, 'https://cdn.dumyah.com/image/cache/data/2022/09/16620259771345746888-800x800.jpg', '', '2024-07-19 16:37:52'),
(45, 'WaterWipes Unscented Wet Wipes, 60 Count', 'مناديل مبللة غير معطرة من ووتر وايبس، 60 منديلًا', 'Made with 99.9% water and a drop of fruit extract. Suitable for newborns and even premature babies. Effective yet ultra-mild, pure and gentle. A convenient alternative to cotton wool and water and ideal for cleansing baby\'s delicate skin. Not a cure for n', 'مصنوع من 99.9% ماء وقطرة من مستخلص الفاكهة. مناسب للمواليد الجدد وحتى الأطفال الخدج. فعال ولطيف للغاية. بديل مناسب للقطن والماء ومثالي لتنظيف بشرة الطفل الرقيقة.', 'BSD', 4.20, 0.00, 6, 'https://cdn.dumyah.com/image/cache/data/2024/03/17107597851498860435-800x800.jpg', '', '2024-07-19 16:39:03'),
(46, 'Aptamil Growing Up Milk Powder No. 3, 900g', 'حليب الأطفال المجفف من ابتاميل رقم 3، 900 جرام', 'Aptamil Junior 3 is a scientifically advanced nutritious milk for toddlers. Suitable from 1 to 3 years. Inspired by 40 years of research in early life sciences. Enriched with Pronetra for stronger immunity and optimal development. Active Progress Nutritio', 'أبتاميل جونيور 3 هو حليب مغذي متقدم علميًا للأطفال الصغار. مناسب من 1 إلى 3 سنوات. مستوحى من 40 عامًا من الأبحاث في علوم الحياة المبكرة. غني ببرونيترا لمناعة أقوى وتطور مثالي.', 'BSF', 14.25, 0.00, 5, 'https://cdn4.dumyah.com/image/cache/data/2023/05/16831086841029636266-800x800.png', '', '2024-07-19 16:41:03'),
(47, 'Wheat and date pieces, 250 grams from Saha', 'قمح وقطع تمر 250 جرام من صحة', 'Fortified with iron Rich in calcium and phosphorus Contains easily digestible carbohydrates Supplemented with 13 vitamins', 'مدعم بالحديد غني بالكالسيوم والفوسفور يحتوي على كربوهيدرات سهلة الهضم مكمل بـ 13 فيتامين', 'BSF', 2.90, 0.00, 7, 'https://cdn.dumyah.com/image/cache/data/2022/10/166496717278521343-800x800.jpg', '', '2024-07-19 16:42:16'),
(48, 'Chicco Metal Cutlery for Girls, 18+ Months', 'أدوات مائدة معدنية من شيكو للبنات، 18 شهرًا أو أكثر', 'Chicco 18 months metal cutlery is designed to teach babies to eat like adults. It is small, lightweight and easy to use thanks to its comfortable, non-slip handle. The fork has a rounded tooth head for maximum safety when in the hands of the little one', 'تم تصميم أدوات المائدة المعدنية من تشيكو للأطفال بعمر 18 شهرًا لتعليم الأطفال تناول الطعام مثل البالغين. إنها صغيرة وخفيفة الوزن وسهلة الاستخدام بفضل مقبضها المريح غير القابل للانزلاق. تحتوي الشوكة على رأس مسنن مستدير لتحقيق أقصى قدر من الأمان عند وضعها ف', 'BST', 7.40, 0.00, 6, 'https://cdn4.dumyah.com/image/cache/data/2022/07/16583934181399249942-800x800.jpg', '', '2024-07-19 16:44:47'),
(49, 'Bingo Bath Thermometer, Baby Confort', 'مقياس حرارة حمام بينجو، بيبي كونفورت', 'Bath thermometer will read red when the water is too hot Accurate and easy to use Floats in the bath', 'سيظهر مقياس حرارة الحمام باللون الأحمر عندما يكون الماء ساخنًا جدًا، دقيق وسهل الاستخدام، يطفو في الحمام', 'BST', 3.00, 0.00, 4, 'https://cdn4.dumyah.com/image/cache/data/2024/01/170514434576504696-800x800.png', '', '2024-07-19 16:45:58'),
(50, 'Sundown Vitamin B12 1000 mcg 60 Tablets ', 'صن داون فيتامين ب12 1000 ميكروجرام 60 قرص', ' Support nervous system and energy metabolism health with Sundown Vitamin B12 1000 mcg tablets. (2) This important B vitamin aids in the normal development and regeneration of red blood cells and contributes to the health of your heart and circulatory sys', 'يدعم صن داون فيتامين بي 12 صحة الجهاز العصبي واستقلاب الطاقة مع أقراص . (2) يساعد فيتامين B المهم هذا في التطور الطبيعي وتجديد خلايا الدم الحمراء ويساهم في صحة قلبك ونظامك الدوري.', 'FoodSupplements', 12.00, 0.00, 10, '../uploadImages/vi122.jpg', 'vi122.jpg', '2024-09-10 17:32:41'),
(52, 'Sundown Essential Iron 65 mg 120 Tablets', 'اقراص صن داون حديد الاساسي 120 قرص ', 'Sundown Essential Iron is a convenient way to get the Iron your body needs for overall health. (2) Each serving of this one-per-day Iron supplement contains 65 mg of Iron as Ferrous Sulfate. Iron supports red blood cell production.', 'Sundown Essential Iron هو وسيلة ملائمة للحصول على الحديد الذي يحتاجه جسمك للصحة العامة. (2) تحتوي كل وجبة من هذا المكمل الغذائي اليومي للحديد على 65 مجم من الحديد على شكل كبريتات الحديدوز. يدعم الحديد إنتاج خلايا الدم الحمراء', 'FoodSupplements', 11.00, 0.00, 10, '../uploadImages/iron2.png', 'iron2.png', '2024-09-10 17:36:23'),
(53, 'Sundown Odorless Fish Oil, 1290mg, Omega 3 ', 'زيت السمك الخالي من الرائحة من صن داون ، أوميجا 3', 'SUPPORTS HEART AND CARDIOVASCULAR SYSTEM HEALTH (2): Taking Sundown Odorless Fish Oil Mini Softgels may support healthy circulation; helps maintain healthy triglyceride levels already within a normal range; and may reduce the risk of coronary heart diseas', 'يدعم صحة القلب والجهاز القلبي الوعائي (2): قد يساعد تناول كبسولات Sundown Odorless Fish Oil Mini Softgels على دعم الدورة الدموية الصحية؛ ويساعد في الحفاظ على مستويات صحية من الدهون الثلاثية ضمن النطاق الطبيعي بالفعل؛ وقد يقلل من خطر الإصابة بأمراض القلب ا', 'FoodSupplements', 9.00, 0.00, 7, '../uploadImages/fishoil.png', 'fishoil.png', '2024-09-10 17:41:07'),
(54, 'Veet Hair Removal Cream With Alo Vera for Sensitive Skin, 100 Ml', 'كريم فيت لإزالة الشعر بالصبار للبشرة الحساسة، 100 مل', 'Perfect for your Skin      Veet Hair Removal Cream leaves your skin smooth and soft, while the Shea butter and Lily scent formula protects and moisturizes it for up to 24 hours.  Lasts Twice as Long as Shaving      The cream weakens the hair, so one side ', 'مثالي لبشرتك، يترك كريم إزالة الشعر فيت بشرتك ناعمة وطرية، بينما تحميها تركيبة زبدة الشيا ورائحة الزنبق وترطبها لمدة تصل إلى 24 ساعة. يدوم ضعف مدة الحلاقة، يضعف الكريم الشعر، لذا فإن أحد الجانبين', 'WS', 3.65, 0.00, 20, '../uploadImages/veet1.jpg', 'veet1.jpg', '2024-09-10 17:49:26'),
(55, 'Fam Classic with Wings Super, 30 Pads', 'فام كلاسيك بالأجنحة سوبر، 30 فوطة', 'Fam Classic with Wings, 30 Sanitary Pads\r\nSoft and highly absorbent', 'فام كلاسيك بالأجنحة، 30 فوطة صحية\r\nنعومة وامتصاص عالي', 'WS', 2.40, 0.00, 15, '../uploadImages/fam.jpg', 'fam.jpg', '2024-09-10 17:51:26'),
(56, 'Freshdays Long Women Pads, 18 Pads', 'فوط نسائية طويلة من فريش دايز، 18 فوطة', '             Provides everyday freshness on the days when you don’t have your period     Comfortable soft touch cover results extra soft feel     Perfect fit design adapts with your body movement', 'يمنحك انتعاشًا يوميًا في الأيام التي لا تأتي فيها دورتك الشهرية. غطاء ناعم ومريح يمنحك شعورًا بالنعومة الإضافية. تصميم ملائم تمامًا يتكيف مع حركة جسمك.     ', 'WS', 1.60, 0.00, 8, '../uploadImages/fresh.jpg', 'fresh.jpg', '2024-09-10 17:53:21'),
(57, 'Iris Sun Protection, 75 Ml', 'كريم حماية من الشمس من ايريس، 75 مل', 'It contains many features that make it the first choice for obtaining maximum protection from the sun\'s rays Maximum protection degree + 50 SPF Contains antioxidants Works to protect the skin from pigmentation and wrinkles caused by harmful sunlight', 'يحتوي على العديد من المميزات التي تجعله الاختيار الأول للحصول على أقصى حماية من أشعة الشمس أقصى درجة حماية +50 SPF يحتوي على مضادات الأكسدة يعمل على حماية البشرة من التصبغات والتجاعيد الناتجة عن أشعة الشمس الضارة', 'suncare', 12.00, 0.00, 7, '../uploadImages/iris.jpg', 'iris.jpg', '2024-09-10 17:58:15'),
(58, 'Beesline Brown Tan Dry Feel Oil For The Body, 150ml', 'زيت بيزلين براون تان للجسم، 150 مل', 'An innovative formula with a light, transparent & non-greasy texture in an easy spray dispenser form, it: Is quickly absorbed & non-sticky, ideal for immediate brown tanning. Protects the skin from sun damage. Regenerates, smoothens & moisturizes the skin', 'تركيبة مبتكرة ذات ملمس خفيف وشفاف وغير دهني في شكل بخاخ سهل الاستخدام، فهو: يمتص بسرعة ولا يلتصق، مثالي للتسمير البني الفوري. يحمي البشرة من أضرار أشعة الشمس. يجدد البشرة وينعمها ويرطبها.', 'suncare', 18.00, 0.00, 10, '../uploadImages/bees.jpg', 'bees.jpg', '0000-00-00 00:00:00'),
(59, 'Eucerin Even Pigment Perfector Sun Fluid Spf 50+ Tinted Medium', 'سائل الحماية من الشمس من يوسيرين ', '    Eucerin Sunscreen Pigmentation Control SPF 50+ Sunscreen for Face to Prevent Sun Spots with Color Pigments     Eucerin Sunscreen Pigmentation Control SPF 50+ is a daily facial sunscreen for all skin types that helps prevent sun-induced hyperpigmentati', 'واقي الشمس Eucerin Sunscreen SPF 50+ واقي من الشمس للوجه لمنع ظهور بقع الشمس مع الصبغات الملونة، وهو واقي شمسي يومي للوجه لجميع أنواع البشرة يساعد على منع فرط التصبغ الناتج عن الشمس', 'suncare', 21.85, 0.00, 10, '../uploadImages/erin.jpg', 'erin.jpg', '2024-09-10 18:03:19'),
(60, 'Cetaphil Sun SPF50+ Liposomol Lotion 50 ml', 'لوشن سيتافيل صن \r\nSPF50+', 'Liposomal sunscreen lotion for normal to dry skin/for sensitive skin Very high protection with SPF 50+ against UVB, UVA & IR.', 'لوشن واقي من الشمس ليبوسومي للبشرة العادية إلى الجافة/للبشرة الحساسة حماية عالية جدًا مع عامل حماية من الشمس SPF 50+ ضد الأشعة فوق البنفسجية UVB وUVA وIR.', 'suncare', 19.50, 0.00, 10, '../uploadImages/ceta.jpg', 'ceta.jpg', '2024-09-10 18:04:08'),
(61, 'Beesline Moisturizing Body Lotion Honey & Olive Oil ,400 Ml', 'بيزلين لوشن مرطب للجسم بالعسل وزيت الزيتون، 400 مل', 'A moisturizing body lotion for dry, chapped & sensitive skin, it:      Nourishes & rejuvenates the skin     Provides an intense hydration feeling that lasts all day long     Makes the skin look healthy & feel silky smooth  Direction of Use: Apply to dry b', 'لوشن مرطب للجسم للبشرة الجافة والمتشققة والحساسة، فهو: يغذي ويجدد البشرة. يوفر شعورًا بالترطيب المكثف الذي يدوم طوال اليوم. يجعل البشرة تبدو صحية وناعمة كالحرير.', 'body', 10.00, 0.00, 8, '../uploadImages/beesb.jpg', 'beesb.jpg', '2024-09-10 18:06:05'),
(62, 'Bio Balance - Body Whitening Cream 60 ml', 'بايو بالانس - كريم تبييض الجسم 60 مل', '  Contain antioxidants – the skin\'s shield against aging.     Moisturize the skin wonderfully and strengthen the skin\'s natural barriers.     Cont', 'تحتوي على مضادات الأكسدة - درع البشرة ضد الشيخوخة. ترطب البشرة بشكل رائع وتقوي الحواجز الطبيعية للبشرة.', 'body', 11.00, 0.00, 8, '../uploadImages/bio.jpg', 'bio.jpg', '2024-09-10 18:07:11'),
(63, 'Vaseline Intensive Care Aloe Soothe Body Lotion 400ml', 'لوشن فازلين للعناية المركزة بالصبار المهدئ للجسم 400 مل', ' Vaseline Intensive Care Aloe soothe body lotion is clinically proven to moisturise and restore very dry skin in 5 days, This body gel is fast-restoring moisture for when your skin\'s dry and rough, This body moisturiser is fragrance free and appropriate f', 'ثبت سريريًا أن لوشن الجسم فازلين الوفيرا كير يرطب ويستعيد البشرة الجافة جدًا في 5 أيام، يعمل جل الجسم هذا على استعادة الرطوبة بسرعة عندما تكون بشرتك جافة وخشنة، مرطب الجسم هذا خالٍ من العطور ومناسب للاستخدام اليومي.', 'body', 2.85, 0.00, 10, '../uploadImages/vas.jpg', 'vas.jpg', '2024-09-10 18:07:58'),
(64, 'Garnier Pure Active 3 In 1 Wash Scrub Mask 150Ml', ' غارنييه بيور أكتيف 3 في 1 غسول وقناع مقشر 150 مل', 'Garnier Pure 3 in 1 Wash, Scrub & Mask simplifies your skin care routine by delivering 3 benefits in one product to help deeply purify, eliminate impurities, and mattify the surface of your skin. Enriched with clay and mineral zinc, Pure 3 in 1 Wash, Scru', 'يبسط غسول ومقشر وماسك 3 في 1 من غارنييه روتين العناية بالبشرة من خلال تقديم 3 فوائد في منتج واحد للمساعدة في تنقية البشرة بعمق والتخلص من الشوائب وإضفاء مظهر غير لامع على سطح بشرتك. غني بالطين والزنك المعدني، غسول ومقشر 3 في 1 من غارنييه', 'face', 8.00, 0.00, 7, '../uploadImages/gar.jpg', 'gar.jpg', '2024-09-10 18:10:32'),
(65, 'CeraVe Moisturizing Cream For Dry Skin 340grams', 'كريم مرطب سيرافي للبشرة الجافة 340 جرام', ' Suitable for dry and very dry skin on the face and body • MVE Technology: This patented delivery system continually releases moisturizing ingredients for 24-hour hydration • Ceramides: Help restore and maintain the skin’s natural barrier • Hyaluronic aci', 'مناسب للبشرة الجافة والجافة جدًا على الوجه والجسم • تقنية MVE: يطلق نظام التوصيل الحاصل على براءة اختراع مكونات مرطبة بشكل مستمر لترطيب لمدة 24 ساعة • السيراميد: يساعد على استعادة والحفاظ على حاجز البشرة الطبيعي • حمض الهيالورونيك', 'face', 15.60, 0.00, 8, '../uploadImages/cera.jpg', 'cera.jpg', '2024-09-10 18:11:53'),
(66, 'Beesline Whitening Face Mask With Vitamin C And Wild Rose, 25 Ml', 'قناع بيزلين لتفتيح البشرة بفيتامين سي و الورد البري، 25 مل', '    A product that revitalizes the skin, opens it and unifies its color     A product that gives a radiant, youthful look with a healthy glow     Leaves your skin incredibly soft and smooth     Vitamin C and E maintain skin moisture and suppleness and eli', 'منتج ينشط البشرة ويفتحها ويوحد لونها منتج يعطي مظهراً شبابياً متألقاً مع توهج صحي يترك بشرتك ناعمة وسلسة بشكل لا يصدق فيتامين C و E يحافظان على رطوبة البشرة ونعومتها ويزيلان الشوائب', 'face', 3.50, 0.00, 6, '../uploadImages/beesf.jpg', 'beesf.jpg', '2024-09-10 18:13:21'),
(67, 'FootNess Foot Scrub WITH TEA TREE EXTRACT & PUMICE 75 ml', 'مقشر القدمين من فوت نيس بخلاصة شجرة الشاي والحجر الخفاف 75 مل', 'Ingredients: Aqua, Glycerin, Pentylene Glycol, Silica, Pumice, Glyceryl Oleate, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Ethylhexylglycerin, Panthenol, Lactic Acid, Sodium Lactate, Melaleuca Alternifolia (Tea Tree) Leaf Extract, Creatine, Parfum, Sod', 'المكونات: ماء، جلسرين، بنتيلين جليكول، سيليكا، حجر الخفاف، جليسريل أوليات، أكريلات/بوليمر متقاطع ألكيل أكريلات C10-30، إيثيل هكسيل جلسرين، بانثينول، حمض اللاكتيك، لاكتات الصوديوم، مستخلص أوراق شجرة الشاي، الكرياتين، العطر، الصوديوم', 'HFN', 7.00, 0.00, 8, '../uploadImages/foot.jpg', 'foot.jpg', '2024-09-10 18:16:48'),
(68, 'Bio Balance - Cracked Heel Cream 60 ml', 'بيو بالانس - كريم الكعب المتشقق 60 مل', '     Use active ingredients only in the right amounts in the right combinations, and do not tire the skin.     Contain antioxidants – the skin\'s shield against aging.     Moisturize the skin wonderfully and strengthen the skin\'s natural barriers.     Cont', 'استخدمي المكونات النشطة فقط بالكميات الصحيحة في التركيبات الصحيحة، ولا تتعبي بشرتك. تحتوي على مضادات الأكسدة - درع البشرة ضد الشيخوخة. ترطيب البشرة بشكل رائع وتقوية الحواجز الطبيعية للبشرة.', 'HFN', 4.00, 0.00, 10, '../uploadImages/footc.jpg', 'footc.jpg', '2024-09-10 18:17:46'),
(69, 'Titania Calcium for nails', 'تيتانيا كالسيوم للأظافر', 'Nail strengthening gel . Strengthens the nail structure.', 'جل تقوية الأظافر. يقوي بنية الأظافر.', 'HFN', 6.00, 0.00, 8, '../uploadImages/nail.jpg', 'nail.jpg', '2024-09-10 18:18:27'),
(70, 'Bio Balance - Hand & Nail Cream 60 ml', 'بايو بالانس - كريم اليدين والأظافر 60 مل', 'This product has Non-Greasy & Quickly Absorbed Formula with Whitening Effect with Vitamin C. ', 'يحتوي هذا المنتج على تركيبة غير دهنية وسريعة الامتصاص مع تأثير التبييض مع فيتامين سي.', 'HFN', 4.50, 0.00, 10, '../uploadImages/hand.jpg', 'hand.jpg', '2024-09-10 18:20:04'),
(71, 'Bio Balance - Under Eye Brightening Cream 15 ml', 'بيو بالانس - كريم تفتيح تحت العين 15 مل', 'Use active ingredients only in the right amounts in the right combinations, and do not tire the skin. Contain antioxidants – the skin\'s shield against aging. Moisturize the skin wonderfully and strengthen the skin\'s natural barriers. Contain complementary', 'استخدمي المكونات النشطة فقط بالكميات الصحيحة في التركيبات الصحيحة، ولا تتعبي بشرتك. تحتوي على مضادات الأكسدة - درع البشرة ضد الشيخوخة. ترطيب البشرة بشكل رائع وتقوية الحواجز الطبيعية للبشرة. تحتوي على مكونات تكميلية', 'eyes_Lips', 9.50, 0.00, 10, '../uploadImages/eyes.jpg', 'eyes.jpg', '2024-09-10 18:22:07'),
(72, 'Beesline Whitening Eye Contour Cream , 30ml', 'كريم بيزلين لتفتيح محيط العين، 30 مل', '     Lightens the eye contour area.      Lifts & smoothens wrinkles, reduces puffiness & fatigue signs.      Comforts, soothes & calms the eye contour area.      Protects the skin against UV damag.      Use twice; first thing in the morning and before bed', 'يفتح منطقة محيط العين. يرفع وينعم التجاعيد، ويقلل من الانتفاخات وعلامات التعب. يريح ويهدئ منطقة محيط العين. يحمي البشرة من أضرار الأشعة فوق البنفسجية. استخدميه مرتين؛ أول شيء في الصباح وقبل النوم', 'eyes_Lips', 18.00, 0.00, 6, '../uploadImages/eyes2.jpg', 'eyes2.jpg', '2024-09-10 18:22:56'),
(73, 'Cetaphil Protective Lip Balm SPF 50- 8 ml', 'مرطب الشفاه الواقي من سيتافيل بعامل حماية من أشعة الشمس 50 ', '    Protective lip balm with SPF 50+     Moisturizes, adds softness and protects against dryness or chapping of the lips caused by dry weather or constant exposure to sunlight     The perfect choice for soft lips all the time', 'مرطب الشفاه الواقي بعامل حماية من الشمس SPF 50+ يرطب ويضيف نعومة ويحمي من جفاف أو تشقق الشفاه الناتج عن الطقس الجاف أو التعرض المستمر لأشعة الشمس الاختيار الأمثل لشفاه ناعمة طوال الوقت', 'eyes_Lips', 4.95, 0.00, 8, '../uploadImages/vetae.png', 'vetae.png', '2024-09-10 18:23:51'),
(74, 'Beesline Lip Care Flavour Free, 40 Ml', 'مرطب الشفاه بيزلين خالي من النكهات، 40 مل', '    Categories: lips     Suitable skin type: Dry     Structure: butter     Recommended Use : Moisturizing     Size : 40ml     Type: Moisturizers     Brand: Beesline', 'التصنيفات: الشفاه نوع البشرة المناسبة: الجافة البنية: زبدة الاستخدام الموصى به: مرطب الحجم: 40 مل النوع: مرطبات العلامة التجارية: بيزلين', 'eyes_Lips', 3.00, 0.00, 8, '../uploadImages/bees3.jpg', 'bees3.jpg', '2024-09-10 18:24:39'),
(75, 'Herbatinit FF2 Crimson Red, 150ml', 'هيرباتينت FF2 أحمر قرمزي، 150 مل', '    Free from ammonia, resorcinol, parabens, fragrance and alcohol     Contains ppd so always be skin safe     Easy to use and gentle on your hair     Conditioning lasting colour with natural results     Provides natural gloss and shine', 'خالي من الأمونيا والريزورسينول والبارابين والعطور والكحول يحتوي على مادة PPD لذا كن دائمًا آمنًا على بشرتك سهل الاستخدام ولطيف على شعرك يمنح لونًا يدوم طويلاً مع نتائج طبيعية يوفر لمعانًا طبيعيًا وبريقًا', 'hairT', 12.00, 0.00, 8, '../uploadImages/color1.jpg', 'color1.jpg', '2024-09-10 18:28:42'),
(76, 'Garnier Color Naturals Number 4.62', 'صبغة غارنييه كولور ناتشرالز رقم 4.62', '    Nourished hair means better color with Garnier Color Naturals.     The dye is enriched with olive oil, avocado oil and shea, and deeply nourishes your hair during and after dyeing for up to 8 weeks.     For a natural, lustrous color', 'يعني الشعر المغذي لونًا أفضل مع صبغة غارنييه كولور ناتشرالز. الصبغة غنية بزيت الزيتون وزيت الأفوكادو وزبدة الشيا، وتغذي شعرك بعمق أثناء وبعد الصبغ لمدة تصل إلى 8 أسابيع. للحصول على لون طبيعي ولامع', 'hairT', 5.45, 0.00, 10, '../uploadImages/garn.jpeg', 'garn.jpeg', '2024-09-10 18:30:00'),
(77, 'Fanola Oro Puro Hair Coloring Cream, Violet no. 5.2', 'كريم صبغ الشعر فانولا أورو بورو، رقم البنفسجي. 5.2', 'Healthy hair means healthy color. That\'s the truth that drives the Oro Puro permanent hair color line from Fanola. The formula is completely ammonia free, and uses keratin proteins to help strengthen the hair and repair damage. Each color is illuminated a', 'الشعر الصحي يعني لونًا صحيًا. هذه هي الحقيقة التي تدفع خط ألوان الشعر الدائم Oro Puro من Fanola. التركيبة خالية تمامًا من الأمونيا، وتستخدم بروتينات الكيراتين للمساعدة في تقوية الشعر وإصلاح التلف. يتم إضاءة كل لون', 'hairT', 6.75, 0.00, 10, '../uploadImages/color2.jpg', 'color2.jpg', '2024-09-10 18:30:51'),
(78, 'Trisa Professional Hairbrush XL Styling, round brush', 'فرشاة تصفيف الشعر الاحترافية تريسا XL، فرشاة مستديرة', 'Easy Comb Hair Brush –  Grooming your hair is made perfect with the Trisa SE Brushing Large Rubber Cushion. It is stylish and compact which helps to maintain the silkiness of your hair.', 'فرشاة الشعر أصبح تصفيف شعرك مثاليًا بفضل فرشاة تريسا إنها أنيقة وصغيرة الحجم مما يساعد في الحفاظ على نعومة شعرك.', 'hairB', 8.00, 0.00, 7, '../uploadImages/tris.jpg', 'tris.jpg', '2024-09-10 18:32:15'),
(79, 'Optimal Plastic Hair Brush Comb', 'مشط شعر بلاستيكي مثالي', '    fits easily into a purse or a bag, allowing you to have beautiful, soft, healthy and tangle-free hair', 'يتناسب بسهولة مع المحفظة أو الحقيبة، مما يسمح لك بالحصول على شعر جميل وناعم وصحي وخالٍ من التشابك', 'hairB', 1.00, 0.00, 6, '../uploadImages/br.jpg', 'br.jpg', '2024-09-10 18:32:55'),
(80, 'Optimal Wooden Hair Brush Big', 'فرشاة شعر خشبية كبيرة مثالية', '    GREAT FOR STRAIGHTENING & SMOOTHING HAIR - Enjoy soft and smooth hairstyles and make a confident impression with our paddle brush for hair      holds your hair altogether helping you quickly and effectively comb your hair.      This travel-friendly ha', 'رائعة لفرد الشعر وتنعيمه - استمتعي بتسريحات شعر ناعمة وسلسة وامنحي نفسك انطباعًا واثقًا بفضل فرشاة الشعر ذات المجداف التي تمسك شعرك بالكامل وتساعدك على تمشيط شعرك بسرعة وفعالية. هذه الفرشاة سهلة الاستخدام أثناء السفر', 'hairB', 6.10, 0.00, 8, '../uploadImages/br2.jpg', 'br2.jpg', '2024-09-10 18:33:34'),
(81, 'Trisa professional brushing large', 'فرشاة تريسا الاحترافية الكبيرة', 'Easy Comb Hair Brush –  Grooming your hair is made perfect with the Trisa SE Brushing Large Rubber Cushion. It is stylish and compact which helps to maintain the silkiness of your hair.', 'فرشاة الشعر أصبح تصفيف شعرك مثاليًا بفضل فرشاة تريسا إنها أنيقة وصغيرة الحجم مما يساعد في الحفاظ على نعومة شعرك.', 'hairB', 6.00, 0.00, 8, '../uploadImages/br3.jpg', 'br3.jpg', '2024-09-10 18:34:14'),
(82, 'Bio Balance - Lavender Shampoo 330ml', 'بايو بالانس - شامبو اللافندر 330 مل', 'Bio Balance Sulfate-Free Organic Lavender Shampoo restores strength of hair and starts repairing damage from day one. Great for women who dream of longer hair growth', 'شامبو اللافندر العضوي الخالي من الكبريتات من بيوبالانس يعيد قوة الشعر ويبدأ في إصلاح التلف منذ اليوم الأول. رائع للنساء اللواتي يحلمن بنمو شعر أطول', 'hairS', 8.30, 0.00, 8, '../uploadImages/sha.jpg', 'sha.jpg', '2024-09-10 19:06:40'),
(83, 'Wow Skin Science Apple Cider Vinegar Shampoo , 300ml', 'شامبو خل التفاح من واو سكين ساينس، 300 مل', '    Apple cider vinegar encourages healthy hair growth helps hair retain more moisture helping to prevent split ends.      Apple cider vinegar has antibacterial & antifungal properties that helps to remove dandruff, itchy & dry scalp.      Helps bring sil', 'يساعد خل التفاح على تعزيز نمو الشعر الصحي، ويساعد الشعر على الاحتفاظ بالمزيد من الرطوبة، مما يساعد على منع تقصف الأطراف. يحتوي خل التفاح على خصائص مضادة للبكتيريا والفطريات تساعد على إزالة قشرة الرأس والحكة وفروة الرأس الجافة. يساعد على ترطيب الشعر.', 'hairS', 6.00, 0.00, 8, '../uploadImages/wow.jpg', 'wow.jpg', '2024-09-10 19:07:18'),
(84, 'Gersy hair and body shampoo 2 liters / Night wish', 'شامبو جيرسى للشعر والجسم 2 لتر / نايت ويش', '    Gives your skin a smooth feel, and freshens your hair. Choose from a collection of flavors.Rich composition of nutrients for your body and skin     Cleaning and protecting hair and skin     Rich composition of nutrients for your body and skin     Suit', 'يمنح بشرتك ملمسًا ناعمًا، وينعش شعرك. اختر من بين مجموعة من النكهات. تركيبة غنية من العناصر الغذائية لجسمك وبشرتك تنظيف وحماية الشعر والبشرة تركيبة غنية من العناصر الغذائية لجسمك وبشرتك مناسب', 'hairS', 3.65, 0.00, 7, '../uploadImages/ger.jpg', 'ger.jpg', '2024-09-10 19:08:00'),
(86, 'Wow Skin Science Apple Cider Vinegar Hair Mask, 200ml', 'قناع الشعر بخل التفاح من واو سكين ساينس، 200 مل', 'Use this mask once a week to help add volume and smoothen rough hair. Give your hair clarifying and balancing care with WOW Skin Science Apple Cider Vinegar Hair Mask. This hair mask has a blend of natural ingredients that aids in enhancing your hair text', 'استخدمي هذا القناع مرة واحدة في الأسبوع للمساعدة في إضافة الحجم وتنعيم الشعر الخشن. امنحي شعرك العناية المنقية والمتوازنة باستخدام قناع الشعر بخل التفاح من واو سكين ساينس يحتوي قناع الشعر هذا على مزيج من المكونات الطبيعية التي تساعد في تحسين مظهر شعرك.', 'hairC', 8.00, 0.00, 8, '../uploadImages/wow2.jpg', 'wow2.jpg', '2024-09-10 19:11:44'),
(87, 'Olaplex Bonding Oil Number.7 - 30 ml', 'زيت الترابط من أولابليكس رقم 7 - 30 مل', 'Reduces fluffy hair and eliminates \'Flyaways\'     Restores & strengthens     Creates a high gloss     UV and heat resistant up to 230 ° C     Accelerates the hair dryer time     Vegan & animal proof free', 'يقلل من الشعر الرقيق ويزيل الشعر المتطاير، يستعيد ويقوي، يخلق لمعانًا عاليًا، مقاوم للأشعة فوق البنفسجية والحرارة حتى 230 درجة مئوية، يسرع وقت تجفيف الشعر، خالٍ من المواد النباتية والحيوانية', 'hairC', 27.00, 0.00, 8, '../uploadImages/oil4.jpg', 'oil4.jpg', '2024-09-10 19:12:31'),
(88, 'Iris Revitalizing Hair Oil 225ml', 'زيت الشعر المنعش ايريس 225 مل', 'Natural Ingredients of olive, sweet almond, avocado, coconut and castor oil are ideal for hair; it provides a protective layer to combat the damaging affect of sun, wind and cold weather, Keeps the hair manageable, smooth and healthy.  Apply and message t', 'المكونات الطبيعية من زيت الزيتون واللوز الحلو والأفوكادو وجوز الهند وزيت الخروع مثالية للشعر؛ فهي توفر طبقة واقية لمقاومة التأثير الضار للشمس والرياح والطقس البارد، وتحافظ على الشعر سهل التصفيف وناعمًا وصحيًا. ضعيه على شعرك ودلكي بلطف.', 'hairC', 9.00, 0.00, 9, '../uploadImages/iriso.jpg', 'iriso.jpg', '2024-09-10 19:14:08'),
(89, 'Chicco Dry Fit Plus Midi 4-9 KG', 'حفاضات تشيكو دراي فيت بلس ميدي 4-9 كجم', 'The 2-in1 Nappy for a Happy baby.Maximum dryness and comfortable fit all in one nappy.The new Chicco Dry fit nappies are ultra slim in design and easy to wear. The nappies allow your baby to move around freely whist still guarenteeing maximum levels o', 'الحفاضات 2 في 1 لطفل سعيد. أقصى قدر من الجفاف والراحة في حفاضة واحدة.  حفاضات Chicco Dry fit الجديدة رفيعة للغاية في التصميم وسهلة الارتداء. تسمح الحفاضات لطفلك بالتحرك بحرية مع ضمان أقصى مستويات الامتصاص. تم تصميم الحواجز الجانبية الناعمة للتكيف مع ساقي ', 'BSD', 5.80, 0.00, 20, '../uploadImages/di.jpg', 'di.jpg', '2024-10-19 19:15:25');

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
(2, 0, 'apple', 'apple@juice.com', '$2y$10$dczMiWbJekDrMd62L5ds8.9TP2ebV.yU0bAYWe.0bDz6Csk6b9kZi', '0771212122', 'jordan-amman', '2024-07-11 18:35:17', 'user'),
(3, 0, 'orange', 'orange@juice.com', '$2y$10$agcx/EerPDR0vzXwIXxdZOcO2GpQusa49vsJb0EU3WMAsFOBAyNYO', '123456782', 'llll-jkjk-kkk', '2024-07-13 19:13:42', 'user'),
(4, 0, 'orangee', 'orangee@juice.com', '$2y$10$0Y/glmbm05fQhrZcLKC28OhwYslAUI1tEJ06O8k9eRdUV4IFMuNpi', '123456782', 'llll-jkjk-kkk', '2024-07-14 18:29:56', 'user'),
(5, 0, 'RahafRiad', 'rahafriad@Tulip.com', '$2y$10$44FPLHTnnmoKE7Ggdy67kOV.MzJZN0kVfe6Y.DALQ8peXyws0HCha', '0771212122', 'jordan-amman', '2024-09-10 21:12:57', 'user');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
