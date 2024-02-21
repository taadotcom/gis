<template>
    <div class="container" onload="init();">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">แผนที่</div>

                    <div id="map" class="card-body" style="width: 100%;  height: 700px;">
                        I'm an example component. {{ policeArea }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['policeArea'],
    mounted() {
        console.log(props.policeArea);
        const map = new sphere.Map({
                placeholder: document.getElementById('map'),
                center: [100.597281, 13.752258],
                zoom: 9.5
            });
    },

    methods: {
    }

}

</script>

