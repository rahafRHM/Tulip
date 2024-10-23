<?php
session_start();

if (isset($_POST['language'])) {
    $_SESSION['lang'] = $_POST['language'];
}

// Return the current language
$lang = $_SESSION['lang'] ?? 'en'; // default to English
$translations = [
    'en' => [
        'outOfStock' => 'Out of stock',
        'addToCart' => 'Add to cart',
    ],
    'ar' => [
        'outOfStock' => 'نفذ من المخزن',
        'addToCart' => 'أضف الى السلة',
    ],
    // Add more languages as needed
];

$response = [
    'lang' => $lang,
    'translations' => $translations[$lang],
];

echo json_encode($response);?>
