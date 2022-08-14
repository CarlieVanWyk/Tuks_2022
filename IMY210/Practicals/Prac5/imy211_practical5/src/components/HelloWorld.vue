<template>
  <div class="hello"></div>
  <h6>{{ status }}</h6>
  <h6>{{ data }}</h6>
  <button v-on:click="getReq">Get</button>
  <button v-on:click="postReq">Post</button>
  <button v-on:click="putReq">Put</button>
  <button v-on:click="patchReq">Patch</button>
  <button v-on:click="deleteReq">Delete</button>
</template>

<script>
export default {
  name: "HelloWorld",
  data() {
    return {
      data: [{ userid: "test" }],
      status: "None",
    };
  },
  methods: {
    getReq: function () {
      this.status = "Get";
      fetch("https://jsonplaceholder.typicode.com/todos/12")
        .then((response) => response.json())
        .then((data) => (this.data = data));
    },
    postReq: function () {
      this.status = "Post";
      const reqOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json; charset=UTF-8" },
        body: JSON.stringify({
          userId: 9001,
          id: 12343,
          title: "Post",
          completed: true,
        }),
      };

      fetch("https://jsonplaceholder.typicode.com/todos", reqOptions)
        .then((response) => response.json())
        .then((data) => (this.data = data));
    },
    putReq: function () {
      this.status = "Put";
      const reqOptions = {
        method: "PUT",
        headers: { "Content-Type": "application/json; charset=UTF-8" },
        body: JSON.stringify({
          userId: 9001,
          id: 12343,
          title: "Put",
          completed: true,
        }),
      };

      fetch("https://jsonplaceholder.typicode.com/todos/100", reqOptions)
        .then((response) => response.json())
        .then((data) => (this.data = data));
    },
    patchReq: function () {
      this.status = "Patch";
      const reqOptions = {
        method: "PATCH",
        headers: { "Content-Type": "application/json; charset=UTF-8" },
        body: JSON.stringify({
          title: "Patch",
        }),
      };

      fetch("https://jsonplaceholder.typicode.com/todos/10", reqOptions)
        .then((response) => response.json())
        .then((data) => (this.data = data));
    },
    deleteReq: function () {
      this.status = "Delete";

      const reqOptions = {
        method: "DELETE",
      };

      fetch("https://jsonplaceholder.typicode.com/todos/142", reqOptions)
        .then((response) => response.json())
        .then((data) => (this.data = data));
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
