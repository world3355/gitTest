<template>
    <!-- <div id="container"  v-on:play="play"> -->
        <div id="container">
        <video id="source-video" src="sample3.mp4" crossorigin="anonymous" style=" -moz-transform: scaleX(1);
        -o-transform: scaleX(1);
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
        ">
        </video>
        <!-- <img src="sample.jpg" id="source-video" height="1000"/>         -->

        <video id="webCam" width = "800" height="600" autoplay=""></video>
        <!-- <canvas id="canvas" width="800" height="600"> -->
        <div id="pannel">
            <p id="1"></p>
            <p id="2"></p>
            <p id="3"></p>
            <p id="4"></p>
            <p id="5"></p>
            <p id="6"></p>
            <p id="7"></p>
            <p id="8"></p>
            <p id="9"></p>
            <p id="10"></p>
            <p id="11"></p>
            <p id="12"></p>
            <button id="preview-btn" type="button">미리보기</button>
            <button id="testmode-btn" type="button" style="display:none">테스트</button>
            <button id="modal_open_btn" type="button">모달테스트</button>
            <!-- <button id="end-btn" type="button">끝내기</button> -->
            <router-link to="/" class="nav-link" exact>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>끝내기</span>
            </router-link>
         </div>
        <!-- </canvas> -->
        <div id="modal">
            <div class="modal_content">
                <h2>모달 창</h2>
                <p id="score">모달 창 입니다.</p>
                <button type="button" id="replay_btn">다시하기</button>
                <button type="button" id="exit_btn">나가기</button>
            </div>
            <div class="modal_layer"></div>
        </div>            
    </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/posenet"></script>
<script src="sample3.json"></script>
<script src="video.js"></script>
<script>
// export default {
//     mounted(){
//         this.$emit('play',false);
//     },
// }
</script>
<style>
    html, body {
        overflow: hidden;
        width:100%;
        height: 100%;
        margin: 0;
    }

    #container{
        width: 100%;
        height: 100%;
    }
    #canvas{
        position:relative;
    }
    #webCam{
        position: fixed;
        right:0;
        top:0;
        width:25%;
        height:40%;
        background-color: black;
        transform: rotateY(180deg);
        -webkit-transform:rotateY(180deg);
        -moz-transform:rotateY(180deg);
    }
    #source-video{
        position: fixed;
        left:0;
        top:0;
        width:75%;
        height:100%;
        background-color: black;
    }
    /* #canvas{ */
    #pannel{
        position: fixed;
        right: 0;
        bottom: 0;
        width: 25%;
        height: 60%;
        background: brown;
    }

    #start-btn{
        position: absolute;
        bottom:10px;
        left:20px;
    }

    #end-btn{
        position: absolute;
        bottom:10px;
        right: 20px;
    }
    #modal{
        position:relative;
        width: 100%;
        height: 100%;
        z-index:1;
        display: none;
    }
    #modal h2{
        margin:0;
    }
    #modal button{
        display:inline-block;
        width:100px;
        margin-left:calc(100% - 100px - 10px);
    }
    #modal .modal_content{
        width:300px;
        margin:100px auto;
        padding:20px 10px;
        background: #fff;
        border:2px solid #666;
    }
    #modal .modal_layer{
        position: fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0, 0, 0, 0.5);
        z-index: -1;
    }
</style>