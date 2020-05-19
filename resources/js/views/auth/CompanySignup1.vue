<template>
<div id="sign_container">
    <form id="sign_form">
    
        <h2 class="title">기본정보를 등록하세요</h2>
        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>이름</h3>
            </div>
            <input type="text" class="form-control" placeholder="이름"/>
        </div>
        <br/>
        

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>이메일</h3>
            </div>
            <input type="text"  class="form-control" placeholder="이메일"/>
        </div>
        <br/>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>비밀번호</h3>
            </div>
            <input type="password" class="form-control" placeholder="비밀번호"/>
        </div>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>비밀번호 확인</h3>
            </div>
            <input type="password" class="form-control" placeholder="비밀번호 확인"/>
        </div>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>주소</h3>
            </div>
            <input type="text" class="form-control" placeholder="주소"/>
        </div>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>연락처</h3>
            </div>
            <input type="text" class="form-control" placeholder="연락처"/>
        </div>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>성별</h3>
            </div>
            <br/>
            <div>
                <b-form-group id="gender_group">
                    <b-form-radio-group
                        v-model="gender"
                        :options="options"
                        plain
                        name="plain-inline"
                    ></b-form-radio-group>
                </b-form-group>
            </div>
        </div>

        <div>
            <div class="input_text">
                <h3 class="mform_stit"><span class="str">*</span>생년월일</h3>
            </div>
            <br/>
            <div id="birth_box">
                <b-form-select 
                v-model="selected"
                :options="options"
                class="mb-3 birth"
                value-field="item"
                text-field="name"
                disabled-field="notEnabled"
                ></b-form-select>
                <b-form-select 
                v-model="selected"
                :options="options"
                class="mb-3 birth"
                value-field="item"
                text-field="name"
                disabled-field="notEnabled"
                ></b-form-select>
                <b-form-select 
                v-model="selected"
                :options="options"
                class="mb-3 birth"
                value-field="item"
                text-field="name"
                disabled-field="notEnabled"
                ></b-form-select>
            </div>
        </div>

        <div class="text-center mt-4">
            <router-link to="/companysignup2" id="sign_up" class="nav-link" exact>
                <button id="login_button" class="btn btn-indigo" type="submit">다음</button>
            </router-link>
        </div>
        
      
    </form>
</div>
</template>

<script>
export default {
    data() {
      return {
        selected: 'A',
        options: [
          { item: 'A', name: 'Option A' },
          { item: 'B', name: 'Option B' },
          { item: 'D', name: 'Option C', notEnabled: true },
          { item: { d: 1 }, name: 'Option D' }
        ],

        gender: 'first',
        options: [
          { text: '남성', value: 'man' },
          { text: '여성', value: 'women' },
        ]
      }
      
    }
}
</script>

<style>
.title{
    color: #141414;
    font-size: 24px;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}

#sign_container{
    width: 100%;
    text-align: center;
    align-content: center;
}

h3 {
    float: left;
    left:0;
    font-weight: bold;
    margin-top: 14px;
    color: #141414;
    font-size: 12px;
}
.str{
    display: inline-block;

    width: 12px;
    color: #ed1c24;
    font-size: 14px;
    vertical-align: -2px;
}

.form-control{
  width: 380px;
  height: 40px;
  border: 1px solid #666666;
  
}
#sign_form{
  position:absolute;
    left:40%;
    top:10%;
}

#sign_title{
  color: #666666;
  font-size: 18px;
  text-align: center
}


#login_button{
  width: 310px;
  height: 60px;
  background: #ed1c24;
  color: white;
}

.login_link{
  text-decoration: none;
  color: #141414;
  font-size: 12px;
}

#sign_text{
  margin-top: 63px;
  color: #141414;
  text-align: center;
}

#sign_up{
  color: #ed1c24;
}


.birth{
    width:120px;
    height: 40px;
    display: inline-block;
    border: 1px solid #666666;
}

#birth_box{
    margin-top: 20px;
}

#gender_group{
    margin-top: 10px;
    margin-right: 270px;
}
</style>