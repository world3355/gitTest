<template>
<div id="result_container">
  <div id="result_left">
      <h2 id="result_title">참 잘했어용! ! !</h2>
      <h2 id="result_score">26400점</h2>
      <b-progress id="result_graph" :value="78" variant="success" striped :animated="animate"></b-progress>
      <h3 id="result_ranking">23위</h3>
      <div id="button_area">
        <b-button id="review" class="resultbutton">내춤보기</b-button>
        <b-button id="replay" class="resultbutton">재도전</b-button>
        <b-button id="end" class="resultbutton">끝내기</b-button>
      </div>
  </div>
  <div id="result_right">
    <h3 id="ranking_title">랭킹</h3>
    <b-form-group>
      <b-form-radio-group
        id="btn-radios-1"
        v-model="selected"
        :options="options"
        buttons
        name="radios-btn-default"
      ></b-form-radio-group>
    </b-form-group>
    <b-list-group>
        <b-list-group-item class="d-flex justify-content-between align-items-center">
            <b-badge href="#" variant="danger">1위</b-badge>
            <h3>주앙수엉혀언</h3>
            <h5>65400점</h5>
        </b-list-group-item>

        <b-list-group-item class="d-flex justify-content-between align-items-center">
            <b-badge href="#" variant="warning">2위</b-badge>
            <h3>종송횽</h3>
            <h5>65400점</h5>
        </b-list-group-item>

        <b-list-group-item class="d-flex justify-content-between align-items-center">
            <b-badge href="#" variant="primary">3위</b-badge>
            <h3>장성현</h3>
            <h5>65400점</h5>
        </b-list-group-item>
    </b-list-group>
  </div>
</div>
</template>

<script>
export default {
    data() {
      return {
        animate: true,
        selected: 'month_ranking',
        options: [
          { text: '월간', value: 'month_ranking' },
          { text: '주간', value: 'week_ranking' },
          { text: '일간', value: 'day_ranking' }
        ]
      }
    }
}
</script>

<style>
    #result_title{
        margin-top: 30px;
    }

    #result_score{
        margin-top: 50px;
    }

    #result_ranking{
        margin-top: 20px;
    }
    #result_container{
        width: 100%;
        margin-top: 50px;
        border: 1px sollid gray;
        
    }
    #result_left{
        width:45%;
        height: 400px;
        display: inline-block;
        border:10px solid gray;
    }

    #result_graph{
        
        margin-left: 10%;
        background: #d3d3d3;
        width: 80%;
        height: 50px;
    }


    #result_right{
        width:45%;
        height: 400px;
        display: inline-block;
        vertical-align: top;
        border:10px solid gray;
    }

    #btn-radios-1{
        width: 80%;
    }

    #ranking_title{
        margin-top: 30px;
    }

    #button_area{
        width: 100%;
        margin-top:5%;
    }

    .resultbutton{
        width:30%;
        
        vertical-align: top;
    }


</style>