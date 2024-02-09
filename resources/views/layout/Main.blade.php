<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
    
        }
    </style>
    
</head>

<body class="bg-white">
    
    @include('layout.partialsMain.header')
    

        <main>
            @yield('content')
        </main>
    @include('layout.partialsMain.footer')
    
    

    <!-- bootstrap -->
   
    <!-- count down -->
    {{-- <script src="{{ asset('assets2/js/jquery.countdown.js') }}"></script> --}}
    <!-- isotope -->
    {{-- <script src="{{ asset('assets2/js/jquery.isotope-3.0.6.min.js') }}"></script> --}}
    <!-- waypoints -->
    {{-- <script src="{{ asset('assets2/js/waypoints.js') }}"></script> --}}
    <!-- owl carousel -->
    {{-- <script src="{{ asset('assets2/js/owl.carousel.min.js') }}"></script> --}}
    <!-- magnific popup -->
    {{-- <script src="{{ asset('assets2/js/jquery.magnific-popup.min.js') }}"></script> --}}
    {{-- <!-- mean menu -->
    <script src="{{ asset('assets2/js/jquery.meanmenu.min.js') }}"></script> --}}
    <!-- sticker js -->
    {{-- <script src="{{ asset('assets2/js/sticker.js') }}"></script> --}}
    <!-- main js -->
    {{-- <script src="{{ asset('assets2/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}

    @yield('script')
    <script>
        var dropdown = document.getElementById('dropdownMenuButton');
        var dropdownMenu = document.getElementById('dropdownMenu');

        dropdown.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
     <script>
        function toggleDropdownProfile() {
            var dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("hidden");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Glide('.glide', {
                type: 'carousel',
                startAt: 0,
                perView: 1,
                autoplay: 3000, // Set to false if you don't want autoplay
                animationTimingFunc: 'ease-in-out', // Add this line for smoother animations
            }).mount();
        });
    </script>
</body>

</html>
