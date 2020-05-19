<template>
    <div>
        <div class="profile">
            <div class="profile_contents">
                <img :src="`images/${profiles.rank_name}.png`" :alt="profiles.rank_name">
            </div>
            <div class="table_flex">
                <table class="table_margin">
                    <tr>
                        <th>사용자ID</th>
                        <td>{{profiles.userid}}</td>
                    </tr>
                    <tr>
                        <th>성별</th>
                        <td v-if="profiles.gender == true">여성</td>
                        <td v-else>남성</td>
                    </tr>
                    <tr>
                        <th>등급</th>
                        <td v-if="profiles.class == 1">ARTIST</td>
                        <td v-else-if="profiles.class == 2">EXPERT</td>
                        <td v-else>PRODUCER</td>
                    </tr>
                    <tr>
                        <th>소개</th>
                        <td>{{profiles.introduction}}</td>
                    </tr>
                    <tr>
                        <th>가입일</th>
                        <td>{{String(profiles.created_at)}}</td>
                    </tr>
                    <tr>
                        <th>랭킹</th>
                        <td>{{profiles.rank_name}}</td>
                    </tr>
                    <tr v-if="profiles.class == 3">
                        <th>기업명</th>
                        <td>{{profiles.company_name}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="score">
            <div>
                <img src="http://placehold.it/500x250" alt="">
            </div>
            <div>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'profile',
    data() {
        return {
            profiles: [],
            profileData: {
                name: '',
                image: '',
            },
            editProfileData: {},
            errors: {}
        }
    },
    mounted() {
        this.loadProfile();
    },
    methods: {
        loadProfile: async function() {
            const url = 'api/mypage/profile';

            this.axios.get(url).then(response => {
                console.log(response.data);
                this.profiles = response.data;
            });
        },
    }
}
</script>

<style>
.profile_contents > img {
    width: 250px;
}
.profile {
    display: flex;
    padding: 1vw;
}
.table_flex {
    display: flex;
}
.table_margin {
    border-collapse: separate;
    border-spacing: 1vh;
}
.score {
    display: flex;
    flex-direction: column;
    padding: 1vw;
}
</style>