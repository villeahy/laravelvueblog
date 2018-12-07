<template lang="html">
  <div class="login">
    <form class="form" submit="submit">
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
          Login
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "login-vue",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    submit: function(e) {
      e.preventDefault();
      fetch("/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        },
        body: JSON.stringify({
          username: this.email,
          password: this.password
        })
      })
        .then(res => res.json())
        .then(data => {
          this.$emit("new-token", data);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style lang="css">
.form {
  padding-top: 4rem;
}
.form_group:not(:last-child){
    margin-bottom: 2rem;
  }

.form_input{
  font-size: 1.5rem;
  font-family: inherit;
  color: inherit;
  padding: 1.5rem 2rem;
  border-radius: 2px;
  background-color: rgba(100%,100%,100%, .5);
  border: none;
  border-bottom: 3px solid transparent;
  width: 80%;
  display: block;
  transition: all .3s;
}

.form_input:focus {
  outline: none;
  box-shadow: 0 1rem 2rem rgba(0,0,0, .1);
  border-bottom: 3px solid green;
}

.form_input:focus:invalid {
  border-bottom: 3px solid red;
}
.form_input::-webkit-input-placeholder{
  color: #666;
}
.form_label{
  font-size: 1.5rem;
  margin-left: 2rem;
  margin-top: .7rem;
  display: block;
  transition: transform .3s, opacity .2s .2s;
}
.form_input:placeholder-shown + .form_label {
  opacity: 0;
  visibility: hidden;
  transform: translateY(-4rem);
}

.form_btn {
  font-size: 2rem;
  color: inherit;
  font-family: inherit;
  background-color: rgba(100%,100%,100%, .5);
  padding: 2rem 4rem;
  border: 1px solid transparent;
  border-radius: 5px;
  cursor: pointer;
  transition: all .2s;
  box-shadow: 0 .25rem .5rem rgba(0,0,0, .2);
}

.form_btn:hover,
.form_btn:focus{
  outline: none;
  border: 1px solid #ddd;
  transform: translateY(-4px);
  box-shadow: 0 1rem 2rem rgba(0,0,0, .2);
}
.form_btn:active {
  transform: translateY(-2px);
  box-shadow: 0 .5rem 2rem rgba(0,0,0, .5);
}
</style>
