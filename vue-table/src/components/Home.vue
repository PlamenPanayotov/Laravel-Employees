<template>
<v-container class="grey lighten-5">
  <h2>Employees</h2>
  <v-data-table
    :headers="headers"
    :items="employees"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      headers: [
        {
          text: "Employee",
          align: "start",
          sortable: false,
          value: "full_name",
        },
        { text: "Adress", value: "adress" },
        { text: "Phone", value: "phone" },
        { text: "Department", value: "department" },
        { text: "Position", value: "position" },
        { text: "Salary", value: "salary" },
      ],
      employees: [],
    };
  },

  // Fetches posts when the component is created.
  created() {
    axios
      .get(`http://127.0.0.1:8000/api/employees`)
      .then((response) => {
        // JSON responses are automatically parsed.
        this.employees = response.data;
      })
      .catch((e) => {
        this.errors.push(e);
      });
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
