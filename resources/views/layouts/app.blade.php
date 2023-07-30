<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sukema') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/bootstrap.css">

        <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
        <link rel="stylesheet" href="/assets/vendors/toastify/toastify.css">


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

                {{-- Main Content --}}
                <div id="main-content" style="height: 100vh">
                    {{ $slot }}

                    {{-- Start Footer --}}
                    @include('partials.footer')
                </div>
            </div>
        </div>

        @stack('modal')

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        @stack('scripts')


        <script type="text/javascript">

            if (@json(session()->has('success'))) {
                $(document).ready(function(){
                    Toastify({
                        text: @json(session()->pull('success')),
                        duration: 3000
                    }).showToast();
                });
            }

            if (@json(session()->has('errors'))) {
                $(document).ready(function(){
                    Toastify({
                        text: 'Gagal Tambah Data, ' + @json($errors->first()),
                        duration: 3000
                    }).showToast();
                });
            }
        </script>
        <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/plugin/jquery.min.js"></script>
        <script src="/assets/js/plugin/jquery.mask.min.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/vendors/toastify/toastify.js"></script>
    </body>
</html>
