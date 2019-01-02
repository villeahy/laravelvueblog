<template lang="html">
  <nav class="navbar">
    <h1>Ultimate Forum Warrior</h1>
    <button v-if="token" class="navbar_btn" @click="logout">Log out</button>
  </nav>
</template>

<script>
export default {
  name: "nav-bar",
  props: ["token"],
  methods: {
    logout: function() {
      this.$emit("reset-token");
    }
  }
};
</script>

<style scoped lang="css">
.navbar {
  padding: 2rem;
  border-bottom: 1px solid #ddd;
  border-radius: 5px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
h1 {
  font-size: 4rem;
  text-transform: uppercase;
  font-weight: 300;
  text-shadow: .7rem .7rem 1.5rem rgba(0,0,0,.4);
}
.navbar_btn{
  font-size: 2rem;
  color: inherit;
  font-family: inherit;
  background-color: rgba(100%,100%,100%, .5);
  padding: 1.5rem 3rem;
  border: 1px solid transparent;
  border-radius: 5px;
  cursor: pointer;
  transition: all .2s;
  text-transform: uppercase;
  box-shadow: 0 .25rem .5rem rgba(0,0,0, .2);
}
.navbar_btn:hover,
.navbar_btn:focus{
  outline: none;
  border: 1px solid #ddd;
  transform: translateY(-4px);
  box-shadow: 0 1rem 2rem rgba(0,0,0, .2);
}
.navbar_btn:active {
  transform: translateY(-2px);
  box-shadow: 0 .5rem 2rem rgba(0,0,0, .5);
}
</style>
