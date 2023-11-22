@extends('index_template.mainShow')

@section('head')
    <title>ITA ปีงบประมาณ {{ $year }}</title>
@endsection

@section('content')
    <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">
        <h1 class="text-[40px] font-bold">การประเมินคุณธรรมและความโปร่งใสในการดำเนินงานของหน่วยงานภาครัฐ (Integrity &
            Transparency Assessment)</h1>
        <h3 class="mt-[1rem] text-[25px]">ปีงบประมาณ {{ $year }}</h3>
        <ul class="mt-[1rem]">
            @foreach ($itaMains as $itaMain)
                @if ($itaMain->fiscalYear->fiscalYear_name == $year)
                    <li class="">
                        <p class="text-[25px]">
                            <span class="text-red-900 font-bold">{{ $itaMain->name_ita_main }}</span> :
                            {{ $itaMain->description_ita_main }}
                        </p>

                        @if (!empty($itaMain->itaSub1))
                            {{-- ตรวจสอบว่ามี $itaSub1 หรือไม่ --}}
                            <ul class="list-disc">
                                @foreach ($itaMain->itaSub1 as $ita1)
                                    @if($ita1->file == '')
                                        <li class="ms-[7rem] mt-1">
                                            <p>{{ $ita1->ita_sub_name }}</p>
                                        </li>
                                    @else
                                        <li class="ms-[7rem] mt-1">
                                            <a href="{{ route('showPDF', ['id' => $ita1->id, 'mode' => 'itaSub1']) }}" class="hover:text-blue-600 ">{{ $ita1->ita_sub_name }}</a>
                                        </li>

                                    @endif
                                    @if(isset($ita1->itaSub2))
                                        <ul class="list-disc">
                                            @foreach ($ita1->itaSub2 as $ita2 )
                                                @if($ita2->file == '')
                                                    <li class="ms-[9rem] mt-1">
                                                        <p>{{ $ita2->itaSub2_name }}</p>
                                                    </li>
                                                @else
                                                    <li class="ms-[9rem] mt-1">
                                                        <a href="{{ route('showPDF', ['id' => $ita2->id, 'mode' => 'itaSub2']) }}" class="hover:text-blue-600 ">{{ $ita2->itaSub2_name }}</a>
                                                    </li>
                                                @endif
                                                @if(isset($ita2->itaSub3))
                                                    <ul class="list-disc">
                                                        @foreach($ita2->itaSub3 as $ita3)
                                                            @if($ita3->file == '')
                                                                <li class="ms-[11rem] mt-1">
                                                                    <p>{{ $ita3->itaSub3_name }}</p>
                                                                </li>
                                                            @else
                                                                <li class="ms-[11rem] mt-1">
                                                                    <a href="{{ route('showPDF', ['id' => $ita3->id, 'mode' => 'itaSub3']) }}" class="hover:text-blue-600 ">{{ $ita3->itaSub3_name }}</a>
                                                                </li>
                                                            @endif
                                                            @if(isset($ita3->itaSub4))
                                                            <ul class="list-disc">
                                                                @foreach($ita3->itaSub4 as $ita4)
                                                                    @if($ita4->file == '')
                                                                        <li class="ms-[13rem] mt-1">
                                                                            <p>{{ $ita4->itaSub4_name }}</p>
                                                                        </li>
                                                                    @else
                                                                        <li class="ms-[13rem] mt-1">
                                                                            <a href="{{ route('showPDF', ['id' => $ita4->id, 'mode' => 'itaSub4']) }}" class="hover:text-blue-600 ">{{ $ita4->itaSub4_name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>

    </div>
@endsection
