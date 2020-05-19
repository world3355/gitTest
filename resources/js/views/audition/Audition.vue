<template>
  <div id="container">
    <div class="common_contentbox">
      <h2 class="title">오디션</h2>
      <ul class="audition_list" v-for="(audition,index) in auditions" :key="index">
        <li @click="rowClick(audition)">
          <a href="#" class="link">
            <div class="imgbox hovereffect">
              <img id="card-image" :src="`${$store.state.serverPath}/storage/${audition.aud_image}`" :alt="audition.title">
            </div>
            <div class="d_dayinfo">
              <p class="day">{{audition.rank}}랭크이상</p>
              <table class="info">
                <colgroup>
                  <col style="width:100px;" />
                  <col />
                </colgroup>
                <thead>
                  <tr>
                    <th colspan="2">{{audition.title}}</th>
                  </tr>
                </thead>
                <tbody>
                  <!--                                        <tr>
                                    <th>제작</th>
                                    <td>메가폰 엔터테인먼트</td>
                  </tr>-->
                  <tr>
                    <th>마감일</th>
                    <td>{{audition.end_date}} 까지</td>
                  </tr>
                  <!--                                        <tr>
                                    <th>주연</th>
                                    <td>이준혁, 장동곤, 이창범</td>
                  </tr>-->
                  <tr>
                    <th>기업명</th>
                    <td>{{ audition.user.company.company_name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </a>
        </li>
      </ul>
      <div id="button_area">
        <button type="button" @click="writeContent">오디션 공고등록</button>
      </div>
    </div>
    <!-- <h1>{{items.user_id}}</h1> -->
    <!-- <b-table striped hover :auditions="auditions" @row-clicked="rowClick"></b-table> -->
    <!-- <div>
        <b-list-group id="audition-all" >
            <b-list-group-item  id="audition-set" href="#" active class="flex-column align-items-start" @click="rowClick(audition)" v-for="(audition,index) in auditions" :key="index">
                <div class="hovereffect audition-image-box">
                    <img id="card-image" :src="`${$store.state.serverPath}/storage/${audition.image}`" :alt="audition.title">
                </div>
                <div class="audition-info">
                    <div style="margin-top:12px">
                        <h5 class="audition-title">{{audition.title}}</h5>
                    </div>
                    <div>
                        <b-badge pill variant="primary">마감일: 2020년 5월 15일{{audition.date}}</b-badge>
                    </div>
                    <div>
                        <b-badge pill variant="success">랭크: B랭크 이상 지원가능{{audition.selected}}</b-badge>
                    </div>
                </div>
            </b-list-group-item>

        </b-list-group>
    </div>

    <b-button class="audition-add-btn" variant="dark" @click="writeContent">오디션 공고 등록</b-button>-->
  </div>
</template>

<script>
import * as auditionService from "../../services/audition_service";

export default {
  name: "Audition",
  data() {
    // 게시판 최신 순 정렬
    // let items = data.Content.sort((a,b) => {return b.content_id - a.content_id})

    // 유저 네임 속성 추가(게시판의 유저아이디와 데이터의 유저아이디가 동일 할 경우에)
    // items = items.map(contentItem => {return {...contentItem, user_name: data.User.filter(userItem => userItem.user_id === contentItem.user_id)[0].name}})

    return {
      // 게시글의 보여주고싶은 필드 보이도록 설정
      // fields:[
      //     {
      //         key:'content_id',
      //         label:'글번호'
      //     },
      //     {
      //         key:'title',
      //         label:'제목'
      //     },
      //     {
      //         key:'created_at',
      //         label:'작성일'
      //     },
      //     {
      //         key:'user_name',
      //         label:'글쓴이'
      //     }
      // ],

      auditions: [],
      auditionData: {
        id: "",
        title: "",
        content: "",
        userId: 1,
        date: "",
        image: "",
        selected: "",
        video: ""
      },

      errors: {}
    };
  },

  mounted() {
    this.loadAudition();
  },

  methods: {
    loadAudition: async function() {
      try {
        const response = await auditionService.loadAudition();
        this.auditions.unshift(response);
        
        this.auditions = response.data[0];
        console.log(this.auditions);
      } catch (error) {
        this.flashMessage.error({
          message: "에러가 발생했습니다!",
          time: 5000
        });
      }
    },

    // 오디션 클릭시
    rowClick(audition, index, e) {
      this.$router.push({
        path: `/auditiondetail/${audition.id}`
      });
    },

    // 오디션 생성
    writeContent() {
      this.$router.push({
        path: "/auditioncreate"
      });
    }
  }
};
</script>
    
<style>
div,
h2,
ul {
  padding: 0;
  border: 0;
  outline: 0;
}

li{
    list-style: none;
}

h2 {
  display: block;
  margin-block-start: 0.83em;
  margin-block-end: 0.83em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
}

a {
  color: #333333;
  text-decoration: none;
}

.audition_list li .link {
  display: block;
}

.audition_list li .imgbox {
  width: 100%;
  height: 400px;
  overflow: hidden;
}

.audition_list li .imgbox:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(95, 95, 95, 0.6);
}

.audition_list li .imgbox img {
  width: 100%;
  height: auto;
}

/* 오디션 간략정보 */
.audition_list li .d_dayinfo {
  position: absolute;
  left: 0;
  top: 0;
  width: 440px;
  height: 400px;
  padding: 61px 30px 0 75px;
  box-sizing: border-box;
  background-color: rgba(255, 255, 255, 0.8);
}

/* 기간정보 */
.audition_list li .d_dayinfo .day {
  width: 150px;
  height: 56px;
  padding-top: 0;
  box-sizing: border-box;
  background: #ed1c24;
  color: #fff;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  line-height: 56px;
}

/* 오디션 리스트 기업정보 */
table {
  border-collapse: collapse;
  border-spacing: 0;
}
colgroup {
  display: table-column-group;
}
thead {
  display: table-header-group;
  vertical-align: middle;
}
th {
  display: table-cell;
  vertical-align: inherit;
  text-align: -internal-center;
}
tr {
  display: table-row;
  vertical-align: inherit;
}

.audition_list li .d_dayinfo .info tbody th {
  color: #141414;
  font-size: 14px;
  font-weight: bold;
  line-height: 2;
}

.audition_list li .d_dayinfo .info thead th {
  padding-bottom: 15px;
  color: #141414;
  font-size: 20px;
  font-weight: bold;
}

.audition_list li .d_dayinfo .info {
  width: 100%;
  margin-top: 30px;
}

p {
  display: block;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
}

/* 오디션 페이지 박스 */
.common_contentbox {
  overflow: hidden;
  width: 1600px;
  margin: 0 auto;
  padding-bottom: 150px;
}

/* 오디션 페이지 텍스트 */
.common_contentbox > .title {
  margin: 0 0 0 0;
  color: #ed1b24;
  font-size: 28px;
  font-weight: bold;
  margin-left: 5%;
}

/* 오디션 페이지 리스트 */
ul {
  display: block;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  padding-inline-start: 40px;
}

.audition_list li {
  position: relative;
  margin-top: 20px;
}

.audition_list li:first-child {
  margin-top: 60px;
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

#button_area{
  position: relative;
  margin-top: 30px;
  font-size: 0;
  line-height: 0;
  text-align: center;
}

.hovereffect:hover img {
        opacity: 0.6;
        filter: alpha(opacity=60);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
    

/* .hovereffect:hover img {
        opacity: 0.6;
        filter: alpha(opacity=60);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }

    .hovereffect:hover .overlay:before {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }

    #container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 70px;
    }

    #audition-all {
        width: 1100px;
        display: inline-block;
        margin-top:40px;
        padding:0;
    }

    #audition-set {
        width: 250px;
        height: 370px;
        float: left;
        color: black;
        background-color: white;
        border: 1px solid #ced4da;
        padding: 0 0 0 0;
        margin-left: 20px;
        margin-top: 60px;
        border-radius:5px;
    }

    .audition-image-box {
        width: 250px;
        height: 260px;
    }

    .audition-image-box > img {
        width: 100%;
        height:100%;
    }

    .audition-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .audition-title {
        font-size:25px;
        font-weight:100;
    }

    .audition-add-btn {
        margin-top:60px;
        width:200px;
        height:60px;
        margin-top:50px;
    } */
</style>