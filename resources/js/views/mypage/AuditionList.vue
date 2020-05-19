<template>
<div>
    <div class="audition" v-for="(audition, index) in auditions" :key="index">
        <div class="audition_container">
            <div class="list_text">
                <div class="list_title">
                    {{audition.title}}
                </div>
                <div class="list_contents">
                    {{audition.content}}
                </div>
            </div>
            <div class="list_side">
                <div class="audition_deadline">
                    마감일: {{audition.end_date}}
                </div>
                <button>지원자 현황</button>
            </div>
        </div>
        <hr>
    </div>
</div>
</template>

<script>
export default {
    name: 'audition',
    data() {
        return {
            auditions: [],
            auditionData: {
                name: '',
                image: '',
            },
            editAuditionData: {},
            errors: {}
        }
    },
    mounted() {
        this.loadMyAudition();
    },
    methods: {
        loadMyAudition: async function() {
            const url = 'api/mypage/auditionlist';

            this.axios.get(url).then(response => {
                console.log(response.data);
                // this.auditions.push(response.data);
                this.auditions = response.data;
            });
        },
    }
}
</script>

<style>
.audition_container {
    display: flex;
    padding: 1vw;
}
.list_text {
    width: 70%;
}
.list_title {
    font-weight: 700;
}
.list_side {
    width: 30%;
}
.audition_deadline {
    display: flex;
    color: red;
}
hr {
    margin: 0;
}
</style>