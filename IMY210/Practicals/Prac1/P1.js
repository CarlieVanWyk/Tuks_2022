//Carlie van wyk u21672823
new Vue({
  el: "#root",
  data: {
    heading: "My first prac",
    insert: "",
    remove: "",
    val: "",
    todoList: [
      {
        text: "Drink coffee",
      },
      {
        text: "Wash clothes",
      },
      {
        text: "Be happy",
      },
    ],
  },
  methods: {
    add_item: function () {
      return this.todoList.push({
        text: this.insert,
      });
    },

    remove_item: function () {
      /* let val = fruits.indexOf("Apple");
              fruits.splice(val, 1); */
      this.val = this.todoList.indexOf();
      console.log(this.remove);
      console.log(this.val);

      if (this.val == -1) {
      } else {
        return this.todoList.splice(this.val, 1);
      }
    },
  },
});
