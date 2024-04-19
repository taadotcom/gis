<template>
    <div class="container">
        <div class="row justify-content">

            <div class="col-md-6">
                <h3> ประเภทคดี 4 กลุ่ม </h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c4t1" id="c4t1" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 1
                    </label>

                </div>
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="c4t2" id="c4t2" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 2
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c4t3" id="c4t3" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 3
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c4t4" id="c4t4" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 4
                    </label>
                </div>
            </div>

            <div class="col-md-6">
                <h3> ประเภทคดี 5 กลุ่ม </h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c5t1" id="c5t1" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c5t2" id="c5t2" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c5t3" id="c5t3" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c5t4" id="c5t4" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 4
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="c5t5" id="c5t5" v-model="checkedNames">
                    <label class="form-check-label" for="flexCheckDefault">
                        กลุ่ม 5
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div>
        Checked names: {{ checkedNames }}
    </div>
    <div>
        <button @click="getData(checkedNames)"> ค้นหา </button>
    </div>
</template>

<script setup>
import { ref } from 'vue'
const checkedNames = ref([]);

</script>

<script>
export default {
    data() {
        return {
            caseType: 'dsadasdasdas'
        }

    },
    mounted() {
        // console.log(checkedNames);
    },
    methods: {
        getData(data) {
            console.log(data);
            this.$emit(data);
        }
    }
}

</script>
