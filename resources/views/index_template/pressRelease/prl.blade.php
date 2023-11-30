@extends('index_template.mainShow')

@section('head')
    <title></title>
@endsection

@section('content')
    <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">
        <h1 class="text-[40px] font-bold mt-[3rem]">{{ $subMenuShow->first()->sub_menu_show_name }}</h1>
        <h3 class="mt-[1rem] text-[25px]"></h3>
        {{-- <div class="flex border-b border-gray-300 grid grid-cols-4 w-full">
            <button
                class="w-full py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tl-lg focus:bg-gray-300 active:bg-gray-300"
                onclick="openTab(event, 'tab1')">ประกาศจัดซื้อจัดจ้าง</button>
            <button
                class="w-full py-4 text-center font-medium text-gray-700 bg-gray-100  focus:bg-gray-300 active:bg-gray-300"
                onclick="openTab(event, 'tab2')">เอกสารประชาสัมพันธ์</button>
            <button
                class="w-full py-4 text-center font-medium text-gray-700 bg-gray-100  focus:bg-gray-300 active:bg-gray-300"
                onclick="openTab(event, 'tab3')">ประกาศรับสมัครงาน</button>
            <button
                class="w-full py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tr-lg focus:bg-gray-300 active:bg-gray-300"
                onclick="openTab(event, 'tab4')">เอกสารดาวห์โหลด</button>
        </div> --}}
        <div id="tab1" class="tabcontent p-[40px]">
            <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">
                {{ $subMenuShow->first()->sub_menu_show_name }}</h3>
            <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start py-[40px] px-[100px]">
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-3 xl:ml-3 ms-5">
                        <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-indigo-500">ชื่อผู้ลงข้อมูล : วันเวลาที่ลงข้อมูล : วันเวลาที่มีการแก้ไข
                            </span>
                            หัวข้อของเนื้อหา
                        </h3>
                        <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                            <p>เนื้อหา</p>
                        </div>
                        <a
                            class="mt-[1.5rem] group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://headlessui.dev">Learn more
                            <span class="sr-only">, Completely unstyled, fully accessible UI components</span>
                            <svg class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="me-[2rem]">
                        <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                    </div>
                </li>
                {{-- <li class="relative flex flex-row sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful
                            hand-crafted SVG
                            icons, by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party
                                React and
                                Vue libraries.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heroicons.com">Learn
                            more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG
                            background
                            patterns by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your
                                web
                                projects.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heropatterns.com">Learn
                            more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg"
                        alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li> --}}
            </ul>
        </div>
        {{-- <div id="tab2" class="tabcontent p-[40px] hidden">
            <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">
                เอกสารประชาสัมพันธ์</h3>
            <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start py-[40px] px-[200px]">
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-3 xl:ml-3">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                            unstyled, fully
                            accessible UI components
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with
                                Tailwind
                                CSS.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://headlessui.dev">Learn
                            more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-row sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful
                            hand-crafted SVG
                            icons, by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party
                                React and
                                Vue libraries.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heroicons.com">Learn
                            more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG
                            background
                            patterns by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your
                                web
                                projects.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heropatterns.com">Learn
                            more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg"
                        alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
            </ul>
        </div>
        <div id="tab3" class="tabcontent p-[40px] hidden">
            <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">
                ประกาศรับสมัครงาน</h3>
            <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start py-[40px] px-[200px]">
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-3 xl:ml-3">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                            unstyled, fully
                            accessible UI components
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with
                                Tailwind
                                CSS.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://headlessui.dev">Learn
                            more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-row sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful
                            hand-crafted SVG
                            icons, by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party
                                React and
                                Vue libraries.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heroicons.com">Learn
                            more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG
                            background
                            patterns by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your
                                web
                                projects.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heropatterns.com">Learn
                            more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg"
                        alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
            </ul>
        </div>
        <div id="tab4" class="tabcontent p-[40px] hidden">
            <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">
                เอกสารดาวห์โหลด</h3>
            <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start py-[40px] px-[200px]">
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-3 xl:ml-3">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                            unstyled, fully
                            accessible UI components
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with
                                Tailwind
                                CSS.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://headlessui.dev">Learn
                            more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-row sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful
                            hand-crafted SVG
                            icons, by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party
                                React and
                                Vue libraries.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heroicons.com">Learn
                            more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
                <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                    <div class="order-1 sm:ml-6 xl:ml-6">
                        <h3 class="mb-1 text-white font-semibold dark:text-slate-200">
                            <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG
                            background
                            patterns by the makers of Tailwind CSS.
                        </h3>
                        <div class="prose prose-slate prose-sm text-white dark:prose-dark">
                            <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your
                                web
                                projects.</p>
                        </div><a
                            class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                            href="https://heropatterns.com">Learn
                            more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind
                                CSS.</span><svg
                                class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M0 0L3 3L0 6"></path>
                            </svg></a>
                    </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg"
                        alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                        width="1216" height="640">
                </li>
            </ul>
        </div> --}}
    </div>
@endsection
