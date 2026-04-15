<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Aplikasi Pengaduan</title>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>
    @include('admin.layout.navbar')
    <main class="flex flex-col justify-center items-center">
        @yield('content')
    </main>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>