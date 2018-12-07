<template lang="html">
  <div class="container">
    <nav-bar v-bind:token="token" v-on:reset-token="token = ''" />
    <main>
      <posts v-if="token" v-bind:token="token" v-on:reset-token="token = ''" />
      <div class="login-register" v-else>
        <login-vue v-on:new-token="token = $event" /><register-vue />
      </div>
    </main>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import Posts from "./Posts.vue";
import Login from "./Login.vue";
import Register from "./Register.vue";

export default {
  name: "vue-app",
  components: {
    "nav-bar": Navbar,
    posts: Posts,
    "login-vue": Login,
    "register-vue": Register
  },
  data() {
    return {
      token: ``
    };
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
.login-register {
  display: flex;
  justify-content: space-around;
  align-items: stretch;
  flex-wrap: wrap;
}

.login-register > * {
  flex: 0 0 40%;
}
.login-register > *:not(:last-child){
  border-right: 1px solid #ddd;
}
@media only screen and (max-width: 800px) {
  .login-register > * {
    flex: 0 0 80%;
  }
  .login-register > *:not(:last-child){
    border-right: none;
  }
}
</style>
