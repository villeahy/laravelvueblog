<template lang="html">
  <div class="register">
    <form class="form" submit="submit">
      <div class="form_group">
        <input
          v-model="name"
          class="form_input"
          id="name"
          type="name"
          placeholder="name"
          required
        />
        <label class="form_label" for="name">name</label>
      </div>
      <div class="form_group">
        <input
          v-model="email"
          class="form_input"
          id="email"
          type="email"
          placeholder="email"
          required
        />
        <label class="form_label" for="email">email</label>
      </div>
      <div class="form_group">
        <input
          v-model="password"
          class="form_input"
          id="password"
          type="password"
          placeholder="password"
          required
        />
        <label class="form_label" for="password">password</label>
      </div>

      <div class="form_group">
        <button class="form_btn" v-on:click="submit" name="button">
          Register
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      name: "",
      password: ""
    };
  },
  methods: {
    submit(e) {
      e.preventDefault();
      console.log("aasd");
    }
  }
};
</script>

<style lang="css"></style>
