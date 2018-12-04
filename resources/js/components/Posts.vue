<template lang="html">
  <main>
    <div class="post-container">
      <div class="post" v-for="post in posts" :key="post.id">
        <h3 class="post-title">{{ post.title }}</h3>
        <p class="post-paragraph">{{ post.body }}</p>
        <p class="post-date">{{ post.posted.date.slice(0, 16) }}</p>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      posts: [],
      post: {
        id: "",
        title: "",
        body: "",
        date: ""
      },
      article_id: "",
      pagination: {},
      edit: false
    };
  },
  mounted() {
    this.fetchPosts();
  },
  methods: {
    fetchPosts() {
      fetch("api/posts")
        .then(res => res.json())
        .then(({ data }) => {
          this.posts = data;
        });
    }
  }
};
</script>

<style lang="css">
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
.post .post-date{
  padding-top: 1rem;
}
</style>
