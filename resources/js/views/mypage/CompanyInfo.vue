<template>
    <div>
        <div class="company_profile">
            <h4>Profile</h4>
            <div class="company_container">
                <table>
                    <thead>
                        <tr>
                            <th>이름</th>
                            <td>{{companies.company_name}}</td>
                        </tr>
                        <tr>
                            <th>성별</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>키</th>
                        </tr>
                        <tr>
                            <th>아이디</th>
                        </tr>
                        <tr>
                            <th>닉네임</th>
                        </tr>
                        <tr>
                            <th>가입일</th>
                        </tr>
                        <tr>
                            <th>이메일</th>
                        </tr>
                        <tr>
                            <th>소속사</th>
                        </tr>
                        <tr>
                            <th>분야</th>
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
    name: 'company',
    data() {
        return {
            companies: [],
            companyData: {
                name: '',
                image: '',
            },
            editCompanyData: {},
            errors: {}
        }
    },
    mounted() {
        this.loadCompanyInfo();
    },
    methods: {
        loadCompanyInfo: async function() {
            const url = 'api/mypage/companyinfo';

            this.axios.get(url).then(response => {
                console.log(response.data);
                this.companies = response.data;
            });
        },
    }
}
</script>

<style>
.company_profile {
    display: flex;
    flex-direction: column;
    padding: 1vw;
}
.company_container {
    display: flex;
}
table {
    padding: 1vw;
}
</style>