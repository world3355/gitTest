<template>
  <div>
    <b-table striped hover :items="items" :per-page="perPage" :current-page="currentPage" :fields="fields"
      @row-clicked="rowClick">
      
    <template v-slot:cell(reply)="data">
      <b-badge variant="primary" v-if="data.item.reply===true">답변완료</b-badge>
      <b-badge variant="secondary" v-else>미답변</b-badge>
    </template>

      
    </b-table>
    <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" align="center"></b-pagination>

      <b-table-column>
        <b-badge variant="primary" v-if="reply==true">답변완료</b-badge>
        <b-badge variant="secondary" v-else>미답변</b-badge>
      </b-table-column>
  </div>






</template>

<script>
import data from "./index.js";

export default {
  name: "AdviceList",
  data() {

    let contentItems = data.Content.sort((a, b) => {
      return b.content_id - a.content_id;
    }); // 내림차순

    let items = contentItems.map(contentItem => {
      return {
        ...contentItem,
        user_name: data.User.filter(userItem => {
          return contentItem.user_id === userItem.user_id;
        })[0].name
      };
    });

    return {
      currentPage: 1, 
      perPage: 10, 
      // bootstrap b-table 필드 
      fields: [
        {
          key: "content_id",
          label: "번호"
        },
        {
          key: "title",
          label: "제목"
        },
        {
          key: "created_at",
          label: "작성일"
        },
        {
          key: "reply",
          label: "답변"
        }
      ],
      items: items
    };
  },
  methods: {
    rowClick(item, index, e) {
      this.$router.push({
        path: `/advice/detail/${item.content_id}`
      });
    },
    writeContent() {
      this.$router.push({
        path: `/board/create`
      });
    }
  },
  computed: {
    rows() {
      return this.items.length;
    }
  }
};

</script>


<style scoped>

</style>>