<template>
    <div>


        <div class="feedback-create-page">
            <div class="feedback-create-form"> 


                <form v-if="aid > 0" v-on:submit.prevent="updateFeedback">
                    <div class="feedback-title-form">
                        <!-- <b-form-input class="feedback-title" placeholder="RE : {{feedbackData.title}}"></b-form-input> -->
                        <label class="feedback-title">RE : {{editFeedbackData.title}}</label>
                    </div>

                    <div class="feedback-info">
                        <label class="receiver">
                            <label>연습생 : </label>
                            <label>{{editFeedbackData.name}}</label>
                        </label>

                        <!-- <label class="video">
                            <label>첨부영상 : </label>
                            <div class="video-form">
                                <b-form-input id="video" v-model="feedbackData.video" placeholder="링크를 입력하세요"></b-form-input>
                            </div>
                        </label> -->
                    </div>

                    <b-form-textarea id="textarea-rows" v-model="editFeedbackData.answer" placeholder="내용을 입력해주세요" rows="22"></b-form-textarea>

                    <div class="feedback-btn">
                        <b-button class="feedback-send-btn" type="submit" variant="primary">보내기</b-button>
                        <b-button variant="danger" @click="cancle">취소</b-button>
                    </div>

                </form> 



                <form v-else v-on:submit.prevent="createFeedback">
                    <div class="feedback-title-form">
                        <b-form-input class="feedback-title" v-model="feedbackData.title" placeholder="제목을 입력하세요"></b-form-input>
                    </div>

                    <div class="feedback-info">
                        <label class="receiver">
                            <label>전문가 : </label>
                            <label>{{this.$route.params.contentName}}</label>
                        </label>

                        <label class="video">
                            <label>첨부영상 : </label>
                            <div class="video-form">
                                <b-form-input id="video" v-model="feedbackData.video" placeholder="링크를 입력하세요"></b-form-input>
                            </div>
                        </label>
                    </div>

                    <b-form-textarea id="textarea-rows" v-model="feedbackData.content" placeholder="내용을 입력해주세요" rows="22"></b-form-textarea>

                    <div class="feedback-btn">
                        <b-button class="feedback-send-btn" type="submit" variant="primary">보내기</b-button>
                        <b-button variant="danger" @click="cancle">취소</b-button>
                    </div>

                </form>  

            </div>
        </div>


    </div>

    


</template>

<script>
import * as feedbackService from "../../services/feedback_service";
export default {
    name:'FeedbackCreate',
    data() {
        const articleId = Number(this.$route.params.articleId);
        const expertId = Number(this.$route.params.expertId);
        return {
            editFeedbackData:[],
            feedbackData:{
                title : '',
                content : '',
                video : '',
                answer : '',
                expert_id : '',
            },
            errors:{},
            state:false,
            aid:articleId,
            eid:expertId,
        }
    },
    created(){
        // if (this.$route.params.articleId > 0) {
        //     // this.aid = Number(this.$route.params.articleId);
        //     this.loadDetailFeedback();
        // }
    },
    mounted(){
        if (this.aid > 0) {
            // this.aid = Number(this.$route.params.articleId);
            this.loadDetailFeedback();
        }
        console.log(this.$route.params);
    },
    methods:{
        createFeedback: async function(){
            let formData=new FormData();
            formData.append('title',this.feedbackData.title);
            formData.append('content',this.feedbackData.content);
            formData.append('video',this.feedbackData.video);
            formData.append('answer',null);
            formData.append('answer_date',null);
            formData.append('expert_id',this.$route.params.contentId);
            // console.log(...formData);
            try{
                const response=await feedbackService.createFeedback(formData);
                // console.log("일단 요청은 성공적");

                history.back();
                
            }catch(error){
                console.log(error.response.data);
                switch (error.response.status) {
                    case 422:
                        this.errors=error.response.data.errors;
                        break; 
                    default:
                        this.flashMessage.error({
                            message: '안돼영',
                            time:5000
                        });
                }
            }
        },
        loadDetailFeedback: async function(){
            try{
                const response=await feedbackService.loadDetailFeedback(this.aid, this.eid);
                console.log('피드백 디테일 정보',response.data[0]);
                this.editFeedbackData.unshift(response.data[0]);
                this.editFeedbackData=response.data[0]; 
                // this.state=true;
            }catch(error){
                this.flashMessage.error({
                    message: '데이터 받기 실패',
                    time:5000
                });
            }
        },
        updateFeedback: async function(){
            let formData=new FormData();
            formData.append('title',this.editFeedbackData.title);
            formData.append('content',this.editFeedbackData.content);
            formData.append('video',this.editFeedbackData.video);
            formData.append('answer',this.editFeedbackData.answer);
            formData.append('answer_date',null);
            formData.append('expert_id',this.eid);
            formData.append('user_id',this.editFeedbackData.user_id);
            formData.append('_method','put');
            try{
                const response=await feedbackService.updateFeedback(this.aid,formData);
                console.log('업데이트성공');
                console.log(response.data);
                // console.log("업데이트한 내용", response.data);

                history.back();
                
            }catch(error){
                // console.log(error.response.data);
                switch (error.response.status) {
                    case 422:
                        this.errors=error.response.data.errors;
                        break; 
                    default:
                        this.flashMessage.error({
                            message: '보내기 실패',
                            time:5000
                        });
                }
            }
        },
        cancle(){
            this.$router.push({
                path:'/expert/list'
            })
        }
    }
}
</script>

<style>
    .feedback-create-page {
        width: 100%;
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .feedback-create-form {
        width: 800px;
    }

    .feedback-title-form {
        margin-bottom: 20px;
    }

    .feedback-info {
        height: 60px;
    }

    .video {
        float:right;
    }

    .video-form{
        width: 300px;
        display: inline-block;
        margin: 0 0 0 0;
        padding: 0 0 0 0;
    }

    .receiver {
        float:left;
        margin-top:8px;
        margin-left:5px;
    }

    .feedback-title{
        height: 60px;
    }

    .feedback-btn {
        margin-top : 30px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .feedback-send-btn {
        margin-right: 5px;
    }

</style>