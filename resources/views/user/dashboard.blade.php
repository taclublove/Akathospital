<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Head Start --}}
        @include('admin.patials.head')
    {{-- Head End --}}

    @yield('head')
</head>

<body class="none-scroll">


    {{-- Offcanvas Start --}}
        @include('admin.patials.offcanvas')
    {{-- Offcanvas End --}}

    <!-- Navbar -->
        @include('admin.patials.navbar')
    <!-- Navbar -->


    {{-- Content Start --}}
        @yield('content')
    {{-- Content End --}}

    {{-- Modal Start --}}
        {{-- @include('admin.patials.modal') --}}
        @yield('modal')
    {{-- Modal End --}}

    {{-- Footer Start --}}
        @include('admin.patials.footer')
    {{-- Footer End --}}


    {{-- Footer Script Start --}}
    @include('admin.patials.footerScript')
        @yield('script')
    {{-- Footer Script End --}}

</body>

</html>
