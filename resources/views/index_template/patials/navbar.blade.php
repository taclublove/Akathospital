<div class="navbar bg-green-900 text-white fixed z-20" data-aos="fade-down" data-aos-duration="800" data-aos-easing="ease-in-sine">
    <div class="flex-1">
        <img class="w-10" src="https://co-vaccine.moph.go.th/assets/images/moph-logo.gif" alt="">
        <a class="btn btn-ghost normal-case text-xl">Akathospital</a>
    </div>
    <div class="flex-none gap-3 text-2xl">
        <div class="dropdown dropdown-end ">
            <a href="{{ url('/') }}" class="rounded-5 btn btn-ghost w-28 hover:scale-125 ease-in-out duration-300">หน้าหลัก</a>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost ">
                <div class="w-30 rounded-full">
                    <a>เกี่ยวกับองค์กร</a>
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-green-900 text-white rounded-box w-60 ">
                <li><a href="{{ url('organizationHistory') }}" class="hover:text-black hover:bg-base-100">ประวัติองค์กร</a></li>
                <li><a href="{{ url('vmvs') }}" class="hover:text-black hover:bg-base-100">วิสัยทัศน์ พันธกิจ</a></li>
                <li><a href="{{ url('executiveCommittee') }}" class="hover:text-black hover:bg-base-100">คณะกรรมการบริหาร</a></li>
                <li><a class="hover:text-black hover:bg-base-100">แผนยุทธศาสตร์</a></li>
                <li><a class="hover:text-black hover:bg-base-100">กรอบโครงสร้างองค์กร</a></li>
                <li><a class="hover:text-black hover:bg-base-100">วิสัยทัศน์ พันธกิจ ค่านิยม MOPH</a></li>
            </ul>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost ">
                <div class="w-10 rounded-full">
                    <a>ข่าวสาร</a>
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-green-900 rounded-box w-52">
                <li><a href="{{ url('pressRelease') }}" class="hover:text-black hover:bg-base-100">ข่าวประชาสัมพันธ์</a></li>
                <li><a href="{{ url('procurementNews') }}" class="hover:text-black hover:bg-base-100">ข่าวจัดซื้อจัดจ้าง</a></li>
            </ul>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost ">
                <div class="w-40 rounded-full">
                    <a>ผลการดำเนินงาน ITA</a>
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-green-900 rounded-box w-52">
                @foreach($navbarData as $item)
                    <li><a href="{{ route('ita', ['id' => $item->fiscalYear_name ]) }}" class="hover:text-black hover:bg-base-100">ITA ปีงบประมาณ {{ $item->fiscalYear_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="dropdown dropdown-end ">
            <a href="#" class="rounded-5 btn btn-ghost w-28 hover:scale-125 ease-in-out duration-300">WebService</a>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost ">
                <div class="w-30 rounded-full">
                    <a>ผลงานวิชาการ</a>
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-green-900 rounded-box w-52">
                <li><a class="hover:text-black hover:bg-base-100">ผลงานวิชาการปี 2565</a></li>
            </ul>
        </div>
        <div class="dropdown dropdown-end ">
            <a href="http://backoffice.akathospital.com" class="rounded-5 btn btn-ghost w-28 hover:scale-125 ease-in-out duration-300" target="_blank">BackOffice</a>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost" onclick="my_modal_2.showModal()">
                <div class="w-30 rounded-full hover:scale-125 ease-in-out duration-300">
                    <a>ระบบหลังบ้าน</a>
                </div>
            </label>
            {{-- <ul tabindex="0"
                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-green-900 rounded-box w-52">
                <li><a class="hover:text-white hover:bg-black">Settings</a></li>
                <li><a class="hover:text-white hover:bg-black">Logout</a></li>
            </ul> --}}
        </div>
    </div>
</div>
