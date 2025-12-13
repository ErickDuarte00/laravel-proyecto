<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menú - Café El Parralito</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300;400;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'coffee-primary': '#5d4037',  // Café oscuro
                        'coffee-light': '#8d6e63',    // Café claro
                        'cream-bg': '#f8f0e7',        // Fondo crema
                    },
                    fontFamily: {
                        'averia': ['"Averia Serif Libre"', 'cursive'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cream-bg font-averia text-gray-800 min-h-screen">

    <nav class="bg-coffee-primary text-white shadow-md relative z-50">
        <div class="container mx-auto px-6 h-16 flex justify-between items-center">
            
            <a href="{{ url('/') }}" class="flex items-center gap-3 hover:text-gray-200 transition group">
                <div class="bg-white/10 p-2 rounded-lg group-hover:bg-white/20 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-wide">Inicio</span>
            </a>

            <div x-data="{ open: false }" class="relative">
                
                <button @click="open = !open" class="flex items-center gap-2 focus:outline-none hover:text-gray-200 transition">
                    <span class="font-semibold hidden md:block">Erick Armando Duarte</span>
                    <svg class="w-4 h-4 transform transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="open" 
                     @click.outside="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 text-gray-800 border border-gray-100"
                     style="display: none;">
                    
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-cream-bg hover:text-coffee-primary transition">
                        Perfil
                    </a>

                    <div class="border-t border-gray-100 my-1"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-cream-bg hover:text-coffee-primary transition">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">

        <div class="text-center mb-10">
            <h4 class="text-coffee-light font-bold text-sm tracking-widest uppercase mb-2">Nuestro Menú</h4>
            <h1 class="text-4xl md:text-5xl font-bold text-coffee-primary">Lo Más Popular</h1>
        </div>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="flex items-center gap-2 px-6 py-3 bg-coffee-primary text-white rounded-full shadow-lg transform scale-105 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span>Todo</span>
            </button>
            <button class="flex items-center gap-2 px-6 py-3 bg-white text-coffee-primary rounded-full shadow-sm hover:bg-gray-50 hover:shadow-md transition border border-transparent hover:border-coffee-light/30">
                <span>Bebidas Calientes</span>
            </button>
            <button class="flex items-center gap-2 px-6 py-3 bg-white text-coffee-primary rounded-full shadow-sm hover:bg-gray-50 hover:shadow-md transition border border-transparent hover:border-coffee-light/30">
                <span>Desayunos</span>
            </button>
            <button class="flex items-center gap-2 px-6 py-3 bg-white text-coffee-primary rounded-full shadow-sm hover:bg-gray-50 hover:shadow-md transition border border-transparent hover:border-coffee-light/30">
                <span>Postres</span>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-coffee-primary text-white rounded-3xl p-6 shadow-xl flex flex-col justify-between h-80 relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                <div class="text-center mt-8">
                    <h3 class="text-2xl font-bold mb-2 leading-tight">Café de Olla<br>Tradicional</h3>
                    <p class="text-white/80 text-sm">450 ml • Canela y Piloncillo</p>
                </div>
                <div class="text-center mt-4">
                    <span class="text-4xl font-bold block mb-6">$45.00</span>
                    <div class="inline-flex items-center bg-black/20 rounded-full p-1 border border-white/20">
                        <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/10 transition">-</button>
                        <span class="w-8 text-center font-bold">1</span>
                        <button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/10 transition">+</button>
                    </div>
                    <button class="mt-4 w-full bg-white text-coffee-primary font-bold py-2 rounded-xl hover:bg-gray-100 transition shadow-lg flex items-center justify-center gap-2">
                        Agregar
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-md hover:shadow-xl transition flex flex-col justify-between h-80 border border-transparent hover:border-coffee-primary/10">
                <div class="text-center mt-8">
                    <h3 class="text-xl font-bold text-coffee-primary mb-2">Chilaquiles Rojos</h3>
                    <p class="text-gray-500 text-sm">350 g • Con pollo y crema</p>
                </div>
                <div class="text-center">
                    <span class="text-3xl font-bold text-coffee-light block mb-6">$120.00</span>
                    <button class="w-full text-coffee-primary border-2 border-coffee-primary/20 font-bold py-2 rounded-xl hover:bg-coffee-primary hover:text-white transition duration-300">
                        Agregar al carrito
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-md hover:shadow-xl transition flex flex-col justify-between h-80 border border-transparent hover:border-coffee-primary/10">
                <div class="text-center mt-8">
                    <h3 class="text-xl font-bold text-coffee-primary mb-2">Club Sandwich</h3>
                    <p class="text-gray-500 text-sm">250 g • Papas a la francesa</p>
                </div>
                <div class="text-center">
                    <span class="text-3xl font-bold text-coffee-light block mb-6">$95.00</span>
                    <button class="w-full text-coffee-primary border-2 border-coffee-primary/20 font-bold py-2 rounded-xl hover:bg-coffee-primary hover:text-white transition duration-300">
                        Agregar al carrito
                    </button>
                </div>
            </div>

             <div class="bg-white rounded-3xl p-6 shadow-md hover:shadow-xl transition flex flex-col justify-between h-80 border border-transparent hover:border-coffee-primary/10">
                <div class="text-center mt-8">
                    <h3 class="text-xl font-bold text-coffee-primary mb-2">Latte Vainilla</h3>
                    <p class="text-gray-500 text-sm">400 ml • Caliente o Frío</p>
                </div>
                <div class="text-center">
                    <span class="text-3xl font-bold text-coffee-light block mb-6">$65.00</span>
                    <button class="w-full text-coffee-primary border-2 border-coffee-primary/20 font-bold py-2 rounded-xl hover:bg-coffee-primary hover:text-white transition duration-300">
                        Agregar al carrito
                    </button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>