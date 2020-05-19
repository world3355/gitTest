<template>
    <div id="list_container">
        <div id="button_area">
            <b-form-group>
            <b-form-radio-group
                id="btn-radios-2"
                v-model="selected"
                :options="options"
                buttons
                button-variant="outline-primary"
                size="lg"
                name="radio-btn-outline"
            ></b-form-radio-group>
            </b-form-group>
        </div>

        <div id="user_area">
            <b-table striped hover :items="items"></b-table>
        </div>

    </div>    
</template>

<script>
export default {
     data() {
      return {
        selected: 'radio1',
        options: [
          { text: '일반회원', value: 'user' },
          { text: '기업회원', value: 'company_user' }
        ],
        items: [
          { No: 40, 이름: '좡성현', 허가여부: 'Y',랭크:'A',등급:'연습생',수정하기:'' },
          { No: 21, 이름: '즈앙성혀언', 허가여부: 'Y',랭크:'A',등급:'연습생',수정하기:'' },
          { No: 89, 이름: '즈앙서엉혀언', 허가여부: 'N',랭크:'A',등급:'연습생',수정하기:'' },
          { No: 38, 이름: '즈앙스엉히으언', 허가여부: 'N',랭크:'A',등급:'연습생',수정하기:'' }
        ]
      }
    }
}
</script>

<style>
    #list_container{
        margin-top: 2%;
    }

    #button_area{
        float: left;
        margin-left: 1%;
    }
</style>