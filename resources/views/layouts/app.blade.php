<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Route::current()->getName() }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-200" style="background-image: url('../storage/Mirage.png'); background-size: cover; background-repeat: no-repeat;">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="text-center">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-xl text-gray-700 font font-semibold">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
