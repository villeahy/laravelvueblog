<template lang="html">
  <div class="container">
    <nav-bar />
    <main><posts /></main>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import Posts from "./Posts.vue";
export default {
  name: "vue-app",
  components: {
    "nav-bar": Navbar,
    posts: Posts
  }
};
</script>

<style lang="css">
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

html {
  font-size: 62.5%;
}

body {
  padding: 4rem;
  box-sizing: border-box;
  font-family: serif;
  color: #555;
  font-size: 1.6rem;
  background-color: #eee;
}
</style>
