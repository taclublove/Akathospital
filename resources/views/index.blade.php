@extends('index_template.mainIndex')

@section('head')
    <title>Akathospital</title>
@endsection

@section('content')
    {{-- Heroes Start --}}
    <div class="mx-auto pt-18" id="bg_heroes">
        <div class="hero min-h-screen bg-base-200">
            <div class="over-lay">
                <div class="bg-img hero-content flex-col lg:flex-row mx-10">
                    <img src="https://co-vaccine.moph.go.th/assets/images/moph-logo.gif"
                        class="max-w-sm me-10 animate-bounce" />
                    <div>
                        <h1 class="text-9xl font-bold animate-bounce text-white">Akathospital</h1>
                        {{-- <hr class="font-black"> --}}
                        <p class="py-6 text-5xl animate-bounce text-white">โรงพยาบาลอากาศอำนวย</p>
                        {{-- <button class="btn btn-primary">Get Started</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Heroes End --}}

    {{-- Section Website ภายนอก Start --}}
    {{-- <section class="container p-6 px-auto space-y-3 bg-white">
        <div class="sm:flex items-center max-w-screen-xl">
            <div class="sm:w-1/2 p-10 ms-[150px]">
                <div class="image object-center text-center">
                    <img src="{{ url('image/hospital_director/boss.jpg') }}">
                </div>
            </div>
            <div class="sm:w-1/2 bg-base-300 p-5 rounded-lg">
                <div class="text">
                    <span class="text-gray-500 border-b-2 border-indigo-600 uppercase">About us</span>
                    <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">ผู้อำนวยการ<span
                            class="text-indigo-600">โรงพยาบาลอากาศอำนวย</span>
                    </h2>
                    <p class="text-gray-700">
                        นางจิรัฐติกาล สุตวณิชย์
                    </p>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- Section Website ภายนอก End --}}

    {{-- Boss Start --}}
    <div
        class="relative flex flex-col items-center mx-auto pb-[40px] lg:flex-row-reverse lg:max-w-5xl lg:mt-12 xl:max-w-6xl">

        <!-- Image Column -->
        <div class="w-full h-64 ps-[100px] lg:w-1/2 lg:h-auto" data-aos="fade-left" data-aos-duration="600"
            data-aos-easing="ease-in-sine">
            <img class="h-full w-[350px] object-cover rounded-lg shadow-lg"
                src="{{ url('image/hospital_director/boss.jpg') }}" alt="Winding mountain road">
        </div>
        <!-- Close Image Column -->

        <!-- Text Column -->
        <div class="max-w-lg bg-white md:max-w-2xl md:z-1 md:shadow-lg md:absolute md:top-0 md:mt-48 lg:w-4/5 lg:left-0 lg:mt-20 lg:ml-20 xl:mt-24 xl:ml-12"
            data-aos="fade-right" data-aos-duration="600" data-aos-easing="ease-in-sine">
            <!-- Text Wrapper -->
            <div class="flex flex-col p-12 md:px-16">
                <h2 class="text-2xl font-medium uppercase text-green-800 lg:text-3xl">ผู้อำนวยการโรงพยาบาลอากาศอำนวย</h2>
                <p class="mt-4 text-2xl">
                    นางจิรัฐติกาล สุตวณิชย์
                </p>
                <!-- Button Container -->
                <div class="mt-8">
                    <a href="#"
                        class="inline-block w-full text-center text-lg font-medium text-gray-100 bg-green-600 border-solid border-2 border-gray-600 py-4 px-10 hover:bg-green-800 hover:shadow-md md:w-48">Read
                        More</a>
                </div>
            </div>
            <!-- Close Text Wrapper -->
        </div>
        <!-- Close Text Column -->

    </div>
    {{-- Boss End --}}

    {{-- Website ภายนอก Start --}}
    <section class="bg-boss w-[100vw]">
        <div class="max-w-full px-[28px] over-lay py-5 overflow-x-scroll  h-[200px] none-scroll">
            <h4 class="text-xl font-bold text-white capitalize  md:text-3xl text-center" data-aos="fade-right"
                data-aos-duration="600" data-aos-easing="ease-in-sine">⚒️ Website ภายนอก 🛠️</h4>
            <p class="text-center"></p>

            <div class="max-w-full">
                <div class="grid gap-8 my-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6" data-aos="fade-up"
                    data-aos-duration="600" data-aos-easing="ease-in-sine">
                    <!-- cards -->
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">
                        <a href="http://backoffice.akathospital.com" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">BackOffice</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://192.168.2.3:8082/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">Smart Refer</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://ae.moph.go.th/isonline" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">IS Online</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://www.kaotajai.com/login" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ก้าวท้าใจ</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.6/archives/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ระบบสารบัญสาสุข</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://snk.hdc.moph.go.th/hdc/main/index_pk.php" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">HDC 43แฟ้ม (จังหวัด)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.121/cockpit64_43/main/new_index2.php?stg_group_id=1" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">โปรแกรม Cockpit 64</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.7/iclaimer/main/index.php" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">โปรแกรม Iclaimer</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://www.nhso.go.th/FrontEnd/Index.aspx" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">สปสช.</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://r8way.moph.go.th/r8way/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">เขตสุขภาพที่ 8</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://www.cgd.go.th/cs/internet/internet/%e0%b8%ab%e0%b8%99%e0%b9%89%e0%b8%b2%e0%b8%ab%e0%b8%a5%e0%b8%b1%e0%b8%81.html"
                            target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">กรมบัญชีกลาง</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://www.gprocurement.go.th/new_index.html" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ระบบจัดซื้อจัดจ้างภาครัฐ</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://www.phsncoop.com/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-100 border-4 border-blue-200 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">สหกรณ์ออมทรัพย์สาธารณสุขจังหวัดสกลนคร</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Website ภายนอก End --}}

    <div class="min-h-screen flex flex-col p-8 sm:p-16 md:p-24 justify-center bg-white">
        <!-- Themes: blue, purple and teal -->
        {{-- <div data-theme="teal" class="mx-auto max-w-6xl">
            <h2 class="sr-only">Featured case study</h2>
            <section class="font-sans text-black">
                <div
                    class="[ lg:flex lg:items-center ] [ fancy-corners fancy-corners--large fancy-corners--top-left fancy-corners--bottom-right ]">
                    <div class="flex-shrink-0 self-stretch sm:flex-basis-40 md:flex-basis-50 xl:flex-basis-60 me-[40px]">
                        <div class="h-full">
                            <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                                <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                                    <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                                </div>

                                <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                                    <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
                                </button>

                                <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                                    <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
                                </button>

                                <div class="relative h-[450px] flex items-center justify-center" style="width: 40rem">
                                    <template x-for="(image, index) in images">
                                        <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0">
                                            <img :src="image" alt="image" class="rounded-sm w-[100%] h-[100%]" />
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-grey">
                        <div class="leading-relaxed">
                            <h2 class="leading-tight text-4xl font-bold">ประกาศต่างๆ</h2>
                            <p class="mt-4">Our second CXcon in October was dedicated to experience transformation. The
                                free one-day virtual event&nbsp;brought together 230+ heads of digital, thought leaders, and
                                UX practitioners to discuss all aspects of experience design..</p>
                            <p class="mt-4">In a jam-packed day filled with keynote sessions, panels, and virtual
                                networking we explored topics including design leadership, UX ethics, designing for emotion
                                and innovation at scale.</p>
                            <p><a class="mt-4 button button--secondary"
                                    href="https://inviqa.com/cxcon-experience-transformation">Explore this event</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div> --}}
        <div id="default-carousel" class="relative w-[1350px] " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[600px] overflow-hidden rounded-lg md:h-[600px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg" class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg" class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg" class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg" class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg" class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>






    {{-- Slider Start --}}
    {{-- <div class="slider_img">
        <div class="over-lay py-[10px]">
            <div class="sliderAx h-auto container px-[40px] py-[20px]">
                <div id="slider-1" class="container mx-auto flex items-center justify-center ">
                    <div class="bg-cover bg-center  h-[800px] w-[1200px] text-white py-[10px] px-10 object-cover ">
                        <img src="{{ url('image/Slider_show/03.jpg') }}" class="w-[100%] h-[100%] object-cover" alt="">
                    </div>
                    <br>
                </div>
                <div id="slider-2" class="container mx-auto flex items-center justify-center">
                    <div
                        class="bg-cover bg-top  h-[800px] w-[1200px] text-white py-[10px] px-10 object-cover">
                        <img src="{{ url('image/Slider_Show/43.jpg') }}" class="w-[100%] h-[100%] object-cover" alt="">
                    </div>
                    <br>
                </div>
            </div>
            <div class="flex justify-between w-12 mx-auto pb-2 ">
                <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
                <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
            </div>
        </div>
    </div> --}}
    {{-- Slider End --}}

    {{-- ข่าวต่างๆ Start --}}
    <div class="bg-boss">
        <div class="max-w-full px-[40px] py-[40px] over-lay">
            <div class="flex border-b border-gray-300 grid grid-cols-4 w-full">
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
            </div>
            <div id="tab1" class="tabcontent p-[40px]">
                <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">
                    ประกาศจัดซื้อจัดจ้าง</h3>
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
            <div id="tab2" class="tabcontent p-[40px] hidden">
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
            </div>
        </div>
    </div>
    {{-- ข่าวต่างๆ End --}}

    {{-- <div class="container px-[10rem] pt-[78px] pb-[20px]">
        <h3 class="text-black text-bold antialiased bg-base-300 p-[10px] rounded-lg text-center text-lg">ข่าวประชาสัมพันธ์</h3>
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
    </div> --}}

    {{-- Start --}}
    {{-- <section class="container mx-auto mt-5 mb-5">
        <div class="grid grid-cols-5 gap-5">
            <div class="bg-indigo-500 h-[100px] rounded-lg shadow-lg"><a href="#" class="flex items-center justify-center">Backoffice</a></div>
            <div class="bg-indigo-500 h-[100px] rounded-lg shadow-lg"></div>
            <div class="bg-indigo-500 h-[100px] rounded-lg shadow-lg"></div>
            <div class="bg-indigo-500 h-[100px] rounded-lg shadow-lg"></div>
            <div class="bg-indigo-500 h-[100px] rounded-lg shadow-lg"></div>
        </div>
    </section> --}}
    {{-- End --}}

    {{-- <div class="grid grid-cols-1 gap-3 p-4 mx-auto bg-gray-300">
        <div class="text-white flex w-100 h-96">
            <div class="none-scroll bg-yellow-500 p-8 w-4/5 overflow-scroll rounded-lg shadow-2xl">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nihil saepe temporibus dignissimos, fugit accusamus perferendis voluptate mollitia quod culpa adipisci deserunt, vero suscipit autem hic tenetur. Id neque at itaque mollitia a maiores repellendus beatae omnis et perspiciatis rem deleniti dolorem suscipit accusamus dignissimos ad recusandae animi modi, soluta corrupti magnam eius? Totam facere unde veniam voluptatum perspiciatis porro quae nemo, repellat ad voluptas ipsam suscipit beatae modi, dolorem animi assumenda a odio placeat non ipsa officia! Sed libero molestiae, veritatis vitae id voluptatem rem commodi mollitia cumque nobis ipsam? Necessitatibus nobis consectetur soluta, repellat culpa deserunt dolore, officia suscipit itaque minus enim iusto dignissimos dolor tempore! Voluptatibus similique debitis quidem eaque fugit, ab deleniti earum sed ipsa, nesciunt iusto voluptate illum eveniet tempora sunt neque, perspiciatis soluta vitae iure optio? Aliquid doloribus, unde laborum sequi sapiente ea commodi asperiores possimus labore facilis nobis rem? Omnis illum ex non ratione assumenda error eaque, iste natus voluptatibus accusantium ipsum libero fuga facere corrupti nihil id delectus explicabo doloribus nulla dignissimos sit. Quam pariatur saepe veritatis explicabo molestiae animi officia repudiandae vitae tenetur voluptates adipisci voluptate vel porro accusantium quae accusamus quos iste, quas rerum libero quaerat modi labore assumenda! Quam numquam cupiditate vero nemo! In error mollitia corporis culpa quisquam voluptate laborum ab obcaecati numquam perferendis doloremque, veritatis voluptas eveniet dolor voluptatem iste architecto fugiat autem quasi suscipit labore, sed cum neque nihil! Hic labore ab nisi dolorum ullam eos iusto reiciendis nihil soluta repudiandae mollitia asperiores, unde at illum ipsam. Sint nihil aliquid quas ut veniam laudantium magni, beatae non quam reiciendis repudiandae minima repellendus saepe numquam vel amet, omnis minus delectus alias voluptate perferendis? Animi fugit a ad ab vel, nihil dolorum reprehenderit quis nisi repellat itaque veritatis dignissimos voluptates in dolore. Magni nesciunt nemo optio. Quod dolor quia recusandae veniam quidem molestias ex unde obcaecati, perspiciatis adipisci quasi possimus. Error quas iste in explicabo temporibus ipsam, a obcaecati ex dolorum aut cumque laboriosam assumenda perferendis? Odit repellat tempora deserunt reprehenderit enim numquam? Ullam, hic consequatur. Harum amet fuga tempore itaque non libero voluptatibus, cumque laudantium numquam labore reiciendis quisquam dolore sequi a soluta. Eaque quo necessitatibus iusto ea libero quisquam laborum consectetur esse nemo, dicta quis blanditiis aspernatur enim nihil omnis? Quae, rerum? Non quasi optio nam animi, iure, possimus reiciendis repellat laborum iste corrupti illum dolor rem corporis, nisi necessitatibus sit officiis fuga? Vero ducimus maiores nemo necessitatibus dignissimos voluptate iure accusantium architecto libero ipsa ea ex nobis animi, eius nihil obcaecati expedita deserunt ad dolorem voluptatibus accusamus labore, quod doloribus? Ipsa earum hic incidunt? Impedit possimus laudantium voluptates odit sed aperiam sapiente, sunt nisi sequi, explicabo soluta modi assumenda officia inventore a, corrupti cum consequatur nulla adipisci nihil consequuntur deleniti! Placeat culpa ipsum tempore dignissimos provident eius quis, quod laboriosam eligendi quia recusandae rem repudiandae pariatur voluptatum perspiciatis minus deserunt error nesciunt eaque assumenda? Porro corrupti natus officiis illo optio, consequatur alias, libero, praesentium suscipit deserunt est! Iusto iure perspiciatis officiis recusandae nostrum corporis dolorum, ratione esse vel ipsa nobis, consectetur molestias id? Natus architecto voluptatum nulla sint quia ea ipsa numquam ducimus cupiditate deserunt maiores, veritatis ex incidunt neque eius fuga. Ducimus, tenetur ab. Beatae doloremque ratione maiores dolor amet ea distinctio fuga iure, repellendus tenetur, eum itaque id, at et quaerat non repellat dolorum aperiam libero totam cumque numquam! Rerum aut aliquid labore pariatur error sint consequatur amet. Quis reprehenderit odit inventore doloribus nulla, voluptate delectus ex, eligendi ullam, laudantium excepturi neque in nostrum commodi aliquam quia adipisci molestiae culpa porro vero aperiam! Nesciunt quis, magnam, labore corrupti odit libero provident sit voluptate dicta totam officia! Velit reiciendis porro doloremque earum totam, quia maxime voluptatibus unde eaque animi dolore temporibus quasi veniam, beatae ipsam repellendus sequi fuga minima ullam consequuntur laboriosam ea. Iste enim ratione, numquam nostrum, similique dicta dignissimos cupiditate aliquam quam rerum quod amet consequuntur. Nobis maxime beatae provident rem impedit totam odit fugiat tempora aliquid omnis eligendi mollitia ipsam qui sed explicabo in cum ipsa unde dignissimos facilis, expedita natus eos vero nostrum. Quas adipisci reprehenderit doloremque aut, labore officia aliquid? Nobis quos labore officia ducimus reiciendis sequi consequatur rerum libero dignissimos sit fuga nihil aspernatur impedit voluptatum architecto soluta error saepe, doloremque explicabo. Sed perferendis quo maxime esse corrupti! Corrupti harum cupiditate voluptatibus sequi, molestias asperiores qui earum nam sunt, doloribus quia possimus deleniti accusamus quidem facilis provident dolorem, expedita maxime eius! Aliquam deserunt repellat saepe, aut quaerat quas laborum tempore laudantium blanditiis voluptatem fuga expedita molestias nobis veritatis facilis cum ea reprehenderit in officiis quia ut aspernatur voluptatibus rem nostrum! Molestiae enim maiores facere consectetur veritatis assumenda qui iure voluptatem! Expedita obcaecati nobis dolorum sunt neque beatae quae dolorem dolor quod hic unde facere, delectus eum perspiciatis totam temporibus a tenetur laudantium inventore molestiae veniam optio est pariatur maiores! Nostrum enim, saepe voluptas vel rerum non, accusamus aut cum id, repellendus labore eligendi quisquam neque natus tenetur tempora ducimus recusandae maxime consectetur dolorem perspiciatis. Commodi hic quibusdam deserunt, excepturi doloribus quae. Repudiandae voluptatum, veritatis labore modi tenetur fugit deserunt laboriosam quis impedit? Nisi vitae est tempora porro laudantium obcaecati quidem qui quasi, aut corrupti impedit sit praesentium eaque iste suscipit velit maiores harum perferendis neque pariatur a iusto magni incidunt illum? Dolore, totam fuga harum molestiae deserunt saepe quisquam hic numquam culpa iure esse asperiores, vero recusandae dolorem inventore ipsam corporis! Placeat esse recusandae, optio similique error debitis veritatis suscipit eius ducimus repudiandae, in exercitationem temporibus nemo ratione quaerat? Fugit sit vel incidunt! Sunt nulla, fugiat quam ipsa impedit commodi nesciunt autem earum fuga cum nemo molestiae aperiam! Perferendis velit, pariatur assumenda qui magni nisi dignissimos ut at, beatae exercitationem soluta. Odit illo expedita dolore aut distinctio non illum at officiis earum aliquam rem vero itaque voluptate doloribus repellendus ex impedit, perferendis ullam reprehenderit, perspiciatis eius nihil architecto assumenda. Sint consequatur cumque saepe, cupiditate aliquid, at culpa reprehenderit totam doloremque neque tempora, ducimus omnis voluptatem perferendis voluptates? Nobis tenetur inventore non recusandae obcaecati minus iusto vitae voluptatem eligendi.</p>
            </div>
            <div class="none-scroll bg-green-900 ms-10 w-1/5 p-4 overflow-auto shadow-2xl rounded-lg text-white">
                @include('index_template.patials.menuBar')
            </div>
        </div>
    </div> --}}

    {{-- Hero Start --}}
    {{-- <section>
        <div class="hero min-h-screen bg-gray-100 w-full mx-auto">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <img src="http://akathospital.com/assets/images/directors/boss.jpg"
                    class="max-w-sm rounded-lg shadow-2xl hover:scale-125 ease-in-out duration-300" />
                <div class="">
                    <h1 class="text-5xl font-bold">โรงพยาบาลอากาศอำนวย</h1>
                    <h3 class="text-2xl mt-3 text-blue-500 font-bold">ค่านิยม(Values) : SMILE</h3>
                    <p class="py-2"><span class="text-blue-500 font-bold">S : Safety</span>
                        ผู้รับและผู้ให้บริการปลอดภัยและมีคุณภาพ</p>
                    <p class="py-2"><span class="text-green-500 font-bold">M : Mind and moral</span>
                        บริการด้วยหัวใจความเป็นมนุษย์ ด้วยคุณธรรมจริยธรรม</p>
                    <p class="py-2"><span class="text-yellow-500 font-bold">I : Information and innovation</span>
                        ระบบสารสนเทศและนวัตกรรม</p>
                    <p class="py-2"><span class="text-black-500 font-bold">L : Learning Organization</span>
                        เราต้องเป็นองค์กรแห่งการเรียนรู้อยู่เสมอ</p>
                    <p class="py-2"><span class="text-red-500 font-bold">E : Empowerment มีการเสริมแรง</span>
                        ให้กำลังใจแก่ผู้ให้บริการมีความสุข ยุทธศาสตร์การพัฒนาคุณภาพโรงพยาบาล <br>
                        ยุทธศาสตร์ที่ 1 พัฒนาระบบบริการให้มีคุณภาพและมีประสิทธิภาพ ยุทธศาสตร์ที่ 2
                        ส่งเสริมและพัฒนาสิ่งแวดล้อม <br>
                        ที่ปลอดภัยเอื้อต่อการมีสุขภาพดี ยุทธศาสตร์ที่ 3
                        การสร้างและพัฒนาส่งเสริมภาคีเครือข่ายในการให้บริการด้านสาธารณสุข <br>
                        ครอบคลุมทุกมิติ ยุทธศาสตร์ที่ 4 การส่งเสริมให้เกิดการเรียนรู้และสร้างนวัตกรรมในองค์กร
                        ยุทธศาสตร์ที่ 5 ส่งเสริมให้เจ้า <br>
                        หน้าที่มีสุขภาพดีมีความสุขในการทำงาน ยุทธศาสตร์ที่ 6
                        การพัฒนาและส่งเสริมงานด้านเทคโนโลยีและสารสนเทศ
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- Hero End --}}
@endsection
