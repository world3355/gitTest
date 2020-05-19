<template>
  <div class="advice">
    <!-- <b-table striped hover :feedbackList="feedbackList" :per-page="perPage" :current-page="currentPage" :fields="fields"
      @row-clicked="rowClick">
      
    <template v-slot:cell(feedbackList.answer)="feedbackList">
      <b-badge variant="primary" v-if="feedbackList.answer">답변완료</b-badge>
      <b-badge variant="secondary" v-else>미답변</b-badge>
    </template>

      
    </b-table>
    <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" align="center"></b-pagination> -->

    <div class="table-box">
      <table class="table" width="950">
        <colgroup>
          <col width="8%" />
          <col width="40%" />
          <col width="26%" />
          <col width="16%" />
        </colgroup>
        <thead>
            <tr class="top-border">
                <td class="cell_padding right-border">번호</td>
                <td class="cell_padding right-border">제목</td>
                <td class="cell_padding right-border">작성일</td>
                <td class="cell_padding">답변</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(feedbackList, index) in feedbackList" :key="index" @click="rowClick(feedbackList.id,feedbackList.expert_id)">
              <td class="cell_padding">{{feedbackList.id}}</td>
              <td>{{feedbackList.title}}</td>
              <td class="cell_padding">{{feedbackList.created_at}}</td>
              <td class="cell_padding">
                <b-badge variant="secondary" v-if="feedbackList.answer==null">미답변</b-badge>
                <b-badge variant="primary" v-else>답변완료</b-badge>
              </td>
            </tr>
        </tbody>
      </table>
    </div>


  </div>






</template>

<script>
import data from "./index.js";
import * as feedbackService from "../../services/feedback_service";

export default {
  name: "FeedbackList",
  data() {

    return {
      currentPage: 1, 
      perPage: 10, 
      fields: [
        {
          key: "id",
          label: "번호"
        },
        {
          key: "title",
          label: "제목"
        },
        {
          key: "created_at",
          label: "작성일"
        },
        {
          key: "answer",
          label: "답변"
        }
      ],
      feedbackList:[],
      feedbackData:{
                title : '',
                content : '',
                video : '',
                answer : '',
                answer_data : '',
                expert_id : '',
            },
      // items: items
    };
  },
  mounted(){
        this.loadFeedbackList();
  },
  methods: {
    loadFeedbackList: async function(){
            try{
                const response=await feedbackService.loadFeedbackList();
                console.log('응답내용',response.data);
                this.feedbackList.unshift(response.data);
                this.feedbackList=response.data; 
                console.log("데이터가 잘 왔는가 : ",this.feedbackList);


            }catch(error){
                this.flashMessage.error({
                    message: '데이터를 못받았음',
                    time:5000
             });
         }
     },
    rowClick(cid,eid) {
      this.$router.push({
        path: `/advice/detail/${cid}/${eid}`
      });
    },
    // writeContent() {
    //   this.$router.push({
    //     path: `/board/create`
    //   });
    // }
  },
  computed: {
    rows() {
      return this.feedbackList.length;
    }
  }
};

</script>


<style scoped>

    .advice {
      width: 100%;
      height: auto;
      margin-bottom:30px;
      display: flex;
      flex-direction: row;
      justify-content: center;
    }

    .table-box {
      width:950px;
    }

    table {
      width: 950px;
    }


    td:before {
        content: attr(data-label);
        float: left;
    }
 
 
    /* 
     * Let's add a little more styling to make the table look clean
     */
     table {
         border: 0;
     }
 
    table thead {
        background-color: lightgray;
    }
 
    table tr {
        margin-bottom: 30px;
    }

    .cell_padding {

      text-align:center;


    }

    /* .right-border {
      border-right: solid rgb(172, 172, 172) 2px;
      border-radius: 10px;

    } */

    .top-border {
      border-top: solid rgb(194, 193, 193) 3px;
    }



</style>>