<template>
  <div id="container">
    <video
      ref="video"
      id="source-video"
      :src="video"
      v-on:ended="endedVideo()"
      v-bind:controls="computedVideoControls"
      crossorigin="anonymous"
      style=" -moz-transform: scaleX(1);
        -o-transform: scaleX(1);
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
        "
    ></video>
    <!-- <img src="sample.jpg" id="source-video" height="1000"/>         -->

    <video ref="webcam" id="webCam" width="800" height="600" autoplay v-on:play="bindPage()"></video>
    <!-- <canvas id="canvas" width="800" height="600"> -->
    <div id="pannel">
      <button id="preview_btn" type="button" v-on:click="modeChange()">{{computedModeChangeHtml}}</button>
      <button id="modal_open_btn" type="button" v-on:click="modalChange()">모달테스트</button>
      <!-- <button id="end-btn" type="button">끝내기</button> -->
      <router-link to="/audition" class="nav-link" exact>
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <button id="end_btn">끝내기</button>
      </router-link>
    </div>

    <!-- 이거가 -->
    <div id="modal" v-bind:style="{display:computedDisplay}">
      <div class="modal_content">
          <div id="result_left">
              <div id="left_content">
              <h2 id="result_title">참 잘했어용! ! !</h2>
              <h2 id="result_score">{{computedFinalScore}}점</h2>
              <b-progress id="result_graph" :value="78" variant="success" striped :animated="animate"></b-progress>
            </div>
          </div>
          <div id="result_right">
            <img src="../../../../public/images/logo.jpg" width="200px" height="41px" style="margin-top:50px;margin-left:60px;margin-bottom:30px">
            <button id="result_replay" type="button" v-on:click="modalChange()">다시하기</button>
            
              <button id="result_end" style="margin-top:5px;" v-on:click="apply()">지원하기</button>
          </div>
        </div>

      <!-- <div class="modal_content">
        <h2>이거맞나</h2>
        <p>{{computedFinalScore}}</p>
        <button type="button" id="replay_btn" v-on:click="modalChange()">다시하ㅇㅇ기</button>

        <router-link to="/lecture" class="nav-link" exact>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <button id="end_btn">끝내기</button>
        </router-link>

      </div>-->

      <div class="modal_layer"></div>
    </div>
  </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/posenet"></script>
<script src="video.js"></script>
<script>
import * as lectureService from "../../services/lecture_service";
import axios from "axios";
export default {
  name: "LecturePlay",
  data() {
    const lectureId = Number(this.$route.params.id);
    const cal = require("../../../../public/js/calculation.js");
    return {
      animate: true,
      id: lectureId,
      cid:'',
      filename: "",
      video: "",
      videoData: null,
      webcam: "",
      modalDisplay: "none",
      videoControls: false,
      ready: true,
      net: null,
      started: false,
      startTime: null,
      danceData: [],
      totalScore: 0,
      finalCount: 0,
      loop: null,
      cal: cal,
      finalScore: 0,
      ended: false
      // data:{
      //     'title' => '매우쉬운 아이돌 댄스',
      //     'content' => '이거슨 쉬운 아이돌 댄스입니다잉',
      //     'video' => 'sample',
      //     'image' => 'LectureImg/01.jpg',
      //     'genre_id' => 1,
      //     'level_id' => 1,
      // }
    };
  },
  mounted() {
    this.cid = Number(this.$route.params.contentId);
    const constraints = (window.constraints = {
      audio: false,
      video: true
    });

    navigator.mediaDevices
      .getUserMedia(constraints)
      .then(stream => {
        this.$refs.webcam.srcObject = stream;
      })
      .catch(error => {
        alert("웹캠을 인식할 수 없어용~!");
      });

    this.loadLectureData();
  },
  computed: {
    computedDisplay: function() {
      return this.modalDisplay;
    },
    computedVideoControls: function() {
      return this.videoControls;
    },
    computedModeChangeHtml: function() {
      if (this.videoControls) return "테스트";
      else return "미리보기";
    },
    computedFinalScore: function() {
      return this.finalScore;
    }
  },
  methods: {
    loadLectureData: async function() {
      try {
        const response = await lectureService.loadLectureData(1);
        this.filename = response.data.video;
        this.video = "videos/" + "sample1"+ ".mp4";
        axios
          .get("videoDatas/" + "sample1" + ".json")
          .then(response => (this.videoData = response.data));
      } catch (err) {
        console.error(err);
      }
    },
    modalChange: function() {
      if (this.modalDisplay == "none") {
        this.modalDisplay = "block";
      } else {
        this.modalDisplay = "none";
      }
    },
    modeChange: function() {
      this.videoControls = !this.videoControls;
      this.ready = !this.ready;
      this.$refs.video.currentTime = 0;
      this.$refs.video.pause();
    },
    bindPage: async function() {
      this.net = await posenet.load();
      this.webcamReady();
    },
    webcamReady: async function() {
      this.net.dispose();
      this.net = await posenet.load();
      const pose = await this.net.estimateSinglePose(this.$refs.webcam);
      const poses = this.cal.getData(pose);

      let motionCircle = [
        -51.47224073047192,
        -130.79577367522916,
        -134.99166049100938,
        -53.90398220226736
      ];
      if (
        !this.start &&
        this.ready &&
        poses.leftUpperarm < motionCircle[0] + 20 &&
        poses.leftUpperarm > motionCircle[0] - 20 &&
        poses.leftForearm < motionCircle[1] + 20 &&
        poses.leftForearm > motionCircle[1] - 20 &&
        poses.rightUpperarm < motionCircle[2] + 20 &&
        poses.rightUpperarm > motionCircle[2] - 20 &&
        poses.rightForearm < motionCircle[3] + 20 &&
        poses.rightForearm > motionCircle[3] - 20
      ) {
        this.start = true;
        let d = new Date();
        this.startTime = d.getTime();
        this.$refs.video.play();
      }
      if (this.start) {
        let score = 0;
        let cnt = 0;
        let tmp = 0;
        let time = 0;
        let d = new Date();
        time = d.getTime() - this.startTime;
        let timing = Math.round(time / 200);
        if (timing >= this.videoData.length) {
          timing = this.videoData.length - 1;
        }
        for (let key in poses) {
          if (Math.abs(poses[key]) != 180 && poses[key] != 0) {
            tmp =
              100 -
              (this.cal.distance(poses[key], this.videoData[timing][key]) /
                180) *
                100;
            if (tmp < 0) tmp = 0;
            score += tmp;
            cnt++;
          }
        }

        this.danceData.push({ time, score: tmp });
        tmp = 0;
        if (cnt != 0) {
          tmp = 0;
          if (score != 0) tmp = score / cnt;
          this.totalScore += tmp;
          this.finalCount += 1;
        }
        console.log(tmp + "%");
      }
      if (!this.ended)
        this.loop = window.requestAnimationFrame(this.webcamReady);
    },
    endedVideo: async function() {
      if (this.start) {
        let tmp = this.totalScore / this.finalCount;
        this.finalScore = Math.round(tmp * 100) / 100;
        this.ended = true;
        // console.log(this.finalScore);

        // console.log(...formData);
        this.finalScore = tmp.toFixed(2);
        window.cancelAnimationFrame(this.loop);
        this.modalChange();

        try {
          const res = await lectureService.createScore(formData);
          // const res = await lectureService.createScore();
          console.log(res);
          console.log("플레이 데이터 저장 성공");

          // this.flashMessage.success({
          //   message: "Category stored successfully!",
          //   time: 5000
          // });
        } catch (error) {
          console.log(error);
          // switch (error.response.status) {
          //   case 422:
          //     this.errors = error.response.data.errors;
          //     break;
          //   default:
          //     this.flashMessage.error({
          //       message: "Some error occurred, Please try again!",
          //       time: 5000
          //     });
          //     break;
          // } 
        }
      }
    },

    // 페이지 넘기기
    apply(){
      let score=this.finalScore;
      let cid=this.cid;
      this.$router.push({
        path:`/auditionapply/${cid}/${score}`
      });
    }
  }
};
</script>
<style>


/* html, body {
        overflow: hidden;
        width:100%;
        height: 100%;
        margin: 0;
        z-index: 1000000;
    } */

#container {
  width: 100%;
  height: 100%;
}
#canvas {
  position: relative;
}
#webCam {
  position: fixed;
  right: 0;
  top: 0;
  width: 25%;
  height: 40%;
  background-color: black;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  z-index: 100000;
}
#source-video {
  position: fixed;
  left: 0;
  top: 0;
  width: 75%;
  height: 100%;
  background-color: black;
  z-index: 100000;
}
/* #canvas{ */
#pannel {
  position: fixed;
  right: 0;
  bottom: 0;
  width: 25%;
  height: 60%;
  background: brown;
}

#preview_btn {
  position: absolute;
  bottom: 10px;
  left: 20px;
}

#end_btn {
  position: absolute;
  bottom: 10px;
  right: 20px;
}
#modal {
  position: relative;
  background: white;
  width: 100%;
  height: 100%;
  z-index: 100001;
  display: none;
}
/* #modal h2 {
  margin: 0;
} */

#modal button {
  display: inline-block;
  width: 100px;
  margin-left: calc(100% - 100px - 10px);
}
#modal .modal_content {
  position: relative;
  width: 800px;
  margin: 100px auto;
  padding: 20px 10px;
  background: #fff;
  border: 2px solid #666;
}
#modal .modal_layer {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: -1;
}


  #result_title{
        margin-left: 50px;
    }

    #result_score{
        margin-left: 96px;
    }
    
    #left_content{
      margin-top:70px
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