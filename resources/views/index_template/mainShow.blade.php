<!DOCTYPE html>
<html lang="en">

<head>
    @include('index_template.patials_show.head')

    @yield('head')
</head>

<body class="none-scroll">

    <div class="flex">
        <aside class="w-[250px] fixed left-0 top-0 h-screen bg-slate-700 p-5">
            @include('index_template.patials_show.sidebar')
        </aside>
        <main class="flex-1 ml-[250px]">
            <div class="h-100 bg-base-400 p-10 overflow-y-scroll">
                @yield('content')
            </div>
            {{-- <div class="h-[50px] bg-green-800 text-white p-[10px] fixed bottom-0 w-full">
                @include('index_template.patials_show.footer')
            </div> --}}
        </main>
    </div>

</body>
</html>
