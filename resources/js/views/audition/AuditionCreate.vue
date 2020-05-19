<template>
    <div id="form_input">
        <!-- 수정 시 -->
        <form v-if=cid v-on:submit.prevent="updateAudition">
            <div id="form_header">
                <b-form-input id="title" v-model="editAuditionData.title" placeholder="제목을 입력해주세요"></b-form-input>
            </div>
            <!-- <div class="invalid-feedback" v-if="errors.title">{{errors.title[0]}}</div> -->

            <div id="selct_area">
                <div class="select_item">
                    <b-form-datepicker v-model="editAuditionData.date" placeholder="마감기한 설정" id="example-datepicker" class="mb-2"></b-form-datepicker>
                </div>
                <div class="select_item">
                    <div>
                        <b-form-select v-model="editAuditionData.selected" :options="options"></b-form-select>
                    </div>
                </div>
                <label style="margin-left:20px">템플릿 선택: </label>
                <div class="select_item">
                    <input type="file" v-on:change="editAttachImage" ref="editAuditionImage" class="form-control " id="image">
                </div>
                <label>영상과제: </label>
                <!-- <div class="invalid-feedback" v-if="errors.image">{{errors.image[0]}}</div> -->
                <div class="select_item">
                    <b-form-input id="video" v-model="editAuditionData.video" placeholder="링크를 삽입해주세요"></b-form-input>
                </div>
            </div>
            <div >
                <img v-if="state" class="w-150px" :src="`${$store.state.serverPath}/storage/${editAuditionData.image}`" ref="editAuditionImageDisplay">
            </div>
            <b-form-textarea
                id="textarea-rows"
                v-model="editAuditionData.content"
                placeholder="내용을 입력해주세요"
                rows="22"
            >

            </b-form-textarea>
            <!-- 업데이트 모드가 트루일 경우(수정일 경우) updateContent 호출 , 업데이트 모드가 아닐 경우는 저장 -->
            <b-button type="submit" variant="primary">수정완료</b-button>
            <b-button variant="danger" @click="cancle">취소</b-button>
        </form>

        <!-- 생성 시 -->
        <form v-else v-on:submit.prevent="createAudition">
            <div id="form_header">
                <b-form-input id="title" v-model="auditionData.title" placeholder="제목을 입력해주세요"></b-form-input>
            </div>
            <!-- <div class="invalid-feedback" v-if="errors.title">{{errors.title[0]}}</div> -->

            <div id="selct_area">
                <div class="select_item">
                    <b-form-datepicker v-model="auditionData.date" placeholder="마감기한 설정" id="example-datepicker" class="mb-2"></b-form-datepicker>
                </div>
                <div class="select_item">
                    <div>
                        <b-form-select v-model="auditionData.selected" :options="options"></b-form-select>
                    </div>
                </div>
                <label style="margin-left:20px">템플릿 선택: </label>
                <div class="select_item">
                    <input type="file" v-on:change="attachImage" ref="newAuditionImage" class="form-control " id="image">
                </div>
                <label>영상과제: </label>
                <!-- <div class="invalid-feedback" v-if="errors.image">{{errors.image[0]}}</div> -->
                <div class="select_item">
                    <b-form-input id="video" v-model="auditionData.video" placeholder="링크를 삽입해주세요"></b-form-input>
                </div>
            </div>
            <div v-if="auditionData.image.name">
                <img class="w-150px" src="" ref="newAuditionImageDisplay">
            </div>
            <b-form-textarea
                id="textarea-rows"
                v-model="auditionData.content"
                placeholder="내용을 입력해주세요"
                rows="22"
            >

            </b-form-textarea>
            <!-- 업데이트 모드가 트루일 경우(수정일 경우) updateContent 호출 , 업데이트 모드가 아닐 경우는 저장 -->
            <b-button type="submit" variant="primary">저장</b-button>
            <b-button variant="danger" @click="cancle">취소</b-button>
        </form>  
    </div>
</template>

<script>
import * as auditionService from '../../services/audition_service';
export default {
    name:'AuditionCreate',
    data() {
        return {
            auditionData:{
                title:'',
                content: '',
                userId: 1,
                date:'',
                image:'',
                selected:'',
                video:'',
            },
            editAuditionData:{
                title: '',
                content: '',
                image: '',
            },
            cid:'',
            errors:{},
            state:false,
            
        options: [
          { value: null, text: '랭크 설정' },
          { value: 'A랭크 이상', text: 'A랭크 이상' },
          { value: 'B랭크 이상', text: 'B랭크 이상' },
          { value: 'C랭크 이상', text: 'C랭크 이상' },
          { value: '랭크무관', text: '랭크무관' },
            ]
        }
    },

    created(){
        if (this.$route.params.contentId > 0) {
            this.cid = Number(this.$route.params.contentId);
            this.loadDetailAudition();
        }
    },

    methods:{
        // 사진첨부
        attachImage(){

            this.auditionData.image=this.$refs.newAuditionImage.files[0];

            let reader = new FileReader();

            reader.addEventListener('load',function(){
                this.$refs.newAuditionImageDisplay.src=reader.result;
            }.bind(this),false);

            reader.readAsDataURL(this.auditionData.image);
        },

        //오디션 만들기
        createAudition: async function(){
            let formData=new FormData();
            formData.append('title',this.auditionData.title);
            formData.append('date',this.auditionData.date);
            formData.append('content',this.auditionData.content);
            formData.append('image',this.auditionData.image);
            formData.append('selected',this.auditionData.selected);
            console.log(...formData);

            try{
                const response=await auditionService.createAudition(formData);

                this.flashMessage.success({
                    message: '성공했다 !!!!!!!',
                    time:5000
                });

                history.back();
                
            }catch(error){
                console.log(error.response.status);
                switch (error.response.status) {
                    case 422:
                        this.errors=error.response.data.errors;
                        break;
                
                    default:
                        this.flashMessage.error({
                            message: '문제가 발생!',
                            time:5000
                        });
                }
            }
        },

        // 수정 데이터 로드
        loadDetailAudition: async function(){
            try{
                const response=await auditionService.loadDetailAudition(this.cid);
                this.editAuditionData=response.data;
                this.state=true;
            }catch(error){
                this.flashMessage.error({
                    message: 'ㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇㅇ',
                    time:5000
                });
            }
        },
        // 사진첨부
        editAttachImage(){
            this.editAuditionData.image=this.$refs.editAuditionImage.files[0];

            let reader = new FileReader();

            reader.addEventListener('load',function(){
                this.$refs.editAuditionImageDisplay.src=reader.result;
            }.bind(this),false);

            reader.readAsDataURL(this.editAuditionData.image);
        },

        // 수정사항 저장
        updateAudition: async function(){
            let formData=new FormData();
            console.log(...formData);
                formData.append('title',this.editAuditionData.title);
                formData.append('content',this.editAuditionData.content);
                formData.append('image',this.editAuditionData.image);
                formData.append('_method','put');
                console.log(...formData);
            try{
                const response=await auditionService.updateAudition(this.editAuditionData.id,formData);
                this.flashMessage.success({
                    message: '성공했다 !!!!!!!',
                    time:5000
                });

                history.back();
            
            }catch(error){
                this.flashMessage.error({
                            message: error.response.status,
                            time:5000
                        });
            }
        },

        // 저장 시
        uploadContet(){
            // let items=data.Content.sort((a,b)=>{return b.content_id-a.content_id})
            // const content_id=items[0].content_id+1

            // data.Content.push({
            //     content_id:content_id,
            //     user_id:this.userId,
            //     title:this.subject,
            //     context:this.context,
            //     created_at:this.createdAt,
            //     date:this.date,
            //     sub_image:this.sub_image,
            //     video:this.video,
            //     rank:this.selected,
            //     updated_at:null,
            //     })
            //     this.$router.push({
            //     path:'/board/free'
            //     })
            },
        
        // 수정 후 저장시
        // updateContent(){
        //     this.updateObject.title=this.subject;
        //     this.updateObject.context=this.context;
        //     this.updateObject.date = this.date;
        //     this.updateObject.rank = this.selected;
        //     this.updateObject.sub_image=this.sub_image;
        //     this.updateObject.video=this.video;
            
        //     this.$router.push({
        //         path:'/board/free'
        //     })
        // },
        // uploadImage(e){
        //     let file=e.target.files;
        //     let reader=new FileReader();

        //     reader.readAsDataURL(file[0]);
        //     reader.onload=e=>{
        //         this.sub_image=e.target.result;
        //     }
        // },
        cancle(){
            this.$router.push({
                path:'/board/free'
            })
        }
    }
}
</script>

<style>
    #form_input{
            width: 1400px;
            margin-left: 160px;
            margin-top: 20px;
        }

    #select_area{
        width: 2200px;
        float: left;
        margin:0;
        padding:0;
    }

    .select_item{
        width: 300px;
        display: inline-block;
        margin: 0 0 0 0;
        padding: 0 0 0 0;
    }

    /* 제목 */
    #title{
        height: 60px;
    }

    /* 날짜 */
    .b-form-datepicker {
        width: 300px;
        margin:0 0 0 0;
        }

</style>