<template>
  <!-- Material form login -->
  <div id="select_container" class="aligner">

    <div class="aligner-item">
        <h2 class="title">회원 종류를 선택해주세요</h2>
        <p class="mainform_txt type01">본인의 포지션을 선택하고 알맞은 서비스를 이용하세요.</p>
    </div>

    <div class="aligner-item">
      <ul class="radiochk_list">
          <li>
              <router-link to="/usersignup" id="sign_up" class="nav-link" exact>
                  <strong class="tit">일반용 회원</strong>
                  <span class="text">
                        댄스강좌를 수강하여<br>
                        댄스 실력을 향상시키고싶은 회원<br>
                        프로필을 완성하여<br>
                        댄서로 활동하고싶은 회원
                  </span>
              </router-link>
          </li>

          <li>
              <router-link to="/companysignup1" id="sign_up" class="nav-link" exact>
                  <strong class="tit">기업용 회원</strong>
                  <span class="text">
                      개인 또는 사업체 직원으로<br>
                      댄서를 찾고자 하는 회원<br>
                  </span>
              </router-link>
          </li>
      </ul>
    </div>
  </div>
    
  <!-- Default form login -->
  <!-- Material form login -->
</template>

<script>
export default {

}
</script>

<style scoped>
.title{
    width: 500px;
    text-align: center;
}
.aligner{
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.aligner-item{
  margin: 0 auto;
}

h2{
  font-weight: bold;
}

/* 부제목 */
.mainform_txt.type01 {
    line-height: 1.33;
    text-align: center;
}

.mainform_txt {
    width: 500px;
    margin-top: 21px;
    color: #666666;
    font-size: 18px;
    line-height: 1.33;
}

/* 회원선택 */

li{
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}

#select_container{
  margin-top: 5%;
}



.radiochk_list {
    overflow: hidden;
    width: 500px;
    list-style: none;
}

.radiochk_list .tit {
    display: block;
    color: #141414;
    font-size: 22px;
    font-weight: bold;
}

.radiochk_list .text {
    display: block;
    margin-top: 21px;
    color: #666;
    font-size: 12px;
    line-height: 1.67;
}

.radiochk_list li {
    float: left;
}

input[type='radio'] {
    display: none;
    position: absolute;
    width: 23px;
    height: 23px;
    margin: 0;
    opacity: 0;
    vertical-align: middle;
}

/* 체크됐을때 */
.radiochk_list li input[type="radio"]:checked + label {
    background: #fababd;
}

.radiochk_list li input[type="radio"] + label {
    position: relative;
    display: block;
    width: 237px;
    height: 300px;
    padding: 86px 0 0;
    box-sizing: border-box;
    background: #e7e7e7;
    
}

input[type="radio"] + label {
    color: #141414;
    font-size: 14px;
    font-weight: bold;
}

.radiochk_list li input[type="radio"] + label:after {
    position: absolute;
    left: 110px;
    top: 54px;
    content: " ";
    display: block;
    width: 17px;
    height: 17px;
}

#back_button{
  width: 152px;
  height: 48px;
  background: #b8b8b8;
  color: white;
}

#next_button{
  width: 152px;
  height: 48px;
  background: #ed1c24;
  color: white;
}

</style>