<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Klasemen</title>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body class="font-figtree bg-gray-900">
   
  @include('layouts.partials.sidebar')
   
  <main class="p-4 sm:ml-64">
    @yield('content')
  </main>
   
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/table.js') }}"></script>
</body>
</html>