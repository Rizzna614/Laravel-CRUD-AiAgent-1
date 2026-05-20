<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        @fonts
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body>
        <div class="min-h-screen flex flex-col">
            <header class="w-full max-w-4xl mx-auto px-6 py-4">
                <nav class="flex items-center justify-between">
                    <a href="{{ route('products.index') }}" class="text-lg font-medium">Products</a>
                </nav>
            </header>

            <main class="flex-1 w-full max-w-4xl mx-auto px-6 py-8">
                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </body>
</html>
