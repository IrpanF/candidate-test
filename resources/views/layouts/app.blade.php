<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <title>CLT Layup Manager</title>

</head>

<body class="bg-[#F5F7F6] min-h-screen text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200">

        <div class="max-w-7xl mx-auto px-8">

            <div class="flex items-center justify-between h-20">

                <!-- LEFT -->
                <div class="flex items-center gap-12">

                    <!-- LOGO -->
                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-green-700 flex items-center justify-center text-white text-xl font-bold shadow">

                            T

                        </div>

                        <div>

                            <h1 class="font-bold text-lg text-gray-800">
                                CLT Layup
                            </h1>

                            <p class="text-xs text-gray-500">
                                Manager
                            </p>

                        </div>

                    </div>

                    <!-- MENU -->
                    <div class="flex items-center gap-8">

                        <a
                            href="/suppliers"
                            class="text-gray-600 hover:text-green-700 font-medium transition"
                        >
                            Suppliers
                        </a>

                        <a
                            href="/layups"
                            class="text-gray-600 hover:text-green-700 font-medium transition"
                        >
                            Layups
                        </a>

                        <a
                            href="/layers"
                            class="text-gray-600 hover:text-green-700 font-medium transition"
                        >
                            Layers
                        </a>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-4">

                    <div class="text-right">

                        <p class="font-medium">
                            Irfan Fauzi
                        </p>

                        <p class="text-sm text-gray-500">
                            Backend Developer Candidate
                        </p>

                    </div>

                    <div class="w-11 h-11 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold">

                        IF

                    </div>

                </div>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <main class="max-w-7xl mx-auto px-8 py-10">

        @yield('content')

    </main>

</body>
</html>