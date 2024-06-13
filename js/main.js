const { createApp } = Vue;

createApp({
  data() {
    return {
      todolist: "",
    };
  },
  methods: {},
  mounted() {
    // Chiamata axios verso il mio server (l'indirizzo del server si basa dalla cartella dell'index)
    axios.get("server.php").then((result) => {
      this.todolist = result.data;
    });
  },
}).mount("#app");
