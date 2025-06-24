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
        <link href="{{asset('/')}}admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{asset('/')}}admin/assets/css/style.css" rel="stylesheet" />
        <link href="{{asset('/')}}admin/assets/css/skin-modes.css" rel="stylesheet" />
        <link href="{{asset('/')}}admin/assets/plugins/icons/icons.css" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-color: #df8e04;
            }
            .login-center {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="login-center">
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="border-radius: 16px;">
                <h1 class="text-center mb-4" style="font-weight: bold; color: #df8e04;">Inventory</h1>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
