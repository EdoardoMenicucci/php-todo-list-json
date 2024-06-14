const { createApp } = Vue;

createApp({
  data() {
    return {
      todolist: "",
      newTask: "",
      config: {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      },
    };
  },
  methods: {
    //Esercizio base
    addTask() {
      const task = {
        cosa: this.newTask,
        stato: "notDone",
      };
      axios.post("server.php", task, this.config).then((result) => {
        console.log(result, task);
        //aggiorno la lista con i dati aggiornati con la nuova task
        this.todolist = result.data;
      });
      this.newTask = "";
    },

    //Bonus elimina task
    deleteTask(index) {
      const indice = {
        indice: `${index}`,
      };

      //mando l'indice da rimovere
      axios.post("delete.php", indice, this.config).then((result) => {
        console.log(result);
        //aggiorno la lista con i dati aggiornati con la nuova task
        this.todolist = result.data;
      });
      //this.todolist[index] = "";
    },

    //Bonus cambia stato

    changeStatus(index) {
      //recupero l'indice della posizione cliccata
      const indice = {
        indice: `${index}`,
      };

      //mando l'indice per cambiare classe
      axios.post("updateTask.php", indice, this.config).then((result) => {
        console.log(result);
        //aggiorno la lista con i dati aggiornati con la nuova task
        this.todolist = result.data;
      });
    },
  },
  mounted() {
    // Chiamata axios verso il mio server (l'indirizzo del server si basa dalla cartella dell'index)
    axios.get("server.php").then((result) => {
      this.todolist = result.data;
      console.log(result.data);
    });
  },
}).mount("#app");
