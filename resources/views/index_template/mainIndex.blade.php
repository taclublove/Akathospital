<!DOCTYPE html>
<html lang="en">

<head>
    @include('index_template.patials.head')

    @yield('head')
</head>

<body class="none-scroll">

    {{-- Navbar Start --}}
    @include('index_template.patials.navbar')
    {{-- Navbar End --}}

    @yield('content')

    {{-- Footer Start --}}
    @include('index_template.patials.footer')
    {{-- Footer End --}}

    {{-- All Modal Start --}}
    @include('index_template.patials.modal')
    {{-- All Modal End --}}

    {{-- Script Start --}}
    @include('index_template.patials.footerScript')
    {{-- Script End --}}

</body>
</html>