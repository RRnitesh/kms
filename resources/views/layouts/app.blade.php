<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'kms')</title>

  @vite(['resources/css/app.scss', 'resources/js/bootstrap.js'])

  @stack('styles')
</head>
<body>
  
  
  <div>
    @yield('content')
  </div>


  @stack('scripts')
</body>
</html>