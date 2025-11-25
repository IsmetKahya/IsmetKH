<?php
session_start();

$host = 'localhost';
$dbname = 'azeri';
$username = 'bit_academy';
$password = 'bit_academy';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('disconnected' . $e->getMessage());
}

$orders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC, naam ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Azeri Admin Panel</title>
  <link href="../dist/output.css" rel="stylesheet">
  <link href="../dist/style.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-100 flex flex-col min-h-screen">

  <nav class="bg-black p-4 border-b border-yellow-600 flex flex-wrap items-center justify-between">
      <h1 class="text-xl md:text-2xl font-bold text-yellow-500">Azeri Admin Panel</h1>

      <button id="menuToggle" class="block md:hidden text-yellow-500 text-2xl focus:outline-none">
          ☰
      </button>

      <div id="navLinks" class="hidden md:flex flex-col md:flex-row w-full md:w-auto mt-3 md:mt-0 space-y-3 md:space-y-0 md:space-x-4">
          <a href="admin.php" class="text-yellow-400 hover:text-yellow-300 text-lg text-center">Edit Menu</a>
          <a href="bestellingen.php" class="text-yellow-400 hover:text-yellow-300 text-lg text-center">Bestellingen</a>
          <a href="menu.php" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600 transition text-center font-semibold">Terug</a>
      </div>
  </nav>

  <main class="flex-grow w-full max-w-7xl mx-auto p-4 sm:p-6">
      <div class="overflow-x-auto bg-gray-900 rounded-xl border border-yellow-600 shadow-lg mt-6">
          <table class="min-w-full text-sm sm:text-base border-collapse">
              <thead class="bg-yellow-600 text-black">
                  <tr>
                      <th class="px-3 py-2">ID</th>
                      <th class="px-3 py-2 text-center">Naam</th>
                      <th class="px-3 py-2 text-center">Email</th>
                      <th class="px-3 py-2 text-center">Adres</th>
                      <th class="px-3 py-2 text-center">Payment</th>
                      <th class="px-3 py-2 text-center">Bestelling</th>
                      <th class="px-3 py-2 text-center">Tijd</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($orders as $order): ?>
                      <tr class="border-t border-gray-700 hover:bg-gray-700 transition text-center">
                          <td class="px-2 py-2"><?= $order['id'] ?></td>
                          <td class="px-2 py-2 text-yellow-400 font-semibold"><?= htmlspecialchars($order['naam']) ?></td>
                          <td class="px-2 py-2"><?= htmlspecialchars($order['email']) ?></td>
                          <td class="px-2 py-2"><?= htmlspecialchars($order['adres']) ?></td>
                          <td class="px-2 py-2"><?= htmlspecialchars($order['payment_method']) ?></td>
                          <td class="px-2 py-2"><?= htmlspecialchars($order['order_description']) ?></td>
                          <td class="px-2 py-2"><?= htmlspecialchars($order['created_at']) ?></td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </main>

  <footer class="text-center text-gray-500 py-6 border-t border-yellow-600 mt-auto">
      © 2025 Azeri Restaurant Admin • Designed by 
      <span class="text-yellow-500 font-semibold">Ismet Kahya</span>
  </footer>

  <script>
  document.getElementById('menuToggle').addEventListener('click', function() {
      const nav = document.getElementById('navLinks');
      nav.classList.toggle('hidden');
      nav.classList.toggle('flex');
  });
  </script>

</body>
</html>
