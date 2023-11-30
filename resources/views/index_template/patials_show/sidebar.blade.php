<h1 class="text-white text-3xl text-center">Akathospital</h1>
<div class="mt-[20px]">
    <div class="mt-2 py-2">
        <a href="{{ url('/') }}" class=" mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700">
            <i class="fa-solid fa-house"></i>
                <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">Home</span>
        </a>
        @foreach ($mainMenuShow as $mms)
            @if ($mms->link == '')
                @php
                    $isActive = false;
                    $dropdownId = 'dropdown-example-' . $mms->id;
                @endphp

                @foreach($mms->fiscalYear as $fcy)
                    @if (Route::currentRouteName() == 'ita' && $fcy->fiscalYear_name == request('id'))
                        @php $isActive = true; @endphp
                    @endif
                @endforeach

                @foreach($mms->subMenuShow as $sms)
                    @if (Route::currentRouteName() == 'prl' && $sms->sub_menu_show_name == request('id'))
                        @php $isActive = true; @endphp
                    @endif
                @endforeach

                <button type="button" class="mt-5 flex items-center w-full p-1 text-base text-white hover:text-black transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-dark dark:hover:bg-gray-700 @if($isActive) active @endif" aria-controls="{{ $dropdownId }}" data-collapse-toggle="{{ $dropdownId }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-darkwhitespace-nowrap">{{ $mms->main_menu_show_name }}</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                @if(!empty($mms->fiscalYear) || !empty($mms->subMenuShow))
                    <ul id="{{ $dropdownId }}" class="hidden py-2 space-y-2">
                        @foreach($mms->fiscalYear as $fcy)
                            <li>
                                <a href="{{ route('ita', ['id' => $fcy->fiscalYear_name ]) }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 @if($isActive) active @endif">
                                    ITA ปีงบประมาณ {{ $fcy->fiscalYear_name }}
                                </a>
                            </li>
                        @endforeach

                        @foreach($mms->subMenuShow as $sms)
                            <li>
                                <a href="{{ route('prl', ['id' => $sms->sub_menu_show_name ]) }}" class="flex items-center w-full p-2 text-white hover:text-black transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 @if($isActive) active @endif">
                                    {{ $sms->sub_menu_show_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @elseif ($mms->link != '')

            @endif
        @endforeach

    </div>
