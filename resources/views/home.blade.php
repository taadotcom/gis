@extends('layouts.app')

@section('content')
    @if (isset($geojson))
        <div>

            <script type="text/javascript" src="https://api.sphere.gistda.or.th/map/?key=3426D75BA27040E7B5C1198055B4389A"></script>
            <script>
                var map

                function init() {
                    map = new sphere.Map({
                        placeholder: document.getElementById('map'),
                        center: [100.597281, 13.752258],
                        zoom: 9.5
                    });
                    map.Event.bind(sphere.EventName.Click, function(location) {
                        alert(location.lat + ',' + location.lon);

                    });
                    map.Event.bind("ready", function(location) {
                            map.Layers.add(
                                new sphere.Layer({
                                    sources: {
                                        earthquakes: {
                                            type: "geojson",
                                            data: {!! json_encode($geojson) !!},
                                        },
                                    },
                                    layers: [{
                                            id: "earthquakes-heat",
                                            type: "heatmap",
                                            source: "earthquakes",
                                            maxzoom: 23,
                                            paint: {
                                                // Increase the heatmap weight based on frequency and property magnitude
                                                "heatmap-weight": [
                                                    "interpolate",
                                                    ["linear"],
                                                    ["get", "mag"],
                                                    0,
                                                    0,
                                                    6,
                                                    1,
                                                ],
                                                // Increase the heatmap color weight weight by zoom level
                                                // heatmap-intensity is a multiplier on top of heatmap-weight
                                                "heatmap-intensity": [
                                                    "interpolate",
                                                    ["linear"],
                                                    ["zoom"],
                                                    0,
                                                    1,
                                                    4,
                                                    3,
                                                ],
                                                // Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
                                                // Begin color ramp at 0-stop with a 0-transparancy color
                                                // to create a blur-like effect.
                                                "heatmap-color": [
                                                    "interpolate",
                                                    ["linear"],
                                                    ["heatmap-density"],
                                                    0,
                                                    "rgba(33,102,172,0)",
                                                    0.2,
                                                    "rgb(103,169,207)",
                                                    0.4,
                                                    "rgb(209,229,240)",
                                                    0.6,
                                                    "rgb(253,219,199)",
                                                    0.8,
                                                    "rgb(239,138,98)",
                                                    1,
                                                    "rgb(178,24,43)",
                                                ],
                                                // Adjust the heatmap radius by zoom level
                                                "heatmap-radius": [
                                                    "interpolate",
                                                    ["linear"],
                                                    ["zoom"],
                                                    0,
                                                    2,
                                                    15,
                                                    12,
                                                ],
                                                // Transition from heatmap to circle layer by zoom level
                                                "heatmap-opacity": [
                                                    "interpolate",
                                                    ["linear"],
                                                    ["zoom"],
                                                    1,
                                                    1,
                                                    4,
                                                    1,
                                                ],
                                            },
                                        },
                                        "waterway-label",
                                    ],
                                })
                            );
                        }

                    );
                }
            </script>
        </div>
    @endif

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 1-->
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>{{ $count_2_1 }}</h3>
                                <p>คดี</p>
                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                </path>
                            </svg> <a href="#"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                ปล้นทรัพย์ </a>
                        </div>
                        <!--end::Small Box Widget 1-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 2-->
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>{{ $count_2_2 }}<sup class="fs-5"></sup></h3>
                                <p>คดี</p>
                            </div><svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                </path>
                            </svg> <a href="#"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                ชิงทรัพย์ <i class="bi bi-link-45deg"></i> </a>
                        </div>
                        <!--end::Small Box Widget 2-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 3-->
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>{{ $count_2_3 }}</h3>
                                <p>คดี</p>
                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                </path>
                            </svg><a href="#"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                วิ่งราวทรัพย์ <i class="bi bi-link-45deg"></i> </a>
                        </div>
                        <!--end::Small Box Widget 3-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 4-->
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <h3>{{ $count_2_4 }}</h3>
                                <p>คดี</p>
                            </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                </path>
                            </svg> <a href="#"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                ลักทรัพย์ <i class="bi bi-link-45deg"></i> </a>
                        </div>
                        <!--end::Small Box Widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row mt-2"> <!-- Start col -->
                    <div class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">แผนที่ </h3>
                            </div>
                            <div class=" card container" id="map" style="    width: 100%;  height: 700px;">

                            </div>
                        </div>

                        <div class="row"> <!-- Start col -->



                        </div> <!-- /.row (main row) -->
                    </div> <!--end::Container-->
                </div> <!--end::App Content-->
    </main>
@endsection
