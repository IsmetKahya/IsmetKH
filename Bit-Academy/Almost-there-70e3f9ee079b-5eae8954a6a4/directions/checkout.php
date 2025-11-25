<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: menu.php");
    exit();
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../dist/output.css">
<script src="../js/checkout.js"></script>    
</head>

<body class="bg-slate-800 text-white min-h-screen flex flex-col">

    <nav class="text-white sticky top-0 bg-black z-50">
  <div class="flex justify-between items-center px-4 sm:px-8 lg:px-20">
    <a href="../index.php">
      <img src="../foto/azeri.png" alt="Logo"
           class="h-20 sm:h-28 w-auto p-2 sm:p-3 hover:scale-105 transition-transform">
    </a>

    <div class="hidden md:flex items-center text-lg lg:text-2xl gap-6 lg:gap-8 font-libre">
      <a href="../index.php" class="hover:text-yellow-500 transition">Home</a>
      <a href="menu.php" class="text-yellow-500 transition">Menu</a>
      <a href="#" class="hover:text-yellow-500 transition">Locaties</a>
      <a href="#" class="hover:text-yellow-500 transition">Contact</a>
    </div>

    <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <div id="mobile-menu" class="hidden flex-col bg-black text-center py-4 space-y-4 md:hidden">
    <a href="../index.php" class="block hover:text-yellow-500">Home</a>
    <a href="menu.php" class="block text-yellow-500">Menu</a>
    <a href="#" class="block hover:text-yellow-500">Locaties</a>
    <a href="#" class="block hover:text-yellow-500">Contact</a>
  </div>
</nav>

    <main class="grow">
    <div class="container mx-auto p-4 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-yellow-500 mb-6 text-center">Je bestelling</h1>

        <div class="bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">
            <ul class="space-y-4">
                <?php foreach ($_SESSION['cart'] as $item) : 
                    $line_total = (float)$item['price'] * $item['quantity'];
                    $total += $line_total;
                ?>
                    <li class="border-b border-gray-600 pb-2">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <div>
                                <span class="font-bold text-yellow-400">
                                    <?= htmlspecialchars($item['size']) ?> <?= htmlspecialchars($item['name']) ?>
                                </span>
                                <span class="ml-2 text-sm text-white">x<?= $item['quantity'] ?></span>
                            </div>
                            <div class="text-white mt-2 sm:mt-0">
                                €<?= number_format($line_total, 2) ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="text-right mt-6">
                <p class="text-lg sm:text-xl font-bold text-yellow-300">
                    Totaal: <span class="text-white">€<?= number_format($total, 2) ?></span>
                </p>
            </div>

            <div class="mt-6 flex flex-col sm:flex-row gap-3 sm:justify-center">
                <a href="menu.php" class="w-full sm:w-auto">
                    <button class="w-full sm:w-auto bg-yellow-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                        Terug naar menu
                    </button>
                </a>
                <form action="betaling.php" method="post" class="w-full sm:w-auto">
                    <button type="submit"
                        class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">
                        Betaal nu
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

    <footer class="bg-black border-t border-yellow-600 text-white py-10 px-4 sm:px-10 lg:px-20">
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <div>
      <h2 class="text-lg font-semibold text-yellow-600">AZERI RESTAURANT</h2>
      <p class="mt-2 text-sm text-gray-400">
        Eetcafé Azeri, gevestigd in Veendam, serveert al 12 jaar de lekkerste gerechten!
      </p>
    </div>

    <div>
      <h2 class="text-lg font-semibold text-yellow-600">Contact</h2>
      <p class="mt-2 text-sm text-gray-400">
        E-mail: azeri_veendam@hotmail.com<br>
        Telefoon: 0598-786000<br>
        Beneden Westerdiep 13<br>
        9641 GD Veendam
      </p>
    </div>

    <div>
      <h2 class="text-lg font-semibold text-yellow-600">Openingstijden</h2>
      <p class="mt-2 text-sm text-gray-400">
        Ma - Vr: 12:00 - 22:00<br>
        Za - Zo: 14:00 - 23:00
      </p>
    </div>
  </div>

  <div class="mt-10 border-t border-yellow-800 pt-6 text-center text-xs text-gray-500">
    © 2025 Ismet Kahya. Alle rechten voorbehouden.
  </div>
</footer>
</body>
</html>
