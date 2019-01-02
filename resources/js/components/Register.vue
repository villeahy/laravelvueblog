<template lang="html">
  <div class="register">
    <form class="form" v-on:submit.prevent="submit">
      <div class="form_group">
        <input
          v-model="name"
          class="form_input"
          id="name-register"
          type="name"
          placeholder="name"
          required
        />
        <label class="form_label" for="name-register">name</label>
      </div>
      <div class="form_group">
        <input
          v-model="email"
          class="form_input"
          id="email-register"
          type="email"
          placeholder="email"
          required
        />
        <label class="form_label" for="email-register">email</label>
      </div>
      <div class="form_group">
        <input
          v-model="password"
          class="form_input"
          id="password-register"
          type="password"
          placeholder="password"
          required
        />
        <label class="form_label" for="password-register">password</label>
      </div>

      <div class="form_group">
        <button class="form_btn" type="submit">Register</button>
      </div>
    </form>
    <p v-if="status === 'done'">Register done you can log in now</p>
  </div>
</template>

<script>
import { register } from "../utils/fetch.js";
export default {
  data() {
    return {
      email: "",
      name: "",
      password: "",
      status: ""
    };
  },
  methods: {
    async submit() {
      try {
        const { email, name, password } = this;
        const data = await register({ body: { email, name, password } });
        this.status = "done";
        this.email = "";
        this.name = "";
        this.password = "";
      } catch (err) {
        console.log("register error", err);
      }
    }
  }
};
</script>

<style scoped lang="css">
p {
  margin-top: 2rem;
}
</style>
