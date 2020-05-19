<template>
    <div class="container-fluid">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      
      <div class="row">
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header d-flex">
              <span>
                <i class="fas fa-chart-area mr-1"></i>카테고리 경영
              </span>
              <button class="btn btn-primary btn-sm ml-auto" v-on:click="showNewCategoryModal"><span class="fa fa-plus"></span>만들기</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <thead>
                            <tr>
                                <td>아이디</td>
                                <td>이름</td>
                                <td>사진</td>
                                <td>액션</td>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>장성현</td>
                            <td>이미지</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></button>
                                <button class="btn btn-primary btn-sm"><span class="fa fa-trash"></span></button>
                            </td>
                        </tbody>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>

      <b-modal ref="newCategoryModal" hide-footer title="새로운 카테고리를 추가">
        <div class="d-block">
          <form v-on:submit.prevent="createCategory">

            <div class="form-group">
              <label for="name">이름넣으삼</label>
              <input type="text" v-model="categoryData.name" class="form-control" aria-describedby="emailHelp" id="name" placeholder="카테고리 이름을 입력">
            </div>
            
            <div class="form-group">
              <label for="image">이미지를 선택하세여</label>
              <div v-if="categoryData.image.name">
                <img src="" class="w-150px" ref="newCategoryImageDisplay" />
              </div>
              <input type="file" v-on:change="attachImage" ref="newCategoryImage" class="form-control " id="image">
            </div>

            <hr>
            <div class="text-right">
              <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">취소</button>
              <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>저장</button>
            </div>

          </form>
        </div>
      </b-modal>

    </div>
</template>

<script>
import * as categoryService from '../services/category_service';
export default {
  name:'category',
  data(){
    return {
      categoryData:{
        name:'',
        image:'',
      }
    }
  },
  methods:{
    attachImage(){
      // 첨부된 파일을 data의 image속성에 저장
      this.categoryData.image=this.$refs.newCategoryImage.files[0];

      // 첨부된 파일을 읽음
      let reader=new FileReader();

      //파일이 로드되었을 경우에 reader에 로드된 것을 newCategoryImageDisplay에 띄움
      reader.addEventListener('load',function(){
        this.$refs.newCategoryImageDisplay.src=reader.result;
      }.bind(this),false);

      // categoryData에 저장된 image 속성의 데이터를 읽음
      reader.readAsDataURL(this.categoryData.image);
    },

    // 모달창 숨기기
    hideNewCategoryModal(){
      this.$refs.newCategoryModal.hide();
    },

    // 모달창 보이기
    showNewCategoryModal(){
      this.$refs.newCategoryModal.show();
    },

    // 저장버튼 클릭시
    createCategory: async function(){
      let formData = new FormData();
      formData.append('name', this.categoryData.name);
      formData.append('image', this.categoryData.image);

      try{
        const response = await categoryService.createCategory(formData);
        console.log(response);

      }catch(error){
        alert('안된다 시발');
      }
    }

  }
}
</script>