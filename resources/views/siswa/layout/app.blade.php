<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laporin!</title>
</head>
<body>
    @include('siswa.layout.navbar')
    <main class="my-36 mx-20 flex flex-col justify-center items-center">
        @yield('content')
    </main>
</body>
</html>