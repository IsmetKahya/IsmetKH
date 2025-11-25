<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: menu.php");
    exit();
}

$naam = $_POST['naam'] ?? '';
$email = $_POST['email'] ?? '';
$adres = $_POST['adres'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';
$saus = $_SESSION['saus'] ?? '';
$salad = $_SESSION['salad'] ?? '';

if (empty($naam) || empty($email) || empty($adres) || empty($payment_method)) {
    die("Alle velden zijn verplicht.");
}

$order_items = [];
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $line_total = (float)$item['price'] * (int)$item['quantity'];
    $total += $line_total;

    $order_items[] = $item['quantity'] . 'x ' . $item['size'] . ' ' . $item['name'] . 
                     ' (' . $item['salade'] . ' , ' . $item['saus'] . ')';
}

$order_description = implode(', ', $order_items);

$host = "localhost";
$dbname = "azeri";
$user = "bit_academy";
$pass = "bit_academy";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("
    INSERT INTO orders 
    (naam, email, adres, payment_method, order_description, total_price) 
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->execute([$naam, $email, $adres, $payment_method, $order_description, $total]);
    unset($_SESSION['cart']);

} catch (PDOException $e) {
    die("Fout bij het verbinden met de database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor je bestelling</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen flex items-center justify-center p-4">

    <div class="bg-gray-900 p-6 sm:p-10 rounded-2xl shadow-2xl text-center max-w-md w-full transform transition-all duration-500 hover:scale-105">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-yellow-500 mb-4 animate-pulse">Bedankt!</h1>
        <p class="text-white mb-4 text-base sm:text-lg">We hebben je bestelling succesvol ontvangen.</p>
        <p class="text-yellow-300 font-bold text-lg sm:text-xl mb-6">Totaal: €<?= number_format($total, 2) ?></p>
        
        <a href="menu.php" 
           class="inline-block bg-gradient-to-r from-yellow-400 to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-black font-semibold py-2 sm:py-3 px-4 sm:px-6 rounded-xl shadow-lg transition-transform transform hover:scale-105">
            Terug naar menu
        </a>
        
        <div class="mt-4 sm:mt-6 text-gray-400 text-xs sm:text-sm">
            <p>Je bestelling wordt zo snel mogelijk verwerkt!</p>
        </div>
    </div>

</body>
</html>
