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

    <video ref="webcam" id="webCam" width="800" height="600" autoplay v-on:play="bindPage()"></video>
    <canvas id="canvas" width="800" height="600"/>
    <div id="pannel">
      <div id="pannel_content">
        <p>테스트를 시작하기전 자신의 모습이 인식이 잘 되는지 확인해주세요.</p>
        <p>주변에 옷이나 인식에 방해되는 요소를 제거해 주세요.</p>
        <hr/>
        <p>@댄스설명@</p>
        <p>{{content}}</p>
      </div>
      <div class="btn-bg bg-1">
        <div class="btn btn-1">
          <button id="preview_btn" type="button" v-on:click="modeChange()">{{computedModeChangeHtml}}</button>
          <!-- <button id="modal_open_btn" type="button" v-on:click="modalChange()">모달테스트</button> -->
          <!-- <button id="end-btn" type="button">끝내기</button> -->
          <router-link to="/lecture" class="nav-link" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <button id="end_btn">끝내기</button>
          </router-link>
        </div>
      </div>
    </div>

    <div id="modal" v-bind:style="{display:computedDisplay}">
      <div class="modal_content">
        <h2>테스트 결과</h2>
        <p id="accuracy_p">정확도 : {{computedFinalScore}}</p>
        <canvas id="chart" width = "800" height= "500"/>
        <button type="button" id="replay_btn" v-on:click="modalChange()">다시하기</button>
        <router-link to="/lecture" class="modal_end_btn" exact>
          <button id="modal_end_btn">끝내기</button>
        </router-link>
      </div>
      <div class="modal_layer"></div>
    </div>
  </div>
</template>
<script>
import * as lectureService from "../../services/lecture_service";
import axios from "axios";
import chartjs from 'chart.js';
export default {
  name: "LecturePlay",
  data() {
    const lectureId = Number(this.$route.params.id);
    const cal = require("../../../../public/js/calculation.js");
    let danceData = {time:[],score:[]};

    return {
      id: lectureId,
      content:"",
      filename: "",
      video: "",
      videoData: null,
      data:null,
      webcam: "",
      modalDisplay: "none",
      videoControls: false,
      ready: true,
      net: null,
      started: false,
      startTime: null,
      danceData: danceData,
      totalScore: 0,
      finalCount: 0,
      loop: null,
      cal: cal,
      finalScore: 0,
      ended: false,
      ctx: null,
      canvas: null,
      poses:[],
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
        const response = await lectureService.loadLectureData(this.id);
        this.content = response.data.content;
        this.filename = response.data.video;
        this.video = "videos/" + this.filename + ".mp4";
        axios
          .get("videoDatas/" + this.filename + ".json")
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

      var canvas = document.getElementById('canvas');
      var ctx = canvas.getContext('2d');
      this.canvas = canvas;
      this.ctx = ctx;
      this.webcamReady();
    },
    webcamReady: async function() {
      this.net.dispose();
      this.net = await posenet.load(
        // {architecture: 'MobileNetV1',
        // outputStride: 16,
        // inputResolution: { width: 640, height: 480 },
        // multiplier: 0.75}
      );
      const pose = await this.net.estimateSinglePose(this.$refs.webcam);
      const data = this.cal.getData(pose);
      this.poses.push(pose);

      let motionCircle = [
        -51.47224073047192,
        -130.79577367522916,
        -134.99166049100938,
        -53.90398220226736
      ];
      if (
        !this.start &&
        this.ready &&
        data.leftUpperarm < motionCircle[0] + 20 &&
        data.leftUpperarm > motionCircle[0] - 20 &&
        data.leftForearm < motionCircle[1] + 20 &&
        data.leftForearm > motionCircle[1] - 20 &&
        data.rightUpperarm < motionCircle[2] + 20 &&
        data.rightUpperarm > motionCircle[2] - 20 &&
        data.rightForearm < motionCircle[3] + 20 &&
        data.rightForearm > motionCircle[3] - 20
      ) {
        this.start = true;
        let d = new Date();
        this.startTime = d.getTime();
        this.canvas.style.display = 'none';
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
        for (let key in data) {
          if (Math.abs(data[key]) != 180 && data[key] != 0 && Math.abs(this.videoData[timing][key]) != 180 && this.videoData[timing][key] != 0) {
            tmp = 100 - (this.cal.distance(data[key], this.videoData[timing][key]) / 90) * 100;
            if (tmp < 0) tmp = 0;
            score += tmp;
            cnt++;
          }
        }

        tmp = 0;
        if (cnt != 0) {
          tmp = 0;
          if (score != 0) tmp = score / cnt;
          this.totalScore += tmp;
          this.finalCount += 1;
          this.danceData.time.push( time / 1000 );
          this.danceData.score.push( tmp );

        }
        console.log(tmp + "%");
      }else{
        console.log('asdf');
        this.draw(pose);
      }
      if (!this.ended)
        this.loop = window.requestAnimationFrame(this.webcamReady);
    },
    saveVideo: function(){
      var canvas = document.createElement('canvas');
    },
    endedVideo: async function() {
      if (this.start) {
        let tmp = this.totalScore / this.finalCount;
        this.finalScore = Math.round(tmp*100)/100;
        this.ended = true;
        // console.log(this.finalScore);

        let formData = new FormData();
        formData.append("accuracy", this.finalScore);
        formData.append("lecture_id", this.id);
        // console.log(...formData);
        this.finalScore = tmp.toFixed(2) + "%";
        window.cancelAnimationFrame(this.loop);
        console.log(this.danceData);
        var chartCanvas = document.getElementById('chart');
        var chart = new chartjs(chartCanvas,{
          label: '정확도',
          type: 'line',
          data: {
            labels:this.danceData.time,
            datasets:[{
              data: this.danceData.score,
            }],
//            backgroundColor:'rgba(255,201,14,1)',
           backgroundColor:'transpartent',
            // borderColor:'rgba(255,201,14,0.5)',
            borderColor:'orange',
            fill: true,
            lineTension:0
          },
          options:{
            responsive: false,
            scales: {
              yAxes:[{
                ticks:{
                  beginAtZero:true
                }
              }]
            }
          }
        });

        this.modalChange();
      
        try {
          const res = await lectureService.createScore(formData);
          console.log(res);
          console.log("플레이 데이터 저장 성공");
        } catch (error) {
          console.log(error);
        }
      }
    },
    draw: function(pose) {     
      this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
      var points = pose.keypoints;
      for(var key = 0; key < points.length; key++){
        if(points[key].score > 0.6){
          this.ctx.beginPath();
          this.ctx.arc(points[key].position.x,points[key].position.y,10,0,Math.PI*2);
          this.ctx.fill()
          this.ctx.stroke();
          this.ctx.closePath();
        }
      }
        this.ctx.fillStyle = "#0095DD";
    },
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
}
#pannel #pannel_content{
  padding: 20px;
}

#preview_btn {
  position: absolute;
  bottom: 10px;
  left: 20px;
  width: 120px;
  height: 50px;
}

#end_btn {
  position: absolute;
  bottom: 10px;
  right: 20px;
  width: 120px;
  height: 50px;
}
#modal {
  position: relative;
  width: 100%;
  height: 100%;
  z-index: 100002;
  display: none;
}
#modal h2 {
  margin: 0;
}
#modal button {
  display: inline-block;
  width: 100px;
  margin-left: calc(100% - 100px - 10px);
}
#modal .modal_content {
  position: relative;
  width: 800px;
  height: 600px;
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
#chart{
  position: absolute;
  left:50%;
  top:50%;
  transform: translate(-50%,-50%);
  width: 700px;
  height: 300px;
}

#canvas{
  position: fixed;
  right: 0;
  top: 0;
  width: 25%;
  height: 40%;
  border: 1px solid;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  z-index: 100001;
}

#replay_btn{
  position: absolute;
  right: 170px;
  bottom: 10px;
}
.modal_end_btn{
  position: absolute;
  height: 30px;
  width: 80px;
  right: 10px;
  bottom: 10px;
}


body .btn-bg {
  position: absolute;
  width: 100%;
  height: 15%;
  bottom:0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
body .btn-bg.bg-1 {
  background: #6ab1c9;
}
body .btn-bg.bg-1 .btn-1 button {
  color: #c7f8f9;
  background: transparent;
  border: 3px solid #c7f8f9;
  border-radius: 5px;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-transform: translate(0, 0);
  transform: translate(0, 0);
}
body .btn-bg.bg-1 .btn-1 button a {
  color: #c7f8f9;
}
body .btn-bg.bg-1 .btn-1 button:hover {
  background: #c7f8f9;
  color: #6ab1c9;
  border: 3px solid #6ab1c9;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
body .btn-bg.bg-1 .btn-1 button:hover >a {
  color: #6ab1c9;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
body .btn-bg.bg-1 .btn-1 button:active {
  -webkit-transform: translate(5px, 5px);
  transform: translate(5px, 5px);
}
#accuracy_p{
  font-size: 20px;
}

</style>