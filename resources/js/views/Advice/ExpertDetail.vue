<template>

  <div>
    <div class="expert-detail" >

      <div class="detail_box">
        <p class="name">
            <span class="korean">{{propsdata.name}}</span>
        </p>
        <div class="close">
            <button class="closeBtn" type="button">닫기</button>
        </div>
      </div>

      <div class="profile_info">
        <div class="profile">
          <div class="photo">
              <img :src="`${$store.state.serverPath}/storage/${propsdata.image}`" alt=""> 
          </div>
        </div>
        
        <div id="tabSList" class="info">
          <div class="expert-info-font"><span>아티스트 정보</span></div>
            <div class="box">
                <div id="artistinfo_detail">

                    <div class="infodetail">
                        <table class="tbl_infodetail">
                            <tbody>
                                <tr>
                                    <th>자기소개</th>
                                    <td>{{propsdata.introduction}}</td>
                                </tr>
                                <tr>
                                    <th>전문분야</th>
                                    <td>{{propsdata.area}}</td>
                                </tr>
                                <tr>
                                    <th>수상경력</th>
                                    <td>{{propsdata.career_01}}</td>
                                </tr>
                                <tr class="career-add" v-if="propsdata.career_02!=null">
                                    <th></th>
                                    <td>{{propsdata.career_02}}</td>
                                </tr>
                                <tr class="career-add" v-if="propsdata.career_03!=null">
                                    <th></th>
                                    <td>{{propsdata.career_03}}</td>
                                </tr>
                                <tr>
                                    <th>SNS</th>
                                    <td>{{propsdata.sns}}</td>
                                </tr>
                                <tr>
                                    <th>소속사</th>
                                    <td>{{propsdata.company_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="typeinfo">
                        <div class="feedback-star-font-box">
                            <span class="feedback-star-font">피드백 별점</span>
                        </div>
                        <div class="feedbackBtnBox">
                            <button class="feedbackBtn" @click="writeFeedback(propsdata.expert_id, propsdata.name)">피드백 신청하기</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
      
    </div>
  </div>

</template>

<script>

export default {
  name: "ExpertDetail",
  props: ['propsdata'],
  methods: {
    writeFeedback(id,name) {
      this.$router.push({
        path: `/advice/create/${id}/${name}`
      });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    .expert-detail {
        min-width: 1185px;
        min-height: 400px;
        background-color: gray;
    }

    .detail_box {
        width: 100%;
        height: 50px;
    }

    .name {
        float: left;
        margin: 30px 0px 0px 50px;
    }

    .korean {
        display: inline-block;
        color: #fff;
        font-size: 22px;
        font-weight: bold;
        vertical-align: middle;
    }

    .profile_info {
        width: 100%;
        height: 350px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .profile {
        float: left;
        width: auto;
        height: auto;
        margin-top: 15px;
        padding-right: 40px;
    }

    .photo {
          width: 260px;
          height: 280px;
          margin-top: 10px;
          background-color: #656565;
          background-size: 150px;
          background-repeat: no-repeat;
          background-position: center;
    }

    img {
      width: 100%;
      height: 100%;
    }

    .info {
      float:right;
      width: 770px;
    }

    .close {
      float: right;
      margin: 30px 40px 0px 0px;
    }

    .box {
      height: 287px;
      border-top: 1px solid #666;
      border-bottom: 1px solid #666;
    }

    .expert-info-font{
        color:white;
        text-align: center;
        margin-bottom: 5px;
        margin-left: 30px;
    }

    
    .artistinfo_detail {
        overflow: hidden;
        width: 100%;
        padding: 40px 0 0 36px;
        box-sizing: border-box;
    }
    
    .infodetail {
        float: left;
        width: 360px;
        min-height: 260px;
        border-right: 1px solid #666;
        margin-left: 40px;
        margin-top: 5px;
    }
    
    .typeinfo {
        float: left;
        margin-left: 55px;
        width: 280px;
    }
    
    .feedbackBtnBox{
        text-align: center;
    }
    
    .feedbackBtn {
        width: 140px;
        height: 50px;
        border: none;
        background: #ed1c24;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        line-height: 1.3;
        vertical-align: middle;
    }
    
    .tbl_infodetail {
        margin-top: 14px;
    }
    
    .tbl_infodetail th {
        padding-bottom: 16px;
        color: #666;
        font-size: 12px;
        text-align: left;
    }
    
    .tbl_infodetail td {
        padding-bottom: 16px;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        padding-left: 10px;
    }
    
    .feedback-star-font-box {
        color:white;
        text-align: center;
        height:200px;
        margin-top:14px;
    }

</style>
