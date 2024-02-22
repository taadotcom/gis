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
                        <select onchange="getStation(this)">
                            @foreach ($org as $item)
                                <option value={{ $item->division_code }}>
                                    {{ $item->division_abv_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pure_flex">
                        <select id="station">
                            <option>
                                สน./สภ.
                            </option>
                        </select>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col กลุ่มคดี1-->
                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom02" class="form-label">คดีกลุ่ม 1</label>
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
                    <label for="validationCustom02" class="form-label">คดีกลุ่ม 2</label>
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
                    <label for="validationCustom02" class="form-label">คดีกลุ่ม 3</label>
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

                <div class="col-md-3 col-sm-6 col-12">
                    <label for="validationCustom02" class="form-label">คดีกลุ่ม 4</label>
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

    <script>
        // function getStation(selectObject) {
        //     document.getElementById('station').options.length = 0;
        //     const value = selectObject.value;  
        //     const allStation = {!! $station !!};
        //     const filteredStation = allStation.filter((item) => item.division_code == value);
        //     let stationName = filteredStation.map((item) => item.station_name);
        //     const select = document.getElementById("station");
        //     for (let i = 0; i < stationName.length; i++) {
        //         let optn = stationName[i];
        //         let el = document.createElement("option");
        //         el.textContent = optn;
        //         el.value = optn;
        //         select.appendChild(el);
        //     }

        // }
    </script>
