<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel App</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f5f1e9; /* beige */
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background-color: #0d3b66; /* blue */
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #f5f1e9 !important;
        }

        .navbar-custom .nav-link:hover {
            color: #ffd166 !important;
        }

        .card-custom {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('partials.nav')

    <div class="container py-4">
        @yield('content')
    </div>

</body>
</html>