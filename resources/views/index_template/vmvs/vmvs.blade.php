@extends('index_template.mainIndex')

@section('head')
    <title>วิสัยทัศน์ พันธกิจ</title>
@endsection

@section('content')
    
    <div class="px-[200px] pt-[90px] py-[80px] h-auto bg-base-300 overflow-y-scroll">
        <div class="p-[30px]">
            <h1 class="text-5xl text-center text-black font-bold">วิสัยทัศน์ พันธกิจ</h1>
        </div>
        {{-- <img src="{{ url('image/organizationHistory/ป้ายโรงพยาบาล.jpg') }}" class="h-[600px] w-full" alt=""> --}}
        <div class="container px-auto ">
            <div>
                <h1 class="text-3xl text-black font-bold">วิสัยทัศน์ (Vision)</h1>
                <ul class="my-[20px]">
                    <li><i class="fa-solid fa-circle mx-[30px] text-sm" style="color: #080808;"></i>เป็นโรงพยาบาลที่มีคุณภาพ ร่วมสร้างเสริมสุขภาพ ประทับใจบริการ</li>
                </ul>
            </div>
            <div>
                <h1 class="text-3xl text-black">พันธกิจ (Mission)</h1>
                <ul class="my-[20px]">
                    <li><i class="fa-solid fa-circle mx-[30px] text-sm" style="color: #080808;"></i>1. พัฒนาระบบบริการทั้งเชิงรุก เชิงรับให้ได้มาตรฐาน</li>
                    <li><i class="fa-solid fa-circle mx-[30px] text-sm" style="color: #080808;"></i>2. พัฒนาโรงพยาบาลสู่การเป็นโรงพยาบาลส่งเสริมสุขภาพ โดยเน้นการที่มีส่วนร่วมของภาคเครือข่าย</li>
                    <li><i class="fa-solid fa-circle mx-[30px] text-sm" style="color: #080808;"></i>3. พัฒนาทักษะของบุคลากรตามมาตรฐานวิชาชีพและการบริการที่เป็นเลิศ</li>
                </ul>
            </div>
            <div>
                <h1 class="text-3xl text-blue-900 font-bold">ค่านิยม (Values) : SMILE</h1>
                <div class="my-[20px]">
                    <p class="text-lg mx-[30px]"><span class="text-blue-900 font-bold">S : Safety &nbsp; &nbsp; </span>ผู้รับและผู้ให้บริการปลอดภัยและมีคุณภาพ</p>
                    <p class="text-lg mx-[30px]"><span class="text-green-900 font-bold">M : Mind and moral &nbsp; &nbsp; </span>บริการด้วยหัวใจความเป็นมนุษย์ ด้วยคุณธรรมจริยธรรม</p>
                    <p class="text-lg mx-[30px]"><span class="text-yellow-900 font-bold">I : Information and innovation &nbsp; &nbsp; </span>ระบบสารสนเทศและนวัตกรรม</p>
                    <p class="text-lg mx-[30px]"><span class="text-black-900 font-bold">L : Learning Organization &nbsp; &nbsp; </span>เราต้องเป็นองค์กรแห่งการเรียนรู้อยู่เสมอ</p>
                    <p class="text-lg mx-[30px]"><span class="text-green-900 font-bold">E : Empowerment มีการเสริมแรง &nbsp; &nbsp; </span>ให้กำลังใจแก่ผู้บริการและผู้ให้บริการมีความสุข ยุทธศาสตร์การพัฒนาคุณภาพโรงพยาบาล ยุทธศาสตร์ที่ 1 พัฒนาระบบบริการให้มีคุณภาพและมีประสิทธิภาพ ยุทธศาสตร์ที่ 2 ส่งเสริมและพัฒนาสิ่งแวดล้อมที่ปลอดภัยเอื้อต่อการมีสุขภาพดี ยุทธศาสตร์ที่ 3 การสร้างและพัฒนาส่งเสริมภาคีเครือข่ายในการให้บริการด้านสาธารณสุข ครอบคลุมทุกมิติ ยุทธศาสตร์ที่ 4 การส่งเสริมให้เกิดการเรียนรู้และสร้างนวัตกรรมในองค์กร ยุทธศาสตร์ที่ 5 ส่งเสริมให้เจ้าหน้าที่มีสุขภาพดีมีความสุขในการทำงาน ยุทธศาสตร์ที่ 6 การพัฒนาและส่งเสริมงานด้านเทคโนโลยีและสารสนเทศ</p>
                </div>
            </div>
            <hr class="text-black hr">
            <div>
                <h1 class="text-3xl text-blue-900 font-bold">ยุทธศาสตร์การพัฒนาคุณภาพโรงพยาบาล</h1>
                <div class="my-[20px]">
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 1 พัฒนาระบบบริการให้มีคุณภาพและมีประสิทธิภาพ</p>
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 2 ส่งเสริมและพัฒนาสิ่งแวดล้อมที่ปลอดภัยเอื้อต่อการมีสุขภาพดี</p>
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 3 การสร้างและพัฒนาส่งเสริมภาคีเครือข่ายในการให้บริการด้านสาธารณสุข ครอบคลุมทุกมิติ</p>
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 4 การส่งเสริมให้เกิดการเรียนรู้และสร้างนวัตกรรมในองค์กร</p>
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 5 ส่งเสริมให้เจ้าหน้าที่มีสุขภาพดีมีความสุขในการทำงาน</p>
                    <p class="text-lg mx-[30px]">ยุทธศาสตร์ที่ 6 การพัฒนาและส่งเสริมงานด้านเทคโนโลยีและสารสนเทศ</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div x-data="{
        openTab: 1,
        activeClasses: 'border-l border-t border-r rounded-t text-blue-700',
        inactiveClasses: 'text-blue-500 hover:text-blue-700'
    }" class="p-6">
        <ul class="flex border-b mt-28 mb-28">
            <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses"
                    class="bg-white inline-block py-2 px-4 font-semibold">
                    Active
                </a>
            </li>
            <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                <!-- Set active class by using :class provided by Alpine -->
                <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                    class="bg-white inline-block py-2 px-4 font-semibold">
                    Tab
                </a>
            </li>
            <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
                <a href="#" :class="openTab === 3 ? activeClasses : inactiveClasses"
                    class="bg-white inline-block py-2 px-4 font-semibold">
                    Tab
                </a>
            </li>
        </ul>
        <div class="w-full">
            <div x-show="openTab === 1" class="container mx-auto">Tab #1</div>
            <div x-show="openTab === 2">Tab #2</div>
            <div x-show="openTab === 3">Tab #3</div>
        </div>
    </div> --}}
@endsection
