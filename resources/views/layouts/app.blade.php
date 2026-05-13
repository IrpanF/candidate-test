<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CLT Toolbox Assignment</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased text-black">

<div class="relative min-h-screen">

    <!-- Background -->
    <img
        class="absolute inset-0 h-full w-full object-cover"
        src="https://app.clttoolbox.com.au/images/login-bg.jpg"
        alt="Background"
    >

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Content -->
    <div class="relative z-10 min-h-screen">

        <!-- Navbar -->
        <nav class="p-6 border-b border-white/20 backdrop-blur-md">

            <div class="max-w-7xl mx-auto flex gap-4 items-center">

                <img
                    src="https://app.clttoolbox.com.au/images/logos/logo_color_white.png"
                    class="h-10"
                >
                    <br>
                <a
                    href="/suppliers"
                    class="hover:text-yellow-400 transition text-white"
                >
                    Suppliers
                </a>

                <a
                    href="/layups"
                    class="hover:text-yellow-400 transition text-white"
                >
                    Layups
                </a>

                <a
                    href="/layers"
                    class="hover:text-yellow-400 transition text-white"
                >
                    Layers
                </a>

            </div>

        </nav>

        <!-- Page Content -->
        <main class="p-10">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>