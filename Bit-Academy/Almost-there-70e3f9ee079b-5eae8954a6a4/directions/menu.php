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
    die('Disconnected: ' . $e->getMessage());
}

$menu_stmt = $pdo->query("SELECT * FROM menu");
$menu_items = [];
while ($row = $menu_stmt->fetch(PDO::FETCH_ASSOC)) {
    $menu_items[$row['type']][] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_key = $_POST['product_key'] ?? null;
    $action = $_POST['action'] ?? 'add';

   $_SESSION['cart'] = $_SESSION['cart'] ?? [];

    if ($product_key) {
        if ($action === 'remove') {
            if (isset($_SESSION['cart'][$product_key])) {
                $_SESSION['cart'][$product_key]['quantity']--;
                if ($_SESSION['cart'][$product_key]['quantity'] <= 0) {
                    unset($_SESSION['cart'][$product_key]);
                }
            }
        } elseif ($action === 'add') {
            if (isset($_SESSION['cart'][$product_key])) {
                $_SESSION['cart'][$product_key]['quantity']++;
            } else {
                list($product_id, $selected_size) = explode('_', $product_key);

                $stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
                $stmt->execute([$product_id]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($product) {
                    $selected_price = ($selected_size === 'Groot') ? $product['price_large'] : $product['price_normal'];

                    $selected_salade = $_POST['salad'] ?? 'zonder';
                    $selected_saus   = $_POST['saus'] ?? 'zonder';

                    $_SESSION['cart'][$product_key] = [
                        'name'     => $product['name'],
                        'price'    => $selected_price,
                        'quantity' => 1,
                        'size'     => $selected_size,
                        'salade'   => $selected_salade,
                        'saus'     => $selected_saus
                    ];
                }
            }
        }
    }

    if (isset($_POST['clear_cart'])) {
        unset($_SESSION['cart']);
        header("Location: menu.php");
        exit();
    }

    header("Location: menu.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azeri Menu</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="bg-slate-800 text-white">

    <nav class="bg-black sticky top-0 z-30">
        <div class="flex justify-between items-center px-6 md:px-20 py-4">
            <a href="../index.php"><img src="../foto/azeri.png" alt="Logo" class="h-20 sm:h-28 w-auto"></a>
            <div class="hidden md:flex gap-6 text-lg font-semibold">
                <a href="../index.php" class="hover:text-yellow-500">Home</a>
                <a href="menu.php" class="text-yellow-500">Menu</a>
                <a href="#" class="hover:text-yellow-500">Locaties</a>
                <a href="#" class="hover:text-yellow-500">Contact</a>
            </div>
            <button id="menu-button" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="md:hidden hidden flex flex-col px-6 pb-4 bg-black text-lg">
            <a href="../index.php" class="text-yellow-500">Home</a>
            <a href="menu.php" class="text-white hover:text-yellow-500">Menu</a>
            <a href="#" class="text-white hover:text-yellow-500">Locaties</a>
            <a href="#" class="text-white hover:text-yellow-500">Contact</a>
        </div>
    </nav>

    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-250 md:w-full p-4">
            <h2 class="text-3xl font-bold text-yellow-500 text-center mb-6">Menu</h2>
            <?php foreach ($menu_items as $type => $items): ?>
                <h3 class="text-2xl text-yellow-400 mt-6"><?= htmlspecialchars($type) ?></h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                    <?php foreach ($items as $row): ?>
                        <div class="bg-black p-4 rounded-xl shadow border border-yellow-500">
                            <h4 class="text-xl font-semibold text-yellow-400"><?= htmlspecialchars($row['name']) ?></h4>
                            <?php if (!empty($row['description'])): ?>
                                <p class="text-sm text-gray-300"><?= htmlspecialchars($row['description']) ?></p>
                            <?php endif; ?>
                            <p class="mt-2 mb-2">
                                Normaal: €<?= number_format($row['price_normal'], 2) ?>
                                <?php if (!empty($row['price_large'])): ?>
                                    | Groot: €<?= number_format($row['price_large'], 2) ?>
                                <?php endif; ?>
                            </p>
                            <button
                            class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded w-full transition open-modal-btn"
                            data-id="<?= $row['id'] ?>"
                            data-name="<?= htmlspecialchars($row['name']) ?>"
                            data-price-normal="<?= $row['price_normal'] ?>"
                            data-price-large="<?= $row['price_large'] ?>">
                            Voeg toe
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
            
            
            <button id="toggle-sidebar" 
            class="lg:hidden fixed top-100  right-1 z-50 bg-yellow-500 text-black px-4 py-2 rounded-xl">
            🛒
            </button>


<aside id="cart-sidebar"
       class="fixed lg:mt-35 right-0  bg-gray-900 p-5 w-full sm:w-3/4 md:w-2/4 lg:w-1/3 xl:w-1/4
              transform translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out
              z-40 overflow-y-auto md:top-1">
              
    <h3 class="text-xl font-bold text-yellow-400 mb-4 text-center">Winkelwagen</h3>
    
    <?php if (!empty($_SESSION['cart'])): ?>
      <ul class="space-y-3">
    <?php $total = 0; ?>
    <?php foreach ($_SESSION['cart'] as $key => $item): ?>
        <?php 
            $line_total = $item['price'] * $item['quantity']; 
            $total += $line_total; 
        ?>
        <li class="flex justify-between items-center border border-yellow-600 rounded-lg p-3 bg-gray-800 shadow-lg p-4 mt-2">
            
            <div class="flex flex-col">
                <span class="font-semibold text-yellow-400 text-base">
                    <?= htmlspecialchars($item['size']) ?> <?= htmlspecialchars($item['name']) ?>
                </span>
                <span class="text-xs text-gray-400">
                    <?= htmlspecialchars($item['salade']) ?>, <?= htmlspecialchars($item['saus']) ?>
                </span>
            </div>

            <div class="flex items-center gap-2">
                <form method="post" action="menu.php" class="inline">
                    <input type="hidden" name="product_key" value="<?= htmlspecialchars($key) ?>">
                    <input type="hidden" name="action" value="remove">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-lg shadow-md transition-all duration-200">
                        −
                    </button>
                </form>

                <span class="w-8 text-center font-bold text-yellow-300 text-lg">
                    <?= $item['quantity'] ?>
                </span>

                <form method="post" action="menu.php" class="inline">
                    <input type="hidden" name="product_key" value="<?= htmlspecialchars($key) ?>">
                    <input type="hidden" name="action" value="add">
                    <button type="submit"
                        class="bg-green-700 hover:bg-green-700 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-lg shadow-md transition-all duration-200">
                        +
                    </button>
                </form>
            </div>

            <div class="text-right ml-4 text-yellow-400 font-semibold min-w-[70px]">
                €<?= number_format($line_total, 2) ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
        <div class="mt-4">
            <p class="font-bold text-yellow-500">Totaal: €<?= number_format($total, 2) ?></p>
            <form action="checkout.php" method="get" class="mt-2">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded w-full">Verder</button>
            </form>
            <form method="post" action="menu.php" class="mt-2">
                <button type="submit" name="clear_cart" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded w-full">Leegmaken</button>
            </form>
        <?php else: ?>
            <p class="text-gray-400">Je winkelwagen is leeg.</p>
        <?php endif; ?>
</aside>
                
                <script>
                    const toggleBtn = document.getElementById('toggle-sidebar');
                    const sidebar = document.getElementById('cart-sidebar');
                    
                    toggleBtn.addEventListener('click', () => {
                        sidebar.classList.toggle('translate-x-full');
                    });
                </script>

</div>

<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black hidden">
    <div class="bg-black dark:bg-gray-800 rounded-xl p-6 w-full max-w-xl relative min-h-[400px]">
        <button data-action="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-black dark:hover:text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-lg font-bold  text-gray-800 text-white text-center">Kies je opties</h2>
        <form method="POST" action="menu.php" class="space-y-2 text-white">
            
            <div class="input-radios p-6 h-60">
                
                <div class="">
                    <p class="mb-2">Groot of Klein</p>
                    <input type="hidden" name="selected_price" id="selected_price" value="">
                    <input type="hidden" name="salad" id="salad" value="">
                    <input type="hidden" name="saus" id="saus" value="">
                    <label><input type="radio" name="grootofklein" value="Klein" id="Klein" class="">Klein: <span id="modal-price-normal">-</span>€ </label>
                    <label><input type="radio" name="grootofklein" value="Groot" id="Groot" class="ml-2">Groot: <span id="modal-price-large">-</span>€</label>
                </div>
                
                <div class="mt-2 mb-2">
                    <p class="mb-2">Salade</p>
                    <input type="hidden" name="salad" id="salad" value="">
                    <label><input type="radio" name="salad" value="Met Salade" required> Met salade</label>
                    <label><input type="radio" name="salad" value="Zonder salade" required> Zonder salade</label>
                </div>
                
                <div class="mt-2 mb-5">
                    <p class="mb-2">Saus</p>
                    <div class="flex  gap-3">
                        
                        
                        
                        
                        <input type="hidden" name="saus" id="saus" value="">
                        <label><input type="radio" name="saus" value="Knoflook" required> Knoflook</label>
                        <label><input type="radio" name="saus" value="Sambal" required> Sambal</label>
                        <label><input type="radio" name="saus" value="Zonder Saus" required> Zonder saus</label>
                    </div>
                </div>
                
                <input type="hidden" name="product_id" id="modalProductId" value="">
                    <input type="hidden" name="selected_price" id="selected_price" value="">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="product_key" id="modalProductKey" value="">
                    <button type="submit" class="bg-yellow-600 text-white rounded p-2 w-full">Bevestigen</button>

                </div>
            </form>

        </div>

    </div>












    <script src="..//js/modal.js" defer></script>



    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>


</body>
<footer class="bg-black border-t border-yellow-600 text-white py-10 px-6 md:px-20 mt-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
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
                Beneden Westerdiep 13, 9641 GD, Veendam
            </p>
        </div>
    </div>
    <div class="mt-10 border-t border-yellow-800 pt-6 text-center text-xs text-gray-500">
        © 2025 Ismet Kahya. Alle rechten voorbehouden.
    </div>
</footer>




</html>