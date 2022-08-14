// carlie van wyk u21672823

const state = {
  tasks: ["drink coffee"],
};

const mutations = {
  ADD_TASK(state, payload) {
    let newTask = payload;
    state.tasks.push(newTask);
  },
};

const actions = {
  addTask(context, payload) {
    context.commit("ADD_TASK", payload);
  },
};

const getters = {
  getTasks(state) {
    return state.tasks;
  },
};

const store = Vuex.createStore({
  state,
  mutations,
  actions,
  getters,
});

const inputComponent = {
  template: '<input v-model="input" type="text" @keyup.enter="enterKeyPress"/>',
  data() {
    return {
      input: "",
    };
  },
  methods: {
    enterKeyPress() {
      this.$store.dispatch("addTask", this.input);
      this.input = "";
    },
  },
};

const app = Vue.createApp({
  computed: {
    tasks() {
      return this.$store.getters.getTasks;
    },
  },
  components: {
    "input-comp": inputComponent,
  },
});

app.use(store);
app.mount("#app");
