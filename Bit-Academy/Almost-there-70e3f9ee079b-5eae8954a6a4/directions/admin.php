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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $stmt = $pdo->prepare("INSERT INTO menu (name, type, description, price_normal, price_large) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['type'], $_POST['description'], $_POST['price_normal'], $_POST['price_large']]);
    header("Location: admin.php");
    exit();
}

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $stmt = $pdo->prepare("UPDATE menu SET name=?, type=?, description=?, price_normal=?, price_large=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['type'], $_POST['description'], $_POST['price_normal'], $_POST['price_large'], $_POST['id']]);
    header("Location: admin.php");
    exit();
}

$menu_items = $pdo->query("SELECT * FROM menu ORDER BY id ASC, type, name")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azeri Admin Panel</title>
    <link href="../dist/output.css" rel="stylesheet">
    <script src="../js/admin.js"></script>
</head>

<body class="bg-gray-800 text-gray-100 flex flex-col min-h-screen">

    <nav class="bg-black p-4 border-b border-yellow-600 flex flex-wrap items-center justify-between">
        <h1 class="text-xl md:text-2xl font-bold text-yellow-500">Azeri Admin Panel</h1>

        <button id="menuToggle" class="block md:hidden text-yellow-500 text-2xl focus:outline-none">☰</button>

        <div id="navLinks" class="hidden md:flex flex-col md:flex-row w-full md:w-auto mt-3 md:mt-0 space-y-3 md:space-y-0 md:space-x-4">
            <a href="admin.php" class="text-yellow-400 hover:text-yellow-300 text-lg text-center">Edit Menu</a>
            <a href="bestellingen.php" class="text-yellow-400 hover:text-yellow-300 text-lg text-center">Bestellingen</a>
            <a href="menu.php" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600 font-semibold text-center">Terug</a>
        </div>
    </nav>

    <main class="flex-grow w-full max-w-7xl mx-auto p-4 sm:p-6">

        <h2 class="text-3xl font-bold text-yellow-400 mb-6 text-center md:text-left">Menu</h2>

        <div class="bg-gray-900 rounded-xl p-6 shadow-lg mb-10 border border-yellow-600">
            <h3 class="text-xl font-semibold mb-4 text-yellow-400">Toevoegen</h3>
            <form method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <input type="text" name="name" placeholder="Naam" required class="p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-yellow-500">
                <input type="text" name="type" placeholder="Categorie" required class="p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-yellow-500">
                <input type="text" name="description" placeholder="Over" class="p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-yellow-500">
                <input type="number" min="0" step="0.1" name="price_normal" placeholder="Normaal Prijs" required class="p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-yellow-500">
                <input type="number" step="0.01"  min="0" name="price_large" placeholder="Groot Prijs" class="p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-yellow-500">
                <button type="submit" name="add_product" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded transition w-full sm:w-auto">
                    ➕ Toevoegen
                </button>
            </form>
        </div>

        <div class="overflow-x-auto bg-gray-900 rounded-xl border border-yellow-600 shadow-lg">
            <table class="min-w-full border-collapse text-sm sm:text-base">
                <thead class="bg-yellow-600 text-black">
                    <tr>
                        <th class="px-3 py-2 text-left">ID</th>
                        <th class="px-3 py-2">Naam</th>
                        <th class="px-3 py-2">Categorie</th>
                        <th class="px-3 py-2">Over</th>
                        <th class="px-3 py-2">Normaal</th>
                        <th class="px-3 py-2">Groot</th>
                        <th class="px-3 py-2 text-center">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu_items as $item): ?>
                        <tr class="border-t border-gray-700 hover:bg-gray-700 transition text-center">
                            <td class="px-2 py-2"><?= $item['id'] ?></td>
                            <td class="px-2 py-2 text-yellow-400 font-semibold"><?= htmlspecialchars($item['name']) ?></td>
                            <td class="px-2 py-2"><?= htmlspecialchars($item['type']) ?></td>
                            <td class="px-2 py-2 text-sm text-gray-300 break-words"><?= htmlspecialchars($item['description']) ?></td>
                            <td class="px-2 py-2">€<?= number_format($item['price_normal'], 2) ?></td>
                            <td class="px-2 py-2">€<?= number_format($item['price_large'], 2) ?></td>
                            <td class="px-2 py-3 flex flex-col sm:flex-row justify-center items-center gap-2">
                                <a href="#" class="edit-btn bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition w-full sm:w-auto">✏️</a>
                                <a href="?delete=<?= $item['id'] ?>" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition w-full sm:w-auto">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div id="editModal" class="fixed inset-0 hidden bg-black flex items-center justify-center z-50">
        <div class="bg-gray-800 border border-yellow-600 rounded-lg p-6 w-full max-w-md" id="modalContent">
            <h3 class="text-2xl text-yellow-400 font-bold mb-4 text-center">Bewerk Menu Item</h3>
            <form method="POST" id="editForm" class="flex flex-col space-y-4">
                <input type="hidden" name="id" id="edit_id">
                <input type="text" name="name" id="edit_name" placeholder="Naam" required
                    class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                <input type="text" name="type" id="edit_type" placeholder="Categorie" required
                    class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                <input type="text" name="description" id="edit_description" placeholder="Beschrijving"
                    class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                <input type="number" step="0.01" name="price_normal" id="edit_price_normal" placeholder="Normaal prijs" required
                    class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                <input type="number" step="0.01" name="price_large" id="edit_price_large" placeholder="Groot prijs"
                    class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancelEdit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded transition">Annuleren</button>
                    <button type="submit" name="update_product" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-4 py-2 rounded transition">Opslaan</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center text-gray-500 py-6 border-t border-yellow-600 mt-auto">
        © 2025 Azeri Restaurant Admin • Designed by <span class="text-yellow-500 font-semibold">Ismet Kahya</span>
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