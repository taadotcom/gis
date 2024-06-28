<template>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            เพิ่ม
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">filename</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in files">
                    <td> {{ index + 1 }} </td>
                    <td>
                        {{ item.name }}
                    </td>
                    <td>
                        <a :href="'show/' + item.name">
                            คลิกเพื่อดูไฟล์
                        </a>
                        <a class="btn btn-danger" :href="'show/' + item.name">
                            ลบ
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form @submit.prevent="submit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มไฟล์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">กรุณาเพิ่มไฟล์</label>
                            <input ref="file" class="form-control" type="file" id="formFile" @change="previewFiles">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import axios from 'axios'
let formData = new FormData();
export default {
    props: ['fileName'],
    mounted() {

    },
    data() {
        // const files = this.fileName;
        const files = this.fileName.map((element) => {
            return { 'name': element.substring(5) };
        });
        console.log(files);
        return { files };

    },
    methods: {
        previewFiles(event) {
            console.log(event.target.files);
        },
        submit() {
            this.file = this.$refs.file.files[0];
            if (this.file) {
                formData.append('file', this.file);
                console.log(formData);
                axios.post('/files', formData,)
                    .then(function () {
                        console.log('SUCCESS!!');
                    })
                    .catch(function () {
                        console.log('FAILURE!!');
                    });

            }
            // console.log(this.$emit('submit', this.form));
            // // this.$emit('submit', this.email)
            // this.$emit('submit', this.form);
        }
    }
}

</script>

<style scoped></style>