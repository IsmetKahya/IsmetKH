<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Azeri - Over Ons</title>
  <link rel="stylesheet" href="dist/output.css" />
</head>

<body class="bg-amber-800 text-white">

  <nav class="text-white sticky top-0 bg-black shadow-lg z-50">
    <div class="flex justify-between items-center px-6 md:px-20 py-4">
      <div>
        <a href="index.php">
          <img src="foto/azeri.png" alt="Logo"
            class="h-20 sm:h-24 w-auto p-2 hover:text-yellow-500 transition-all duration-100 transform hover:scale-110 ml-2">
        </a>
      </div>

      <div class="hidden md:flex items-center text-lg lg:text-2xl gap-6 lg:gap-8 font-libre">
        <a href="index.php" class="text-yellow-500 hover:scale-110 transition">Home</a>
        <a href="directions/menu.php" class="hover:text-yellow-500 hover:scale-110 transition">Menu</a>
        <a href="#over-ons" class="hover:text-yellow-500 hover:scale-110 transition">Over ons</a>
        <a href="#contact" class="hover:text-yellow-500 hover:scale-110 transition">Contact</a>
      </div>

      <button id="mobile-menu-button" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <div id="mobile-menu" class="md:hidden hidden flex flex-col gap-4 px-6 pb-4 text-lg font-libre bg-black">
      <a href="index.php" class="text-yellow-500">Home</a>
      <a href="directions/menu.php" class="text-white hover:text-yellow-500">Menu</a>
      <a href="#over-ons" class="text-white hover:text-yellow-500">Over ons</a>
      <a href="#contact" class="text-white hover:text-yellow-500">Contact</a>
    </div>
  </nav>

  
  <section id="over-ons" class="bg-amber-800 bg-opacity-80 py-20 px-6 md:px-20">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2  items-center gap-10">
      <div>
        <img src="foto/pexels-cmrcn-29132447.jpg"  class="rounded-lg shadow-lg hover:scale-105 transition-all">
      </div>
      <div class="">

        <h1 class="text-3xl md:text-5xl font-bold text-yellow-500 mb-6">Welkom Bij Eetcafe Azeri</h1>
        <p class="text-gray-200">
            Eetcafé Azeri is al 12 jaar een geliefde plek in Veendam waar heerlijke, authentieke gerechten worden geserveerd. 
          Ons restaurant combineert traditionele smaken met een moderne twist en biedt een warme en gezellige sfeer voor iedereen.
          Ons team staat altijd klaar om uw ervaring onvergetelijk te maken, met vers bereide gerechten en vriendelijke service.
        </p>
      </div>
  </section>

  <section class="py-20 px-6 md:px-20 bg-black">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
      <div>
        <img src="foto/bgmenu.jpg" alt="Azeri Restaurant" class="rounded-lg shadow-lg hover:scale-105 transition-all">
      </div>
      <div class="text-white">
        <h2 class="text-3xl font-bold text-yellow-500 mb-4">Onze Filosofie</h2>
        <p class="text-gray-200 mb-4">
          Bij Azeri geloven we dat eten een ervaring is. Van verse ingrediënten tot huisgemaakte sauzen, 
          elk gerecht wordt met zorg en passie bereid.
        </p>
        <p class="text-gray-200">
          Kom langs en proef de smaken van Azerbeidzjan in een moderne, gezellige setting.
        </p>
      </div>
    </div>
  </section>
  
  <footer id="contact" class="bg-black border-t border-yellow-600 text-white py-10 px-6 md:px-20">
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
          Beneden Westerdiep 13<br>
          9641 GD Veendam
        </p>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-yellow-600">Volg ons</h2>
        <p class="mt-2 text-sm text-gray-400">
          Facebook / Instagram / Twitter
        </p>
      </div>
    </div>

    <div class="mt-10 border-t border-yellow-800 pt-6 text-center text-xs text-gray-500">
      © 2025 Ismet Kahya. Alle rechten voorbehouden.
    </div>
  </footer>

  <script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

</body>

</html>
