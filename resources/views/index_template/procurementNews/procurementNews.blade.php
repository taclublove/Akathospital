@extends('index_template.mainShow')

@section('head')
    <title>ข่าวจัดซื้อจัดจ้าง</title>
@endsection

@section('content')    
    <div class="max-w-full px-[3rem] pt-[20px] pb-[20px]">
        <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">ข่าวจัดซื้อจัดจ้าง</h3>
        <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start p-8">
            <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                <div class="order-1 sm:ml-3 xl:ml-3">
                    <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                        <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely unstyled, fully
                        accessible UI components</h3>
                    <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                        <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind
                            CSS.</p>
                    </div><a
                        class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                        href="https://headlessui.dev">Learn
                        more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                            class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                            width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0L3 3L0 6"></path>
                        </svg></a>
                </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]" width="1216" height="640">
            </li>
            <li class="relative flex flex-row sm:flex-row xl:flex-row items-start">
                <div class="order-1 sm:ml-6 xl:ml-6">
                    <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                        <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful hand-crafted SVG
                        icons, by the makers of Tailwind CSS.</h3>
                    <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                        <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party React and
                            Vue libraries.</p>
                    </div><a
                        class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                        href="https://heroicons.com">Learn
                        more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind CSS.</span><svg
                            class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                            width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0L3 3L0 6"></path>
                        </svg></a>
                </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]" width="1216" height="640">
            </li>
            <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                <div class="order-1 sm:ml-6 xl:ml-6">
                    <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                        <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG background
                        patterns by the makers of Tailwind CSS.</h3>
                    <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                        <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your web
                            projects.</p>
                    </div><a
                        class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                        href="https://heropatterns.com">Learn
                        more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind CSS.</span><svg
                            class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                            width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0L3 3L0 6"></path>
                        </svg></a>
                </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]" width="1216" height="640">
            </li>
        </ul>
    </div>
@endsection
