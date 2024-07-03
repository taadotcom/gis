<template>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            เพิ่ม
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scopre="col">QR CODE</th>
                    <th scope="col">filename </th>
                    <th scope="col">URL</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in files">
                    <td> {{ index + 1 }}
                    </td>
                    <td>
                        <qrcode-vue :value="this.endpoint + '/files/' + item.name" :size="100" level="H" />
                    </td>
                    <td>
                        {{ item.name }}
                    </td>
                    <td>
                        URL: {{ endpoint + '/files/' + item.name }}
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-4 m-1">
                                <a class="btn btn-primary" :href="'files/download/' + item.name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-download" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-md-4 m-1">
                                <a class="btn btn-primary" :href="'files/' + item.name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-md-4 m-1">
                                <button class="btn btn-danger" type="submit" @click="deleteFile(item.name)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
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
import axios from 'axios'
import QrcodeVue from 'qrcode.vue'

export default {
    props: ['fileName'],
    mounted() {

    },
    data() {
        const endpoint = import.meta.env.VITE_API_ENDPOINT;
        const files = this.fileName.map((element) => {
            return { 'name': element.substring(5) };
        });
        return { files, endpoint };
    },
    components: {
        QrcodeVue,
    },
    methods: {
        previewFiles(event) {
            this.inputFile = event.target.files[0]
        },
        submit() {
            console.log(this.endpoint);
            let formData = new FormData();
            if (this.inputFile) {
                formData.append('file', this.inputFile);
                const headers = { 'Content-Type': 'multipart/form-data' };
                axios.post('/files', formData, { headers })
                    .then(() => {
                        alert('เพิ่มข้อมูลสำเร็จ');
                        location.reload();
                    })
                    .catch((e) => {
                        alert('ไม่สามารถเพิ่มข้อมูลได้' + e)
                    });

            }
        },
        deleteFile(filename) {
            let formData = new FormData();
            formData.append('filename', filename);
            const headers = { 'Content-Type': 'multipart/form-data' }
            axios.post('/files/del', formData, { headers })
                .then(() => {
                    alert('ลบสำเร็จ');
                    location.reload();
                })
                .catch(function () {
                    alert('ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง');

                });
        }
    }
}

</script>

<style scoped></style>