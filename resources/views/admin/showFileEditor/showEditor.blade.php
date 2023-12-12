@extends('index_template.mainShow')

@section('head')
    <title>Show Editor</title>
@endsection

@section('content')
    @if (isset($gprls))
        @if($gprls->user_id == $gprls->user->id)
            <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">

                <h1 class="text-[30px] font-bold">{{ $gprls->title }}</h1>
                <div class="mt-[1rem] mb-[1rem] mx-[1rem]">
                    {{-- <embed src="{{ asset('storage/files/ita/66/itaSub1/' . $itaSub1->file) }}" type="application/pdf" width="100%" height="800px" > --}}
                    {!! $gprls->description !!}
                </div>
            </div>
        @endif
    @endif

@endsection
