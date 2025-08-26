<template>
    <AppHeader @scrollTo="scrollTo" />
    <div class="max-w-3xl mx-auto p-4" id="about">
        <h1 class="text-2xl font-extrabold mb-2 text-blue-900 text-center ">
             ภารกิจหลักของเรา
        </h1>
    </div>
    <div class="container" ref="about">
        <Carousel :value="messages" :numVisible="3" :numScroll="1" circular>
            <template #item="slotProps">
                <div
                    class="border border-blue-300 rounded-xl m-2 p-6 bg-white hover:scale-105 transition-transform duration-300">
                    <p class="mb-4 font-semibold text-center text-blue-800 text-lg leading-relaxed">
                        <span class="inline-block animate-spin mr-2 text-blue-400">✨</span>
                        {{ slotProps.data }}
                    </p>
                </div>
            </template>

        </Carousel>
    </div>

    <AppFooter />


</template>


<script setup>

const messages = [
    "งานศึกษา วิเคราะห์ ออกแบบ พัฒนา ทดสอบ บำรุงรักษา ระบบสารสนเทศหลักของสำนักงานตำรวจแห่งชาติ งานสารสนเทศภูมิศาสตร์ สื่อประสมสารสนเทศ และระบบการประมวลผลข้อมูล เพื่อการนำเสนอในรูปแบบที่ทันสมัย",
    "พัฒนา ปรับปรุง ผลผลิตข้อมูลจากระบบสารสนเทศหลัก ของสำนักงานตำรวจแห่งชาติ งานสารสนเทศภูมิศาสตร์ สื่อประสมสารสนเทศ ระบบบการประมวลผลผล ข้อมูลเพื่อการนำเสนอในรูปแบบที่ทันสมัย เพื่อใช้ในการบริหารองค์กร",
    "ประมวลข้อเสนอแนะ ด้านการพัฒนาระบบสารสนเทศหลัก ของสำนักงานตำรวจแห่งชาติ งานสารสนเทศภูมิศาสตร์ สื่อประสมสารสนเทศ ระบบการประมวลผล ข้อมูลเพื่อการนำเสนอในรูปแบบที่ทันสมัย เพื่อปรับปรุง เปลี่ยนแปลงให้เหมาะสมกับสถานการณ์",
    "ดูแลระบบสารสนเทศหลักของสำนักงานตำรวจแห่งชาติ งานสารสนเทศ ภูมิศาสตร์ สื่อประสมสารสนเทศ ระบบการประมวลผลข้อมูล เพื่อการนำเสนอในรูปแบบที่ทันสมัย ให้สามารถสนับสนุนการทำงานของหน่วยงานภายในเพื่อเพิ่มประสิทธิภาพการทำงานขององค์กร",
    "พัฒนา ส่งสริมให้มีการสร้างองค์ความรู้ เพื่อรองรับกระบวนการจัดการ องค์ความรู้ให้เป็นมาตรฐานภายในองค์กร",
    "ส่งเสริมและสนับสนุนการนำเทคโนโลยีสารสนเทศความมั่นคง ปลอดภัยด้านโปรแกรมประยุกต์เพื่อนำมาใช้ใด้อย่างเหมาะสม",
    "ประสานงานกับหน่วยงานเทคโนโลยีสารสนเทศภายในองค์กร เพื่อสนับสนุนการทำงานเกี่ยวกับระบบสารสนเทศหลักของสำนักงานตำรวจแห่งชาติให้บรรลุเป้าหมาย",
    "ให้คำปรึกษา แนะนำการใช้งาน ส่งเริมการเรียนรู้ การใช้เทศโมโลยี ที่เกี่ยวกับระบบสารสนเทศหลักของสำนักงานตำรวจแห่งชาติ งานสารสนเทศภูมิศาสตร์ สื่อประสมสารสนเทศ ระบบการประมวลผลข้อมูล เพื่อการนำเสนอในรูปแบบที่ทันสมัยให้กับหน่วยงานภายในองค์กร",
    "ปฏิบัติงานร่วมกับหรือสนับสนุนการปฏิบัติงานของหน่วยงานอื่น ที่เกี่ยวข้องหรือที่ได้รับมอบหมาย"
]

</script>

<script>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';

export default {
    name: 'HomeComponent',
    components: {
        AppHeader,
        AppFooter
    },
    methods: {
        scrollTo(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }
};
</script>

<style scoped>
/* No custom styles needed, Tailwind handles it */
</style>