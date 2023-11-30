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
        <a href="{{ url('/') }}" class=" mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700">
            <i class="fa-solid fa-house"></i>
                <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">Home</span>
        </a>
        @foreach ($mainMenuShow as $mms)
            @if ($mms->link == '')
                <button type="button" class="mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700" aria-controls="dropdown-example-{{ $mms->id }}" data-collapse-toggle="dropdown-example-{{ $mms->id }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">{{ $mms->main_menu_show_name }}</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example-{{ $mms->id }}" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('pressRelease') }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            ข่าวสารประชาสัมพันธ์ทั่วไป
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            ประกาศรับสมัครงาน
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('procurementNews') }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            ข่าวจัดซื้อจัดจ้าง
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            การจัดฝึกอบรม
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            ปฏิทินกิจกรรมของหน่วยงาน
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            ข่าวสารกิจกรรมของหน่วยงาน
                        </a>
                    </li>
                </ul>
            @elseif ($mms->link != '')
                <button type="button" class="mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fa-solid fa-newspaper"></i>
                    <a href="{{ $mms->link }}" class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap" target="_blank">{{ $mms->main_menu_show_name }}</a>
                </button>
            @endif
        @endforeach


        <button type="button" class="mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700" aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
            <i class="fa-solid fa-newspaper"></i>
            <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">ITA</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <ul id="dropdown-example1" class="hidden py-2 space-y-2">
            @foreach($fiscalYear as $item)
                <li>
                    <a href="{{ route('ita', ['id' => $item->fiscalYear_name ]) }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        ITA ปีงบประมาณ {{ $item->fiscalYear_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
