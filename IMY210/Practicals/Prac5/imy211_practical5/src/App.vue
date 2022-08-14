<template>
  <!-- <img alt="Vue logo" src="./assets/logo.png" /> -->
  <!-- <HelloWorld msg="Welcome to Your Vue.js App" /> -->
  <div id="app_div">
    <p>
      Please insert your user id: <input type="text" v-model="userID" />
      <button @click="getUserID(userID)">Let's Gooo</button>
    </p>

    <p>To which API would you like to write/read ?</p>
    <input
      type="radio"
      id="usr"
      name="APIoption"
      value="users"
      v-model="APIchoice"
    />
    <label for="usr">Users</label><br />
    <input
      type="radio"
      id="pst"
      name="APIoption"
      value="posts"
      v-model="APIchoice"
    />
    <label for="pst">Posts</label><br />
    <input
      type="radio"
      id="tds"
      name="APIoption"
      value="todos"
      v-model="APIchoice"
    />
    <label for="tds">Todos</label><br />

    <p>
      Enter some text to push to your chosen APi:
      <input type="text" v-model="userInput" />
    </p>
  </div>

  <div id="components_div">
    <div>
      <h2>Query your Users API:</h2>
      <UsersPrac5
        :userID="userID"
        :APIchoice="APIchoice"
        :userInput="userInput"
      />
    </div>
    <div>
      <h2>Query your Posts API:</h2>
      <PostsPrac5
        :userID="userID"
        :APIchoice="APIchoice"
        :userInput="userInput"
      />
    </div>
    <div>
      <h2>Query your Todos API:</h2>
      <TodosPrac5
        :userID="userID"
        :APIchoice="APIchoice"
        :userInput="userInput"
      />
    </div>
  </div>
</template>

<script>
// import HelloWorld from "./components/HelloWorld.vue";

import PostsPrac5 from "./components/PostsPrac5.vue";
import TodosPrac5 from "./components/TodosPrac5.vue";
import UsersPrac5 from "./components/UsersPrac5.vue";

export default {
  name: "App",
  components: {
    // HelloWorld,
    PostsPrac5,
    TodosPrac5,
    UsersPrac5,
  },
  methods: {
    getUserID(id) {
      this.userID = id;
    },
  },
  data() {
    return {
      userID: "",
      APIchoice: "",
      userInput: "",
    };
  },
};
</script>

<style>
#app_div {
  background-color: #fa8072;
  margin: 0;
  padding: 1%;
  border-radius: 10px;
}
#components_div {
  display: flex;
  justify-content: space-around;
}
#components_div div {
  background-color: #ffe6e6;
  border-radius: 10px;
  margin-top: 20px;
  padding: 1%;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
