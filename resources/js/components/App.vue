<template lang="html">
  <div class="container">
    <nav-bar v-bind:token="token" v-on:reset-token="updateToken('')" />
    <main>
      <posts-vue
        v-if="token"
        :token="token"
        v-on:reset-token="updateToken('')"
      />
      <login-register-vue v-on:new-token="updateToken($event)" v-else />
    </main>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import Posts from "./Posts.vue";
import LoginRegister from "./LoginRegister.vue";
import { logout } from "../utils/fetch.js";

export default {
  name: "vue-app",
  components: {
    "nav-bar": Navbar,
    "posts-vue": Posts,
    "login-register-vue": LoginRegister
  },
  data() {
    return {
      token: ``
    };
  },
  methods: {
    updateToken(newtoken) {
      if (!newtoken)
        logout({ token: this.token.access_token }).then(result => {
          console.log(result);
        });
      this.token = newtoken;
    }
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
