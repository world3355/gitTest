<template>
    <div id="content">
        <div class="auditiondetails_content">
            <h2 class="auditiondetails_title"></h2>
            <div class="auditiondetails_boxtit">
                <p class="text">오디션 신청</p>
            </div>

            <p class="auditiondetails_recruitment">YG태양이 지지않는 밤 오디션</p>
            <form v-on:submit.prevent="createAudition">
                <div class="auditiondetails_content_ingap">
                    <hr class="hr_line">
                    <p class="auditiondetails_title02">본인 정보를 확인해주세요.</p>
                    <div id="user_detail">
                        <div class="imgbox">
                            <img src="http://blogfiles.naver.net/MjAyMDAyMTlfMTgz/MDAxNTgyMDY1NzU1Mjg4.0KW7Pcai1MPMyrEbw_L4ZtbY42cGrOtC__QEZrVAUsMg.TBE7t8LPNGYWBF3r8ly5aWtzRvU1vxE_CeiK6JVQPJgg.JPEG.everonly4u/31588462_wYo49E2H_9.jpg" alt="" style="width: 100%;height:auto"> 
                        </div>
                        <div class="infodetail">
                            <table class="tbl_infodetail">
                                <colgroup>
                                    <col style="width:90px">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>이름</th>
                                        <td> <b-form-input id="title" v-model="auditions.name" placeholder="제목을 입력해주세요"></b-form-input></td>
                                        <th>랭크</th>
                                        <td>{{auditions.rank_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>생년월일</th>
                                        <td> <b-form-input id="title" v-model="auditions.birthday" placeholder="제목을 입력해주세요"></b-form-input></td>
                                        <th>등급</th>
                                        <td>연습생</td>
                                    </tr>
                                    <tr>
                                        <th>주소</th>
                                        <td> <b-form-input id="title" v-model="auditions.address" placeholder="제목을 입력해주세요"></b-form-input></td>
                                        <th>연락처</th>
                                        <td> <b-form-input id="title" v-model="auditions.call_number" placeholder="제목을 입력해주세요"></b-form-input></td>
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                    <tr>
                                        <th>점수</th>
                                        <td>{{this.score}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <hr class="hr_line">
                        <p class="auditiondetails_title02">개인정보 처리방침</p>
                        <div class="policy">
                            <p>
                                정보통신망법 규정에 따라 미나오도에서 오디션 신청하시는 분께 수집하는 개인정보의 항목, 개인정보의 수집 및 이용목적, 개인정보의 보유 및 이용기간을 안내 드리오니 자세히 읽은 후 동의하여 주시기 바랍니다.

                                1. 수집하는 개인정보
                                이용자는 회원가입을 하지 않아도 정보 검색, 뉴스 보기 등 대부분의 미나오도 서비스를 회원과 동일하게 이용할 수 있습니다. 이용자가 메일, 캘린더, 카페, 블로그 등과 같이 개인화 혹은 회원제 서비스를 이용하기 위해 회원가입을 할 경우, 미나오도는 서비스 이용을 위해 필요한 최소한의 개인정보를 수집합니다.

                                회원가입 시점에 미나오도가 이용자로부터 수집하는 개인정보는 아래와 같습니다.
                                - 회원 가입 시에 ‘아이디, 비밀번호, 이름, 생년월일, 성별, 휴대전화번호’를 필수항목으로 수집합니다. 만약 이용자가 입력하는 생년월일이 만14세 미만 아동일 경우에는 법정대리인 정보(법정대리인의 이름, 생년월일, 성별, 중복가입확인정보(DI), 휴대전화번호)를 추가로 수집합니다. 그리고 선택항목으로 이메일 주소, 프로필 정보를 수집합니다.
                                - 단체아이디로 회원가입 시 단체아이디, 비밀번호, 단체이름, 이메일주소, 휴대전화번호를 필수항목으로 수집합니다. 그리고 단체 대표자명을 선택항목으로 수집합니다.
                                서비스 이용 과정에서 이용자로부터 수집하는 개인정보는 아래와 같습니다.
                                NAVER 내의 개별 서비스 이용, 이벤트 응모 및 경품 신청 과정에서 해당 서비스의 이용자에 한해 추가 개인정보 수집이 발생할 수 있습니다. 추가로 개인정보를 수집할 경우에는 해당 개인정보 수집 시점에서 이용자에게 ‘수집하는 개인정보 항목, 개인정보의 수집 및 이용목적, 개인정보의 보관기간’에 대해 안내 드리고 동의를 받습니다.

                                서비스 이용 과정에서 IP 주소, 쿠키, 서비스 이용 기록, 기기정보, 위치정보가 생성되어 수집될 수 있습니다. 또한 이미지 및 음성을 이용한 검색 서비스 등에서 이미지나 음성이 수집될 수 있습니다.
                                구체적으로 1) 서비스 이용 과정에서 이용자에 관한 정보를 자동화된 방법으로 생성하여 이를 저장(수집)하거나,
                                2) 이용자 기기의 고유한 정보를 원래의 값을 확인하지 못 하도록 안전하게 변환하여 수집합니다. 서비스 이용 과정에서 위치정보가 수집될 수 있으며,
                                미나오도에서 제공하는 위치기반 서비스에 대해서는 '미나오도 위치정보 이용약관'에서 자세하게 규정하고 있습니다.
                                이와 같이 수집된 정보는 개인정보와의 연계 여부 등에 따라 개인정보에 해당할 수 있고, 개인정보에 해당하지 않을 수도 있습니다.

                                2. 수집한 개인정보의 이용
                                미나오도 및 미나오도 관련 제반 서비스(모바일 웹/앱 포함)의 회원관리, 서비스 개발・제공 및 향상, 안전한 인터넷 이용환경 구축 등 아래의 목적으로만 개인정보를 이용합니다.

                                - 회원 가입 의사의 확인, 연령 확인 및 법정대리인 동의 진행, 이용자 및 법정대리인의 본인 확인, 이용자 식별, 회원탈퇴 의사의 확인 등 회원관리를 위하여 개인정보를 이용합니다.
                                - 콘텐츠 등 기존 서비스 제공(광고 포함)에 더하여, 인구통계학적 분석, 서비스 방문 및 이용기록의 분석, 개인정보 및 관심에 기반한 이용자간 관계의 형성, 지인 및 관심사 등에 기반한 맞춤형 서비스 제공 등 신규 서비스 요소의 발굴 및 기존 서비스 개선 등을 위하여 개인정보를 이용합니다.
                                - 법령 및 미나오도 이용약관을 위반하는 회원에 대한 이용 제한 조치, 부정 이용 행위를 포함하여 서비스의 원활한 운영에 지장을 주는 행위에 대한 방지 및 제재, 계정도용 및 부정거래 방지, 약관 개정 등의 고지사항 전달, 분쟁조정을 위한 기록 보존, 민원처리 등 이용자 보호 및 서비스 운영을 위하여 개인정보를 이용합니다.
                                - 유료 서비스 제공에 따르는 본인인증, 구매 및 요금 결제, 상품 및 서비스의 배송을 위하여 개인정보를 이용합니다.
                                - 이벤트 정보 및 참여기회 제공, 광고성 정보 제공 등 마케팅 및 프로모션 목적으로 개인정보를 이용합니다.
                                - 서비스 이용기록과 접속 빈도 분석, 서비스 이용에 대한 통계, 서비스 분석 및 통계에 따른 맞춤 서비스 제공 및 광고 게재 등에 개인정보를 이용합니다.
                                - 보안, 프라이버시, 안전 측면에서 이용자가 안심하고 이용할 수 있는 서비스 이용환경 구축을 위해 개인정보를 이용합니다.
                                3. 개인정보의 파기
                                회사는 원칙적으로 이용자의 개인정보를 회원 탈퇴 시 지체없이 파기하고 있습니다.
                                단, 이용자에게 개인정보 보관기간에 대해 별도의 동의를 얻은 경우, 또는 법령에서 일정 기간 정보보관 의무를 부과하는 경우에는 해당 기간 동안 개인정보를 안전하게 보관합니다.

                                이용자에게 개인정보 보관기간에 대해 회원가입 시 또는 서비스 가입 시 동의를 얻은 경우는 아래와 같습니다.
                                부정가입 및 징계기록 등의 부정이용기록은 부정 가입 및 이용 방지를 위하여 수집 시점으로부터 6개월간 보관하고 파기하고 있습니다. 부정이용기록 내 개인정보는 가입인증 휴대폰 번호(만 14세 미만 회원의 경우 법정대리인 DI)가 있습니다.
                                부정이용으로 징계를 받기 전에 회원 가입 및 탈퇴를 반복하며 서비스를 부정 이용하는 사례를 막기 위해 탈퇴한 이용자의 휴대전화번호를 복호화가 불가능한 일방향 암호화(해시 처리)하여 6개월간 보관합니다. QR코드 서비스에서 연락처를 등록한 이후 QR코드 삭제 시, 복구 요청 대응을 위해 삭제 시점으로 부터 6개월 보관합니다. 스마트 플레이스 서비스에서 휴대전화번호를 등록한 경우 분쟁 조정 및 고객문의 등을 목적으로 업체 등록/수정 요청시, 또는 등록 이후 업체 삭제 요청 시로부터 최대 1년간 보관 할 수 있습니다.

                                전자상거래 등에서의 소비자 보호에 관한 법률, 전자금융거래법, 통신비밀보호법 등 법령에서 일정기간 정보의 보관을 규정하는 경우는 아래와 같습니다. 미나오도는 이 기간 동안 법령의 규정에 따라 개인정보를 보관하며, 본 정보를 다른 목적으로는 절대 이용하지 않습니다.
                                - 전자상거래 등에서 소비자 보호에 관한 법률
                                계약 또는 청약철회 등에 관한 기록: 5년 보관
                                대금결제 및 재화 등의 공급에 관한 기록: 5년 보관
                                소비자의 불만 또는 분쟁처리에 관한 기록: 3년 보관
                                - 전자금융거래법
                                전자금융에 관한 기록: 5년 보관
                                - 통신비밀보호법
                                로그인 기록: 3개월
                                회원탈퇴, 서비스 종료, 이용자에게 동의받은 개인정보 보유기간의 도래와 같이 개인정보의 수집 및 이용목적이 달성된 개인정보는 재생이 불가능한 방법으로 파기하고 있습니다. 법령에서 보존의무를 부과한 정보에 대해서도 해당 기간 경과 후 지체없이 재생이 불가능한 방법으로 파기합니다.

                                전자적 파일 형태의 경우 복구 및 재생이 되지 않도록 기술적인 방법을 이용하여 안전하게 삭제하며, 출력물 등은 분쇄하거나 소각하는 방식 등으로 파기합니다.

                                참고로 미나오도는 ‘개인정보 유효기간제’에 따라 1년간 서비스를 이용하지 않은 회원의 개인정보를 별도로 분리 보관하여 관리하고 있습니다.
                            </p>
                        </div>
                        <div class="policy_check">
                            <span class="checkbox">
                                <input type="checkbox" id="personal_agree" value="Y">
                                <em class="checkmark"></em>
                                <label for="personal_agree">내용을 확인하였으며, 동의합니다.</label>
                            </span>
                        </div>
                        <hr class="hr_line">
                        <p class="auditiondetails_title02">오디션 담당자에게 전달하는 메시지</p>
                        <b-form-textarea
                        id="textarea"
                        v-model="text"
                        placeholder="전달할 내용을 입력해주세요."
                        rows="3"
                        max-rows="6"
                        ></b-form-textarea>
                    </div>
                
                </div>
                
            </form>
                
        </div>
        <div id="button_area">
            <b-button variant="primary" @click="submitAudition">지원하기</b-button>
        </div>        
    </div>
</template>

<script>
import * as auditionService from "../../services/audition_service";
export default {
    data(){
        return{
            text:'',
            auditions: [],
            aid:'',
            score:''
        }
    },
    mounted() {
    this.aid = Number(this.$route.params.contentId);
    this.score = Number(this.$route.params.score);
    this.applyAudition();
    },

    methods:{
    // 유저 데이터 로드
    applyAudition: async function() {
      try {
        const response = await auditionService.applyAudition();
        this.auditions = response.data;
        console.log(this.score);
        this.state = true;
      } catch (error) {
        this.flashMessage.error({
          message: "ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ",
          time: 5000
        });
      }
    },
    submitAudition: async function(){
            let formData=new FormData();
            formData.append('name',this.auditions.name);
            formData.append('rank_name',this.auditions.rank_name);
            formData.append('birthday',this.auditions.birthday);
            formData.append('call_number',this.auditions.call_number);
            formData.append('score',this.score);
            formData.append('text',this.text);
            formData.append('audition_id',this.aid);
            console.log(...formData);
            this.$router.push({
                path:'/audition'
            });


            try{
                const response=await auditionService.submitAudition(formData);

                this.flashMessage.success({
                    message: '신청이 완료되었습니다.',
                    time:5000
                });
                
                
            }catch(error){
                console.log(error.response.status);
                switch (error.response.status) {
                    case 422:
                        this.errors=error.response.data.errors;
                        break;
                
                    default:
                        this.flashMessage.error({
                            message: '문제가 발생!',
                            time:5000
                        });
                }
            }
        },
    }
}
</script>

<style scoped>
div,h2,p,form,p{
    padding: 0;
    border: 0;
    outline: 0;
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}


/* 전체 박스 */
.auditiondetails_content {
    width: 1200px;
    margin: -25px auto 0;
    padding-bottom: 152px;
}

/* 유저정보 박스 */
#user_detail{
    width: 100%;
    height: 270px;
}

/* 카테고리 제목 */
.auditiondetails_title {
    font-size: 24px;
    font-weight: bold;
}

/* 카테고리 제목박스 */
.auditiondetails_boxtit {
    overflow: hidden;
    margin-top: 15px;
    padding: 18px 31px 18px 27px;
    box-sizing: border-box;
    background: #ed1c24;
}

/* 카테고리박스 텍스트 */
.auditiondetails_boxtit .text {
    float: left;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
}

/* 본문 텍스트 */
.auditiondetails_recruitment {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
}

/* 본문박스 */
.auditiondetails_content_ingap {
    padding: 0 31px 0 29px;
}

/* 구분선 */
.auditiondetails_content_ingap > .hr_line:first-child {
    margin-top: 56px;
}

.hr_line {
    height: 1px;
    margin: 39px 0 40px;
    border: none;
    background: #666666;
    font-size: 0;
    line-height: 0;
}

hr {
    display: block;
    unicode-bidi: isolate;
    margin-block-start: 0.5em;
    margin-block-end: 0.5em;
    margin-inline-start: auto;
    margin-inline-end: auto;
    overflow: hidden;
}

form{
    height: 900px;
}

/* 유저정보 확인 제목 */
.auditiondetails_title02 {
    color: #666;
    font-size: 18px;
    font-weight: bold;
}

/* 유저정보 이미지 */
.imgbox {
    display: inline-block;
    position: relative;
    vertical-align: top;
    width: 254px;
    height: 240px;
    margin-top: 15px;
}

/* 유저정보 디테일 */
.infodetail {
    width: 800px;
    display: inline-block;
    height: 240px;
    margin-left: 55px;
    max-width: 340px;
}

/* 유저정보 디테일 테이블 */
.tbl_infodetail {
    margin-top: 14px;
    width: 500px;
    height: 240px;
}

/* 약관 */
.policy{
    width: 1150px;
    height: 240px;
    overflow:scroll;
}

.policy_check {
    float: right;
    margin-top: 17px;
    font-size: 11.65px;
    color: #333;
}

.checkbox {
    position: relative;
    display: inline-block;
    vertical-align: top;
    padding-left: 16px;
}



.policy_check label {
    margin-left: 4px;
    line-height: 15px;
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: top;
    background: transparent;
    font-style: normal;
}

.policy_check {
    float: right;
    margin-top: 17px;
    font-size: 11.65px;
    color: #333;
}


table {
    display: table;
    box-sizing: border-box;
    border-collapse: collapse;
    border-spacing: 0;
}

colgroup {
    display: table-column-group;
}

/* 유저정보 디테일 테이블 바디 */
tbody {
    display: table-row-group;
    vertical-align: middle;
}

tr{
    display: table-row;
    vertical-align: inherit;
}

th{
    display: table-cell;
    vertical-align: inherit;
    font-weight: bold;
}

 th {
    width: 80px;
    padding-bottom: 16px;
    color: #666;
    font-size: 12px;
    text-align: left;
    
}

td {
    width: 216px;
    padding-bottom: 16px;
    color: black;
    font-size: 12px;
    font-weight: bold;
}

#button_area{
  position: relative;
  font-size: 0;
  line-height: 0;
  text-align: center;
}

button {
    display: inline-block;
    width: 152px;
    height: 48px;
    border: none;
    background: #ed1c24;
    color: #fff;
    font-size: 16px;
    line-height: 1;
}


</style>