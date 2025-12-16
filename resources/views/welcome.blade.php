<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Café El Parralito</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'averia': ['"Averia Serif Libre"', 'cursive'],
                            'sans': ['"Instrument Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="font-sans antialiased text-gray-900">

    <header class="bg-white shadow-md relative border-b-4 border-[#f8f0e7]" x-data="{ isOpen: false }">
        <nav class="container mx-auto px-4 flex justify-between items-center h-24 relative z-20">
            
            <button @click="isOpen = !isOpen" class="text-gray-800 focus:outline-none lg:hidden" aria-label="Toggle navigation">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-4 6h-8"></path>
                </svg>
            </button>
    
            <div class="flex-grow lg:flex-grow-0 text-center">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('assets/home/LogoTransparente.png') }}" alt="Logo Café El Parralito" class="h-32 md:h-48 mx-auto">
                </a>
            </div>

            <div class="hidden lg:flex items-center space-x-3">
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-[#5d4037] text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 font-averia text-sm">
                            Ir al Menú
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="px-5 py-2 bg-[#5d4037] text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 font-averia text-sm">
                            Iniciar Sesión
                        </a>

                        <a href="{{ url('/register') }}" class="px-5 py-2 bg-[#5d4037] text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 font-averia text-sm">
                            Registrarse
                        </a>

                        <a href='/google-auth/redirect' class="px-3 py-2 bg-[#5d4037] text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 font-averia flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"></path>
                            </svg>
                        </a>
                    @endauth
                @endif

            </div>
        </nav>
    
        <div x-show="isOpen" @click="isOpen = false" class="fixed inset-0 z-10 cursor-default" style="display: none;"></div>
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="absolute top-full left-0 w-full bg-white shadow-lg z-20 p-4 font-averia border-t border-gray-100"
             style="display: none;">
            
            <div class="flex flex-col gap-2 mb-4 lg:hidden border-b pb-4 border-gray-200">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full text-center px-4 py-2 bg-[#5d4037] text-white rounded-md">
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="w-full text-center px-4 py-2 bg-[#5d4037] text-white rounded-md">Iniciar Sesión</a>
                        <a href="{{ url('/register') }}" class="w-full text-center px-4 py-2 bg-[#5d4037] text-white rounded-md">Registrarse</a>
                        <a href="{{ url('/auth/google') }}" class="w-full flex justify-center items-center gap-2 px-4 py-2 bg-[#5d4037] text-white rounded-md">
                             <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"></path></svg>
                             Continuar con Google
                        </a>
                    @endauth
                @endif
            </div>

            <h5 class="text-xl font-semibold mb-2 text-[#5d4037]">Menú</h5>
            <ul class="flex flex-col space-y-1">
                <li><a href="{{ url('/menu') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Ver Menú</a></li>
                <li><a href="{{ url('/ubication') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Conocer Ubicacion</a></li>
                <li><a href="{{ url('/about') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Acerca de Nosotros</a></li>
                <li><a href="{{ url('/contact') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Contactanos</a></li>
            </ul>
        </div>
    </header>
    
    <main>
        <section class="w-full h-auto min-h-[600px] bg-cover bg-center flex items-center py-12" 
                 style="background-image: url('{{ asset('assets/home/CafeInicio.jpg') }}');">
            
            <div class="container mx-auto">
                <div class="flex flex-col justify-center p-8 md:p-12 text-left items-start max-w-2xl">
                    <h1 class="text-5xl lg:text-6xl font-averia text-[#5d4037] leading-tight font-medium">
                        La pausa que <br> inspira tu día.
                    </h1>
                    <div class="mt-8 flex justify-start">
                        <a href="{{ url('/menu') }}" class="px-8 py-3 bg-[#5d4037] text-white font-semibold rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 font-averia">
                            Ver Menú
                        </a>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="bg-white py-16">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
                <a href="{{ url('/ubication') }}" class="group relative overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('assets/home/CafeRosa.jpg') }}" class="w-full h-96 object-cover transform transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-white text-3xl font-averia font-medium">Conocer<br>Ubicacion.</h3>
                    </div>
                </a>
                <a href="{{ url('/about') }}" class="group relative overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('assets/home/ChilaquilesRojos.jpg') }}" class="w-full h-96 object-cover transform transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-white text-3xl font-averia font-medium">Acerca De<br>Nosotros.</h3>
                    </div>
                </a>
                <a href="{{ url('/contact') }}" class="group relative overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('assets/home/HotCakes.jpg') }}" class="w-full h-96 object-cover transform transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-white text-3xl font-averia font-medium">Contactanos.</h3>
                    </div>
                </a>
            </div>
        </section>
    
        <section class="w-full h-[400px] bg-cover bg-center relative flex items-center py-16"
                 style="background-image: url('{{ asset('assets/home/TazasAbajo.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="container mx-auto relative z-10">
                <div class="flex flex-col justify-center p-8 md:p-12 text-left text-white">
                    <h2 class="text-4xl lg:text-5xl font-averia leading-tight font-medium mb-4">
                        Haz tu pedido y Ahorra un 10% en <br> tu primera compra.
                    </h2>
                    <p class="text-xl lg:text-2xl font-averia font-light mb-8">
                        Entregas rápidas y <br> sin esperar tanto.
                    </p>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="bg-[#f8f0e7] py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 px-8">
            <div class="text-center md:text-left">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('assets/home/LogoTransparente.png') }}" alt="Logo Café El Parralito" class="w-[308px] h-auto mb-4 mx-auto md:mx-0">
                </a>
                <p class="text-xl text-gray-700 leading-relaxed font-averia">
                    Café El Parralito nace de una idea simple: honrar la calidad artesanal del buen café. Nuestra historia se basa en el respeto. 
                    <a href="{{ url('/about') }}" class="font-semibold text-[#5d4037] hover:underline">Leer Mas</a>
                </p>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-2xl font-semibold font-averia text-[#5d4037] mb-4">Acerca De</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-xl text-gray-700 hover:text-[#5d4037] transition-colors font-averia">Sobre Nosotros</a></li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-2xl font-semibold font-averia text-[#5d4037] mb-4">Atención Al Cliente</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/contact') }}" class="text-xl text-gray-700 hover:text-[#5d4037] transition-colors font-averia">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>