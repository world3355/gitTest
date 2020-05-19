<template>
    <div>
        <div class="lecture" v-for="(lecture, index) in lectures" :key="index">
            <div class="lecture_content">
                <div class="lecture_img">
                    <img :src="`${$store.state.serverPath}/storage/${lecture.image}`" :alt="lecture.image">
                    <!-- {{lectures}} -->
                </div>
                <div class="lecture_text">
                    <div>
                        <h5>{{lecture.title}}</h5>
                    </div>
                    <div class="lecture_info">
                        <div>정확도 : {{lecture.accuracy}}</div>
                        <div>날짜 : {{lecture.created_at}}</div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>
export default {
    name: 'lecture',
    data() {
        return {
            lectures: [],
            lectureData: {
                name: '',
                image: '',
            },
            editLectureData: {},
            errors: {}
        }
    },
    mounted() {
        this.loadLecture();
    },
    methods: {
        loadLecture: async function() {
            const url = 'api/mypage/lecture';

            this.axios.get(url).then(response => {
                console.log(response.data);
                // this.lectures.push(response.data);
                this.lectures = response.data;
            });
        },
    }
}
</script>

<style>
.lecture {
    display: flex;
    flex-direction: column;
}
.lecture_content {
    display: flex;
    padding: 1vw;
}
h5 {
    font-weight: 700;
}
.lecture_text {
    display: flex;
    flex-direction: column;
    padding: 1vw;
}
.lecture_img {
    width: 150px;
}
.lecture_img > img {
    width: 100%;
    height: 100%;
}
hr {
    margin: 0;
}
</style>