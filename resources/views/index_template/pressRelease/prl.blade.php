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
            @foreach($gprls as $gprl)
                <ul class="grid grid-cols-1 xl:grid-row-3 gap-y-10 gap-x-6 items-start py-[40px] px-[100px]">
                        <li class="relative flex flex-col sm:flex-row xl:flex-row items-start">
                            <div class="order-1 sm:ml-3 xl:ml-3 ms-5">
                                <h3 class="mb-1 text-dark font-semibold dark:text-slate-200">
                                    <span class="mb-1 block text-sm leading-6 text-indigo-500">{{ $gprl->user->fname }} {{ $gprl->user->lname }} : {{ $gprl->created_at }} : {{ $gprl->updated_at }}
                                    </span>
                                    {{ $gprl->title }}
                                </h3>
                                <div class="prose prose-slate prose-sm text-dark dark:prose-dark">
                                    <p>เนื้อหา</p>
                                </div>
                                <a
                                    class="mt-[1.5rem] group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                                    href="{{ route('gprlShow', ['id' => $gprl->id]) }}">Learn more
                                </a>
                            </div>
                            <div class="me-[2rem]">
                                <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                                class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-[17rem]"
                                width="1216" height="640">
                            </div>
                        </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
