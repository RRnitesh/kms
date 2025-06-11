<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <title>@yield('title', 'KMS')</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
  
  @yield('styles')
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">


    <div class="content-wrapper">
      <div class="content">
        <div class="container">
          @include('partials.alerts')
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
  
  @yield('scripts')
  

</body>
</html>