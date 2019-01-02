<template lang="html">
  <div class="login">
    <form class="form" v-on:submit.prevent="submit">
      <div class="form_group">
        <input
          v-model="email"
          class="form_input"
          id="email-login"
          type="email"
          placeholder="email"
          required
        />
        <label class="form_label" for="email-login">email</label>
      </div>
      <div class="form_group">
        <input
          v-model="password"
          class="form_input"
          id="password-login"
          type="password"
          placeholder="password"
          required
        />
        <label class="form_label" for="password-login">password</label>
      </div>

      <div class="form_group">
        <button class="form_btn" type="submit">Login</button>
      </div>
    </form>
  </div>
</template>

<script>
import { login } from "../utils/fetch";
export default {
  name: "login-vue",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    async submit() {
      try {
        const { email, password } = this;
        const token = await login({ body: { username: email, password } });
        console.log(token.access_token);
        if (token.access_token) this.$emit("new-token", token);
      } catch (e) {
        console.log(e);
      }
    }
  }
};
</script>

<style lang="css"></style>
