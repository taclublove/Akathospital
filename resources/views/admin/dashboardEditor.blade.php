<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.patials_editor.head')

    @yield('title')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-4">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

    @include('admin.patials_editor.footerScript')

    @yield('script')
</html>
