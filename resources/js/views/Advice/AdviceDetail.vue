<template>
  <div class="advice-detail"> 


    <div class="card-box">
      <b-card>
        <div class="content">
          <div class="content-detail-content-info">
              <div class="content-detail-content-info-left">
                <img src="../../../../public/images/i.png" alt="" width="70px" height="70px">
                <div class="name">{{feedbackDetail.name}}</div>
              </div>
          </div>      
          <div class="content-detail-content">{{feedbackDetail.content}}</div>
        </div>    
      </b-card>
    </div>


    <div class="card-box" v-if="feedbackDetail.answer==null">
      <b-card>
        <div class="content content-reply">
          <div class="content-null">
            <h1>작성된 피드백이 없습니다.</h1>
            <b-button class="update-btn" @click="updateFeedback(cid,eid)">피드백 작성하기</b-button>
          </div>
        </div>
      </b-card>
    </div>

    <div class="card-box" v-else>
      <b-card>
        <div class="content content-reply">
          <div class="content-detail-content-info">
              <div class="content-detail-content-info-left">
                <img src="../../../../public/images/i.png" alt="" width="70px" height="70px">
                <div class="name">{{expertDetail.name}}</div>
              </div>
          </div>
          <div class="content-detail-content">{{feedbackDetail.answer}}</div>
        </div>
      </b-card>
    </div>


  </div>
</template>

<script>
import data from "./index.js";
import * as feedbackService from "../../services/feedback_service";

export default {
  name: "AdviceDetail",
  data() {
    const contentId = Number(this.$route.params.contentId);
    const expertId = Number(this.$route.params.expertId);
    return {
      feedbackDetail:[],
      expertDetail:[],
      cid: contentId,
      eid: expertId,
      };
  },
  mounted(){
        this.loadDetailFeedback();
  },
  methods: {
     loadDetailFeedback: async function(){
            try{
                const response=await feedbackService.loadDetailFeedback(this.cid, this.eid);
                console.log('피드백 디테일 정보',response.data[0]);
                console.log('전문가 디테일 정보',response.data[1]);
                this.feedbackDetail.unshift(response.data[0]);
                this.feedbackDetail=response.data[0]; 
                this.expertDetail.unshift(response.data[1]);
                this.expertDetail=response.data[1]; 


                console.log("데이터가 잘 들어갔는가 : ",this.feedbackDetail);
                console.log("데이터가 잘 들어갔는가 : ",this.expertDetail);


            }catch(error){
                this.flashMessage.error({
                    message: '데이터를 못받았음',
                    time:5000
             });
         }
     },
     updateFeedback(id,eid) {
      this.$router.push({
        path: `/advice/update/${id}/${eid}`
      });
    }
  }
};
</script>
<style scoped>

.advice-detail {
      width: 100%;
      height: auto;
      margin-bottom:30px;
      display: flex;
      flex-direction: column;
      align-items: center;
}
.card-box {
  width:850px;
}

.content-reply {
  background-color:rgb(233, 233, 233);
}

.content-detail-content-info {
  display: flex;
  justify-content: space-between;
}

.content-detail-content-info-left {
  width: 190px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  margin-left:20px;
  margin-top:10px;
}

.content-detail-content-info-right {
  width: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 1rem;
}

.name{
  font-size:20px;
  margin-bottom:10px;
}

.content-detail-content {
  margin-top: 1rem;
  padding-top: 1rem;
  height:auto;
  min-height: 300px;
  font-size: 2em;
  margin:10px 30px 30px 30px;
}

.content-detail-button {
  border: 1px solid black;
  margin-top: 1rem;
  padding: 2rem;
}

.content-detail-comment {
  border: 1px solid black;
  margin-top: 1rem;
  padding: 2rem;
}

.content-null{
  height:300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.content-null > h1 {
  font-weight: bold;
  font-size: 40px;
}

.update-btn {
  margin-top:20px;
}
</style>