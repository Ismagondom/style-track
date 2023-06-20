<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style-Track - {{$title}}</title>
    <meta name="description" content='Página de $title de la aplicación Style-Track, aplicación fácil e intuitiva que te ayuda a gestionar el stock, pedidos y control de tus productos en la red.'>
    @vite('resources/css/app.css')

    <style>
        body {
            height: 100vh;
        }
    </style>
</head>

<body>

    <!-- Menu de navBar-->
    <x-layouts.navBar/>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$title}}</h1>
        </div>
      </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            {{$slot}}

        </div>
      </main>


    <x-layouts.scriptJs/>

</body>

</html>
