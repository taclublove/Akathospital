<h1 class="text-white text-3xl text-center">Akathospital</h1>
<div class="mt-[20px]">
    <a href="{{ url('/') }}" class="pb-1 hover:text-yellow-300 text-white">หน้าหลัก</a>
    <div class="collapse collapse-arrow text-white">
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
    </div>
</div>
