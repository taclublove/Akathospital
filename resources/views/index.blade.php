@extends('index_template.mainIndex')

@section('head')
    <title>Akathospital</title>
@endsection

@section('content')
    {{-- Heroes Start --}}
    <div class="hero min-h-screen bg-base-200" id="bg_heroes">
        <div class="over-lay">
            <div class="">
                <div class="">
                    {{-- <img src="https://co-vaccine.moph.go.th/assets/images/moph-logo.gif"
                        class="max-w-sm me-10 animate-bounce" />
                    <div>
                        <h1 class="text-9xl font-bold animate-bounce text-white">Akathospital</h1>
                        <p class="py-6 text-5xl animate-bounce text-white">โรงพยาบาลอากาศอำนวย</p>
                    </div> --}}
                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-2">
                            <div id="default-carousel" class="relative w-[1000px] ms-[5rem] mt-[7rem] m-[1rem]" data-carousel="slide" data-aos="fade-right"
                            data-aos-duration="600" data-aos-easing="ease-in-sine">
                                <!-- Carousel wrapper -->
                                <div class="relative h-[600px] overflow-hidden rounded-lg ">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                                            class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                                            class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                                            class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                                            class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 5 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                                            class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                </div>
                                <!-- Slider indicators -->
                                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                        data-carousel-slide-to="0"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                                        data-carousel-slide-to="1"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                                        data-carousel-slide-to="2"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                                        data-carousel-slide-to="3"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                                        data-carousel-slide-to="4"></button>
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="w-[100%]">
                            <!-- Image Column -->
                            <div class="w-[15rem] h-64 lg:h-auto mt-[10rem] ms-[9rem]" data-aos="fade-left"
                                data-aos-duration="600" data-aos-easing="ease-in-sine">
                                <img class="h-full w-[100vw] object-cover rounded-lg shadow-lg"
                                    src="{{ url('image/hospital_director/boss.jpg') }}" alt="Winding mountain road">
                            </div>
                            <div class="ms-[1rem] mt-[1rem]" data-aos="fade-left"
                            data-aos-duration="600" data-aos-easing="ease-in-sine">
                                <h2 class="text-2xl font-medium uppercase text-white lg:text-3xl text-center">ผู้อำนวยการโรงพยาบาลอากาศอำนวย</h2>
                                <p class="mt-2 text-2xl text-white text-center">
                                    นางจิรัฐติกาล สุตวณิชย์
                                </p>
                            </div>
                            <!-- Close Image Column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Heroes End --}}

    {{-- Website ภายนอก Start --}}
    <div class="container px-[10rem] relative mt-[2rem] mx-auto mx-[3rem] flex flex-col items-center pb-[40px] ">
        <div class="max-w-full w-100 px-[28px] py-5 overflow-x-scroll  h-full none-scroll">
            <h4 class="text-xl font-bold text-dark capitalize  md:text-3xl text-center" data-aos="fade-right"
                data-aos-duration="600" data-aos-easing="ease-in-sine">⚒️ Website ภายนอก 🛠️</h4>
            <p class="text-center"></p>

            <div class="max-w-full mt-[3rem]">
                <div class="grid gap-8 my-[1rem] sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 " data-aos="fade-up"
                    data-aos-duration="600" data-aos-easing="ease-in-sine">
                    <!-- cards -->
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">
                        <a href="http://backoffice.akathospital.com" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold text-dark">BackOffice</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://192.168.2.3:8082/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">Smart Refer</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://ae.moph.go.th/isonline" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">IS Online</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://www.kaotajai.com/login" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ก้าวท้าใจ</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.6/archives/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ระบบสารบัญสาสุข</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://snk.hdc.moph.go.th/hdc/main/index_pk.php" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">HDC 43แฟ้ม (จังหวัด)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.121/cockpit64_43/main/new_index2.php?stg_group_id=1" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">โปรแกรม Cockpit 64</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://203.157.177.7/iclaimer/main/index.php" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">โปรแกรม Iclaimer</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://www.nhso.go.th/FrontEnd/Index.aspx" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">สปสช.</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="https://r8way.moph.go.th/r8way/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
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
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">กรมบัญชีกลาง</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://www.gprocurement.go.th/new_index.html" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">ระบบจัดซื้อจัดจ้างภาครัฐ</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full max-w-xs text-center hover:scale-110 ease-in-out duration-300">

                        <a href="http://www.phsncoop.com/" target="_blank">
                            <div
                                class="object-cover object-center w-full h-[80px] mx-auto rounded-lg bg-blue-200 border-4 border-blue-400 flex items-center justify-center">
                                <div class="">
                                    <h5 class="text-lg font-bold t">สหกรณ์ออมทรัพย์สาธารณสุขจังหวัดสกลนคร</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- Image Column -->
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
        <!-- Close Text Column --> --}}

    </div>
    {{-- Website ภายนอก End --}}

    {{-- Start --}}
    <section class="bg-boss w-[100vw]">
        {{-- <div class="max-w-full px-[28px] over-lay py-5 overflow-x-scroll  h-[200px] none-scroll">
            <h4 class="text-xl font-bold text-white capitalize  md:text-3xl text-center" data-aos="fade-right"
                data-aos-duration="600" data-aos-easing="ease-in-sine">⚒️ Website ภายนอก 🛠️</h4>
            <p class="text-center"></p>

            <div class="max-w-full">
                <div class="grid gap-8 my-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 " data-aos="fade-up"
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
        </div> --}}
    </section>
    {{-- End --}}

    {{-- Slider Start --}}
    {{-- <div class="w-100 min-h-screen flex flex-col p-8 sm:p-16 md:p-24 justify-center bg-white">
        <div id="default-carousel" class="relative w-[100%] " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[600px] overflow-hidden rounded-lg md:h-[700px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                        class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                        class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                        class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                        class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="http://akathospital.com/assets/images/slider/6511.jpg"
                        class="absolute block w-[100%] h-[100%] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div> --}}
    {{-- Slider End --}}

    {{-- <div data-dial-init class="fixed end-10 bottom-[4rem] group z-30">
        <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
            <button type="button" data-tooltip-target="tooltip-share" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M14.419 10.581a3.564 3.564 0 0 0-2.574 1.1l-4.756-2.49a3.54 3.54 0 0 0 .072-.71 3.55 3.55 0 0 0-.043-.428L11.67 6.1a3.56 3.56 0 1 0-.831-2.265c.006.143.02.286.043.428L6.33 6.218a3.573 3.573 0 1 0-.175 4.743l4.756 2.491a3.58 3.58 0 1 0 3.508-2.871Z"/>
                </svg>
                <span class="sr-only">Share</span>
            </button>
            <div id="tooltip-share" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Share
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                    <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                </svg>
                <span class="sr-only">Print</span>
            </button>
            <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Print
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-download" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Download</span>
            </button>
            <div id="tooltip-download" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Download
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-copy" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"/>
                    <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"/>
                </svg>
                <span class="sr-only">Copy</span>
            </button>
            <div id="tooltip-copy" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Copy
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <button type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div> --}}

    {{-- ข่าวต่างๆ Start --}}
    <div class="bg-boss">
        <div class="max-w-full px-[40px] py-[40px] over-lay">
            <div class="mb-4 border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap container mx-auto px-[10rem] text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist" data-aos="fade-right"
                    data-aos-duration="600" data-aos-easing="ease-in-sine">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">กิจกกรม</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Dashboard</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Contacts</button>
                    </li>
                </ul>
            </div>
            <div class="container mx-auto px-[10rem]" id="default-tab-content" data-aos="fade-left"
            data-aos-duration="600" data-aos-easing="ease-in-sine">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 " id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
                    <h1 class="my-3">กิจกรรม</h1>
                    <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                        <div class="order-1 sm:ml-3 xl:ml-3">
                            <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                                unstyled, fully
                                accessible UI components
                            </h3>
                            <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully
                                    with
                                    Tailwind
                                    CSS.</p>
                            </div><a
                                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                href="https://headlessui.dev">Learn
                                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                    width="3" height="6" viewBox="0 0 3 6" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg></a>
                        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg"
                            alt=""
                            class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                            width="1216" height="640">
                    </li>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
                    <h1 class="my-3">test</h1>
                    <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                        <div class="order-1 sm:ml-3 xl:ml-3">
                            <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                                unstyled, fully
                                accessible UI components
                            </h3>
                            <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully
                                    with
                                    Tailwind
                                    CSS.</p>
                            </div><a
                                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                href="https://headlessui.dev">Learn
                                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                    width="3" height="6" viewBox="0 0 3 6" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg></a>
                        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg"
                            alt=""
                            class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                            width="1216" height="640">
                    </li>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                    aria-labelledby="settings-tab">
                    {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
                    <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                        <div class="order-1 sm:ml-3 xl:ml-3">
                            <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                                unstyled, fully
                                accessible UI components
                            </h3>
                            <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully
                                    with
                                    Tailwind
                                    CSS.</p>
                            </div><a
                                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                href="https://headlessui.dev">Learn
                                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                    width="3" height="6" viewBox="0 0 3 6" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg></a>
                        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg"
                            alt=""
                            class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                            width="1216" height="640">
                    </li>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                    aria-labelledby="contacts-tab">
                    {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
                    <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                        <div class="order-1 sm:ml-3 xl:ml-3">
                            <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely
                                unstyled, fully
                                accessible UI components
                            </h3>
                            <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully
                                    with
                                    Tailwind
                                    CSS.</p>
                            </div><a
                                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                href="https://headlessui.dev">Learn
                                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                                    width="3" height="6" viewBox="0 0 3 6" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg></a>
                        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg"
                            alt=""
                            class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                            width="1216" height="640">
                    </li>
                </div>
            </div>

        </div>
    </div>
    {{-- ข่าวต่างๆ End --}}
@endsection

@section('script')
@endsection
