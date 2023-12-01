{{-- <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.patials_old.head')

    @yield('head')
</head>
<body class="none-scroll">
    @include('admin.patials_old.navbar')



    <div class="grid grid-cols-1 bg-local">
        @include('admin.patials_old.sidebar')
        <div class="me-[300px]">
            @yield('content')
        </div>
    </div>


    @include('admin.patials_old.footerScript')
</body>
</html> --}}

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
