<template>
  <div id="content">
    <div id="auditiondetails_boxtit">
      <p class="text">
        오디션 상세보기
      </p>
    </div>
    <p class="auditiondetails_recruitment">{{auditions.title}}</p>
    <div id="auditiondetails_dayimg">
      <img v-if="state" :src="`${$store.state.serverPath}/storage/${auditions.aud_image}`" :alt="auditions.title">
      <p class="text">채용시 마감</p>
    </div>
    <hr class="hr_line">
    <div id="detail_box">
      <table class="auditiondetails_tblinfo">
        <colgroup>
          <col style="width:110px;" />
          <col style="width:310px;" />
          <col style="width:110px;" />
          <col />
        </colgroup>
        <tbody>
          <p class="auditiondetails_total">오디션 정보</p>
          <tr>
            <th>모집랭크</th>
            <td>{{auditions.rank}} 랭크이상</td>
            <th>오디션 기간</th>
            <td>{{auditions.end_date}} 까지</td>
          </tr>
          <tr>
            <th>담당자 이름</th>
            <td>{{auditions.name}}</td>
            <th>담당자 연락처</th>
            <td>{{auditions.call_number}}</td>
          </tr>
          <tr>
            <th>회사 명</th>
            <td>{{auditions.company_name}}</td>
            <th>회사 위치</th>
            <td>{{auditions.address}}</td>
          </tr>
        </tbody>
      </table>
      <hr class="hr_line">
      <dl class="auditiondetails_introduction">
          <dt>오디션 소개</dt>
          <dd>
            {{auditions.content}}<br>
          </dd>
      </dl>
      <hr class="hr_line">
      <p id="video_result" class="auditiondetails_total">영상과제</p>
      <!-- <b-embed
              type="iframe"
              aspect="16by9"
              v-bind:src="auditionData.video"
              allowfullscreen
      ></b-embed> -->
      <iframe width="1000" height="500" src="https://www.youtube.com/embed/tLJICX3yKMs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <hr class="hr_line">
      <div id="button_area">
        <button type="button" @click="applyAudition">오디션 보기</button>
      </div>
      <div id="button_area">
      <b-button variant="primary" v-on:click="editAudition(auditions)">수정</b-button>
      <b-button variant="primary" style="margin-left:5px;" v-on:click="deleteAudition(auditions)">삭제</b-button>
      </div>
    </div>
    
  </div>
  <!-- <b-card>
      <div class="content-detail-content-info">
        <div class="content-detail-content-info-left">
          
          <div style="margin-left:200px" class="content-detail-content-info-left-subject">
            <h1>{{auditions.title}}</h1>
          </div>
          <div style="margin-left:200px">
            <b-button variant="primary">
              마감일:  <b-badge variant="light">d</b-badge>
            </b-button>
            <b-button variant="warning">
              랭크: d
            </b-button>
          </div>
        </div>
  </div>-->

  <!-- <div class="content-detail-content">
        <div>
          <img id="sub_image" v-if="state" :src="`${$store.state.serverPath}/storage/${auditions.image}`" :alt="auditions.title">
          <div id="text_area">
            <h1>영상과제</h1>
          </div>
  </div>-->

  <!-- </div>

      <div class="content-detail-button">
        <b-button variant="primary" v-on:click="editAudition(auditions)">수정</b-button>
        <b-button variant="danger" v-on:click="deleteAudition(auditions)">삭제</b-button>
      </div>
  </b-card>-->
</template>

<script>
import * as auditionService from "../../services/audition_service";

export default {
  name: "AuditionDetail",
  data() {
    const contentId = Number(this.$route.params.contentId);
    // params로 받은 게시글 아이디를 저장

    // const contentData = data.Content.filter(item => item.content_id === contentId)[0]
    // 현재 게시글에 해당하는 데이터를 가져옴

    return {
      auditions: [],
      auditionData: {
        id: "",
        title: "",
        content: "",
        userId: 1,
        date: "",
        image: "",
        selected: "",
        video: "https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
      },
      cid: contentId,
      state: false
    };
  },

  mounted() {
    this.loadDetailAudition();
  },

  methods: {
    // 데이터 로드
    loadDetailAudition: async function() {
      try {
        const response = await auditionService.loadDetailAudition(this.cid);
        this.auditions = response.data[0];
        console.log('가나다');
        console.log(this.auditions);
        console.log(response.data);
        this.state = true;
      } catch (error) {
        this.flashMessage.error({
          message: "ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ",
          time: 5000
        });
      }
    },

    deleteAudition: async function(auditions) {
      if (!window.confirm(`삭제할거에요?`)) {
        return;
      }
      try {
        await auditionService.deleteAudition(auditions.id);
        // this.audition=this.audition.filter(obj=>{
        //   return obj.id != audition.id;
        // });
        history.back();
        this.flashMessage.success({
          message: "삭제성공",
          time: 5000
        });
      } catch (error) {
        this.flashMessage.error({
          message: error.response.data.message,
          time: 5000
        });
      }
    },
    editAudition(auditions) {
      this.$router.push({
        path: `/auditioncreate/${auditions.id}`
      });
    },
    applyAudition(){
      this.$router.push({
        path: `/auditiontest/${this.cid}`
      });
    }

    // 삭제를 수행하는 함수
    // deleteData() {
    //   const content_index = data.Content.findIndex(item => item.content_id === this.contentId);
    //   // findIndex: 조건이 만족할 경우 index를 반환해줌

    //   data.Content.splice(content_index, 1)
    //   // 데이터 삭제 수행

    //   this.$router.push({
    //     path: '/board/free'
    //   })
    // },

    // 수정을 수행하는 함수
    // updateData() {
    //   this.$router.push({
    //     path: `/board/free/create/${this.contentId}`
    //   })
    // }
  }
};
</script>
<style scoped>
div {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}

.hr_line {
    height: 1px;
    margin: 39px 0 40px;
    border: none;
    background: #666666;
    font-size: 0;
    line-height: 0;
}


table{
  border-collapse: collapse;
  border-spacing: 0;
  
  padding: 0;
  border: 0;
  outline: 0;

  height: 100%;
}

tbody{
    display: table-row-group;
    vertical-align: middle;
    border-collapse: collapse;
    border-spacing: 0;
}

tr{
  display: table-row;
  vertical-align: inherit;
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}

tr:first-child th, .auditiondetails_tblinfo tr:first-child td {
    padding-top: 54px;
}

.auditiondetails_tblinfo th {
    padding-top: 21px;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
}

th{
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  display: table-cell;
  vertical-align: inherit;
}

td {
    padding-top: 54px;
}

#detail_box{
  padding: 0 31px 0 29px;
}

.auditiondetails_tblinfo td {
    width: 140px;
    padding-top: 21px;
    font-size: 14px;
    font-weight: normal;
    text-align: left;
}


colgroup {
    display: table-column-group;
}

element.style {
    width: 110px;
}

col {
    display: table-column;
}

/* 본문 내용 */
dl {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
}

/* 본문제목 */
.auditiondetails_introduction dt {
    color: #666666;
    font-size: 18px;
    font-weight: bold;
}

.auditiondetails_introduction dd {
    margin-top: 29px;
    font-size: 14px;
    line-height: 1.71;
}



#content {
  width: 1200px;
  margin: -25px auto 0;
  padding-bottom: 152px;
}

/* 제목박스 */
#auditiondetails_boxtit {
  overflow: hidden;
  margin-top: 5px;
  padding: 18px 31px 18px 27px;
  box-sizing: border-box;
  background: #ed1c24;
}

.auditiondetails_boxtit .text {
    float: left;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
}

/* 영상과제 텍스트 */
.auditiondetails_total {
    color: #666666;
    font-size: 18px;
    font-weight: bold;
}

#video_result{
  margin-block-start: 1em;
}

/* 제목박스 텍스트 */
#auditiondetails_boxtit .text {
  float: left;
  color: #fff;
  font-size: 14px;
  font-weight: bold;
}

.auditiondetails_recruitment {
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  margin-top: 20px;
}

#auditiondetails_dayimg {
  position: relative;
  margin-top: 30px;
  font-size: 0;
  line-height: 0;
}

#auditiondetails_dayimg img {
  width: 100%;
  height: 690px;
}

.auditiondetails_dayimg .text {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 150px;
  height: 56px;
  padding-top: 0px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  background: #ed1c24;
  color: #fff;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  line-height: 56px;
}

#button_area{
  position: relative;
  margin-top: 30px;
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