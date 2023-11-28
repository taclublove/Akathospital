<h1 class="text-white text-3xl text-center">Akathospital</h1>
<div class="mt-[20px]">
    {{-- <a href="{{ url('/') }}" class="pb-1 hover:text-yellow-300 text-white">หน้าหลัก</a> --}}
    {{-- <div class="collapse collapse-arrow text-white">
        <input type="radio" name="my-accordion-2" checked="checked" />
        <div class="collapse-title text-sm font-medium">
            Menu
        </div>
        <div class="collapse-content">
            <ul class="">
                <li class="pb-1 hover:text-yellow-300 ms-5"><a href="{{ url('pressRelease') }}">ข่าวประชาสัมพันธ์</a></li>
                <li class="pb-1 hover:text-yellow-300 ms-5"><a href="{{ url('procurementNews') }}">ข่าวจัดซื้อจัดจ้าง</a></li>
                <li class="pb-1 hover:text-yellow-300 ms-5"><a href="#">ประกาศรับสมัครงาน</a></li>
                <li class="pb-1 hover:text-yellow-300 ms-5"><a href="#">เอกสารดาวห์โหลด</a></li>
            </ul>
        </div>
    </div>
    <div class="collapse collapse-arrow text-white ">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-sm font-medium">
            ITA
        </div>
        <div class="collapse-content">
            <ul class="">
                @foreach($sidebarData as $item)
                    <li class="pb-1 hover:text-yellow-300 ms-5"><a href="{{ route('ita', ['id' => $item->fiscalYear_name ]) }}">ITA ปีงบประมาณ {{ $item->fiscalYear_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <div class="mt-2 py-2">
        <a href="{{ url('/') }}" class="flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700">
            <svg class="mb-[3px] flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-   " xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 20 20" id="home" fill="currentColor" aria-hidden="true">
                <path fill="none" d="M0 0h24v24H0V0z"></path>
                <path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"></path>
            </svg>
                <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">Home</span>
        </a>
        <button type="button" class="flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            {{-- <svg class=" mb-[1px] flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-   " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-[3px] flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-gray-900 dark:text-white dark:group-hover:text-white   "  x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" fill="currentColor" aria-hidden="true">
                <path d="M 1.9375 2.78125 C 1.386719 2.78125 0.9375 3.230469 0.9375 3.78125 L 0.9375 39.46875 C 0.9375 42.082031 1.699219 44.1875 3.25 45.71875 C 5.714844 48.15625 9.242188 48.21875 9.59375 48.21875 L 41.375 48.21875 C 41.429688 48.21875 41.773438 48.226563 42.25 48.15625 C 39.136719 47.761719 34.625 45.617188 34.625 39.46875 L 34.625 3.78125 C 34.625 3.230469 34.179688 2.78125 33.625 2.78125 Z M 36.625 9.5 L 36.625 39.46875 C 36.625 46.113281 43.039063 46.21875 43.3125 46.21875 C 43.851563 46.214844 48.3125 46.011719 49 40.90625 C 49.046875 40.472656 49.0625 40.019531 49.0625 39.53125 L 49.0625 14.4375 C 49.0625 14.433594 49.0625 14.410156 49.0625 14.40625 C 49.027344 12.957031 48.25 10.414063 45.65625 9.71875 C 44.84375 9.914063 44.167969 10.277344 43.65625 10.8125 C 42.332031 12.195313 42.375 14.324219 42.375 14.34375 L 42.375 38.625 C 42.375 39.179688 41.929688 39.625 41.375 39.625 C 40.820313 39.625 40.375 39.179688 40.375 38.625 L 40.375 14.375 C 40.371094 14.300781 40.273438 11.511719 42.125 9.5 Z M 7.21875 11 L 26.9375 11 C 27.492188 11 27.9375 11.449219 27.9375 12 C 27.9375 12.550781 27.492188 13 26.9375 13 L 7.21875 13 C 6.667969 13 6.21875 12.550781 6.21875 12 C 6.21875 11.449219 6.667969 11 7.21875 11 Z M 7.21875 15 L 26.9375 15 C 27.492188 15 27.9375 15.449219 27.9375 16 C 27.9375 16.550781 27.492188 17 26.9375 17 L 7.21875 17 C 6.667969 17 6.21875 16.550781 6.21875 16 C 6.21875 15.449219 6.667969 15 7.21875 15 Z M 7.6875 23 L 14.46875 23 C 15.019531 23 15.46875 23.449219 15.46875 24 C 15.46875 24.550781 15.019531 25 14.46875 25 L 7.6875 25 C 7.136719 25 6.6875 24.550781 6.6875 24 C 6.6875 23.449219 7.136719 23 7.6875 23 Z M 19.21875 23 L 26.9375 23 C 27.492188 23 27.9375 23.449219 27.9375 24 C 27.9375 24.550781 27.492188 25 26.9375 25 L 19.21875 25 C 18.667969 25 18.21875 24.550781 18.21875 24 C 18.21875 23.449219 18.667969 23 19.21875 23 Z M 7.6875 27 L 14.46875 27 C 15.019531 27 15.46875 27.445313 15.46875 28 C 15.46875 28.554688 15.019531 29 14.46875 29 L 7.6875 29 C 7.136719 29 6.6875 28.554688 6.6875 28 C 6.6875 27.445313 7.136719 27 7.6875 27 Z M 19.21875 27 L 26.9375 27 C 27.492188 27 27.9375 27.445313 27.9375 28 C 27.9375 28.554688 27.492188 29 26.9375 29 L 19.21875 29 C 18.667969 29 18.21875 28.554688 18.21875 28 C 18.21875 27.445313 18.667969 27 19.21875 27 Z M 19.21875 30.78125 L 26.9375 30.78125 C 27.492188 30.78125 27.9375 31.226563 27.9375 31.78125 C 27.9375 32.335938 27.492188 32.78125 26.9375 32.78125 L 19.21875 32.78125 C 18.667969 32.78125 18.21875 32.335938 18.21875 31.78125 C 18.21875 31.226563 18.667969 30.78125 19.21875 30.78125 Z M 7.6875 31 L 14.46875 31 C 15.019531 31 15.46875 31.445313 15.46875 32 C 15.46875 32.554688 15.019531 33 14.46875 33 L 7.6875 33 C 7.136719 33 6.6875 32.554688 6.6875 32 C 6.6875 31.445313 7.136719 31 7.6875 31 Z M 19.21875 34.78125 L 26.9375 34.78125 C 27.492188 34.78125 27.9375 35.226563 27.9375 35.78125 C 27.9375 36.335938 27.492188 36.78125 26.9375 36.78125 L 19.21875 36.78125 C 18.667969 36.78125 18.21875 36.335938 18.21875 35.78125 C 18.21875 35.226563 18.667969 34.78125 19.21875 34.78125 Z M 7.6875 35 L 14.46875 35 C 15.019531 35 15.46875 35.445313 15.46875 36 C 15.46875 36.554688 15.019531 37 14.46875 37 L 7.6875 37 C 7.136719 37 6.6875 36.554688 6.6875 36 C 6.6875 35.445313 7.136719 35 7.6875 35 Z M 19.21875 38.53125 L 26.9375 38.53125 C 27.492188 38.53125 27.9375 38.976563 27.9375 39.53125 C 27.9375 40.085938 27.492188 40.53125 26.9375 40.53125 L 19.21875 40.53125 C 18.667969 40.53125 18.21875 40.085938 18.21875 39.53125 C 18.21875 38.976563 18.667969 38.53125 19.21875 38.53125 Z M 7.6875 39 L 14.46875 39 C 15.019531 39 15.46875 39.445313 15.46875 40 C 15.46875 40.554688 15.019531 41 14.46875 41 L 7.6875 41 C 7.136719 41 6.6875 40.554688 6.6875 40 C 6.6875 39.445313 7.136719 39 7.6875 39 Z"></path>
                </svg>
            <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">ข่าวสาร</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <ul id="dropdown-example" class="hidden py-2 space-y-2">
            <li>
                <a href="{{ url('pressRelease') }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    ข่าวประชาสัมพันธ์
                </a>
            </li>
            <li>
                <a href="{{ url('procurementNews') }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    ข่าวจัดซื้อจัดจ้าง
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    ประกาศรับสมัครงาน
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    เอกสารดาวห์โหลด
                </a>
            </li>
        </ul>
        <button type="button" class="flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700" aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-[3px] flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-gray-900 dark:text-white dark:group-hover:text-white   "  x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" fill="currentColor" aria-hidden="true">
                <path d="M 1.9375 2.78125 C 1.386719 2.78125 0.9375 3.230469 0.9375 3.78125 L 0.9375 39.46875 C 0.9375 42.082031 1.699219 44.1875 3.25 45.71875 C 5.714844 48.15625 9.242188 48.21875 9.59375 48.21875 L 41.375 48.21875 C 41.429688 48.21875 41.773438 48.226563 42.25 48.15625 C 39.136719 47.761719 34.625 45.617188 34.625 39.46875 L 34.625 3.78125 C 34.625 3.230469 34.179688 2.78125 33.625 2.78125 Z M 36.625 9.5 L 36.625 39.46875 C 36.625 46.113281 43.039063 46.21875 43.3125 46.21875 C 43.851563 46.214844 48.3125 46.011719 49 40.90625 C 49.046875 40.472656 49.0625 40.019531 49.0625 39.53125 L 49.0625 14.4375 C 49.0625 14.433594 49.0625 14.410156 49.0625 14.40625 C 49.027344 12.957031 48.25 10.414063 45.65625 9.71875 C 44.84375 9.914063 44.167969 10.277344 43.65625 10.8125 C 42.332031 12.195313 42.375 14.324219 42.375 14.34375 L 42.375 38.625 C 42.375 39.179688 41.929688 39.625 41.375 39.625 C 40.820313 39.625 40.375 39.179688 40.375 38.625 L 40.375 14.375 C 40.371094 14.300781 40.273438 11.511719 42.125 9.5 Z M 7.21875 11 L 26.9375 11 C 27.492188 11 27.9375 11.449219 27.9375 12 C 27.9375 12.550781 27.492188 13 26.9375 13 L 7.21875 13 C 6.667969 13 6.21875 12.550781 6.21875 12 C 6.21875 11.449219 6.667969 11 7.21875 11 Z M 7.21875 15 L 26.9375 15 C 27.492188 15 27.9375 15.449219 27.9375 16 C 27.9375 16.550781 27.492188 17 26.9375 17 L 7.21875 17 C 6.667969 17 6.21875 16.550781 6.21875 16 C 6.21875 15.449219 6.667969 15 7.21875 15 Z M 7.6875 23 L 14.46875 23 C 15.019531 23 15.46875 23.449219 15.46875 24 C 15.46875 24.550781 15.019531 25 14.46875 25 L 7.6875 25 C 7.136719 25 6.6875 24.550781 6.6875 24 C 6.6875 23.449219 7.136719 23 7.6875 23 Z M 19.21875 23 L 26.9375 23 C 27.492188 23 27.9375 23.449219 27.9375 24 C 27.9375 24.550781 27.492188 25 26.9375 25 L 19.21875 25 C 18.667969 25 18.21875 24.550781 18.21875 24 C 18.21875 23.449219 18.667969 23 19.21875 23 Z M 7.6875 27 L 14.46875 27 C 15.019531 27 15.46875 27.445313 15.46875 28 C 15.46875 28.554688 15.019531 29 14.46875 29 L 7.6875 29 C 7.136719 29 6.6875 28.554688 6.6875 28 C 6.6875 27.445313 7.136719 27 7.6875 27 Z M 19.21875 27 L 26.9375 27 C 27.492188 27 27.9375 27.445313 27.9375 28 C 27.9375 28.554688 27.492188 29 26.9375 29 L 19.21875 29 C 18.667969 29 18.21875 28.554688 18.21875 28 C 18.21875 27.445313 18.667969 27 19.21875 27 Z M 19.21875 30.78125 L 26.9375 30.78125 C 27.492188 30.78125 27.9375 31.226563 27.9375 31.78125 C 27.9375 32.335938 27.492188 32.78125 26.9375 32.78125 L 19.21875 32.78125 C 18.667969 32.78125 18.21875 32.335938 18.21875 31.78125 C 18.21875 31.226563 18.667969 30.78125 19.21875 30.78125 Z M 7.6875 31 L 14.46875 31 C 15.019531 31 15.46875 31.445313 15.46875 32 C 15.46875 32.554688 15.019531 33 14.46875 33 L 7.6875 33 C 7.136719 33 6.6875 32.554688 6.6875 32 C 6.6875 31.445313 7.136719 31 7.6875 31 Z M 19.21875 34.78125 L 26.9375 34.78125 C 27.492188 34.78125 27.9375 35.226563 27.9375 35.78125 C 27.9375 36.335938 27.492188 36.78125 26.9375 36.78125 L 19.21875 36.78125 C 18.667969 36.78125 18.21875 36.335938 18.21875 35.78125 C 18.21875 35.226563 18.667969 34.78125 19.21875 34.78125 Z M 7.6875 35 L 14.46875 35 C 15.019531 35 15.46875 35.445313 15.46875 36 C 15.46875 36.554688 15.019531 37 14.46875 37 L 7.6875 37 C 7.136719 37 6.6875 36.554688 6.6875 36 C 6.6875 35.445313 7.136719 35 7.6875 35 Z M 19.21875 38.53125 L 26.9375 38.53125 C 27.492188 38.53125 27.9375 38.976563 27.9375 39.53125 C 27.9375 40.085938 27.492188 40.53125 26.9375 40.53125 L 19.21875 40.53125 C 18.667969 40.53125 18.21875 40.085938 18.21875 39.53125 C 18.21875 38.976563 18.667969 38.53125 19.21875 38.53125 Z M 7.6875 39 L 14.46875 39 C 15.019531 39 15.46875 39.445313 15.46875 40 C 15.46875 40.554688 15.019531 41 14.46875 41 L 7.6875 41 C 7.136719 41 6.6875 40.554688 6.6875 40 C 6.6875 39.445313 7.136719 39 7.6875 39 Z"></path>
            </svg>
            <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">ITA</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <ul id="dropdown-example1" class="hidden py-2 space-y-2">
            @foreach($sidebarData as $item)
                <li>
                    <a href="{{ route('ita', ['id' => $item->fiscalYear_name ]) }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        ITA ปีงบประมาณ {{ $item->fiscalYear_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
