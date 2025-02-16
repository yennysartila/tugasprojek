<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex-grow: 1;
        }
        .footer {
            background-color: #1f2937;
            color: white;
            text-align: center;
            padding: 16px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.navigation')

        <!-- Page Content -->
        <div class="content">
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="container mx-auto px-4">
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer">
            @include('layouts.footer')
        </footer>

    </div>

</body>
</html>
