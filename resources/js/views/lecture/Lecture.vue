<template>
  <div id="container">
    <!-- <b-table striped hover :items="items" :fields="fields" @row-clicked="rowClick"></b-table> -->
    <div>
        <b-list-group id="lecture-all" >

            <b-list-group-item id="lecture-set" href="#" active class="flex-column align-items-start" @click="rowClick(lecture)" v-for="(lecture,index) in lectures" :key="index">
                <div class="hovereffect lecture-image-box">
                    <img id="card-image" :src="`${$store.state.serverPath}/storage/${lecture.image}`" :alt="lecture.title">
                </div>
                <div class="lecture-info">
                    <div style="margin-top:12px">
                        <h5 sytle="lecture-title" class="mb-1">{{lecture.title}}</h5>
                    </div>
                    <div>
                        <b-badge pill variant="primary">장르: {{lecture.genre_name}}</b-badge>
                    </div>
                    <div>
                        <b-badge pill variant="success">난이도: {{lecture.level_name}}</b-badge>
                    </div>
                </div>
            </b-list-group-item>

        </b-list-group>
    </div>

    <b-button class="lecture-add-btn" variant="dark">댄스강의 등록</b-button>
  </div>
    
</template>

<script>
import * as lectureService from '../../services/lecture_service';

export default {
    name:'Lecture',
    data() {
        return {
            lectures:[],
            lectureData:{
                title:'',
                content:'',
                image:''
            },
        };
    },
    
    mounted(){
        this.loadLecture();
    },
    methods:{
        loadLecture: async function(){
            try{
                const response=await lectureService.loadLecture();
                this.lectures.unshift(response.data);
                this.lectures=response.data.data; 
                console.log(...this.lectures);
            }catch(error){
                this.flashMessage.error({
                    message: '에러가 발생했습니다!',
                    time:5000
                });
            }
        },
        rowClick(item, index, e) {
            this.$router.push({
                path: `/lecturePlay/${item.id}`
            })
        },
        // writeContent(){
        //     this.$router.push({
        //         path:'/lecturecreate'
        //     })
        // },
    }
};
</script>
    
<style>


    .hovereffect:hover img {
        opacity: 0.6;
        filter: alpha(opacity=60);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
        }

        .hovereffect:hover .overlay:before
         {
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

    #lecture-all {
        width: 1100px;
        display: inline-block;
        margin-top:40px;
        padding:0;
    }

    #lecture-set {
        width: 250px;
        height: 250px;
        float: left;
        color: black;
        background-color: white;
        border: 1px solid #ced4da;
        padding: 0 0 0 0;
        margin-left: 20px;
        margin-top: 60px;
        border-radius:5px;
    }

    .lecture-image-box {
        width: 250px;
        height: 150px;
    }

    .lecture-image-box > img {
        width: 100%;
        height:100%;
    }

    .lecture-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lecture-title {
        font-size:25px;
        font-weight:100;
    }

    .lecture-add-btn {
        margin-top:60px;
        width:200px;
        height:60px;
        margin-top:50px;
    }
    
</style>