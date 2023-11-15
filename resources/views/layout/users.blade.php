<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[url(bgSayur.jpg)]">
    <main class="">
        <main class="container mx-auto mt-4">
            @yield('content')
        </main>
    </main>
</body>
</html>