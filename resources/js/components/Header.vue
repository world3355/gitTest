<template>
  <div id="header">
    <div class="LoginNav">
      <!-- 로그인네비게이션-->
      <div class="LoginNavGroup">

        <div v-if="sessionData.state">
          <router-link to="/login" class="NavLink" exact>로그인</router-link>
        </div>
        <div v-if="!sessionData.state" id="logout_div">
          <a class="NavLink" id="logout" v-on:click="deleteSession">로그아웃</a>
        </div>
      </div>    
    </div>

    <nav class="ServiceNav">
      <a class="LogoImg">
        <em>
          <router-link to="/#" exact>
          <img src="../../../public/images/logo.jpg" width="200px" height="41px">
          </router-link>
        </em>
      </a>
      <ul class="ServiceNavGroup">
        <li>
          <router-link to="/lecture" class="NavLink" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>댄스강좌</span>
          </router-link>
        </li>
        <li>
          <router-link to="/#" class="NavLink" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>댄스경연</span>
          </router-link>
        </li>
        <li>
          <router-link to="/expert/list" class="NavLink" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>피드백</span>
            <ul class="navbar-nav ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a
                  class="dropdown-toggle"
                  id="userDropdown"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <router-link to="/advice/list" class="dropdown-item" exact>내 피드백 활동
                  </router-link>
                </div>
              </li>
            </ul>
          </router-link>
        </li>
        <li>
          <router-link to="/audition" class="NavLink" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>오디션</span>
          </router-link>
        </li>
        <li v-if="!sessionData.state">
          <router-link to="/mypage/profile" class="NavLink" exact>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>마이페이지</span>
          </router-link>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>
import * as sessionService from "../services/session.service";

export default {
  name: "session",
  data() {
    return {
      sessionData: {
        state: ""
      }
    };
  },
  mounted() {
    this.checkSession();
  },
  methods: {
    checkSession: async function() {
      try {
        const response = await sessionService.checkSession();
        console.log(response.data);
        this.sessionData.state = response.data;
        if(response.data){
          console.log("로그아웃 유지 중");
        } else {
          console.log("로그인 유지 중");
        }
        

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
    },
    deleteSession: async function() {
      try {
        const response = await sessionService.deleteSession();
        // console.log(response);
        // console.log("로그아웃 됨");

        location.href="/";

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
#header {
  width: 100%;
  height: auto;
  box-sizing: border-box;
  z-index: 5;
  display: block;
}

.LoginNav {
  height: 35px;
  font-size: 13px;
  color: #6c738a;
  z-index: 4;
  border-bottom: 1px solid rgb(157, 156, 156);
}

.LoginNavGroup {
  margin-right: 140px;
  display: flex;
  float: right;
}

.ServiceNav {
  margin-top: 10px;
  width: 100%;
  position: relative;
  display: flex;
  justify-content: space-between;
  padding: .5rem 1rem;
}

.LogoImg {
  margin-left: 120px;
  margin-top: 10px;
}

.ServiceNavGroup {
  margin-top:8px;
  margin-right: 120px;
  display: flex;
  float: right;
  list-style: none;
}

.ServiceNabGroup {
  margin-left : 35px;
}

li > a {
  color: black;
  text-decoration: none;
  transition: color .9s;
}

.NavLink {
  display: flex;
  padding: 0.5rem 1rem;
  font-weight: 700;
  font-size: 2vh;
}

.NavLink:hover {
  color: #f86941;
  text-decoration: none;
  transition:all 0.5s ease;
}

#logout_div {
}
#logout {
  color: #007bff;
  padding: 0.5rem 1rem;
  font-weight: 700;
  font-size: 2vh;
}
#logout:hover {
  color: #f86941;
  text-decoration: none;
  transition:all 0.5s ease;
  cursor: pointer;
}
</style>