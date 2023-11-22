<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
            style="z-index: 9999;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ">
                <div class="m-3">
                    <a class="btn btn-success w-100 " href="{{ url('/home') }}" >
                        Dashboard
                    </a>
                </div>
                <div class="m-3">
                    <a class="btn btn-success w-100 " onClick="toggleCollapse('testCollapse')" data-bs-toggle="collapse"
                        href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        การจัดการ
                        <i id="testCollapse" class="testCollapse fas fa-angle-down rotate-icon ms-3"
                            style="transform: rotate(0deg);"></i>
                    </a>
                    <div class="collapse mt-3" id="collapseExample">
                        <div class="card card-body">
                            <a href="{{ url('procurementAnnouncement') }}" class="menu-link d-flex aling-items-center p-2">ประกาศจัดซื้อจัดจ้าง</a>
                            <a href="#" class="menu-link d-flex aling-items-center p-2">เอกสารประชาสัมพันธ์</a>
                            <a href="#" class="menu-link d-flex aling-items-center p-2">ประกาศรับสมัครงาน</a>
                            <a href="#" class="menu-link d-flex aling-items-center p-2">เอกสารดาวห์โหลด</a>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <a class="btn btn-success w-100" onClick="toggleCollapse('testCollapse2')" data-bs-toggle="collapse"
                        href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                        ITA
                        <i id="testCollapse2" class="testCollapse fas fa-angle-down rotate-icon ms-3"
                            style="transform: rotate(0deg);"></i>
                    </a>
                    <div class="collapse mt-3" id="collapseExample2">
                        <div class="card card-body">
                            <a href="{{ url('itaMain') }}" class="menu-link d-flex aling-items-center p-2">ITA Main</a>
                            <a href="{{ url('itaSub1') }}" class="menu-link d-flex aling-items-center p-2">ITA Sub 1</a>
                            <a href="{{ url('itaSub2') }}" class="menu-link d-flex aling-items-center p-2">ITA Sub 2</a>
                            <a href="{{ url('itaSub3') }}" class="menu-link d-flex aling-items-center p-2">ITA Sub 3</a>
                            <a href="{{ url('itaSub4') }}" class="menu-link d-flex aling-items-center p-2">ITA Sub 4</a>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->isAdmin() )
                    <div class="m-3">
                        <a class="btn btn-success w-100" onClick="toggleCollapse('testCollapse11')" data-bs-toggle="collapse"
                            href="#collapseExample11" role="button" aria-expanded="false" aria-controls="collapseExample">
                            ผู้ใช้งาน
                            <i id="testCollapse11" class="testCollapse fas fa-angle-down rotate-icon ms-3"
                                style="transform: rotate(0deg);"></i>
                        </a>
                        <div class="collapse" id="collapseExample11">
                            <div class="card card-body">
                                <a href="{{ url('officer') }}" class="menu-link d-flex aling-items-center p-2">เพิ่มข้อมูลผู้ใช้งาน</a>
                                <a href="{{ url('sex') }}" class="menu-link d-flex aling-items-center p-2">เพิ่มข้อมูลเพศ</a>
                                <a href="{{ url('type') }}" class="menu-link d-flex aling-items-center p-2">เพิ่มข้อมูลสถานะผู้ใช้งาน</a>
                                <a href="{{ url('prefix') }}" class="menu-link d-flex aling-items-center p-2">เพิ่มข้อมูลคำนำหน้า</a>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <a class="btn btn-success w-100" onClick="toggleCollapse('testCollapse22')" data-bs-toggle="collapse"
                            href="#collapseExample22" role="button" aria-expanded="false" aria-controls="collapseExample">
                            การจัดการข้อมูลภายใน ITA
                            <i id="testCollapse22" class="testCollapse fas fa-angle-down rotate-icon ms-3"
                                style="transform: rotate(0deg);"></i>
                        </a>
                        <div class="collapse" id="collapseExample22">
                            <div class="card card-body">
                                <a href="{{ url('fiscalYear') }}" class="menu-link d-flex aling-items-center p-2">เพิ่มข้อมูลปีงบประมาณ</a>
                            </div>
                        </div>
                    </div>
                @else

                @endif

            </div>
        </div>
