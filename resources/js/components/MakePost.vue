<template lang="html">
  <div class="make_post">
    <form class="form_post" v-on:submit.prevent="submit">
      <h3>Create a post</h3>
      <div class="form_post_container">
        <div class="form_group">
          <label class="form_post_label" for="title">Title:</label>
          <input
            v-model="title"
            class="form_post_input"
            id="title"
            type="title"
            placeholder="title"
            required
          />
        </div>
        <div class="form_group">
          <label class="form_post_label" for="content">Content:</label> <br />
          <textarea
            v-model="body"
            class="form_post_text"
            id="content"
            type="content"
            placeholder="content"
            required
          />
        </div>
        <div class="form_group">
          <button class="form_btn form_post_btn" type="submit" name="button">
            Create
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { makePost } from "../utils/fetch.js";
export default {
  name: "make-post",
  data() {
    return { title: "", body: "" };
  },
  props: ["token", "socket"],
  methods: {
    submit() {
      const { title, body } = this;
      makePost({
        token: this.token.access_token,
        body: { title, body }
      }).then(results => {
        this.socket.send(JSON.stringify(results.data));
        this.title = "";
        this.body = "";
      });
    }
  }
};
</script>
<style scoped lang="css">
h3 {
  text-align: center;
  text-transform: uppercase;
  font-size: 3rem;
  text-shadow: .5rem .5rem 1.5rem rgba(0, 0, 0, 0.4);
}
.form_post {
  padding-top: 3rem;
}

.form_post_container {
  max-width: 50rem;
  margin: 0 auto;
}

.form_post_input {
  font-size: 2rem;
  font-family: inherit;
  color: inherit;
  padding: 1.5rem 2rem;
  border-radius: 2px;
  background-color: rgba(100%,100%,100%, .5);
  border: none;
  width: 50rem;
  display: block;
}

.form_post_text {
  font-size: 2rem;
  font-family: inherit;
  color: inherit;
  border-radius: 2px;
  padding: 1.5rem 2rem;
  border: none;
  width: 50rem;
  height: 20rem;
  background-color: rgba(100%,100%,100%, .5);
}

.form_post_input:focus, .form_post_text:focus {
  outline-color: rgba(150, 150, 150, 0.5);
}

.form_post_label {
  color: inherit;
  font-family: inherit;
  margin-left: 1.5rem;
  font-size: 2rem;
}

.form_post_btn {
  display: block;
  margin: 0 auto;
}
</style>
