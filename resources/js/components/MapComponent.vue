<template>
    <div class="container" onload="init();">
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
    props : ['policeArea'],
    mounted() {
        const map = new sphere.Map({
            placeholder: document.getElementById('map'),
            center: [100.597281, 13.752258],
            zoom: 9.5
        });
        // area[0].forEach((element) => {
        //     map.Event.bind(sphere.EventName.Ready, () => {
        //         const polygon = new sphere.Polygon(element, {
        //             title: element.properties.name,
        //             detail: element.properties.name
        //         });
        //         map.Overlays.add(polygon);
        //     });
        // });

    },

    methods: {
    }

}

</script>

