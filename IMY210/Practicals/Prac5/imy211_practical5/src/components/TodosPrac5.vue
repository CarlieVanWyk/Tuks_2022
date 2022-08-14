<template>
  <div class="hello"></div>
  <h4>{{ status }}</h4>
  <h4>Keep an eye on the title field 👀</h4>
  <h6>{{ data }}</h6>
  <h4>Let's see if that was successful: {{ success }}</h4>
  <button v-on:click="getReq">Get</button>
  <button v-on:click="postReq">Post</button>
  <button v-on:click="putReq">Put</button>
  <button v-on:click="patchReq">Patch</button>
  <button v-on:click="deleteReq">Delete</button>
</template>

<script>
export default {
  name: "TodosPrac5",
  props: {
    userID: String,
    APIchoice: String,
    userInput: String,
  },
  data() {
    return {
      data: [{ title: "test" }],
      status: "None",
      success: "...",
    };
  },
  methods: {
    // _________________________________________________________________________________________________get
    getReq: function () {
      if (this.APIchoice == "todos") {
        this.status = "Get";
        fetch("https://jsonplaceholder.typicode.com/todos/" + this.userID)
          .then((response) => response.json())
          .then((data) => (this.data = data.title));

        if (this.data) {
          this.success = "We did it!";
        } else {
          this.success = "Nah, that didn't work bruh";
        }
      } else {
        this.success = "Oops, check that you selected the correct API";
      }
    },
    // _________________________________________________________________________________________________post
    postReq: function () {
      if (this.APIchoice == "todos") {
        this.status = "Post";
        const reqOptions = {
          method: "POST",
          headers: { "Content-Type": "application/json; charset=UTF-8" },
          body: JSON.stringify({
            userId: 9001,
            id: 12343,
            title: this.userInput,
            completed: true,
          }),
        };

        fetch("https://jsonplaceholder.typicode.com/todos", reqOptions)
          .then((response) => response.json())
          .then((data) => (this.data = data));

        if (this.data) {
          this.success = "We did it!";
        } else {
          this.success = "Nah, that didn't work bruh";
        }
      } else {
        this.success = "Oops, check that you selected the correct API";
      }
    },
    // _________________________________________________________________________________________________put
    putReq: function () {
      if (this.APIchoice == "todos") {
        this.status = "Put";
        const reqOptions = {
          method: "PUT",
          headers: { "Content-Type": "application/json; charset=UTF-8" },
          body: JSON.stringify({
            userId: 9001,
            id: 12343,
            title: this.userInput,
            completed: true,
          }),
        };

        fetch(
          "https://jsonplaceholder.typicode.com/todos/" + this.userID,
          reqOptions
        )
          .then((response) => response.json())
          .then((data) => (this.data = data));

        if (this.data) {
          this.success = "We did it!";
        } else {
          this.success = "Nah, that didn't work bruh";
        }
      } else {
        this.success = "Oops, check that you selected the correct API";
      }
    },
    // _________________________________________________________________________________________________patch
    patchReq: function () {
      if (this.APIchoice == "todos") {
        this.status = "Patch";
        const reqOptions = {
          method: "PATCH",
          headers: { "Content-Type": "application/json; charset=UTF-8" },
          body: JSON.stringify({
            title: this.userInput,
          }),
        };

        fetch(
          "https://jsonplaceholder.typicode.com/todos/" + this.userID,
          reqOptions
        )
          .then((response) => response.json())
          .then((data) => (this.data = data));

        if (this.data) {
          this.success = "We did it!";
        } else {
          this.success = "Nah, that didn't work bruh";
        }
      } else {
        this.success = "Oops, check that you selected the correct API";
      }
    },
    // _________________________________________________________________________________________________delete
    deleteReq: function () {
      if (this.APIchoice == "todos") {
        this.status = "Delete";

        const reqOptions = {
          method: "DELETE",
        };

        fetch(
          "https://jsonplaceholder.typicode.com/todos/" + this.userID,
          reqOptions
        )
          .then((response) => response.json())
          .then((data) => (this.data = data));

        if (this.data) {
          this.success = "We did it!";
        } else {
          this.success = "Nah, that didn't work bruh";
        }
      } else {
        this.success = "Oops, check that you selected the correct API";
      }
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
