<template>
    <div>
        <div class="edit">
            <h4>Profile</h4>
            <div class="edit_container">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <img src="http://placehold.it/250x250" alt="">
                                <input type="file" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>이름</th>
                            <td>{{profiles.name}}</td>
                        </tr>
                        <tr>
                            <th>성별</th>
                            <td v-if="profiles.gender == false">남자</td>
                            <td v-else>여자</td>
                        </tr>
                        <tr>
                            <th>등급</th>
                            <td v-if="profiles.class == 1">ARTIST</td>
                            <td v-else-if="profiles.class == 2">EXPERT</td>
                            <td v-else>PRODUCER</td>
                        </tr>
                        <tr>
                            <th>아이디</th>
                            <td>{{profiles.userid}}</td>
                        </tr>
                        <tr>
                            <th>가입일</th>
                            <td>{{profiles.created_at}}</td>
                        </tr>
                        <tr>
                            <th>수정일</th>
                            <td>{{profiles.updated_at}}</td>
                        </tr>
                        <tr>
                            <th>랭크</th>
                            <td>{{profiles.rank_name}}</td>
                        </tr>
                        <tr>
                            <th>생년월일</th>
                            <td>{{profiles.birthday}}</td>
                        </tr>
                        <tr>
                            <th>연락처</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>소속사</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>자기소개</th>
                            <td><input type="textarea"></td>
                        </tr>
                        <tr v-if="profiles.class == 3">
                            <th>회사명</th>
                            <td><input type="text" :value="`${profiles.company_name}`"></td>
                        </tr>
                    </thead>
                </table>
            </div>
                <button>저장하기</button>
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
            const url = 'api/mypage/profileedit';

            this.axios.get(url).then(response => {
                console.log(response.data);
                this.profiles = response.data;
            });
        },
    }
}
</script>

<style>
.edit {
    display: flex;
    flex-direction: column;
    padding: 1vw;
}
.edit_container {
    display: flex;
    width: fit-content;
}
table {
    border-collapse: separate;
    border-spacing: 2vh;
}
</style>