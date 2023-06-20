<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style-Track</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

</head>
<body class="flex items-center justify-center h-screen">
    <!-- Menu de navBar-->
    <div class="container mx-auto text-center">
        <img src="{{ asset('images/ST-Grande.png') }}" alt="Style-track" class="w-1/2 mx-auto">
        <br>
        <a href={{route('home')}}><button class="bg-gray-900 text-gray-400 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Entrar</button>
        </a>
    </div>
</body>
</html>
