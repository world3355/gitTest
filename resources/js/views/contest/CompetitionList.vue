<template>
  <div>
    <h1>{{items.user_id}}</h1>
    <!-- <b-table striped hover :items="items" :fields="fields" @row-clicked="rowClick"></b-table> -->
    <b-list-group id="items" >
        <b-list-group-item id="item" href="#" active class="flex-column align-items-start" v-for="(items) in items" :key="items.name">
            <div class="hovereffect">
                <img id="card-image" :src="items.sub_image">
            </div>
            <div style="margin-top:12px">
                    <h5 sytle="margin-top:10px" class="mb-1">{{items.title}}</h5>
                </div>
            <div id="ranklist">
                <b-list-group>
                    <b-list-group-item class="d-flex justify-content-between align-items-center">
                        <b-badge href="#" variant="danger">1위</b-badge>
                        <h6>주앙수엉혀언</h6>
                        <h6>65400점</h6>
                    </b-list-group-item>

                    <b-list-group-item class="d-flex justify-content-between align-items-center">
                        <b-badge href="#" variant="warning">2위</b-badge>
                        <h6>주앙수엉혀언</h6>
                        <h6>65400점</h6>
                    </b-list-group-item>

                    <b-list-group-item class="d-flex justify-content-between align-items-center">
                        <b-badge href="#" variant="primary">3위</b-badge>
                        <h6>주앙수엉혀언</h6>
                        <h6>65400점</h6>
                    </b-list-group-item>
                </b-list-group>
            </div>
        </b-list-group-item>
    </b-list-group>
  </div>
    
</template>

<script>
import data from '@/data'

export default {
    name:'CompetitionList',
    data() {
        // 게시판 최신 순 정렬
        let items = data.Content.sort((a,b) => {return b.content_id - a.content_id})

        // 유저 네임 속성 추가(게시판의 유저아이디와 데이터의 유저아이디가 동일 할 경우에)
        items = items.map(contentItem => {return {...contentItem, user_name: data.User.filter(userItem => userItem.user_id === contentItem.user_id)[0].name}})
        
        return {
            // 게시글의 보여주고싶은 필드 보이도록 설정
            fields:[
                {
                    key:'content_id',
                    label:'글번호'
                },
                {
                    key:'title',
                    label:'제목'
                },
                {
                    key:'created_at',
                    label:'작성일'
                },
                {
                    key:'user_name',
                    label:'글쓴이' 
                }
            ],
            items:items
        };
    },
};
</script>
    
<style>

    #ranklist{
        width:300px;
        height: 300px;
        margin-left: 10%;
    }

    .d-flex{
        height: 30px;
    }


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

    #items{
        width: 1800px;
        display: inline-block;
        margin:0;
        padding:0;
    }

   #item{
        width: 400px;
        height: 500px;
        float: left;
        color: black;
        background-color: white;
        border-color: white;
        margin: 0 0 0 0;
        padding: 0 0 0 0;
        margin-left: 20px;
        margin-top: 50px;
       
    }

    #card-image{
        margin-top:3px;
        width: 350px;
        height: 400px;
    }
</style>