<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>STOCK WISE</title>
</head>
<body>
    
    <section style="background-image: url('src/imges/bg.png'); background-size:cover;"
        class="h-screen  overflow-x-auto shadow-md sm:rounded-lg relative">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center text-white pt-40">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">Welcome to <span
                    class="text-emerald-500">STOK</span> <span class="text-orange-600">WISE</span></h1>
            <p class="mt-4 text-lg md:text-xl">Your smart inventory management solution</p>
            <div class="w-full h-16 flex items-center justify-center">
          <a href="./regester-login/regester.html" class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-white transition duration-300 ease-out border-2 border-orange-500 rounded-full shadow-md group">
            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-orange-500 group-hover:translate-x-0 ease">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
              </svg>
            </span>
            <span class="absolute flex items-center justify-center w-full h-full font-bold text-white transition-all duration-300 transform group-hover:translate-x-full ease">Get Started</span>
            <span class="relative invisible">Button</span>
          </a>
        </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 h-64 gap-6 p-6">
            <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                <img src="src/imges/stock1.jpg" alt="Inventory stock displayed neatly on shelves"
                    class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
            </div>
            <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                <img src="src/imges/stock2.jpg" alt="Technicians monitoring inventory levels with digital tools"
                    class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
            </div>
            <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                <img src="src/imges/stock3.jpg" alt="Graphical representation of stock data and analysis"
                    class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
            </div>
        </div>
    </section>
    
</body>
</html>