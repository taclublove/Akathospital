@extends('index_template.mainIndex')

@section('head')
    <title>ประวัติองค์กร</title>
@endsection

@section('content')
    
    <div class="px-[90px] pt-[90px] py-[80px] h-auto bg-base-300 overflow-y-scroll">
        <div class="p-[30px]">
            <h1 class="text-5xl text-center text-black font-bold">ประวัติโรงพยาบาลอากาศอำนวย</h1>
        </div>
        <img src="{{ url('image/organizationHistory/ป้ายโรงพยาบาล.jpg') }}" class="h-[600px] w-full" alt="">
        <p class="text-black text-lg p-[30px]">
            ประวัติโรงพยาบาลอากาศอำนวย โรงพยาบาลอากาศอำนวยเดิมเป็นโรงพยาบาลขนาด 10 เตียง
            ได้รับงบประมาณก่อสร้างแล้วเสร็จ เมื่อปี พ.ศ.2525 โดยตั้งอยู่บนพื้นที่ 26 ไร่ 29 ตารางวา
            โดยเปิดให้บริการตั้งแต่วันที่ 10 พฤษภาคม พ.ศ.2525 ซึ่งยังไม่มีแพทย์ประจำ วันที่ 25 เมษายน พ.ศ.2526
            นายแพทย์สมคิด ปิยะมาน มาเป็นแพทย์ประจำ และเป็นผู้อำนวยการโรงพยาบาลคนแรก โรงพยาบาลอากาศอำนวย
            ได้ทำพิธีเปิดอย่างเป็นทางการ เมื่อวันที่ 26 มกราคม พ.ศ.2528 และในปีเดียวกันนั้นเอง นายแพทย์สมคิด
            ปิยะมาน ได้ไปศึกษาต่อ นายแพทย์ชาตรี เจริญชีวะกุล
            จึงได้ดำรงตำแหน่งผู้อำนวยการโรงพยาบาลอากาศอำนวยต่อมา ต่อมาในปี พ.ศ.2535 โรงพยาบาลอากาศอำนวย
            ได้รับการยกฐานะเป็นโรงพยาบาลขนาด 30 เตียง
            โดยได้ย้ายสถานที่ก่อสร้างไปสร้างในที่ดินราชพัสดุหลังที่ว่าการอำเภออากาศอำนวย
            ในขณะเดียวกันนั้นนายแพทย์ชาตรี เจริญชีวะกุล
            เล็งเห็นว่าโรงพยาบาลอากาศอำนวยมีผู้ป่วยมารับบริการจำนวนมากขึ้นจนตึกผู้ป่วยรองรับไม่พอเพียงจึงได้ไปกราบขอรับเมตาจาก
            หลวงปู่สิม พุทธาจาโร ขณะจำพรรษาที่วัดถ้ำผาปล่อง
            เพื่อเป็นองค์อุปถัมภ์ในการจัดหาทุนสร้างอาคารผู้ป่วยขนาด 30 เตียง อีกหนึ่งหลัง
            ต่อมาหลวงปู่ได้มรณภาพลงจึงใช้ชื่อตึกว่า "ตึกอนุสรณ์ หลวงปู่สิม พุทธาจาโร" ในต้นปี พ.ศ.2536
            นายแพทย์ชาตรี เจริญชีวะกุล ได้ย้ายไปรับราชการ ที่สำนักงานสาธารณสุขจังหวัดอุบลราชธานี นายแพทย์ดนัย
            ธเนศพงศ์ธรรม ได้รับการแต่งตั้งในรักษาการในตำแหน่งผู้อำนวยการโรงพยาบาลอากาศอำนวย วันที่ 1 กันยายน
            พ.ศ.2537 โรงพยาบาลอากาศอำนวยได้รับการยกฐานะเป็นโรงพยาบาลขนาด 60 เตียง แบบพึ่งตนเอง ต่อมาในเดือน
            พฤษภาคม พ.ศ.2538 นายแพทย์ดนัย ธเนศพงศ์ธรรม ลาไปศึกษาต่อ นายแพทย์กิตตินาถ ติยะพิบูลย์ไชยา
            ย้ายมาดำรงตำแหน่งผู้อำนวยการจนถึงปัจจุบัน
        </p>
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
