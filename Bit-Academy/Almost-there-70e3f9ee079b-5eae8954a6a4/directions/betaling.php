<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: menu.php");
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += (float)$item['price'] * (int)$item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Betaling</title>
    <link rel="stylesheet" href="../dist/output.css" />
    <script src="https://cdn.tailwindcss.com"></script>
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

  <div id="mobile-menu" class="hidden flex-col bg-black text-center py-4 md:hidden">
    <a href="../index.php" class="block hover:text-yellow-500">Home</a>
    <a href="menu.php" class="block text-yellow-500">Menu</a>
    <a href="#" class="block hover:text-yellow-500">Locaties</a>
    <a href="#" class="block hover:text-yellow-500">Contact</a>
  </div>
</nav>

    <main class="grow">
  <div class="container mx-auto p-4 sm:p-8 text-center">
    <h1 class="text-2xl sm:text-3xl font-bold text-yellow-500 mb-4">Bevestig je gegevens</h1>
    <p class="text-lg sm:text-xl text-white mb-6">
      Totale bedrag: <span class="text-yellow-300 font-bold">€<?= number_format($total, 2) ?></span>
    </p>

    <button onclick="document.getElementById('paymentModal').classList.remove('hidden')" 
      class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-6 rounded w-full sm:w-auto">
      Betaalgegevens invullen
    </button>
  </div>
</main>

<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden px-4">
  <div class="bg-white text-black rounded-xl p-6 sm:p-8 max-w-md w-full space-y-6 relative">
    <button onclick="document.getElementById('paymentModal').classList.add('hidden')"
      class="absolute top-2 right-3 text-black hover:text-red-600 text-2xl font-bold">&times;</button>

    <h2 class="text-lg sm:text-xl font-bold text-yellow-600 text-center">Betaalinformatie</h2>

    <form action="betaling_bevestigd.php" method="post" class="space-y-4">
      <div>
        <label class="block font-semibold">Naam</label>
        <input type="text" name="naam" required class="w-full border border-gray-300 rounded px-3 py-2" />
      </div>
      <div>
        <label class="block font-semibold">E-mailadres</label>
        <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2" />
      </div>
      <div>
        <label class="block font-semibold">Adres</label>
        <input type="text" name="adres" required class="w-full border border-gray-300 rounded px-3 py-2" />
      </div>

      <div>
        <label class="block font-semibold mb-1">Betaalmethode</label>
        <select name="payment_method" required class="w-full border border-gray-300 rounded px-3 py-2">
          <option value="">Kies een optie</option>
          <option value="ideal">iDEAL</option>
          <option value="paypal">PayPal</option>
          <option value="creditcard">Creditcard</option>
        </select>
      </div>

      <div class="text-center pt-2">
        <button type="submit"
          class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-6 rounded w-full sm:w-auto">
          Betaal
        </button>
      </div>
    </form>
  </div>
</div>

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
        E-mail: azeri_veendam@hotmail.com<br />
        Telefoon: 0598-786000<br />
        Beneden Westerdiep 13<br />
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
