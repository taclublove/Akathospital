@extends('index_template.mainShow')

@section('head')
    <title>Show Editor</title>
@endsection

@section('content')
    @if (isset($gprls))
        @if($gprls->user_id == $gprls->user->id)
            @if($gprls->description != '' && $gprls->pdf == '')
                <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">
                    <div class="grid grid-cols-6 gap-4 mb-10">
                        <a href="{{ url()->previous() }}" class="col-start-1 col-end-2 btn btn-neutral mt-[0.5rem]">Back</a>
                        <h1 class="text-[40px] font-bold  col-end-8 col-span-[1rem] ">{{ $gprls->title }}</h1>
                    </div>
                    <div class="mt-[1rem] mb-[1rem] mx-[1rem]">
                        {!! $gprls->description !!}
                    </div>
                </div>
            @elseif($gprls->pdf != '' && $gprls->description == '')
                <div class="max-w-full px-[1rem] pt-[4px] pb-[20px]">
                    <div class="grid grid-cols-6 gap-4 mb-10">
                        <a href="{{ url()->previous() }}" class="col-start-1 col-end-2 btn btn-neutral mt-[0.5rem]">Back</a>
                        <h1 class="text-[40px] font-bold  col-end-8 col-span-[1rem] ">{{ $gprls->title }}</h1>
                    </div>
                    <div class="mt-[1rem] mb-[1rem] mx-[1rem]">
                        <embed src="{{ asset('storage/files/pdfs/gprls/' . $gprls->pdf) }}" type="application/pdf" width="100%" height="800px" >
                    </div>
                </div>
            @endif
        @endif
    @endif

@endsection
