<template>
    <div class="expert-imgList">
      <div class="expert-item" v-for="(propsdata, index) in propsdata" :key="propsdata.userid" @click="active(index)"> 
        <div class="img-box">
          <img :src="`${$store.state.serverPath}/storage/${propsdata.image}`" alt="">
          <p class="text">{{propsdata.name}}</p>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: "ExpertItem",
  props: ['propsdata'],
  methods: {
    active(index) {
      var value = this.propsdata[index];
      this.$emit('active', value);
    }
  },
  data () {
    return{
    }
  }
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    .expert-item {
      min-width: 250px;
      min-height: 300px;
      border: 1px solid #ced4da;
      padding: 0 0 0 0;
      border-radius: 5px;
      margin : 30px;
    }

    .img-box {
      overflow:hidden;
      width:250px;
      height:300px;
      z-index: 4;
    }

    img {
      width: 100%;
      height: 100%;
      z-index: 3;
    }

    .expert-imgList {
      display: flex;
      flex-direction: row;
      justify-content: center;
    }
      
    .text {
      position: relative;
      bottom: 60px;
      left: 0;
      right: 0;
      width: 250px;
      height: 40px;
      padding-top: 11px;
      box-sizing: border-box;
      background: rgba(20, 20, 20, 0.7);
      color: #fff;
      font-size: 14px;
      font-weight: bold;
      text-align: center;
      z-index: 2;
    }
  
</style>
