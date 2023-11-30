<!DOCTYPE html>
<html lang="en">

<head>
    @include('index_template.patials_show.head')

    @yield('head')
    <style>
        a.active {
            color: #000;
            background-color: rgb(243 244 246);
        }
    </style>
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

    <script>
        // Add this script in your Blade template or a separate JavaScript file

        document.addEventListener('DOMContentLoaded', function () {
            // Get all buttons with the 'data-collapse-toggle' attribute
            var buttons = document.querySelectorAll('[data-collapse-toggle]');

            // Iterate through each button
            buttons.forEach(function (button) {
                // Get the target dropdown based on the 'aria-controls' attribute
                var targetId = button.getAttribute('aria-controls');
                var targetDropdown = document.getElementById(targetId);

                // Check if the button has the 'active' class
                var isActive = button.classList.contains('active');

                // If active, show the dropdown
                if (isActive) {
                    targetDropdown.classList.remove('hidden');
                }

                // Add click event listener to each button
                button.addEventListener('click', function () {
                    // Toggle the 'hidden' class on the target dropdown
                    targetDropdown.classList.toggle('hidden');
                });
            });
        });
    </script>





</body>
</html>
