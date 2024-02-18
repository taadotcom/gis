    <form class="needs-validation" novalidate="">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Row-->
            <div class="row g-3">
                <!--begin::Col-->
                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom01" class="form-label">รอบรายงาน</label>
                    <div class="btn-group mb-2  button_no_padding  " style = "display: block;" role="group"
                        aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                            checked=""> <label class="btn btn-outline-primary button label_th" for="btnradio1">3
                            เดือน</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary button label_th" for="btnradio2">1 เดือน</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary button label_th" for="btnradio3">1 สัปดาห์</label>
                    </div>
                    <div class="valid-feedback">Looks good!</div>



                    <div class="pure_flex">
                        <div class="btn-group button_no_padding">
                            <button type="button" class="btn btn-warning label_th label_th button">บก.</button>
                            <button type="button"
                                class="btn btn-warning dropdown-toggle dropdown-toggle-split label_th button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden label_th">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($org as $item)
                                    <li><a class="dropdown-item label_th"
                                            href="#">{{ $item->division_abv_name }}</a></li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider label_th">
                                </li>
                                <li> <a class="dropdown-item label_th" href="#">ทั้งหมด</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pure_flex">
                        <div class="btn-group button_no_padding">
                            <button type="button" class="btn btn-warning label_th button">สถานี</button>
                            <button type="button"
                                class="btn btn-warning dropdown-toggle dropdown-toggle-split label_th button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden label_th">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($org as $item)
                                    <li><a class="dropdown-item label_th" href="#">{{ $item->station_name }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider label_th">
                                </li>
                                <li> <a class="dropdown-item label_th" href="#">ทั้งหมด</a> </li>
                            </ul>
                        </div>
                    </div>







                </div>
                <!--end::Col-->
                <!--begin::Col กลุ่มคดี1-->
                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom02" class="form-label">กลุ่มคดี1</label>
                    <div class="btn-group mb-2 button_no_padding" style = "display: block;" role="group"
                        aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btn1check1" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check1">ประเภท 1</label>
                        <input type="checkbox" class="btn-check" id="btn1check2" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check2">ประเภท 2</label>
                        <input type="checkbox" class="btn-check" id="btn1check3" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check3">ประเภท 3</label>
                        <input type="checkbox" class="btn-check" id="btn1check4" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check4">ประเภท 4</label>
                        <input type="checkbox" class="btn-check" id="btn1check5" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check5">ประเภท 5</label>
                        <input type="checkbox" class="btn-check" id="btn1check6" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check6">ประเภท 6</label>
                        <input type="checkbox" class="btn-check" id="btn1check7" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn1check7">ประเภท 7</label>
                    </div>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col กลุ่มคดี1-->
                <!--begin::Col กลุ่มคดี2-->
                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom02" class="form-label">กลุ่มคดี2</label>
                    <div class="btn-group mb-2 button_no_padding" style = "display: block;" role="group"
                        aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btn2check1" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn2check1">ประเภท 1</label>
                        <input type="checkbox" class="btn-check" id="btn2check2" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn2check2">ประเภท 2</label>
                        <input type="checkbox" class="btn-check" id="btn2check3" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn2check3">ประเภท 3</label>
                    </div>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col กลุ่มคดี2-->
                <!--begin::Col กลุ่มคดี2-->
                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom02" class="form-label">กลุ่มคดี2</label>
                    <div class="btn-group mb-2 button_no_padding" style = "display: block;" role="group"
                        aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btn3check1" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn3check1">ประเภท 1</label>
                        <input type="checkbox" class="btn-check" id="btn3check2" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn3check2">ประเภท 2</label>
                        <input type="checkbox" class="btn-check" id="btn3check3" autocomplete="off"> <label
                            class="btn btn-outline-primary button label_th" for="btn3check3">ประเภท 3</label>
                    </div>
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <!--end::Col กลุ่มคดี2-->
            </div>
            <!--end::Row-->
            <!--
              <label for="validationCustom02" class="pure_flex">พื้นที่รับผิดชอบ</label>
              -->
        </div>
        <!--end::Body-->
    </form>
    <!--end::Form-->
