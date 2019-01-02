<template lang="html">
  <div>
    <div class="post-container">
      <div class="post" v-for="post in posts" v-bind:key="post.id">
        <h3 class="post-title">{{ post.title }}</h3>
        <p class="post-paragraph">{{ post.body }}</p>
        <p class="post-date">{{ post.posted.date.slice(0, 16) }}</p>
      </div>
    </div>
    <div class="pagination">
      <a
        v-for="page in paginated"
        v-on:click.prevent="getNew(page.index)"
        :class="page.class"
        >{{ page.index }}</a
      >
    </div>
    <makepost-vue :socket="socket" :token="token" />
  </div>
</template>

<script>
import MakePost from "./MakePost.vue";
import { getPosts } from "../utils/fetch.js";
export default {
  nama: "posts",
  components: {
    "makepost-vue": MakePost
  },
  data() {
    return {
      posts: [],
      pagination: 0,
      currentPage: 1,
      socket: new WebSocket("ws://blog.local:1234")
    };
  },
  props: ["token"],
  mounted() {
    this.fetchPosts();
    const socket = this.socket;
    socket.addEventListener("message", this.newPost);
  },
  destroyed() {
    this.socket.close();
  },
  computed: {
    paginated() {
      const paginated = [];
      for (var i = 0; i < this.pagination; i++) {
        paginated.push({
          index: i + 1,
          class: i + 1 === this.currentPage ? "active" : "link"
        });
      }
      return paginated;
    }
  },
  methods: {
    fetchPosts(url) {
      getPosts({ token: this.token.access_token, url }).then(
        ({ data, meta: { last_page, current_page } }) => {
          this.posts = data;
          this.pagination = last_page;
          this.currentPage = current_page;
        }
      );
    },
    getNew(page) {
      if (page !== this.currentPage) {
        this.fetchPosts(`http://blog.local/api/posts?page=${page}`);
      }
    },
    newPost({ data }) {
      if (this.currentPage === 1) {
        const [one, two, three] = this.posts;
        this.posts = [JSON.parse(data), one, two, three];
      }
    }
  }
};
</script>

<style scoped lang="css">
.post-container {
  padding: 3rem 2rem;
  display: flex;
  flex-wrap: wrap;
}

.post-container > * {
  flex: 0 0 calc(50% - 4rem);
}

.post {
  padding: 2rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin: 2rem;
  box-shadow: 0 .5rem 3rem rgba(0,0,0, .3);
}
.post .post-title {
  text-align: center;
  margin-bottom: 2rem;
}
.post .post-date {
  padding-top: 1rem;
}
.pagination {
  display: flex;
  justify-content: center;
  border-bottom: 1px solid #ddd;
  padding-bottom: 2rem;
}
.pagination a {
  font-size: 2rem;
  font-weight: lighter;
  padding: 1rem 2rem;
  margin: 1rem 2rem;
  cursor: pointer;
  border-radius: 5px;
  box-shadow: 0 .25rem 3rem rgba(0,0,0, .3);
  transition: all .2s;
}

.pagination a:hover {
  box-shadow: 0 .5rem 4rem rgba(0,0,0, .4);
  transform: translateY(-2px);
}

.pagination a:active {
  box-shadow: 0 .25rem 2rem rgba(0,0,0, .5);
  transform: translateY(-1px);
}

.pagination .active {
  text-decoration: underline;
}

.pagination .active:hover,
.pagination .active:active{
  cursor: not-allowed;
  transform: none;
  box-shadow: 0 .25rem 3rem rgba(0,0,0, .3);
}
</style>
