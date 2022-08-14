// carlie van wyk u21672823

//____________Date()
function theTime() {
  var d = new Date(); // for now
  let timeH = d.getHours(); // => 9
  let timeM = d.getMinutes(); // =>  30
  let timeS = d.getSeconds(); // => 51
  let time = "" + timeH + ":" + timeM + ":" + timeS;
  return time;
}

const state = {
  users: ["Bea"],
  timestamps: [theTime()],
  messages: ["hey hey message"],

  //   persons: [{ message: "heyThere", user: "Carlie", time: theTime() }],
};

const mutations = {
  ADD_USER(state, payload) {
    let newUser = payload;
    state.users.push(newUser);
  },
  ADD_TIMESTAMPS(state, payload) {
    let newTS = payload;
    state.timestamps.push(newTS);
  },
  ADD_MESSAGE(state, payload) {
    let newMessage = payload;
    state.messages.push(newMessage);
  },
};

const actions = {
  addUser(context, payload) {
    context.commit("ADD_USER", payload);
  },
  addTimestamps(context, payload) {
    context.commit("ADD_TIMESTAMPS", payload);
  },
  addMessage(context, payload) {
    context.commit("ADD_MESSAGE", payload);
  },

  //   addPerson(state) {
  //     let newPerson = {
  //       message: state.messages[1],
  //       user: state.users[1],
  //       time: state.timestamps[1],
  //     };
  //     persons.push(newPerson);
  //   },
};

const getters = {
  getUser(state) {
    return state.users;
  },
  getTimestamps(state) {
    return state.timestamps;
  },
  getMessage(state) {
    return state.messages;
  },

  //   getPersons(state) {
  //     return state.persons;
  //   },
};

const store = Vuex.createStore({
  state,
  mutations,
  actions,
  getters,
});

// const inputComponent1 = {
//   template:
//     '<input v-model="input1" type="text" @keyup.enter="enterKeyPress1"/>',
//   data() {
//     return {
//       input1: "",
//     };
//   },
//   methods: {
//     enterKeyPress1() {
//       this.$store.dispatch("addUser", this.input1);
//       this.input1 = "";
//     },
//   },
// };

const inputComponent2 = {
  template:
    '<input v-model="input1" type="text" placeholder="user"/> <input v-model="input2" type="text" placeholder="message" @keyup.enter="enterKeyPress2" />',
  data() {
    return {
      input1: "",
      input2: "",
    };
  },
  methods: {
    enterKeyPress2() {
      this.$store.dispatch("addUser", this.input1);
      this.input1 = "";
      this.$store.dispatch("addMessage", this.input2);
      this.input2 = "";
      this.$store.dispatch("addTimestamps", theTime());

      //   this.$store.dispatch("addPerson");
    },
  },
};

const app = Vue.createApp({
  computed: {
    users() {
      return this.$store.getters.getUser;
    },
    messages() {
      return this.$store.getters.getMessage;
    },
    timestamps() {
      return this.$store.getters.getTimestamps;
    },
    // thePersons() {
    //   let message = this.$store.getters.getMessage;
    //   let user = this.$store.getters.getUser;
    //   let timestamp = this.$store.getters.getTimestamps;
    //   let person = "" + message + user + timestamp;
    //   return person;
    // },
  },
  components: {
    // "input-comp1": inputComponent1,
    "input-comp2": inputComponent2,
  },
});

app.use(store);
app.mount("#app");
