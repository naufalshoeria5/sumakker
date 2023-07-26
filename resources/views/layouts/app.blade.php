<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.css">

        <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            @include('partials.sidebar')

            <div id="main" class='layout-navbar'>
                {{-- Start Navbar --}}
                   @include('partials.navbar')
                {{-- End Navbar --}}

                {{-- Main Content --}}
                <div id="main-content">
                    {{ $slot }}
                </div>
                {{-- End Main Content --}}

                {{-- Start Footer --}}
                    @include('partials.footer')
                {{-- End Footer --}}
            </div>
        </div>

        @stack('modal')

        @stack('scripts')

        <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>

        <script src="/assets/js/main.js"></script>
    </body>
</html>
