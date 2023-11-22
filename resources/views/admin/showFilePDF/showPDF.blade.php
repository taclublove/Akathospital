@extends('index_template.mainShow')

@section('head')
    <title>Show File PDF</title>
@endsection

@section('content')
    @if (isset($itaSub1))
        @if($itaSub1->itaMain_id == $itaSub1->itaMain->id)
            <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">

                <h1 class="text-[30px] font-bold">{{ $itaSub1->ita_sub_name }}</h1>
                <div class="mt-[1rem] mb-[1rem] mx-[1rem]">
                    <embed src="{{ asset('storage/files/ita/66/itaSub1/' . $itaSub1->file) }}" type="application/pdf" width="100%" height="800px" >
                </div>
            </div>
        @endif
    @elseif (isset($itaSub2))
        @if($itaSub2->itaSub1_id == $itaSub2->itaSub1->id)
            <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">

                <h1 class="text-[30px] font-bold">{{ $itaSub2->itaSub2_name }}</h1>
                <div class="mt-[1rem] mb-[1rem] mx-[1rem]">
                    <embed src="{{ asset('storage/files/ita/66/itaSub2/' . $itaSub2->file) }}" type="application/pdf" width="100%" height="800px" >
                </div>
            </div>
        @endif
    @endif

@endsection
