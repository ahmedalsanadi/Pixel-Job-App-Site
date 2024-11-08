<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- <body class="relative text-white font-hanken-gotesk pb-8 min-h-screen overflow-x-hidden before:fixed before:inset-0 before:bg-gradient-to-br before:from-gray-900 before:via-green-900 before:to-blue-900 before:-z-10 before:opacity-80"> -->

<body
    class="bg-gradient-to-br from-black via-gray-900 to-blue-950 text-white font-hanken-gotesk pb-8 min-h-screen relative">

    <!-- Noise Overlay -->
    <div
        class="noise bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIj48ZmlsdGVyIGlkPSJhIiB4PSIwIiB5PSIwIj48ZmVUdXJidWxlbmNlIHR5cGU9ImZyYWN0YWxOb2lzZSIgYmFzZUZyZXF1ZW5jeT0iLjc1IiBzdGl0Y2hUaWxlcz0ic3RpdGNoIi8+PGZlQ29sb3JNYXRyaXggdHlwZT0ic2F0dXJhdGUiIHZhbHVlcz0iMCIvPjwvZmlsdGVyPjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiBmaWx0ZXI9InVybCgjYSkiIG9wYWNpdHk9IjAuMDUiLz48L3N2Zz4=')]">
    </div>
    <div class="blur-overlay"></div>

    <div class="px-10 content ">
        <nav class="relative py-4 border-b border-white/10">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <!-- Logo Section -->
                    <a href="#" class="relative group z-50">
                        <div
                            class="absolute inset-0 bg-blue-500/20 rounded-full blur-lg group-hover:blur-xl transition-all duration-300 opacity-0 group-hover:opacity-100">
                        </div>
                        <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo"
                            class="relative transform group-hover:scale-105 transition-transform duration-300">
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-1">
                        @foreach(['Jobs', 'Careers', 'Salaries', 'Companies'] as $item)
                            <a href="#" class="relative px-4 py-2 font-bold group">
                                <span
                                    class="relative z-10 text-gray-300 group-hover:text-white transition-colors duration-300">{{ $item }}</span>
                                <div
                                    class="absolute inset-0 bg-blue-500/0 group-hover:bg-blue-500/10 rounded-lg transform scale-90 group-hover:scale-100 transition-all duration-300">
                                </div>
                                <div
                                    class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-4/5 transition-all duration-300">
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Auth Buttons Desktop -->
                    <div class="hidden md:flex items-center space-x-2">
                        @auth
                            <!-- ... auth buttons ... -->
                        @endauth

                        @guest
                            <a href="/register" class="px-4 py-2 font-bold relative group overflow-hidden rounded-lg">
                                <span
                                    class="relative z-10 text-blue-400 group-hover:text-white transition-colors duration-300">Register</span>
                                <div
                                    class="absolute inset-0 bg-blue-500/0 group-hover:bg-blue-500/20 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                </div>
                            </a>
                            <a href="/login"
                                class="px-4 py-2 font-bold bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-300 transform hover:-translate-y-0.5">
                                Login
                            </a>
                        @endguest
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button"
                        class="md:hidden p-2 rounded-lg hover:bg-gray-800/50 transition-colors duration-300 cursor-pointer z-50">
                        <!-- Menu Icon -->
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 block" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close Icon -->
                        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu"
                    class="fixed inset-0 bg-gray-900/95 backdrop-blur-sm translate-x-full transition-transform duration-300 z-40 md:hidden">
                    <div class="container mx-auto px-4 pt-20">
                        <!-- Mobile Navigation Links -->
                        <div class="flex flex-col space-y-2">
                            @foreach(['Jobs', 'Careers', 'Salaries', 'Companies'] as $item)
                                <a href="#"
                                    class="px-4 py-3 font-bold text-gray-300 hover:text-white hover:bg-gray-800/50 rounded-lg transition-colors duration-300">
                                    {{ $item }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Mobile Auth Buttons -->
                        <div class="flex flex-col space-y-2 pt-4 mt-4 border-t border-white/10">
                            @auth
                                <!-- ... mobile auth buttons ... -->
                            @endauth

                            @guest
                                <a href="/register"
                                    class="px-4 py-3 font-bold text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 rounded-lg transition-colors duration-300">
                                    Register
                                </a>
                                <a href="/login"
                                    class="px-4 py-3 font-bold bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-300">
                                    Login
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
