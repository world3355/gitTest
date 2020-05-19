<template>
  <div id="sign_container">
    <form id="sign_form" v-on:submit.prevent="createUser">
      <h2 class="title">기본정보를 등록하세요</h2>
      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>이름
          </h3>
        </div>
        <input type="text" class="form-control" placeholder="이름" v-model="userData.name" id="name" />
      </div>
      <br />

      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>아이디
          </h3>
        </div>
        <input type="text" class="form-control" placeholder="아이디" v-model="userData.userid" id="userid" />
      </div>
      <br />

      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>비밀번호
          </h3>
        </div>
        <input type="password" class="form-control" placeholder="비밀번호" v-model="userData.password" id="password" />
      </div>

      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>비밀번호 확인
          </h3>
        </div>
        <input type="password" class="form-control" placeholder="비밀번호 확인" />
      </div>

      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>주소
          </h3>
        </div>
        <input type="text" class="form-control" placeholder="주소" v-model="userData.address" id="address" />
      </div>

      <div>
        <div class="input_text">
          <h3 class="mform_stit">
            <span class="str">*</span>연락처
          </h3>
        </div>
        <input type="text" class="form-control" placeholder="연락처" v-model="userData.call_number" id="call_number" />
      </div>

      <!-- <div>
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
      </div>-->

      <!-- <div>
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
      </div>-->

      <div class="text-center mt-4">
        <button id="login_button" class="btn btn-indigo" type="submit">회원가입</button>
      </div>
    </form>
  </div>
</template>

<script>
import * as userService from "../../services/user.service";

export default {
  name: "user",
  data() {
    return {
      userData: {
        name: '',
        userid: '',
        password: '',
        address: '',
        call_number: '',
      }
    };
  },
  methods: {
    createUser: async function() {//request!
      let formData = new FormData();
      formData.append("name", this.userData.name);
      formData.append("userid", this.userData.userid);
      formData.append("password", this.userData.password);
      formData.append("address", this.userData.address);
      formData.append("call_number", this.userData.call_number);
      console.dir(formData);
      try {
        const response = await userService.createUser(formData);
        console.log(response);
        console.log('회원가입 성공~');
        // this.flashMessage.success({
        //   message: "Category stored successfully!",
        //   time: 5000
        // });
      } catch (error) {
        console.log(response);
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
  }
};
</script>

<style>
.title {
  color: #141414;
  font-size: 24px;
  margin-block-start: 0.83em;
  margin-block-end: 0.83em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}

#sign_container {
  width: 100%;
  text-align: center;
  align-content: center;
}

h3 {
  float: left;
  left: 0;
  font-weight: bold;
  margin-top: 14px;
  color: #141414;
  font-size: 12px;
}
.str {
  display: inline-block;

  width: 12px;
  color: #ed1c24;
  font-size: 14px;
  vertical-align: -2px;
}

.form-control {
  width: 380px;
  height: 40px;
  border: 1px solid #666666;
}
#sign_form {
  position: absolute;
  left: 40%;
  top: 10%;
}

#sign_title {
  color: #666666;
  font-size: 18px;
  text-align: center;
}

#login_button {
  width: 310px;
  height: 60px;
  background: #ed1c24;
  color: white;
}

.login_link {
  text-decoration: none;
  color: #141414;
  font-size: 12px;
}

#sign_text {
  margin-top: 63px;
  color: #141414;
  text-align: center;
}

#sign_up {
  color: #ed1c24;
}

.birth {
  width: 120px;
  height: 40px;
  display: inline-block;
  border: 1px solid #666666;
}

#birth_box {
  margin-top: 20px;
}

#gender_group {
  margin-top: 10px;
  margin-right: 270px;
}
</style>