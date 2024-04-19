<template>
    <div class="container" onload="init();">
        <controlpanel-component :content="content"> </controlpanel-component>
        {{  content  }}
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">แผนที่</div>
                    <div id="map" class="card-body" style="width: 100%;  height: 700px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['policeArea', 'crimesCase'],
    mounted() {
        const map = new sphere.Map({
            placeholder: document.getElementById('map'),
            center: [98.38, 7.88],
            zoom: 9.5
        });

        this.policeArea.forEach((element) => {
            map.Event.bind(sphere.EventName.Ready, () => {
                const polygon = new sphere.Polygon(element, {
                    title: element.properties.name,
                    detail: element.properties.name
                });
                map.Overlays.add(polygon);
            });
        });

        // add marker
        if (typeof this.crimesCase !== 'undefined') {
            this.crimesCase.features.forEach((element) => {
                map.Event.bind(sphere.EventName.Ready, () => {
                    var geojson_marker = element;
                    var marker = new sphere.Marker(geojson_marker,
                        {
                            title: 'Marker',
                            detail: element.properties.charge,
                            draggable: false
                        });
                    map.Overlays.add(marker);
                });
            })

        }


    },

    methods: {
    }

}

</script>
