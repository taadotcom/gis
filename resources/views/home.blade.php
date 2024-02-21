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

                    const area = new Array({!! json_encode($policeArea) !!});
                    console.log(area);
                    area[0].forEach((element) => {
                        map.Event.bind(sphere.EventName.Ready, () => {
                            const polygon = new sphere.Polygon(element, {
                                title: element.properties.name,
                                detail: element.properties.name
                            });
                            map.Overlays.add(polygon);
                        });
                    });

                }
            </script>
        </div>
    @endif
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                @include('infobox', ['org' => $org])
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
            </div>
    </main>
@endsection
